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

Route::get('/test', "WebAppController@check");

Route::get('/', 'WebAppController@index');

Route::get('/api/test','PenyakitApiController@test');

Route::get('/api/penyakit','PenyakitApiController@showPenyakit');

Route::get('/api/gejala','PenyakitApiController@showGejala');

Route::get('/api/selgejala','PenyakitApiController@showSelGejala');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
