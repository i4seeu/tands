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
});
Route::prefix('requisitions')->group(function(){
  Route::get('/', 'RequisitionController@index')->name('requisitions');
  Route::get('create', 'RequisitionController@create')->name('requisitions.create');
  Route::get('/{id}/edit', 'RequisitionController@edit')->name('requisitions.edit');
  Route::patch('/{id}/update', 'RequisitionController@update')->name('requisitions.update');
  Route::post('store', 'RequisitionController@store')->name('requisitions.store');
  Route::get('inbox', 'TransportRequisitionController@inbox')->name('requisitions.inbox');
  Route::get('outbox', 'TransportRequisitionController@outbox')->name('requisitions.outbox');
  Route::post('approve/{id}', 'TransportRequisitionController@approve')->name('requisitions.approve');
  Route::delete('/{id}', 'TransportRequisitionController@destroy')->name('requisitions.destroy');
});
Route::prefix('subsistencerequisitions')->group(function(){
  Route::get('/', 'SubsistenceRequisitionController@index')->name('subsistencerequisitions');
  Route::get('create', 'SubsistenceRequisitionController@create')->name('subsistencerequisitions.create');
  Route::post('store', 'SubsistenceRequisitionController@store')->name('subsistencerequisitions.store');
  Route::get('/{id}/edit', 'SubsistenceRequisitionController@edit')->name('subsistencerequisitions.edit');
  Route::patch('/{id}/update', 'SubsistenceRequisitionController@update')->name('subsistencerequisitions.update');
  Route::delete('/{id}', 'SubsistenceRequisitionController@destroy')->name('subsistencerequisitions.destroy');
  Route::get('inbox', 'SubsistenceRequisitionController@inbox')->name('subsistencerequisitions.inbox');
  Route::get('outbox', 'SubsistenceRequisitionController@outbox')->name('subsistencerequisitions.outbox');
  Route::post('approve/{id}', 'SubsistenceRequisitionController@approve')->name('subsistencerequisitions.approve');
  Route::post('disapprove/{id}', 'SubsistenceRequisitionController@disapprove')->name('subsistencerequisitions.disapprove');
});
