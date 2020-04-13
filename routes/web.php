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
Route::post('/regis', 'LoginController@register')->name('register');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::prefix('admin')->group(function () {
	Route::get('/', 'AdminController@index')->name('admin.dashboard')
	->middleware('auth:admin');
	Route::get('item', 'AdminController@item')->name('admin.item')
	->middleware('auth:admin');
	Route::post('item', 'AdminActionController@additem')->name('admin.add.item')
	->middleware('auth:admin');
	Route::get('history', 'AdminController@history')->name('admin.history')
	->middleware('auth:admin');
	Route::post('get_dataitem', 'AdminController@get_dataitem')->name('admin.get_dataitem')
	->middleware('auth:admin');
	Route::get('acc/{id}', 'AdminActionController@acc')->name('admin.acc')
	->middleware('auth:admin');
	Route::get('rjc/{id}', 'AdminActionController@rjc')->name('admin.rjc')
	->middleware('auth:admin');
	Route::post('edit/{id}', 'AdminActionController@edit')->name('admin.edit.item')
	->middleware('auth:admin');
	Route::get('delete/{id}', 'AdminActionController@delete')->name('admin.delete.item')
	->middleware('auth:admin');

});

Route::prefix('dashboard')->group(function () {
	Route::get('/', 'CustomerController@index')->name('cust.dashboard')
	->middleware('auth:customer');
	Route::post('/', 'CustomerActionController@buy')->name('cust.buy')
	->middleware('auth:customer');
	Route::get('/history', 'CustomerController@history')->name('cust.history')
	->middleware('auth:customer');
	Route::get('history/{id}', 'CustomerActionController@cancel')->name('cust.cancel')
	->middleware('auth:customer');



});



