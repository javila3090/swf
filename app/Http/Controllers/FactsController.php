<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
}
