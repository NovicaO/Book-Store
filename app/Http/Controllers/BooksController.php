<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\Publisher;

use Illuminate\Support\Facades\Auth;


class BooksController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();

    }

    public function index()
    {
        $books = new Book;
        $queries=[];
        $columns=[
            'title',
        ];
        foreach ($columns as $column){
            if(\request()->has($column)){
                $books= $books->where($column, 'LIKE','%'.\request($column).'%');
                $queries[$column]=\request($column);
            }
        }

        $books = $books->with(['author','publisher','category'])->paginate(10)->appends($queries);

        return view('backend.administration.books.index', compact('books'));
    }

    public function show(Book $book)
    {
        return view('backend.administration.books.show', compact('book'));
    }


    public function create()
    {
        $author = Author::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $publisher = Publisher::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $categories = Category::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        return view('backend.administration.books.create', compact('author', 'publisher', 'categories'));

    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'required||max:50|unique:books,title',
            'publisher_id' => 'required|exists:publishers,id',
            'publish_date' => 'required|date',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'items' => 'required|numeric|min:1',
            'is_active' => 'required|boolean',
            'author_id' => 'required|exists:authors,id',
            'image_path'=>'image'
        ]);

        if (Auth::check()) {
            $all = request()->except('author_id');
            if (request()->hasFile('image_path')) {
                $book_name = request()->file('image_path')->getClientOriginalName();
                $book_name = 'images/' . str_replace(' ', '_', $book_name);
                request()->file('image_path')->move('images', $book_name);
                $all['image_path'] = $book_name;
                $book = Book::create($all);
            } else {
                $book = Book::create($all);
            }
            $book->author()->attach(request('author_id'));

            flash('You have successfully created a new book')->success()->important();
            return redirect('administration/books');
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }


    function edit($id)
    {
        $author = Author::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $publisher = Publisher::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $categories = Category::where('is_active', 1)->get()->pluck('name', 'id')->toArray();
        $book = Book::findOrFail($id);
        $authors = $book->author()->pluck('id')->toArray();
        $book['author_id'] = $authors;
        return view('backend.administration.books.edit', compact('author', 'publisher', 'categories', 'book'));

    }

    function update($id)
    {
        $this->validate(request(), [
            'title' => 'required||max:50|unique:books,title,' . $id,
            'publisher_id' => 'required|exists:publishers,id',
            'publish_date' => 'required|date',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'items' => 'required|numeric|min:1',
            'is_active' => 'required|boolean',
            'author_id' => 'required|exists:authors,id',
            'image_path'=>'image'
        ]);
        if (Auth::check()) {

            $book = Book::findOrFail($id);
            $request = request()->except('author_id');

            if (request()->hasFile('image_path')) {
                $book_name = request()->file('image_path')->getClientOriginalName();
                $book_name = 'images/' . str_replace(' ', '_', $book_name);
                request()->file('image_path')->move('images', $book_name);
                $request['image_path'] = $book_name;
            } else {
//            $request['image_path'] = 'images/default.png';
            }
            $book->update($request);
            $book->author()->sync(request()->author_id);
            flash('You have successfully updated the book')->success()->important();
            return back();
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }

    function removeImage(Book $book)
    {
        $this->validate(request(), [
            'title' => ''
        ]);
        if ($book->exists()) {
            $book->update(['image_path'=>'images/default.jpg']);
            flash()->success('You have successfully removed image');
            return back();
        }
        return back();
    }

    function defaultImage()
    {
        $this->validate(request(), [
            'image_path' => 'image'
        ]);

        if (request()->hasFile('image_path')) {
            request()->file('image_path')->move('images', 'default.jpg');
            flash()->success('You have successfully changed book default image');
            return back();
        }
        flash()->error('Error has occured during the image upload!');
        return back();

    }

}
