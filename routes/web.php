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

Route::post('store/fact', [
    'as' => 'store/fact',
    'uses' => 'FactsController@store'
]);

/*** PAYPAL ROUTES ***/
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'PaymentController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'PaymentController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'PaymentController@getPaymentStatus',));

/*** STRIPE ROUTES ***/
Route::get('addmoney/stripe', array('as' => 'addmoney.paywithstripe','uses' => 'PaymentController@payWithStripe',));
Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'PaymentController@postPaymentWithStripe',));

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/secure/home', 'HomeController@index')->name('secure_home');

//Facts routes

Route::get('/secure/list/facts', 'FactsController@listFacts')->name('list_facts');

Route::get('fact/edit/{id}', ['as' => 'fact/edit','uses' => 'FactsController@edit']);

Route::get('fact/delete/{id}', ['as' => 'fact/delete','uses' => 'FactsController@destroy']);

Route::put('fact/update/{fact}', ['as' => 'fact/update', 'uses' => 'FactsController@update']);

//Orders routes

Route::get('/secure/list/orders', 'OrdersController@index')->name('list_orders');

Route::get('order/view/{id}', ['as' => 'order/view','uses' => 'OrdersController@viewDetail']);

Route::get('secure/user/register', 'Auth\RegisterController@index')->name('user_register');

