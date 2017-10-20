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
    public function index(){
        $orders = Order::all();
        return \View::make('orders',  compact('orders'));
    }

    public function store(Request $request){
        $rules = array(
            'text' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'You must complete all mandatory fields');
            return redirect()->route('list_facts');
        }else {
            $fact = new Fact(); // Creando el objecto del modelo
            $fact -> create($request->all());
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Register successful!');
            return redirect()->route('list_facts');
        }
    }

    /**
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update($id, Request $request)
    {
        $rules = array(
            'text' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {

            $messages = $validator->messages();
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'You must complete all mandatory fields');
            return redirect('secure/list/facts');
            //return redirect('personas/lista')->with('message', 'Debe completar todos los campos obligatorios del formulario');

        }else{

            $fact = Fact::findOrFail($id);
            $data = Input::all();
            $fact->fill($data);
            $fact->save();
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'Record udpated successfully!');
            return redirect('secure/list/facts');
            //return redirect('personas/lista')->with('message', '¡Registro actualizado con &eacute;xito!');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $fact = Fact::findOrFail($id);
        return view('edit', compact('fact'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id, Request $request){
        $registro = Fact::find($id);
        $registro -> delete();
        $request->session()->flash('message.level', 'success');
        $request->session()->flash('message.content', 'Record deleted successfully!');
        return redirect('secure/list/facts');
    }
}