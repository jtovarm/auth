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

Route::resource('libro','LibroController');
Route::get('/', function () {
    return view('welcome');
});
Route::resource('cliente', 'ClienteController');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
#Route::get('/home', 'HomeController@index')->name('home');
