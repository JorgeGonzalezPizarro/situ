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
Route::get('Admin/getUsuario/', 'AdminController@getactualizarUsuario')->name('actualizarUsuario');
//Route::get('Admin/usuario/{admin}', function($admin){
//    Sentinel::findById($admin);
//    return view('Admin.setUsuario')->with('admin',Sentinel::findById($admin));
//});




Route::get('Admin/usuario/{usuario}', 'AdminCOntroller@verUsuario');


Route::get('/Admin/nuevoUsuario', 'AdminController@getNuevoUsuario')->name('nuevoUsuario');
Route::post('register', 'AdminController@register');
Route::get('Admin/crearEtiqueta',function(){
    return view('Admin.crearEtiqueta');
})->name('crearEtiqueta');

Route::post('Admin/crearEtiqueta','AdminController@crearNuevaEtiqueta')->name('guardarEtiqueta');




/*ALUMNO*/
Route::get('/Alumno/alumnoDashboard','AlumnoController@getDashboard')->name('alumnoDashboard');
Route::get('Alumno/crear', array('as' => 'crear', 'uses' => 'HechoController@crear'));
Route::POST('Alumno/guardar_Hecho', array('as' => 'guardar_Hecho', 'uses' => 'HechoController@guardar_Hecho'));
Route::get('/Alumno/hecho/singleHecho/','AlumnoController@getHechoUsuario')->name('showHecho');

Route::get('Alumno/hecho/{id}/singleHecho', 'AlumnoController@showHecho');












Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('mail', 'HomeController@mail');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login')->middleware('auth');
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

Route::get('/email', function (){
    return view('email');
});