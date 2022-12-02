@extends('layouts.master')

@section('pageTopText')
    <a title="Go back" href="/administration/categories/" class="btn btn-success pull-left"><span class="glyphicon glyphicon-backward"></span>
    </a>
    <h2 class="text-center">Update category</h2>
    <hr/>
@endsection

@section('content')
    {!! Form::model($category,['action' => ['CategoriesController@update',$category->id],'method'=>'PATCH']) !!}
    @include('backend.administration.categories.form',['submitButton'=>'UPDATE'])
    {!! Form::close() !!}
    @include('layouts.errors')

@endsection