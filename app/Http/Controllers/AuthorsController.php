<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorsController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $authors = Author::paginate(10);
        return view('backend.administration.authors.index', compact('authors'));
    }

    public function show(Author $author)
    {
        return view('backend.administration.authors.show', compact('author'));
    }

    public function create()
    {
        return view('backend.administration.authors.create');

    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:authors|max:20',
            'is_active' => 'required|boolean'
        ]);
        if (Auth::check()) {
            Author::create(request(['name', 'is_active']));
            flash()->success('You have successfully created author with a name ' . request()->name);
            return redirect('/administration/authors');
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }


    function edit($id)
    {
        $author = Author::findOrFail($id);
        return view('backend.administration.authors.edit', compact('author'));
    }

    function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|max:20|unique:authors,name,' . $id,
            'is_active' => 'required|boolean'
        ]);
        if (Auth::check()) {
            $author = Author::findOrFail($id);
            $author->update(request()->all('name','is_active'));
            flash()->success('You have successfully updated ' . $author->name);
            return back();
        }
        flash()->error('You dont have permission to do this!');
        return back();

    }

}
