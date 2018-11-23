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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->name('admin.')->middleware(['auth'])->prefix('admincp')->group(function(){
	Route::get('/', 'HomeController@index')->name('dashboard');
	Route::resource('users', 'UserController');
	Route::resource('tickets', 'TicketController');
	Route::resource('comments', 'CommentController');
});