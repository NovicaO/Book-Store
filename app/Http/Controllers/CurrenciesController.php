<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CurrenciesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Admin');

    }
    public function index(){
        $currencies = Currency::paginate(10);
        return view('backend.administration.currencies.index',compact('currencies'));
    }

    public function show(Currency $currency){
        return view('backend.administration.currencies.show',compact('currency'));
    }

    public function create(){
        return view('backend.administration.currencies.create');
    }

    public function store(){

        $this->validate(request(),[
            'name'=>'required|max:20|unique:currencies,name',
            'symbol'=>'required|max:3|unique:currencies,symbol',
            'is_default'=>'required|boolean'
        ]);

        if (Auth::user()->isAdmin()) {
            if (request()->is_default) {
                DB::table('currencies')->update(['is_default' => 0]);
            }

            Currency::create(request(['name', 'is_default','symbol']));
            flash()->success('You have successfully created role with a name ' . request()->name);
            return redirect('/administration/currencies');
        }
        flash()->error('You dont have permission to do this!');
        return back();
    }


    function edit(Currency $currency)
    {
        return view('backend.administration.currencies.edit', compact('currency'));

    }

    function update(Currency $currency)
    {
        $this->validate(request(),[
            'name'=>'required|max:20|unique:currencies,name,'.$currency->id,
            'symbol'=>'required|max:3|unique:currencies,symbol,'.$currency->id,
            'is_default'=>'required|boolean'
        ]);




        if (Auth::user()->isAdmin()) {
            if (request()->is_default) {
                DB::table('currencies')->update(['is_default' => 0]);
            }
            if($currency->is_default){
                flash()->error('To disable this as a current currency. Pick another one as a default. ');
                return back();
            }
            $currency->update(request()->all());
            flash()->success('You have successfully updated ' . $currency->name);
            return back();

        }

        flash()->error('You dont have permission to do this!');
        return back();
    }

    public function destroy(Currency $currency )
    {
        $currencies = Currency::count();
        if($currencies==1){
            flash()->error('There has to be atleast one currency');
            return back();
        }
        if($currency->is_default){
            flash()->error('Please deselect this currency as default then proceed.');
            return back();
        }
        $currency->delete();
        flash()->success('You have successfully removed currency');
        return back();
    }
}
