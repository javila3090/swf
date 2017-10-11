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
    <div id="form-sign-up">
        <div class="row">
            <div class="">
                <div class="col-md-6 col-md-offset-3 jumbotron">
                    <h2><b>SEND SOME FACTS</b></h2>
                    <br>
                    <form>
                        <div class="row">
                            <div class="form-group  col-lg-8 col-lg-offset-2  col-md-10 col-md-offset-1 col-xs-12">
                                <label for="number" class="header-ask">What cell number should recieve facts?</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-btn">
                                            <div class="btn-group">
                                                <button class="btn btn-default dropdown-toggle dropdown-button" type="button" data-toggle="dropdown">
                                                    <span>Country</span> <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu cellphone" role="menu">
                                                    @foreach($codes as $code)
                                                        <li><a class="phone_code" onclick="fillInput('{{ $code->phonecode }}')">{{ $code->name }} + {{ $code->phonecode }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <input type="text" name="cellphone" id="cellphone" class="form-control" />
                                    </div>
                                </div>
                                <label class="error" for="error_cell_phone" id="error_cell_phone"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group  col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
                                <label for="frecuency" class="header-ask">How often should they receive Star Wars Facts?</label>
                                <div>
                                    <label>
                                        <input type="radio" class="option-input" value="4" name="frecuency" checked />
                                        <span>4 an hour</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="2" name="frecuency" />
                                        <span>2 an hour</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="1" name="frecuency" />
                                        <span>1 an hour</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="124" name="frecuency" />
                                        <span>1 a day</span>
                                    </label>
                                </div>
                                <label class="error" for="error_frecuency" id="error_frecuency"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-xs-12">
                                <label for="amount" class="header-ask">How many facts should we send total?</label>
                                <div>
                                    <label>
                                        <input type="radio" class="option-input" value="5" name="amount" checked />
                                        <span>20 ($5)</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="4" name="amount" />
                                        <span>16 ($4)</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="2" name="amount" />
                                        <span>8 ($2)</span>
                                    </label>
                                    <label>
                                        <input type="radio" class="option-input" value="1" name="amount" />
                                        <span>4 ($1)</span>
                                    </label>
                                </div>
                                <label class="error" for="error_amount" id="error_amount"></label>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="btn swButton" id="open-pay-form">Send those facts</button>
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
                            <form role="form">
                                <input type="hidden" value="" name="" required/>
                                <!-- Email -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="email" class="form-control" id="email" placeholder="Email" required autofocus />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                        <input type="number" class="form-control" id="cardNumber" placeholder="Número de tarjeta"
                                               required autofocus />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 pull-right">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="expire_date" placeholder="MM/YY" required />
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6 pull-right">
                                        <div class="form-group">
                                            <input type="number" maxlength="3" class="form-control" id="cvv" placeholder="CVV" required />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Pagar <span id="amount"></span>,00 $</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
@endsection