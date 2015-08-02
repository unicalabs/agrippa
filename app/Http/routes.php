<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('create');
});

Route::get('create', 'SecretController@create');

Route::post('store', 'SecretController@store');

Route::get('show/{uuid4}', 'SecretController@show');