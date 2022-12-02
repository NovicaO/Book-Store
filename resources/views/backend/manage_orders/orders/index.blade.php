@extends('layouts.master')


@section('content')


@section('pageTopText')
    <h2 class="text-center text-uppercase">Manage orders</h2>
    <div class="form-group">
        {!! Form::open(['url' => '/administration/orders?status_id='.request('status_id'),'method'=>'GET']) !!}
        {!! Form::label('status_id','Filter by status:') !!}
        {!! Form::select('status_id', $statuses,null, ['placeholder'=>'Filter by status','class'=>'form-control','required','onchange'=>'this.form.submit()']) !!}
        {!! Form::close() !!}

    </div>
@endsection



<div class="table-responsive">

    <table id="financeTable" class="table">
        <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>City name</th>
            <th>Home address</th>
            <th>Postal number</th>
            <th>Phone number</th>
            <th>Ordered at</th>
            <th>Last change status</th>
            <th>Books</th>
            <th>Status</th>


        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->firstname}}</td>
                <td>{{$order->lastname}}</td>
                <td>{{$order->email_address}}</td>
                <td>{{$order->city_name}}</td>
                <td>{{$order->home_address}}</td>
                <td>{{$order->postal_number}}</td>
                <td>{{$order->phone_number}}</td>
                <td>{{$order->created_at}}</td>
                <td>{{$order->updated_at}}</td>
                <td>

                    @foreach($order->book as $singleBook)
                        <span class="label label-default">{{$singleBook->pivot->order_items}} x {{$singleBook->title}} = {{$singleBook->pivot->order_total}}$ </span>
                    @endforeach
                </td>



                <td style="width:12%;">
                    {!! Form::open(['action' => ['OrderController@update',$order->id],'method'=>'PATCH']) !!}
                    {!! Form::select('status_id', $status,$order->status->id, ['class'=>'form-control','required','onchange'=>'this.form.submit()']) !!}</td>
                {!! Form::close() !!}
                </td>

                <td>


            </tr>
        @endforeach


        </tbody>
    </table>
    @if(count($orders)==0)
        <div class="container">
            <div class="jumbotron">
                <h1>No orders found!</h1>
                <p>The requested search for orders returned 0 results from our database.
                    Please try again with a different filter, or just show all orders. </p>
            </div>

        </div>
    @endif

</div>

@endsection