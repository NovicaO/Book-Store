@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/currencies/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update currency</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($currency,['action' => ['CurrenciesController@update',$currency->id],'method'=>'PATCH']) !!}
    @include('backend.administration.currencies.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection