<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PersonalDataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function show()
    {
        $user = User::findOrFail(Auth::id());
        return view('backend.administration.change_personal_data.show', compact('user'));
    }

    function edit()
    {
        $user = User::findOrFail(Auth::id());
        return view('backend.administration.change_personal_data.edit', compact('user'));
    }

    function update(Request $request)
    {
        $id = Auth::id();
        $user = User::findOrFail($id);

        $this->validate(request(), [
            'name' => 'required|max:40|unique:users,name,' . $id,
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'confirmed:password_confirmation|required_with:old_password,password_confirmation',
            'password_confirmation' =>'required_with:password'
        ]);
        if ($request->password) {
            if (Hash::check($request->old_password, Auth::user()->getAuthPassword())) {
                $request['password'] = bcrypt(\request()->password);
                $user->update($request->except('is_active', 'role_id'));
                flash()->success('You have successfully updated ' . $user->name);
                return back();
            }
            flash()->error('Old password not correct');
            return back();

        }
        $request['password'] = $user->password;
        $user->update($request->except('is_active', 'role_id'));
        flash()->success('You have successfully updated ' . $user->name);
        return back();
    }
}
