<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 20/10/2017
 * Time: 12:51 AM
 */
?>

@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="row">
            <h1 class="tittle">Facts</h1>
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

            <table id="facts" class="table table-striped table-bordered table-responsive text-center" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Text</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($facts as $fact)
                    <tr>
                        <td style="width: auto;">{{ $fact->text }}</td>
                        <td style="width: auto;">{{ $fact->created_at }}</td>
                        <td style="width: auto;">{{ $fact->updated_at }}</td>
                        <td><a href="#" title="Editar" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-edit" ></span></a></td>
                        <td><a href="#" onclick="return confirm('El registro será eliminado ¿Está seguro?')" title="Eliminar" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection