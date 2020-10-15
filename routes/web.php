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
Route::get('/','DashboardController@index');

Route::get('/Login', 'LoginController@index');

Route::get('/Login/create', 'LoginController@create');

Route::post('/Login/store', 'LoginController@store');

Route::post('/Login/cek', 'LoginController@cek');

Route::get('/Logout', 'LoginController@logout');

Route::resource('/Kontak','KontakController');

Route::resource('/Paket','PaketController');

Route::get('/Landing','DashboardController@index');
