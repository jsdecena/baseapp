<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Hash;

use App\Repositories\UserRepository as User;

class UserController extends Controller
{
    private $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.list', ['users' => $this->user->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create', ['roles' => Role::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:8'
        ]);

        $data = [
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password'))
        ];

		
        $newUser = $this->user->create($data);

        //SYNC THE USER TO THE ROLE
        $user = $this->user->find($newUser->id);
        $user->roles()->sync([$request->input('role')]);

        return redirect()->route('admin.user.index')->with('success', 'Successfully created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit', [
                                            'user'          => $this->user->find($id),
                                            'roles'         => Role::all(),
                                            'user_role'     => $this->user->find($id)->roles()->first()
                                        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email'         => 'required|email'
        ]);

        $user           = $this->user->find($id);
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');

        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->has('role')) {
            $user->detachAllRoles();
            $user->attachRole($request->input('role'));
        }

        $user->updated_at = date('Y-m-d');
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Successfully deleted!');
    }

    public function dettach(Request $request, $id)
    {
        $user = $this->user->find($id);

        $user->detachRole($request->input('role'));

        return redirect()->route('admin.user.edit', $id)->with('success', 'Success!');
    }    
}
