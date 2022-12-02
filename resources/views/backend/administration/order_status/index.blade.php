@extends('layouts.master')
@section('content')
@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage statuses</h2>
    <a title="Create new" href="/administration/orderStatus/create" class="btn btn-success pull-right"><span class="glyphicon glyphicon-pencil"></span> New order status</a>
@endsection
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Status ID</th>
                <th>Status name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($status as $st)
                <tr @if($st->is_default) class="success" @elseif($st->is_end_status) class="danger" @endif>
                    <td>{{$st->id}}</td>
                    <td>{{$st->name}}</td>
                    <td>
                        <a title="Edit" href="/administration/orderStatus/{{$st->id}}/edit" class="btn btn-info"><span class="glyphicon glyphicon-edit "> </span> Edit</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        {{$status->links()}}

    </div>
@endsection