@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/users/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert user</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/users']) !!}
    @include('backend.administration.users.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection