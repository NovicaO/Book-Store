<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RolesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');

    }
    public function index(){
        $roles = Role::paginate(10);
        return view('backend.administration.roles.index',compact('roles'));
    }

    public function show(Role $role){
        return view('backend.administration.roles.show',compact('role'));
    }

    public function create(){
        return view('backend.administration.roles.create');

    }

    public function store(){

        $this->validate(request(),[
            'display_name'=>'required|unique:roles,display_name|max:20',
            'type'=>'required',Rule::in(['Administrator','Moderator']),
            'is_active'=>'required|boolean',
        ]);

        if (Auth::user()->isAdmin()) {
            Role::create(request(['display_name','type', 'is_active']));
            flash()->success('You have successfully created role with a name ' . request()->name);
            return redirect('/administration/roles');
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }


    function edit($id)
    {

        $role = Role::findOrFail($id);
        return view('backend.administration.roles.edit', compact('role'));

    }

    function update($id)
    {

        $this->validate(request(),[
            'display_name'=>'required|max:20|unique:roles,display_name,'.$id,
            'type'=>'required',Rule::in(['Administrator','Moderator']),
            'is_active'=>'required|boolean',
        ]);

        if (Auth::user()->isAdmin()) {

            $role = Role::findOrFail($id);
            $role->update(request(['display_name','type', 'is_active']));
            flash()->success('You have successfully updated ' . $role->display_name);
            return back();

        }

        flash()->error('You dont have permission to do this!');
        return back();
    }
}
