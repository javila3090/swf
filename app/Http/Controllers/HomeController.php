<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Fact;
use App\Order;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count_orders = Order::all()->count();
        $count_facts_sent = DB::table('facts_sent')->count();
        $profit = DB::table('orders')
            ->join('quantity', 'orders.quantity', '=', 'quantity.quantity')
            ->select(DB::raw('SUM(quantity.cost) as cost'))
            ->get();
        /*$now = Carbon::now();
        $now->month;
        $profit = DB::table('orders')
            ->join('quantity', 'orders.quantity', '=', 'quantity.quantity')
            ->select(DB::raw('SUM(quantity.cost) as cost'))
            ->select(DB::raw('SUM(quantity.cost) as cost'))
            ->get();*/
        foreach ($profit as $v) {
            $cost=$v->cost;
        }
        $total=$cost;
        return view('home', compact('count_orders','count_facts_sent','total'));
    }
}