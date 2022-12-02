@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage Roles</h2>
    {{--<a title="Create new" href="/administration/roles/create" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> </a>--}}
@endsection
    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>Role id</th>
                <th>Role display name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->display_name}}</td>
                    <td>
                        <a title="Edit" href="/administration/roles/{{$role->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit "> </span> Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$roles->links()}}

    </div>

@endsection