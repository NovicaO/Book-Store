<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CategoriesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    function index()
    {
        $categories = Category::paginate(10);
        return view('backend.administration.categories.index', compact('categories'));
    }

    function show(Category $category)
    {
        return view('backend.administration.categories.show', compact('category'));
    }

    public function create()
    {
        return view('backend.administration.categories.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:categories|max:20',
            'is_active' => 'required|boolean'
        ]);
        if (Auth::check()) {
            Category::create(request()->all());
            flash()->success('You have successfully created a category with a name ' . request()->name);
            return redirect('administration/categories');
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }

    function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.administration.categories.edit', compact('category'));
    }

    function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|max:20|unique:categories,name,' . $id,
            'is_active' => 'required|boolean'
        ]);
        if (Auth::check()) {
            $category = Category::findOrFail($id);
            $category->update(request()->all());
            flash()->success('You have successfully updated ' . $category->name);
            return back();
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }


}
