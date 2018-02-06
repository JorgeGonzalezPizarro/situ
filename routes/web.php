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

//Route::get('/', function () {
//    return redirect()->midd
//
//});
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


Route::auth();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Admin/adminDashboard','AdminController@show')->middleware('Admin');
Route::get('/Alumno/alumnoDashboard', ['uses' => 'Admincontroller@getFullName', 'as' => 'alumnoDashboard']);
Route::get('/email', function (){
    return view('email');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('crear', array('as' => 'crear', 'uses' => 'HechoController@crear'));


Route::POST('guardar_Hecho', array('as' => 'guardar_Hecho', 'uses' => 'HechoController@guardar_Hecho'));


Route::get('mail', 'HomeController@mail');






Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
