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

Route::get('create','AdminController@create');
Route::get('index','AdminController@index');
Route::post('store','AdminController@store');
Route::get('detail','AdminController@detail');
Route::get('edit','AdminController@edit');
Route::post('update','AdminController@edit');
Route::get('destroy','AdminController@destroy');
