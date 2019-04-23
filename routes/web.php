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

Route::get('/', 'PaginasController@index')->name('paginas.index');
Route::get('/cadena-valor', 'PaginasController@cadenaValor')->name('paginas.cadena');
Route::get('/fuerzas-porter', 'PaginasController@fuerzasPorter')->name('paginas.porter');
Route::get('/factores-internos', 'PaginasController@factorInterno')->name('paginas.interno');
Route::get('/factores-externos', 'PaginasController@factorExterno')->name('paginas.externo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('areas', 'Admin\AreaController');
Route::resource('actividades', 'Admin\ActividadController');

Route::resource('fuerzas', 'Admin\FuerzaController');
Route::resource('factores', 'Admin\FactorController');


Route::get('/factor-interno', 'Admin\EvaluacionController@interno')->name('factor.interno');
Route::get('/factor-externo', 'Admin\EvaluacionController@externo')->name('factor.externo');

Route::get('/factor-interno-evaluar/{id}', 'Admin\EvaluacionController@internoEditar')->name('factor.internoEditar');
Route::get('/factor-externo-evaluar/{id}', 'Admin\EvaluacionController@externoEditar')->name('factor.externoEditar');
Route::put('/factor-interno/{id}', 'Admin\EvaluacionController@evaluacionInterno')->name('factor.evaluacionInterno');
Route::put('/factor-externo/{id}', 'Admin\EvaluacionController@evaluacionExterno')->name('factor.evaluacionExterno');
