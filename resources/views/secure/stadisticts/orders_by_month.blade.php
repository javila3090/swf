<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 01/11/2017
 * Time: 07:02 PM
 */
?>

@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <h1 class="tittle">Orders by month</h1>
                <hr>
            </div>
            <div class="row">
               {!! $chart->render() !!}
            </div>
        </div>
    </div>
@endsection

