@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/orderStatus/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update status</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($orderStatus,['action' => ['OrderStatusController@update',$orderStatus->id],'method'=>'PATCH']) !!}
    @include('backend.administration.order_status.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection