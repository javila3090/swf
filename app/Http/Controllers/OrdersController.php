<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 20/10/2017
 * Time: 05:14 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Fact;
use App\Order;

class OrdersController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){
        $orders = Order::all();
        return \View::make('secure.orders',  compact('orders'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function viewDetail($order){
        $order = DB::table('orders')
                ->join('frecuency', 'orders.id_frecuency', '=', 'frecuency.id')
                ->join('quantity', 'orders.quantity', '=', 'quantity.quantity')
                ->join('status', 'orders.id_status', '=', 'status.id')
                ->leftjoin('facts_sent', 'orders.id', '=', 'facts_sent.id_order')
                ->select('orders.id','orders.email','orders.phone_number', 'orders.created_at','frecuency.name','quantity.quantity',
                    'quantity.cost','status.status', DB::raw("count(facts_sent.id_order) as count"))
                ->where('orders.id','=',$order)
                ->groupBy('orders.id','orders.email','orders.phone_number', 'orders.created_at','frecuency.name','quantity.quantity',
                    'quantity.cost','status.status')
                ->first();
        return \View::make('secure.order_detail',  compact('order'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, Request $request){
        $registro = Order::find($id);
        $registro -> delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Record deleted successfully!');
        return redirect('secure/list/orders');
    }
}