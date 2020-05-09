<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('booking', 'HomeController@book');

Route::post('payment', 'HomeController@pay');

Route::view('contact', 'contact');

Route::view('login', 'login');

Route::view('cp', 'cp');

Route::post('admin', 'admin');

Route::view('login_check', 'login_check');


Route::get('/location', 'LocationController@index');
