@extends('layouts.secure')

@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
                <div class="row">
                    <h1 class="tittle">Create User <i class="fa fa-user"></i></h1>
                    <hr>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="margin-top: 10px;">
                @if(session()->has('message.level'))
                    <div class="alert alert-{{ session('message.level') }}">
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        {!! session('message.content') !!}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12">
                    <div class="sw-form jumbotron">

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('store_user') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                            <select id="id_rol" name="id_rol" class="form-control" required>
                                                <option value="">Select an option </option>
                                                <option value="1">Admin</option>
                                                <option value="2">User</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4 col-md-offset-4">
                                        <button type="submit" class="btn btn-block btn-default">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection