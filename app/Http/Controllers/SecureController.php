<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Fact;
use App\Order;
use App\User;

class SecureController extends Controller
{
    public function index(){
        $now = Carbon::now();
        $count_orders = Order::all()->count();
        $count_facts_sent = DB::table('facts_sent')->count();
        $profit = DB::table('orders')
            ->join('quantity', 'orders.quantity', '=', 'quantity.quantity')
            ->select(DB::raw('SUM(quantity.cost) as cost'))
            ->first();
        $profit_last_month = DB::table('orders')
            ->join('quantity', 'orders.quantity', '=', 'quantity.quantity')
            ->select(DB::raw('SUM(quantity.cost) as cost'))
            ->whereMonth('created_at', '=',$now->month)
            ->first();
        return view('home', compact('count_orders','count_facts_sent','profit','profit_last_month'));
    }

    public function list_users(){
        $users = User::all();
        return view('auth.users', compact('users'));
    }
}
