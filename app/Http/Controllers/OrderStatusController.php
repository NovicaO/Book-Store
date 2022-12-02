<?php

namespace App\Http\Controllers;


use App\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderStatusController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $status = OrderStatus::paginate(15);
        return view('backend.administration.order_status.index', compact('status'));
    }


    public function create()
    {
        return view('backend.administration.order_status.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|max:20|unique:order_statuses,name',
            'is_active' => 'required|boolean',
            'is_default' => 'required|boolean',
            'is_end_status' => 'required|boolean'
        ]);


        if (Auth::check()) {
            if (request()->is_default && request()->is_end_status) {
                flash()->error('Order status cant be default and end status at the same time');
                return back();
            }
            if ($request->is_default) {
                DB::table('order_statuses')->update(['is_default' => 0]);
            }
            if ($request->is_end_status) {
                DB::table('order_statuses')->update(['is_end_status' => 0]);
            }
            OrderStatus::create($request->all());

            flash('You have successfully created new status')->success()->important();
            return redirect('administration/orderStatus');
        }
        flash()->error('You dont have permission to do this!');
        return back();

    }


    public function show(OrderStatus $bookStatus)
    {
        dd('one');
    }


    public function edit($id)
    {
        $orderStatus = OrderStatus::findOrFail($id);
        return view('backend.administration.order_status.edit', compact('orderStatus'));
    }


    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required|max:20|unique:order_statuses,name,' . $id,
            'is_active' => 'required|boolean',
            'is_default' => 'required|boolean',
            'is_end_status' => 'required|boolean'
        ]);
        if (Auth::check()) {

            $orderStatus = OrderStatus::findOrFail($id);

            //JEDAN ORDER STATUS NE MOZE BITI U ISTO VREME I DEFAULT I END DEFAULT
            if (request()->is_default && request()->is_end_status) {
                flash()->error('Order status cant be default and end status at the same time');
                return back();
            }

            // NE MOZE SE DESELECT AKO PRE TOGA NIJE SELEKTOVANA DRUGA ORDER_STATUS ! UVEK MORA BITI JEDNA AKTIVNA
            if ($orderStatus->is_default && !request()->is_default) {
                flash()->error('You cant disable default status, there has to be at least one default status, please select another status to be your default, then continue.');
                return back();
                //ISTO VAZI KAO I ZA IS_DEFAULT!
            } elseif ($orderStatus->is_end_status && !request()->is_end_status) {
                flash()->error('You cant disable end status, there has to be at least one end status, please select another status to be your end status, then continue.');
                return back();
            }

            if (request()->is_default && !$orderStatus->is_default) {
                DB::table('order_statuses')->where('is_default', 1)->update(['is_default' => 0]);
            }
            if (request()->is_end_status && !$orderStatus->is_end_status) {
                DB::table('order_statuses')->where('is_end_status', 1)->update(['is_end_status' => 0]);
            }

            $orderStatus->update(request(['name', 'is_active', 'is_default', 'is_end_status']));


            flash()->success('You have successfully updated order status to ' . $orderStatus->name);
            return back();
        }
        flash()->success('NOT AUTHORIZED');
        return back();

    }


}
