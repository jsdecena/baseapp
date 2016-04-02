<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository as User;
use App\Repositories\RoleRepository as Role;

class RoleController extends Controller
{
    private $role;

    private $user;

    function __construct(Role $role, User $user)
    {
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.roles.list', ['roles' => $this->role->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.roles.create');
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
            'name'         => 'required|unique:roles',
        ]);

        $data = [
            'name' 			=> $request->input('name'),
            'slug' 			=> str_slug($request->input('name')),
            'description' 	=> $request->input('description')
        ];

		$this->role->create($data);

        return redirect()->route('admin.role.index')->with('success', 'Successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('admin.users.roles.collection', [
                                                        'role'          => $this->role->find($id), 
                                                        'users'         => $this->user->all(),
                                                        'user_roles'    => $this->role->find($id)->users,
                                                    ]);
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.roles.edit', ['role' => $this->role->find($id)]);
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
            'name'         => 'required',
        ]);

        $role                   = $this->role->find($id);
        $role->name             = $request->input('name');
        $role->slug             = str_slug($request->input('name'));
        $role->description      = $request->input('description');
        $role->save();

        return redirect()->route('admin.role.index')->with('success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role  = $this->role->find($id);

        try {

            $role->delete();

            return redirect()->route('admin.role.index')->with('success', 'Successfully deleted!');

        } catch (Exception $e) {

            return redirect()->route('admin.role.index')->with('error', $e->getMessage());
        }
    }

    public function attach(Request $request, $id)
    {
        $user = $this->user->find($request->input('user'));

        $user->attachRole($id);

        return redirect()->route('admin.role.show', $id)->with('success', 'Successfully added this user on this role!');
    }

    public function detach(Request $request, $id)
    {
        $user = $this->user->find($request->input('userID'));

        $user->detachRole($id);

        return redirect()->route('admin.role.show', $id)->with('success', 'Successfully removed this user on this role!');
    }    
}
