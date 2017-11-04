<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 23/10/2017
 * Time: 03:09 PM
 */
?>

@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="tittle">Order # {{$order->id}}</h1>
                    <hr>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span><b>Order details</b></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->email}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Phone number</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->phone_number}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Frecuency</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->name}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Facts sent / Total facts</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-send"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->count}} / {{$order->quantity}}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Cost</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->cost}} $">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>Created at</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->created_at}}">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Current status</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-refresh"></i></span>
                                <input class="form-control" disabled="disabled" value="{{$order->status}}">
                            </div>
                        </div>
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-danger btn-block">Go back!</button>
                </div>
            </div>
        </div>
    </div>
@endsection
