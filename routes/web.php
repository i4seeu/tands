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



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::prefix('users')->group(function(){
  Route::get('/', 'UserController@index')->name('users');
  Route::get('create', 'UserController@create')->name('users.create');
  Route::post('store', 'UserController@store')->name('users.store');
  Route::patch('/{id}/update', 'UserController@update')->name('users.update');
  Route::get('/{id}', 'UserController@show')->name('users.show');
  Route::get('/{id}/edit', 'UserController@edit')->name('users.edit');
  Route::delete('/{id}', 'UserController@destroy')->name('users.destroy');
  Route::post('/{id}/change_password', 'UserController@change_password')->name('users.change_password');
});
