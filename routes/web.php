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

Route::get('/upload','GambarController@index');
Route::post('/upload', 'GambarController@upload');
Route::delete('/delete/{id}', 'GambarController@destroy');


Route::get('/create/komen/{id}','GambarController@komen');
Route::post('/create/komen/store/{gambar}','GambarController@store');
