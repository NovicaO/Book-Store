@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Change your personal data</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($user,['action' => ['PersonalDataController@update',$user->id],'method'=>'PATCH']) !!}
    @include('backend.administration.change_personal_data.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection