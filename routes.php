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
	return View::make('hello');
});
Route::get('welcome', function()
{
	return View::make('welcome')->with('title','Welcome');
});

Route::get('login',function(){
	return View::make('auth.login')->with('title','Login Page');
});

Route::controller('users','UsersController');

Route::controller('contacts','ContactsController');

