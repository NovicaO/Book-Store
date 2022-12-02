@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/currencies/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert currency</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/currencies']) !!}
    @include('backend.administration.currencies.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection