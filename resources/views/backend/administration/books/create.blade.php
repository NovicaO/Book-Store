@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/books/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert book</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/books','files'=>true]) !!}
    @include('backend.administration.books.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection