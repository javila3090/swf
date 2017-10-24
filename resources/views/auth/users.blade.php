<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 24/10/2017
 * Time: 03:16 PM
 */
?>

@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <h1 class="tittle">Users <i class="fa fa-users"></i></h1>
                <hr>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-8">
                    <!-- Mensaje de respuesta de la transacción -->
                    @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}">
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            {!! session('message.content') !!}
                        </div>
                    @endif
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <table id="datatable" class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td style="width: auto;">{{ $user->name }}</td>
                                <td style="width: auto;">{{ $user->email }}</td>
                                <td style="width: auto;">{{ $user->created_at }}</td>
                                <td style="width: auto;">{{ $user->updated_at }}</td>
                                <td><a href="#" title="Edit" class="btn btn-success btn-sm"><span class="fa fa-edit" ></span></a></td>
                                <td><a href="{{route('user/delete', $user)}}" onclick="return confirm('This record will be deleted ¿Are you sure?')" title="Eliminar" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection