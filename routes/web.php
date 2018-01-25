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

Route::get('/Adminpage','AdminController@getFullName');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('crear', array('as' => 'crear', 'uses' => 'HechoController@crear'));


Route::POST('guardar_Hecho', array('as' => 'guardar_Hecho', 'uses' => 'HechoController@guardar_Hecho'));
