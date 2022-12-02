<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Order;
use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontEndBooksController extends BaseController
{
// PRIKAZ SVIH KNJIGA
    public function index()
    {
        $books = new Book;
        $queries=[];
        $columns=[
            'category_id',
            'title',
            'publisher_id',
        ];
        foreach ($columns as $column){
            if(\request()->has($column)){
                $books= $books->where($column, 'LIKE','%'.\request($column).'%');
                $queries[$column]=\request($column);
            }
        }

        $categories= Category::where('is_active',1)->pluck('name','id');
        $categories= $categories->reverse()->put('','All')->reverse();

        $publishers= Publisher::where('is_active',1)->pluck('name','id');
        $publishers= $publishers->reverse()->put('','All')->reverse();


        $books = $books->orderBy('id','desc')->with(['author','publisher','category'])->paginate(10)->appends($queries);

        return view('frontend.books.books', compact('books','categories','publishers'));
    }


// PRIKAZ POJEDINACNE KNJIGE
    public function show(Book $book)
    {
        $book->load(['author','publisher','category']);
        return view('frontend.books.book', compact('book'));
    }




}
