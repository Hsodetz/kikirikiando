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

// Rutas admin
Route::resource('asistencias', 'Admin\AssistanceController');

Route::resource('autorizaciones', 'Admin\AuthorizationController');

Route::resource('denuncias', 'Admin\ComplaintController');

Route::resource('eventos', 'Admin\EventController');

Route::resource('padres', 'Admin\FatherController');

Route::resource('materias', 'Admin\MatterController');

Route::resource('observaciones', 'Admin\ObservationController');

Route::resource('colegios', 'Admin\SchoolController');

Route::resource('estudiantes', 'Admin\StudentController');

Route::resource('profesores', 'Admin\TeacherController');


