@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage users</h2>
    <a title="Create new" href="/administration/users/create" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> Insert user</a>
@endsection
    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->display_name}}</td>
                    <td>
                        <a title="Edit" href="/administration/users/{{$user->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit "> </span> Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$users->links()}}

    </div>

@endsection