@extends('layouts.master')

@section('pageTopText')
    <h2 class="text-center text-uppercase" >Manage books</h2>
    <div id="frontEndFilters" class="form-group col-md-3">
        {!! Form::open(['url' => '/administration/books','method'=>'GET']) !!}
        <div class="form-group">
            {!! Form::label('category_id','Filter by books title:') !!}
            {!! Form::text('title',null, ['placeholder'=>'Search by book title','class'=>'form-control']) !!}
            {!! Form::close() !!}
        </div>

    </div>
    <div class="btn-toolbar">
        <a href="/administration/books/create" class="btn btn-success  pull-right" title="Insert new book"><span
                    class="glyphicon glyphicon-pencil"></span> New book</a>
        <a data-toggle="modal" data-target="#defaultImageModal" title="Change default image" class="btn btn-warning pull-right"><span
                    class="glyphicon glyphicon-book"></span> Default image </a>
    </div>
@endsection
@section('content')


    <div id="defaultImageModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change default image</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url' => 'administration/books/defaultImage','files'=>true,'method'=>'post']) !!}
                    {!! Form::file('image_path',['required'=>'true'])!!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit('CHANGE',['class'=>'btn btn-success']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}
        @include('layouts.errors');
            </div>

        </div>
    </div>


    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Description</th>
                <th>Category</th>
                <th>Authors</th>
                <th>Price</th>
                <th>Items available</th>
                <th>Publish date</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
                <tr>
                    <td><span class="label label-default">{{$book->title}}</span></td>
                    <td><span class="label label-default">{{$book->publisher->name}}</span></td>
                    <td class="text-justify">{{$book->description}}</td>
                    <td><span class="label label-default">{{$book->category->name}}</span></td>
                    <td>
                        <span class="label label-default">{{$book->author->implode('name',' ,')}}</span>
                    </td>
                    <td><span class="label label-default">{{$book->price}} {{$currency->symbol}} </span> </td>
                    <td><span class="label label-default">{{$book->items}}</span></td>
                    <td><span class="label label-default" >{{$book->publish_date}}</span></td>
                    <td>
                        <a href="/administration/books/{{$book->id}}/edit" class="btn btn-info" title="Edit this book"><span
                                    class="glyphicon glyphicon-edit"></span> Edit</a>
                    </td>

                </tr>
            @endforeach
            </tbody>

        </table>
        {{$books->links()}}

    </div>

@endsection
