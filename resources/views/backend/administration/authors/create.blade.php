@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/authors/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert author</h2>
    <hr/>
@endsection

@section('content')

    {!! Form::open(['url' => 'administration/authors']) !!}
        @include('backend.administration.authors.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}

    @include('layouts.errors')

@endsection