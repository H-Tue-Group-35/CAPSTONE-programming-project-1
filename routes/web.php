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
	
    $value = session('login_id', 'default');
});

Route::post('booking', 'HomeController@book');

Route::post('payment', 'HomeController@pay');

Route::view('contact', 'contact');

Route::view('login', 'login');

Route::view('register', 'register');

Route::view('cp', 'cp');

Route::view('admin', 'admin');

Route::view('transactionhistory', 'transactionhistory');

Route::post('login_check', 'HomeController@adminLogin');
Route::post('register_check', 'HomeController@userRegister');


Route::get('/location', 'LocationController@index');