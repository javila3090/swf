<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Fact;

class FactsController extends Controller
{
    public function index(){
        $codes = DB::table('phone_codes')->get();
        $costs = DB::table('quantity')->get(['quantity','cost']);
        return \View::make('welcome', compact('codes','costs'));
    }

    public function search(){
        $codes = DB::table('phone_codes')->get();
        return \View::make('search', compact('codes'));
    }

    public function facts(){
        $fact = Fact::inRandomOrder()->first();
        return \View::make('facts',  compact('fact'));
}

    public function show(){
        $fact = Fact::inRandomOrder()->first();
        return $fact->text;
    }

    public function listFacts(){
        $facts = Fact::all();
        return \View::make('secure.facts_list',  compact('facts'));
    }

    public function searchFacts(Request $request){
        $number = $request->input('number');
        $facts_sent = DB::table('facts_sent')
            ->Join('orders','facts_sent.id_order','=', 'orders.id')
            ->Join('facts','facts_sent.id_fact','=', 'facts.id')
            ->select('orders.phone_number as phone_number','facts.text as text','facts_sent.created_at')
            ->where('orders.phone_number','=',$number)->get();
        $facts_sent=json_encode($facts_sent);
        return $facts_sent;
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
        return view('secure.edit_fact', compact('fact'));
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
