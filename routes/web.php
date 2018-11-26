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
})->middleware('auth');

Route::resource('/activos', 'ActivosController')->middleware('auth');



Route::post('/reportes/soporte/{id}', 'ReportesController@supporte')
	->name('admin.reportes.soporte')
	->middleware('auth');

Route::resource('/reportes', 'ReportesController')->middleware('auth');

Route::get('/reportes/historial/{id}', 'ReportesController@historialactivo')
	->name('admin.reportes.historial')
	->middleware('auth');


Route::resource('/reportes', 'ReportesController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



