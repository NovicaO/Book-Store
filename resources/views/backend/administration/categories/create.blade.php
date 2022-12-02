@extends('layouts.master')

@section('pageTopText')
            <a title="Go back" href="/administration/categories/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
            </a>
            <h2 class="text-center">Insert category</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/categories']) !!}
    @include('backend.administration.categories.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection