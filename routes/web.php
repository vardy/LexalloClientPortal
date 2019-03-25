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
Route::get('/quotations', 'QuotationsController@index')->name('quotations');
Route::get('/quotations/upload', 'QuotationsController@create');
Route::get('/quotations/{quote}', 'QuotationsController@show');
Route::post('/quotations', 'QuotationsController@store');
Route::get('/quotations/{quote}/edit', 'QuotationsController@edit');
Route::patch('/quotations/{quote}', 'QuotationsController@update');
Route::delete('/quotations/{quote}', 'QuotationsController@destroy');
Route::get('/quotations/{quote}/view', 'QuotationsController@view');

Route::get('/files', 'FilesController@index')->name('files');
Route::get('/files/upload', 'FilesController@create');
Route::get('/files/{file}', 'FilesController@show');
Route::post('/files', 'FilesController@store');
Route::get('/files/{file}/edit', 'FilesController@edit');
Route::patch('/files/{file}', 'FilesController@update');
Route::delete('/files/{file}', 'FilesController@destroy');
Route::get('/files/{file}/view', 'FilesController@view');

// Admin routes
Route::get('/admin', 'AdminController@index');
Route::get('/admin/s3', 's3Controller@index');
Route::get('/admin/s3/purge', 's3Controller@purge');

Route::get('/admin/user/{user}', 'UserController@edit');
Route::get('/admin/user/{user}/quotations/{quote}/edit', 'UserController@editQuote');
Route::get('/admin/user/{user}/quotations/upload', 'UserController@createQuote');
Route::get('/admin/user/{user}/files/{file}/edit', 'UserController@editFile');
Route::get('/admin/user/{user}/files/upload', 'UserController@createFile');

// Reach
Route::get('/reach', 'ReachController@index')->name('reach');
Route::get('/reach/thankyou', 'ReachController@thankyou');
Route::post('/reach', 'ReachController@store');

// Other routes
Route::get('/support', 'SupportController@index')->name('support');
