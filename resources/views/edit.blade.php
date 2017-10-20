<?php
/**
 * Created by PhpStorm.
 * User: Julio
 * Date: 20/10/2017
 * Time: 04:46 PM
 */
?>
@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="container">
            <div class="row">
                <h1 class="tittle">Edit Fact</h1>
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
                <div class="col-md-12">
                    {!! Form::model($fact,['route' => ['fact/update', $fact], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                            <div class="col-md-8">
                                {!! Form::textarea('text', null, ['id' => 'text', 'rows' => '4','class' => 'form-control' , 'data-validation' => 'required', 'required' => 'required']) !!}
                                @if ($errors->has('text'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('text') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-default btn-block">Update</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-danger btn-block">Cancel</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- ADD FACT MODAL -->
    <div class="container">
        <div class="row">
            <div class="modal fade" id="add_fact" class="modal-border" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header modal-header-info">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="form-title text-center" style="color:#000;">Add New Fact</h4>
                        </div>
                        <div class="modal-body">
                            <div style="margin-top: 10px;">
                                <div class="">
                                    <div id="resultado" class="alert alert-success" role="alert" style="display: none;"></div>
                                    <div id="error"></div>
                                    <div id="gif_email" style="display: none;">
                                        <div class="text-center">
                                            <i class="align-middle"><img src="img/Reload.gif"> Enviando correo...</i>
                                        </div>
                                    </div>
                                </div>
                                <form class="form-horizontal" method="POST" action="{{ route('store/fact') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                        <label for="text" class="col-md-4 control-label">Fact's text</label>

                                        <div class="col-md-8">
                                            <textarea id="text" name="text" required rows="6" cols="4"></textarea>

                                            @if ($errors->has('text'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('text') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4">
                                            <button type="submit" class="btn btn-default btn-block">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal -->
        </div>
    </div>

    <!-- UPDATE FACT MODAL -->
    <div class="container">
        <div class="row">
            <div class="modal fade" id="add_fact" class="modal-border" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">

                    <div class="modal-content">
                        <div class="modal-header modal-header-info">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="form-title text-center" style="color:#000;">Add New Fact</h4>
                        </div>
                        <div class="modal-body">
                            <div style="">
                                {!! Form::model($fact,['route' => ['fact/update', $fact], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="text" class="col-md-4 control-label">Fact's text</label>

                                    <div class="col-md-8">
                                        {!! Form::textarea('text', null, ['id' => 'text', 'rows' => '4','class' => 'form-control' , 'data-validation' => 'required']) !!}
                                        @if ($errors->has('text'))
                                            <span class="help-block">
                                                    <strong>{{ $errors->first('text') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button type="submit" class="btn btn-default btn-block">
                                            Update
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal -->
        </div>
    </div>
@endsection
