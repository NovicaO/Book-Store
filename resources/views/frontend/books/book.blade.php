@extends('layout_frontend.master')


@section('content')
    <a title="Go to main page" href="/books" class="btn btn-default glyphicon glyphicon-menu-left"></a>
<hr/>
    <div class="row">
        <div class="col-md-3">
            <figure>
                <img src="{{asset($book->image_path)}}" class="img img-responsive img-rounded frontEndImages"  alt="Book image">
                <figcaption>
                    <figcaption>
                        <hr/>
                        <div class="btn-toolbar">

                                <a href="/cart/{{$book->id}}/putInCartAndShowCart" type="button"
                                   class="btn btn-success btn-block btn-group"><span class="glyphicon glyphicon-shopping-cart"></span> Buy now </a>
                                <a href="/cart/{{$book->id}}/addToCart" type="button"
                                   class="btn btn-danger btn-block btn-group"><span class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                        </div>

                    </figcaption>
                </figcaption>
            </figure>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{$book->title}}</h3>
                </div>
                <div class="panel-body">
                    {{$book->description}}
                </div>
            </div>
            <ul class="list-group">
                <li class="list-group-item active">Book info</li>
                <li class="list-group-item">Category <span class="pull-right label label-default"> {{$book->category->name}}</span> </li>
                <li class="list-group-item">Publisher <span class="pull-right label label-default"> {{$book->publisher->name}}</span> </li>
                <li class="list-group-item">Authors <span class="pull-right label label-default"> {{$book->author->implode('name',' ,')}}
</span> </li>
                <li class="list-group-item">Publish date <span class="pull-right label label-default"> {{$book->publish_date}}</span> </li>
                <li class="list-group-item">Price <span class="pull-right label label-default"> {{$book->price}} {{$currency->symbol}}</span> </li>


            </ul>
        </div>

    </div>
    <hr/>



@endsection
