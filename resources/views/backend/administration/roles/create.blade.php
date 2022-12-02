@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/roles/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert role</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/roles']) !!}
    @include('backend.administration.roles.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection