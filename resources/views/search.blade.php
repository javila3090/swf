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
                                        <span class="xs-text">Code</span> <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu cellphone" role="menu">
                                        @foreach($codes as $code)
                                            <li><a class="phone_code text-justify" onclick="fillInput('{{ $code->phonecode }}')"><img src="assets/images/flags/1x1/{{ strtoupper($code->iso) }}.svg" height="20" width="20"/> {{ $code->name }} + {{ $code->phonecode }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <span id="phone_code" class="input-group-addon xs-text"></span>
                            <input type="number" name="cellphone" id="cellphone" class="form-control xs-text" />
                            <input type="hidden" name="input_phone_code" id="input_phone_code" class="form-control xs-text" />
                        </div>
                    </div>
                    <button type="button" class="btn swButton" id="search_facts_sent" >Search</button>
                </div>
            </div>
            <label class="error" for="error_cell_phone" id="error_cell_phone"></label>
        </div>
    </header>
    <div id="section-wrap">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
                <div id="gif" style="display: none;"><img src="{{URL::asset('assets/images/ripple.gif')}}"> Search in progress...</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 jumbotron">
                <div id="resultado">

                </div>
            </div>
        </div>
    </div>
@endsection
