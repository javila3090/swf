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
                    <a class="signupButton" href="#section-1"> SIGN THEM UP NOW!</a>
                </div>
            </div>
        </div>
    </header>
    <div id="section-1">
        <div class="row">
            <div class="">
                <div class="col-md-6 col-md-offset-3 jumbotron">
                    <h2><b>SEND SOME FACTS</b></h2>
                    <br>
                    <form>
                        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
                            <div class="form-group">
                                <label for="number">What cell number should recieve facts?</label>
                                <input type="number" class="form-control" id="number">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="number">How often should they receive Star Wars Facts?</label>
                        <div data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" name="options" id="option1" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>4 an hour</span>
                            </label>

                            <label class="btn btn-default">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>2 an hour</span>
                            </label>

                            <label class="btn btn-default">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>1 an hour</span>
                            </label>

                            <label class="btn btn-default">
                                <input type="radio" name="options" id="option2" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>1 a day</span>
                            </label>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="number">How many facts should we send total?</label>
                        <div data-toggle="buttons">
                            <label class="btn btn-default">
                                <input type="radio" name="amount" id="option1" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>20 ($5)</span>
                            </label>

                            <label class="btn btn-default">
                                <input type="radio" name="amount" id="option2" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span >16 ($4)</span>
                            </label>

                            <label class="btn btn-default">
                                <input type="radio" name="amount" id="option3" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>8 ($2)</span>
                            </label>

                            <label class="btn btn-default">
                                <input type="radio" name="amount" id="option4" autocomplete="off">
                                <span class="radio-dot"></span>
                                <span>4 ($1)</span>
                            </label>
                        </div>
                        </div>
                    </form>
                    <button type="button" class="btn signupButton" id="open-pay-form">Send those facts</button>
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
                                <!-- Email -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                        <input type="text" class="form-control" id="email" placeholder="Email" required autofocus />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                        <input type="text" class="form-control" id="cardNumber" placeholder="Número de tarjeta"
                                               required autofocus />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-md-6 pull-right">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="expire" placeholder="MM/YY" required />
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6 pull-right">
                                        <div class="form-group">
                                            <input type="password" class="form-control" id="cvCode" placeholder="CVV" required />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary btn-lg btn-block" role="button">Pagar <input type="text" id="amount" value=""/></a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
@endsection