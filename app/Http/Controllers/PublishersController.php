<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublishersController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $publishers = Publisher::paginate(10);
        return view('backend.administration.publishers.index', compact('publishers'));
    }

    public function show(Publisher $publisher)
    {
        return view('backend.administration.publishers.show', compact('publisher'));
    }

    public function create()
    {
        return view('backend.administration.publishers.create');

    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|unique:publishers|max:20',
            'is_active' => 'required|boolean'
        ]);
        if (Auth::check()) {
            Publisher::create(request(['name', 'is_active']));
            flash()->success('You have successfully created a publisher with a name ' . request()->name);
            return redirect('administration/publishers');
        }
        flash()->success('You dont have permission to do this!');
        return back();
    }

    function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('backend.administration.publishers.edit', compact('publisher'));
    }

    function update($id)
    {

        $this->validate(request(), [
            'name' => 'required|max:20|unique:publishers,name,' . $id,
            'is_active' => 'required|boolean'
        ]);
        if (Auth::check()) {
            $publisher = Publisher::findOrFail($id);
            $publisher->update(request()->all('name','is_active'));
            flash()->success('You have successfully updated ' . $publisher->name);
            return back();
        }
        flash()->success('You dont have permission to do this!');
        return back();

    }


}
