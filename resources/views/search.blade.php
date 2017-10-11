<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 10/10/2017
 * Time: 04:01 PM
 */
?>

@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="form-group  col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-xs-12 search">
                    <label for="number" class="header-ask">Enter a number to see the Star Wars Facts that were sent</label>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <div class="btn-group">
                                    <button class="btn btn-default dropdown-toggle dropdown-button" type="button" data-toggle="dropdown">
                                        <span>Country</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" style="max-height: 150px; max-width: 490px; overflow-x: hidden; overflow-y: scroll; cursor: pointer;" role="menu">
                                        @foreach($codes as $code)
                                            <li><a class="phone_code" onclick="fillInput('{{ $code->phonecode }}')">{{ $code->name }} + {{ $code->phonecode }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <input type="text" name="cellphone" id="cellphone" class="form-control" />
                        </div>
                    </div>
                    <button type="button" class="btn swButton" id="">Search</button>
                    <label class="error" for="error_cell_phone" id="error_cell_phone"></label>
                </div>
            </div>
        </div>
    </header>
    <div id="section-wrap">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 jumbotron">

            </div>
        </div>
    </div>
@endsection
