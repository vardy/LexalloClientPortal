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
	return view('home_redirect');
});

// Auth routes
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@index')->name('login');


// Resource routes
Route::get('/quotations', 'QuotationsController@index')->name('quotations');
Route::get('/quotations/upload', 'QuotationsController@create');
Route::get('/quotations/{quote}', 'QuotationsController@show');
Route::post('/quotations', 'QuotationsController@store');
Route::get('/quotations/{quote}/edit', 'QuotationsController@edit');
Route::patch('/quotations/{quote}', 'QuotationsController@update');
Route::delete('/quotations/{quote}', 'QuotationsController@destroy');

Route::get('/files', 'FilesController@index')->name('files');

Route::get('/bbb', 'BigBlueButtonController@index')->name('bbb');