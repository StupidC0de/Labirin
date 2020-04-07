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

Route::get('/register', 'LoginController@getRegis')->name('regis')->middleware('guest');
Route::get('/', 'LoginController@getLogin')->name('login-page')->middleware('guest');
Route::post('/login', 'LoginController@postLogin')->name('login');
Route::get('/login', 'LoginController@getLogin')->middleware('guest');
Route::post('/regis', 'LoginController@register');
Route::get('/logout', 'LoginController@logout');

Route::get('/admin', function() {
  return view('admin.dashboard');
})->middleware('auth:admin');

Route::get('/dashboard', function() {
  return view('cust.dashboard');
})->middleware('auth:customer');



