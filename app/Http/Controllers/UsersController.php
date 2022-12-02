<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');

    }

    public function index()
    {
        $users = User::paginate(10);
        return view('backend.administration.users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('backend.administration.users.show', compact('user'));
    }

    public function create()
    {
        $roles = Role::where('is_active', 1)->pluck('name', 'id');
        return view('backend.administration.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:users,name|max:40',
            'email' => 'required|unique:users,email|max:100|email',
            'role_id' => 'required|exists:roles,id',
            'is_active' => 'required|boolean',
            'password' => 'required|confirmed:password_confirmation',
            'password_confirmation' => 'required',
            'is_active'=>'required|boolean'
        ]);
        $request->request->add(['password' => bcrypt(\request()->password)]);
        if (Auth::user()->isAdmin()) {
            User::create($request->all());
            flash()->success('You have successfully created user with a name ' . request()->name);
            return redirect('/administration/users');
        }
        flash()->error('You dont have permission to do this!');
        return redirect('/administration/users');

    }


    function edit(User $user)
    {
        $roles = Role::where('is_active', 1)->pluck('display_name', 'id');
        return view('backend.administration.users.edit', compact('user', 'roles'));
    }

    function update(User $user, Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:40|unique:users,name,' . $user->id,
            'email' => 'required|max:100|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
            'is_active' => 'required|boolean',
            'password' => 'confirmed:password_confirmation',
            'is_active'=>'required'
        ]);
        if (Auth::user()->isAdmin()) {
            if ($request->password) {
                $request['password'] = bcrypt(\request()->password);
                $user->update($request->all());
            } else {
                $request['password'] = $user->password;
                $user->update($request->all());
            }
            flash()->success('You have successfully updated ' . $user->name);
            return back();
        }

        flash()->error('You dont have permission to do this!');
        return back();
    }
}
