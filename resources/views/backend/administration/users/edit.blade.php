@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/users/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update user</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($user,['action' => ['UsersController@update',$user->id],'method'=>'PATCH']) !!}
    @include('backend.administration.users.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection