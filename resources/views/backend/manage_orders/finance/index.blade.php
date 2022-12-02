@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Finance status</h2>
    <button data-toggle="collapse" data-target="#filters" class="btn btn-info btn-block">SHOW FILTER</button>
    <div id="filters" class="collapse">
        {!! Form::open(['url' => '/administration/finance','method'=>'GET']) !!}
        <div class="form-group">

            {!! Form::label('month','Filter by month:') !!}
            {!! Form::selectMonth('month',\Carbon\Carbon::now()->month, ['placeholder'=>'Filter by status','class'=>'form-control','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('year','Filter by year:') !!}
            {!! Form::selectRange('year', 2000, 2100,\Carbon\Carbon::now()->year, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Filter',['class'=>'btn btn-success btn-block']) !!}
        </div>
        {!! Form::close() !!}
        <a href="/administration/finance" class="btn btn-danger btn-block">Reset</a>

    </div>

@endsection
<div class="table-responsive">

    <table id="financeTable" class="table">
        <thead>
        <tr>
            <th>Year</th>
            <th>Month</th>
            <th>Orders</th>
            <th>Total books</th>
            <th>Cash total</th>
            <th>Orders finished</th>
            <th>Finished book items</th>
            <th>Finished total money</th>



        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->year}}</td>
                <td>{{$order->month}}</td>
                <td>{{$order->orders}}</td>
                <td>{{$order->orderItems}}</td>
                <td>{{$order->orderTotal}} {{$currency->symbol}}</td>
                <td>{{$order->finished}}</td>
                <td>{{$order->finished_order_items}}</td>
                <td>{{$order->finished_order_total}} @if($order->finished_order_total) {{$currency->symbol}} @endif</td>

            </tr>
        @endforeach


        </tbody>
    </table>
    @if(count($orders)==0)
        <div class="container">
            <div class="jumbotron">
                <h1>No orders found!</h1>
                <p>For the selected criteria, our database returned 0 results. Please try with a different
                criteria, or currently there is no orders to show in finance status.</p>
            </div>

        </div>
    @endif


</div>

@endsection

