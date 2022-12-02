<?php

namespace App\Http\Controllers;

use App\OrderStatus;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();


    }

    public function index()
    {
        $endStatus = OrderStatus::where('is_end_status', 1)->first()->id;

        $orders = new Order;
        $queries = [];

        if (\request()->has('month')) {
            $orders = $orders->whereMonth('created_at', \request('month'));
            $queries['month'] = \request('month');
        }
        if (\request()->has('year')) {
            $orders = $orders->whereYear('created_at', \request('year'));
            $queries['year'] = \request('year');
        }

        $orders = $orders
            ->join('order_book', 'orders.id', '=', 'order_book.order_id')
            ->select(
                DB::raw('SUM(order_items) AS orderItems'),
                DB::raw('SUM(order_total) as orderTotal'),
                DB::raw('MONTH(created_at) AS month'),
                DB::raw('YEAR(created_at) AS year'),
                DB::raw('COUNT(DISTINCT orders.id) as orders'))
            ->groupBy(DB::RAW('MONTH(created_at),YEAR(created_at)'))->get();

        $secondOrders = DB::table('orders')
            ->join('order_book', 'orders.id', '=', 'order_book.order_id')
            ->select(
                DB::raw('SUM(order_items) AS orderItems'),
                DB::raw('SUM(order_total) as orderTotal'),
                DB::raw('MONTH(created_at) AS month'),
                DB::raw('YEAR(created_at) AS year'),
                DB::raw('COUNT(DISTINCT orders.id) as orders'))
                    ->where('status_id',$endStatus)
            ->groupBy(DB::RAW('MONTH(created_at),YEAR(created_at)'))->get();

        foreach ($secondOrders as $secondItem) {
            foreach ($orders as $orderItems) {
                if(($orderItems->year == $secondItem->year) && ($orderItems->month == $secondItem->month)){
                    $orderItems['finished_order_items']=$secondItem->orderItems;
                    $orderItems['finished_order_total']=$secondItem->orderTotal;
                    $orderItems['finished'] = $secondItem->orders;
                }else{
                    $orderItems['finished_order_items']=0;
                    $orderItems['finished_order_total']=0;
                    $orderItems['finished'] = 0;

                }
            }            
        }
        return view('backend.manage_orders.finance.index', compact('orders'));

    }


}

?>

