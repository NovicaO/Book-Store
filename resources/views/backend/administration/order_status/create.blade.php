@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/orderStatus/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Insert status</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::open(['url' => 'administration/orderStatus']) !!}
    @include('backend.administration.order_status.form',['submitButton'=>'SAVE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection