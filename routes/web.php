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
Route::get('/Admin/adminDashboard','AdminController@getDashboard');
//Route::post('Admin/actualizarUsuario', 'AdminController@getactualizarUsuario')->name('actualizarUsuario');
Route::get('Admin/actualizarUsuario/', 'AdminController@getactualizarUsuario')->name('actualizarUsuario');
Route::get('Admin/actualizarUsuari/{admin}', function($admin){
    return view('Admin.actualizarUsuario1')->with('admin',$admin);
});

Route::get('/Admin/nuevoUsuario', 'AdminController@getNuevoUsuario')->name('nuevoUsuario');

Route::post('register', 'AdminController@register');



Route::get('/Alumno/alumnoDashboard','AlumnoController@getDashboard');





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

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
