@extends('layout_frontend.master')

@section('pageTopText')
    <button type="button" class="btn btn-success btn-block" data-target="#frontEndFilters" data-toggle="collapse">
        Filters
    </button>
    <div id="frontEndFilters" class="form-group collapse">
        {!! Form::open(['url' => '/books','method'=>'GET']) !!}
        <div class="form-group">
            {!! Form::label('category_id','Filter by category:') !!}
            {!! Form::select('category_id', $categories,null, ['placeholder'=>'Filter by category','class'=>'form-control','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('publisher_id','Filter by publisher:') !!}
            {!! Form::select('publisher_id', $publishers,null, ['placeholder'=>'Filter by category','class'=>'form-control ','required']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Filter by books title:') !!}
            {!! Form::text('title',null, ['placeholder'=>'Search by title','class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Search',['class'=>'btn btn-info btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <hr/>
@endsection
@section('content')
    <div class="row">
        @if(!count($books))
            <div class="container">
                <div class="jumbotron">
                    <h1>No books found!</h1>
                    <p>The requested search for {{$categories[request()->category_id] }} category returned 0 results
                        from our database.
                        Please try again with a different category, or just reset to all categories. </p>
                </div>

            </div>

        @endif
        @foreach($books as $book)

            <div class="col-sm-3">
                <div class="thumbnail">
                    <a title="{{$book->title}}" href="/books/{{$book->id}}"><img
                                class="img img-responsive img-rounded frontEndImages "
                                src="{{asset($book->image_path)}}"/></a>
                    <div class="caption">

                        <h3><a title="{{$book->title}}"
                               href="/books/{{$book->id}}">{{str_limit($book->title, $limit = 18, $end = '...') }}</a>
                        </h3>

                        <p class="text-justify">{{ str_limit($book->description, $limit = 105, $end = '...') }}
                        </p>
                        <p>
                            <span class="label label-default">Book price : {{$book->price}} {{$currency->symbol}}</span>
                        </p>
                        <p>
                            <a href="/books/{{$book->id}}/" type="button"
                               class="btn btn-default btn-group"><span
                                        class="glyphicon glyphicon-text-size"></span> Read more</a>
                            <a href="/cart/{{$book->id}}/addToCart" type="button"
                               class="btn btn-danger btn-group"><span
                                        class="glyphicon glyphicon-shopping-cart"></span> Add to cart</a>
                        </p>
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    <hr/>

@endsection
