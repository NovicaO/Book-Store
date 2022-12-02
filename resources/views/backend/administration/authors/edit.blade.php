@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/authors/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update author</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($author,['action' => ['AuthorsController@update',$author->id],'method'=>'PATCH']) !!}
    @include('backend.administration.authors.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}

    @include('layouts.errors')
@endsection