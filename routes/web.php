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


// Misc routes
Route::get('/', function () {
	return view('login_redirect');
});

Route::get('/bbb', 'BigBlueButtonController@index');


// Auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@index')->name('login');


// Resource routes
Route::get('/quotations', 'QuotationsController@index');
Route::get('/files', 'FilesController@index');
