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

Route::get('/','UserController@index');

Route::get('login_form','UserController@loginForm');
Route::get('signup_form','UserController@signupForm');
Route::post('store_user','UserController@storeUser');
Route::post('check_user','UserController@checkUser');


Route::get('main','UserController@mainPage');


Route::get('logout','UserController@logOut');

