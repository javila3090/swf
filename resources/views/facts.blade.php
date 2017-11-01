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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/es_EN/sdk.js#xfbml=1&version=v2.10&appId=2010997639157829';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4" style="cursor:pointer; margin-top: 40px;">
                    <img class="img img-responsive center-block" onclick="showFact()" style="cursor: pointer" src="{{URL::asset('assets/images/Darh-Vader-Ready.jpg')}}"/>
                    <p class="small-title">Tag me for another fact</p>
                </div>
            </div>
        </div>
    </header>
    <div id="section-wrap">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 jumbotron">
                <p id="resultado" style="font-style: italic">
                    {{ $fact->text }}
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="swButton btn btn-block fb-share-button" data-href="http://swfacts.dev.com/facts" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fswfacts.dev.com%2Ffacts&amp;src=sdkpreparse">Share</a></div>
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <div class="login-or">
                    <hr class="hr-or">
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <a class="swButton btn btn-block" href="{{route('/')}}"> SIGN FRIENDS UP NOW!</a>
            </div>
        </div>
    </div>
@endsection
