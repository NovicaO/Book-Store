@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage currencies</h2>
    <a title="Create new" href="/administration/currencies/create" class="btn btn-success pull-right"><span
                class="glyphicon glyphicon-pencil"></span> Insert currency</a>
@endsection
<div class="table-responsive">

    <table class="table">
        <thead>
        <tr>
            <th>Currency id</th>
            <th>Currency name</th>
            <th>Currency symbol</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody>
        @foreach($currencies as $currency)
            <tr @if($currency->is_default) class="success" @endif>
                <td>{{$currency->id}}</td>
                <td>{{$currency->name}}</td>
                <td>{{$currency->symbol}}</td>
                <td>
                    <div class="btn-toolbar">
                        <a title="Edit" href="/administration/currencies/{{$currency->id}}/edit" class="btn btn-info btn-group"><span
                                    class="glyphicon glyphicon-edit "> </span> Edit</a>
                        <div class="btn-group">
                            {!! Form::open(['action' => ['CurrenciesController@destroy',$currency->id],'method'=>'DELETE']) !!}
                            {{ Form::button('<span class="glyphicon glyphicon-remove"></span> Remove', array('class'=>'btn btn-danger', 'type'=>'submit','title'=>'Remove')) }}
                            {!! Form::close() !!}
                        </div>

                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{$currencies->links()}}

</div>
@include('layouts.errors')



@endsection