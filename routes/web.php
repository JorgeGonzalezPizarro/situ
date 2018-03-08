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
Route::get('/Admin/adminDashboard','AdminController@getDashboard')->name('alumnoDashboard');
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
Route::get('/Alumno/hecho/singleHecho/','AlumnoController@getHechoUsuario')->name('showHecho');

Route::get('Alumno/hecho/{id}/singleHecho', 'AlumnoController@showHecho');
Route::get('Alumno/alumnoDatos','AlumnoController@alumnoDatos')->name('misDatos');
Route::post('Alumno/alumnoDatos','AlumnoController@actualizarMisDatos')->name('actualizarDatos');
Route::get('Alumno/alumnoDatos/datosAcademicos/{year?}','AlumnoController@alumnoDatosAcademicos')->name('misDatosAcademicos');
Route::post('Alumno/alumnoDatos/datosAcademicos','AlumnoController@actualizarMisDatosAcademicos')->name('actualizarDatosAcademicos');
Route::get('Alumno/alumnoDatos/datosAcademicos/{year?}/{asignatura?}','AlumnoController@eliminarAsignatura')->name('eliminarAsignatura');
Route::get('Alumno/alumnoDatos/datosLaboral/{year?}/{asignatura?}','AlumnoController@alumnoDatosLaborales')->name('misDatosLaborales');
Route::post('Alumno/alumnoDatos/datosLaboral/','AlumnoController@actualizarMisDatosLaborales')->name('actualizarDatosLaboral');
Route::get('Alumno/invitar','AlumnoController@showInvitarUsuario')->name('invitar');
Route::post('Alumno/invitar','AlumnoController@invitarUsuario')->name('invitar');
Route::get('Alumno/crearEtiqueta','AlumnoController@showCrearCategoria')->name('crearEtiquetaAlumno');

Route::post('Alumno/crearEtiqueta','AlumnoController@crearNuevaEtiqueta')->name('guardarEtiquetaAlumno');

//Route::get('Alumno/AlumnoDatos/datosAcademicos/{curso?}','AlumnoController@getAsignaturas')->name('getAsignaturas');



/*HEHCOS*/

Route::get('hechos/{categoria?}','AlumnoController@showFormHecho')->name('hechos');

Route::get('hechos/{categoria?}/{curso?}','AlumnoController@getAsignaturas')->name('getAsignaturas');
Route::POST('\'hechos/{categoria?}/{curso?}', 'HechoController@guardar_Hecho')->name('guardarHecho');
Route::POST('/Alumno/alumnoDashboard/{categoria?}/{curso?}', 'HechoController@fraseguia')->name('fraseguia');


/*PUBLICO*/
Route::get('/Situ/public','SituController@getIndex')->name('index');


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