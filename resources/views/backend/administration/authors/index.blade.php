@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage authors</h2>
    <a title="Create new" href="/administration/authors/create" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> New author</a>
@endsection
    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>Author ID</th>
                <th>Author name</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <td>{{$author->id}}</td>
                    <td>{{$author->name}}</td>
                    <td>
                        <a title="Edit" href="/administration/authors/{{$author->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit "> </span> Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$authors->links()}}

    </div>

@endsection