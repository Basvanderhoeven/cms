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

    Route::get('/','LoginController@showLogin');
    Route::get('login','LoginController@showLogin');
    Route::post('login', 'LoginController@doLogin');
    Route::get('/test', 'PagesController@test');
    Route::get('dashboard', 'PagesController@dashboard');
    Route::get('logout', 'LoginController@logout');