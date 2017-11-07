<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Charts;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function stadistictsAll(){

        return view('secure.stadisticts.general');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function stadistictsByDate(Request $request){
        $date_explode = explode("-", $request->input('date'));
        $from=trim($date_explode[0]);
        $to=trim($date_explode[1]);
        $from=date('Y-m-d', strtotime($from));
        $to =date('Y-m-d', strtotime($to));
        $stadistics = DB::table('orders')
            ->join('quantity', 'orders.quantity', '=', 'quantity.quantity')
            ->leftjoin('facts_sent', 'orders.id', '=', 'facts_sent.id_order')
            ->select(DB::raw('SUM(quantity.cost) as Profit'),DB::raw('COUNT(orders.id) as Orders'),DB::raw('COUNT(facts_sent.id) as Facts'))
            ->whereBetween('orders.created_at',array($from,$to))
            ->first();
        $stadistics=json_encode($stadistics);
        return $stadistics;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ordersByMonth(){

        $chart = Charts::database(Order::all(), 'bar', 'highcharts')
            ->title('Total Orders')
            ->elementLabel("Total orders by month")
            ->responsive(true)
            ->groupByMonth();

        return view('secure.stadisticts.orders_by_month',['chart'=>$chart]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ordersByYear(){

        $chart = Charts::database(Order::all(), 'bar', 'highcharts')
            ->title('Total Orders')
            ->elementLabel("Total orders by year")
            ->responsive(true)
            ->groupByYear();

        return view('secure.stadisticts.orders_by_year',['chart'=>$chart]);
    }

    public function list_users(){
        $users = User::all();
        return view('auth.users', compact('users'));
    }
}
