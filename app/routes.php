<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::route('login');
	
});

//route for frontend
Route::get('index','HomeController@index');





//route for login
Route::any('login', array('as' => 'login', 'uses' => 'UserController@login'));
Route::any('logout','UserController@logout');
Route::any('register','UserController@register');
Route::any('check','UserController@check');

//route for backend
Route::group(array('before' => 'backend_auth', 'namespace' => 'Backend'), function() {
    Route::any('user', 'UserController@index');
    Route::controller('cloud','CloudController');
    Route::controller('charts','ChartsController');
});

