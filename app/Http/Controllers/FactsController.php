<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FactsController extends Controller
{
    public function index(){
        $codes = DB::table('phone_codes')->get();
        return \View::make('welcome', compact('codes'));
    }
}
