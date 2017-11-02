<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 20/10/2017
 * Time: 03:44 PM
 */
?>

@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <h1 class="tittle">Orders</h1>
                <hr>
            </div>
            <div class="row">
                <!-- Mensaje de respuesta de la transacción -->
                @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        {!! session('message.content') !!}
                    </div>
                @endif

                <table id="datatable" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Frecuency</th>
                            <th>Quantity</th>
                            <th>Created</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td style="width: auto;">{{ $order->id }}</td>
                                <td style="width: auto;">{{ $order->email }}</td>
                                <td style="width: auto;">{{ $order->phone_number }}</td>
                                <td style="width: auto;">{{ $order->id_frecuency }}</td>
                                <td style="width: auto;">{{ $order->quantity }}</td>
                                <td style="width: auto;">{{ $order->created_at }}</td>
                                <td><a href="{{route('order/view', $order)}}" title="View details" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open" ></span></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
