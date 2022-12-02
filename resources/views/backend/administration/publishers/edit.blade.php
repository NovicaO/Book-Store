@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/publishers" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update publisher</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($publisher,['action' => ['PublishersController@update',$publisher->id],'method'=>'PATCH']) !!}
    @include('backend.administration.publishers.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection