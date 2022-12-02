@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/roles/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update role</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($role,['action' => ['RolesController@update',$role->id],'method'=>'PATCH']) !!}
    @include('backend.administration.roles.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection