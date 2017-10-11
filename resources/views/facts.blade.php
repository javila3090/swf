<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 11/10/2017
 * Time: 04:20 PM
 */
?>

@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="cursor:pointer; margin-top: 40px;">
                    <img class="img img-responsive center-block" src="{{URL::asset('assets/images/Darh-Vader-Ready.jpg')}}"/>
                    <p class="small-title">Tag me for another fact</p>
                </div>
            </div>
        </div>
    </header>
    <div id="section-wrap">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 jumbotron">
                <p>Fact's text here</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <a class="swButton btn btn-block" href="#form-sign-up"> SHARE THIS FACT </a>
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                OR
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <a class="swButton btn btn-block" href="#form-sign-up"> SIGN FRIENDS UP NOW!</a>
            </div>
        </div>
    </div>
@endsection
