@extends('layout_frontend.master')


@section('content')
    <a title="Go to main page" href="/books" class="btn btn-default glyphicon glyphicon-menu-left"></a>

    <hr/>
    @if(Cart::count()==0)
        <div class="container">
            <div class="jumbotron">
                <h1>Your cart is empty!</h1>
                <p>To add items to your cart click <a href="/books/">here</a>.</p>
            </div>

        </div>



    @else(Cart::count()>0)

        <div class="panel panel-danger">
            <!-- Default panel contents -->
            <div class="panel-heading"><span class="glyphicon glyphicon-shopping-cart"></span> <strong>Cart
                    items</strong>
                @if(Cart::count()>0)
                    <a class="pull-right" title="Remove all items from cart" href="/cart/empty"><span
                                class="glyphicon glyphicon-erase text-danger"> Empty</span></a>
                @endif
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th><span class="glyphicon glyphicon-signal"></span> Quantity</th>
                            <th><span class="glyphicon glyphicon-tags"></span> Book name</th>
                            <th><span class="glyphicon glyphicon-usd"></span> Price</th>
                            <th><span class="glyphicon glyphicon-cog"></span> Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach(Cart::content() as $item)
                            <tr>
                                <td>

                                            {!! Form::open(['url' => '/cart/updateCartItems']) !!}
                                            {!!  Form::hidden('row_id', $item->rowId)  !!}
                                            <div class="col-md-2">
                                            {!!  Form::number('qty', $item->qty, ['class' => 'form-control cartItemsInput','item_price'=>$item->price,'min'=>1,'required'])  !!}
                                            </div>
                                            <span class="input-group-btn col-md-2">
                                                {!! Form::button('<span class="glyphicon glyphicon-random"> Update </span>',['class'=>'btn btn-warning','type'=>'submit']) !!}
                                            </span>

                                            {!! Form::close() !!}


                                </td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}} {{$currency->symbol}}</td>
                                <td>
                                    <div class="btn-toolbar">
                                        <a title="Remove one" href="/cart/{{$item->rowId}}/removeFromCart"
                                           class="btn btn-danger btn-group"><span
                                                    class="glyphicon glyphicon-remove"></span> One</a>
                                        <a title="Remove all" href="/cart/{{$item->rowId}}/removeAllSelectedBook"
                                           class="btn btn-danger btn-group"><span
                                                    class="glyphicon glyphicon-trash"></span> All</a>
                                    </div>
                                </td>

                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>
                @if(Cart::count()>0)
                    <h3 class="pull-right">Total <span id="totalCart">{{Cart::subtotal()}} </span> {{$currency->symbol}}
                    </h3>
                    <button data-target="#buymenu" data-toggle="collapse" class="btn btn-success btn-block">PLACE
                        ORDER
                    </button>
                @endif
                <hr/>
                <div id="buymenu" class="collapse">
                    {!! Form::open(['action' => ['CartController@placeOrder']]) !!}
                    <div class="form-group">
                        {!! Form::label('firstname','Enter your name:') !!}
                        {!! Form::text('firstname',null,['class'=>'form-control','placeholder'=>'Enter your name','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lastname','Enter your lastname:') !!}
                        {!! Form::text('lastname',null,['class'=>'form-control','placeholder'=>'Enter your lastname','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email_address','Enter your email address:') !!}
                        {!! Form::email('email_address',null,['class'=>'form-control','placeholder'=>'Enter your email address','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('home_address','Enter your home address:') !!}
                        {!! Form::text('home_address',null,['class'=>'form-control','placeholder'=>'Enter your home address','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('postal_number','Enter your postal number:') !!}
                        {!! Form::number('postal_number',null,['class'=>'form-control','placeholder'=>'Enter your postal number','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_number','Enter your phone number:') !!}
                        {!! Form::number('phone_number',null,['class'=>'form-control','placeholder'=>'Enter your phone number','required']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('city_name','Enter your city:') !!}
                        {!! Form::text('city_name',null,['class'=>'form-control','placeholder'=>'Enter your city','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('BUY',['class'=>'btn btn-danger btn-block']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    @endif


    @include('layouts.errors')

@endsection
