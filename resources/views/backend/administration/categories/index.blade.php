@extends('layouts.master')

@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage Categories</h2>
    <a title="Insert new" href="/administration/categories/create" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span>
    New category</a>
@endsection
@section('content')



    <div class="table-responsive">

        <table class="table">
            <thead>
            <tr>
                <th>Category ID</th>
                <th>Category name</th>
                <th>Edit</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr id="task{{$category->id}}">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a title="Edit" href="/administration/categories/{{$category->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit "> </span> Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$categories->links()}}

    </div>

@endsection