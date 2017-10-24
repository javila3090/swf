@extends('layouts.app')

@section('content')
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h1 class="header-title">STAR WARS FACTS</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <img class="img img-responsive center-block" src="{{URL::asset('assets/images/Darh-Vader-Ready.jpg')}}"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p class="small-title"><b>Automatically</b> and <b>anonymously</b> sign your friends up to receive massive amounts of Star Wars Facts!</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4 text-center">
                    <a class="swButton" href="#form-sign-up"> SIGN THEM UP NOW!</a>
                </div>
            </div>
        </div>
    </header>
    <div id="section-wrap-comments">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <p>“I am your father.”</p>
                <p class="small-title-black">Darth Vader</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <p>“The Force will be with you. Always.”</p>
                <p class="small-title-black">Obi-Wan Kenobi</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <p>"Just for once, let me look on you with my own eyes."</p>
                <p class="small-title-black">Anakin Skywalker</p>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 text-center">
                <p>“You can’t stop the change, any more than you can stop the suns from setting.”</p>
                <p class="small-title-black">Shmi Skywalker</p>
            </div>
        </div>
    </div>
    <div id="form-sign-up">
        <div class="row">
            <div class="">
                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 jumbotron">
                    <div id="resultado"></div>
                    <h2 class="title-2"><b>SEND SOME FACTS</b></h2>
                    <br>
                    <form id="params-form">
                        <div class="row">
                            <div class="form-group col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                                <label for="number" class="header-ask xs-header-text">What cell number should receive facts?</label>
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
                                <label class="error" for="error_cell_phone" id="error_cell_phone"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group  col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                                <label for="frecuency" class="header-ask xs-header-text">How often should they receive Star Wars Facts?</label>
                                <div>
                                    <label>
                                        <input type="radio" class="option-input" value="4" name="frecuency" checked />
                                        <span class="xs-text">4 an hour</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="2" name="frecuency" />
                                        <span class="xs-text">2 an hour</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="1" name="frecuency" />
                                        <span class="xs-text">1 an hour</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="124" name="frecuency" />
                                        <span class="xs-text">1 a day</span>
                                    </label>
                                </div>
                                <br>
                                <label class="error" for="error_frecuency" id="error_frecuency"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
                                <label for="amount" class="header-ask xs-header-text">How many facts should we send total?</label>
                                <div>
                                    @foreach($costs as $cost)
                                        <label>
                                            <input type="radio" class="option-input" value="{{ $cost->cost }}" name="amount" />
                                            <span class="xs-text">{{ $cost->quantity }} (${{ $cost->cost }})</span>
                                        </label>
                                    @endforeach
                                </div>
                                <br>
                                <label class="error" for="error_amount" id="error_amount"></label>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn swButton" id="open-pay-form">Send those facts</button>
                </div>
            </div>
        </div>
    </div>

    <div id="paymentPaypalModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Paypal Payment</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" id="payment-form-paypal" role="form" action="{!! URL::route('addmoney.paypal') !!}" >
                                {{ csrf_field() }}
                                <input type="hidden" value="" name="phone_number" id="phone_number" required/>
                                <input type="hidden" value="" name="id_frecuency" id="id_frecuency" required/>
                                <input type="hidden" value="" name="amount" id="amount" required/>
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">

                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input id="amount" type="hidden" class="form-control" name="amount" value="{{ old('amount') }}" autofocus readonly>
                                        </div>

                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-2">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Pay <span class="amountSpan"></span>,00 $ with Paypal
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="pull-left"><img src="{{ URL::asset('assets/images/paypal.png') }}" /></span>
                    <button type="button" class="btn btn-info" id="open-pay-form-modal" data-dismiss="modal">Pay with credit card</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div id="paymentModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Payment Details</h4>
                </div>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 text-center">
                                    <div id="gif" style="display: none;"><img src="{{URL::asset('assets/images/ripple.gif')}}"> Pay in process...</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                {!! Form::open(['route' => 'addmoney.stripe', 'method' => 'post', 'id' => 'paymentForm']) !!}
                                    <input type="hidden" value="" name="phone_number" id="phone_number" required/>
                                    <input type="hidden" value="" name="id_frecuency" id="id_frecuency" required/>
                                    <input type="hidden" value="" name="amount" id="amount" required/>
                                    <!-- Email -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required autofocus />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                            <input type="number" class="form-control" name="cardNumber" id="cardNumber" placeholder="Card Number" required autofocus />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="expire_date" id="expire_date" placeholder="Expire date" required />
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-md-6 pull-right">
                                            <div class="form-group">
                                                <input type="number" maxlength="3" name="cvv" class="form-control" id="cvv" placeholder="CVV" required />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Pay <span class="amountSpan"></span>,00 $</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span class="pull-left"><img src="{{ URL::asset('assets/images/visa.png') }}" /></span>
                    <span class="pull-left"><img src="{{ URL::asset('assets/images/mastercard.png') }}" /></span>
                    <button type="button" class="btn btn-info" id="open-paypal-form" data-dismiss="modal">Pay with paypal</button>
                </div>
            </div>

        </div>
    </div>
@endsection