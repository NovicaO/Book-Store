@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/books/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update book</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($book,['action' => ['BooksController@update',$book->id],'method'=>'PATCH','files'=>true]) !!}
    @include('backend.administration.books.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection