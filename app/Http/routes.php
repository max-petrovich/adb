<?php


Route::resource('client','ClientController');
Route::resource('account','AccountController');
Route::resource('deposit','DepositController');
Route::resource('credit', 'CreditController');
Route::resource('credit-chart', 'CreditChartController');

/* Deposits */
Route::resource('deposit_rate','DepositRateController', [
	'only' => ['show']
]);
Route::resource('deposit_type.rates', 'DepositTypeController', [
	'only' => ['index']
]);
/* Credits */
Route::resource('credit_rate','CreditRateController', [
		'only' => ['show']
]);
Route::resource('credit_type.rates', 'CreditTypeController', [
		'only' => ['index']
]);

Route::controller('bank-operations', 'BankOperationsController', [
	'getCloseDay' => 'bank-operations.close-day'
]);

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::post('auth/cardNumber', 'Auth\AuthController@postCardNumber');
Route::get('auth/resetCard', 'Auth\AuthController@getResetCard');


Route::group(['middleware' => 'auth', 'prefix' => 'atm'], function() {
	Route::get('/', 'ATM\AtmController@getIndex');

	Route::get('stateAccount', 'ATM\AtmController@getStateAccount');

	Route::resource('withdraw', 'ATM\WithdrawController');
	Route::resource('payment', 'ATM\PaymentController');

	Route::any('check','ATM\CheckController@index');
});

Route::get('/', function()
{
    return redirect()->route('client.index');
});

// ----------------------------------------- VIEWS TEMPLATE EXAMPLE ----

Route::get('/dashboard', function()
{
    return view('home');
});

Route::get('test', function () {
    echo 'test';
});

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});

Route::get('/login', function()
{
	return View::make('login');
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});