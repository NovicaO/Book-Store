<?php

namespace App\Http\Controllers;

use App\Book;
use App\OrderStatus;
use App\Order;

class OrderController extends BaseController
{

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        $orders = new Order;
        $queries = [];
        $columns = [
            'status_id'
        ];
        foreach ($columns as $column) {
            if (\request()->has($column)) {
                $orders = $orders->where($column, \request($column));
                $queries[$column] = \request($column);
            }
        }

        $status = OrderStatus::where('is_active', 1)->pluck('name', 'id');
        $statuses = $status->reverse()->put('', 'All')->reverse();
        $orders = $orders->orderBy('id', 'desc')->paginate(10)->appends($queries);
        return view('backend.manage_orders.orders.index', compact('orders', 'status', 'statuses'));

    }



    function update($id)
    {
        $endStatus = OrderStatus::where('is_end_status', 1)->first()->id;

        $order = Order::findOrFail($id);
        $orders = $order->book;
        if($order->status_id == $endStatus){
            foreach ($orders as $book) {
                $book->increment('items', $book->pivot->order_items);
            }
        }
        if (request()->status_id == $endStatus) {
            foreach ($orders as $book) {
                if ($book->items < $book->pivot->order_items) {
                    flash()->error('One or more books does not have enough items');
                    return back();
                }
            }
            foreach ($orders as $book) {
                $book->decrement('items', $book->pivot->order_items);
            }

            $order->update(request()->all());
            flash()->success('You have successfully updated order for ' . $order->firstname.' '.$order->lastname);
            return back();

        }


        $order->update(request()->all());
        flash()->success('You have successfully updated order for ' . $order->firstname.' '.$order->lastname);
        return back();
    }
}
