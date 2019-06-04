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
Route::get('/landing', 'HomeController@landing')->name('landing');
Route::get('/login', '\App\Http\Controllers\Auth\LoginController@index')->name('login');
Route::get('/register','\App\Http\Controllers\Auth\RegisterController@index')->name('register');

// Resource routes
Route::get('/quotations/request', 'QuotationsController@show_request_form');
Route::get('/quotations', 'QuotationsController@index')->name('quotations');
Route::get('/quotations/upload', 'QuotationsController@create');
Route::get('/quotations/{quote}', 'QuotationsController@show');
Route::post('/quotations', 'QuotationsController@store');
Route::get('/quotations/{quote}/edit', 'QuotationsController@edit');
Route::patch('/quotations/{quote}', 'QuotationsController@update');
Route::delete('/quotations/{quote}', 'QuotationsController@destroy');

Route::get('/files', 'FilesController@index')->name('files');
Route::get('/files/upload', 'FilesController@create');
Route::get('/files/{file}', 'FilesController@show');
Route::post('/files', 'FilesController@store');
Route::get('/files/{file}/edit', 'FilesController@edit');
Route::delete('/files/{file}', 'FilesController@destroy');
Route::patch('/files/{file}', 'FilesController@update');

// Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/s3', 's3Controller@index');
Route::get('/admin/s3/purge', 's3Controller@purge');

Route::get('/admin/user/{user}', 'UserController@edit');
Route::delete('/admin/user/{user}', 'UserController@deleteUser');
Route::patch('/admin/user/{user}/password', 'UserController@updatePassword');
Route::get('/admin/user/{user}/quotations/{quote}/edit', 'UserController@editQuote');
Route::get('/admin/user/{user}/quotations/upload', 'UserController@createQuote');
Route::get('/admin/user/{user}/files/{file}/edit', 'UserController@editFile');
Route::get('/admin/user/{user}/files/upload', 'UserController@createFile');
Route::patch('/admin/user/{user}/roles', 'UserController@addRoles');
Route::delete('/admin/user/{user}/roles', 'UserController@removeRoles');

// Other routes
Route::get('/support', 'SupportController@index')->name('support');

// Email routes
Route::get('/send/quote_request/{user_id}', 'EmailController@send_quote_request');