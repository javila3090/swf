<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => '/',
    'uses' => 'FactsController@index'
]);

Route::get('search', [
    'as' => 'search',
    'uses' => 'FactsController@search'
]);

Route::get('facts', [
    'as' => 'facts',
    'uses' => 'FactsController@facts'
]);

Route::get('show/facts', [
    'as' => 'show/facts',
    'uses' => 'FactsController@show'
]);

/*** PAYPAL ROUTES ***/
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'PaymentController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'PaymentController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'PaymentController@getPaymentStatus',));

/*** STRIPE ROUTES ***/
Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'PaymentController@payWithStripe',));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'PaymentController@postPaymentWithStripe',));