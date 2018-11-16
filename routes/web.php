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

Route::resource('/equipos', 'EquiposController')->middleware('auth');
Route::resource('/accesorios', 'AccesoriosController')->middleware('auth');
Route::resource('/telefonos', 'TelefonosController')->middleware('auth');

Route::post('/reportes/soporte/{id}', 'ReportesController@supporte')
	->name('admin.reportes.atender')
	->middleware('auth');
Route::resource('/reportes', 'ReportesController')->middleware('auth');

Route::get('/reportes/historial/{id}/{tipo}', 'ReportesController@historialactivo')
	->name('admin.reportes.historial')
	->middleware('auth');

Route::get('sendemail', function(){
	$data = array(
		'name' => 'Ticket Laravel',
	 );
	Mail::send('emails.welcome', $data, function($message){
		$message->to('daniel.lopez@tqi.co', 'Ticket Laravel');

	 });
	return 'se envio';
   });

Route::resource('/reportes', 'ReportesController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');



