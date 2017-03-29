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

Route::group(['prefix' => 'users', 'as' => 'users.'], function () {

	Route::get('/', 'UsersController@index')->name('index');
	
	Route::get('/create', 'UsersController@create')->name('create');

	Route::get('/{id}', 'UsersController@show')->name('show');
	
	Route::post('/', 'UsersController@store')->name('store');

	Route::get('/{id}/edit', 'UsersController@edit')->name('edit');

	Route::patch('/{id}', 'UsersController@update')->name('update');

	Route::delete('/{id}', 'UsersController@destroy')->name('destroy');

});
