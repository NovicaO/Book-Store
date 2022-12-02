@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/publishers" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert publisher</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/publishers']) !!}
    @include('backend.administration.publishers.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}

    @include('layouts.errors')

@endsection