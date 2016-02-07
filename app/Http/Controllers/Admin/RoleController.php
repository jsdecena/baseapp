<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.roles.list', ['roles' => Role::paginate(20)]);
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

        Role::create([
            'name' => $request->input('name'),
            'slug' => str_slug($request->input('name')),
            'description' => $request->input('description')
        ]);

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
                                                        'role'          => Role::find($id), 
                                                        'users'         => User::orderBy('email', 'asc')->get(),
                                                        'user_roles'    => Role::find($id)->users,
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
        return view('admin.users.roles.edit', ['role' => Role::find($id)]);
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

        $role                   = Role::find($id);
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
        $role  = Role::find($id);

        try {

            $role->delete();

            return redirect()->route('admin.role.index')->with('success', 'Successfully deleted!');

        } catch (Exception $e) {

            return redirect()->route('admin.role.index')->with('error', $e->getMessage());
        }
    }   
}
