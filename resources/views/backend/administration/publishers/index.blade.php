@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage publishers</h2>
    <a title="Insert new" href="/administration/publishers/create" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> New publsiher</a>
@endsection
    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>Publisher ID</th>
                <th>Publisher name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>{{$publisher->id}}</td>
                    <td>{{$publisher->name}}</td>
                    <td>
                        <a title="Edit" href="/administration/publishers/{{$publisher->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit "> </span> Edit</a>
                    </td>


                </tr>
            @endforeach

            </tbody>
        </table>
        {{$publishers->links()}}

    </div>

@endsection