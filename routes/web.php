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

Route::get('/informacion', 'PaginasController@informacion')->name('paginas.informacion');
Route::get('/macroproceso', 'PaginasController@macroproceso')->name('paginas.macroproceso');
Route::get('/cadena-valor', 'PaginasController@cadenaValor')->name('paginas.cadena');
Route::get('/fuerzas-porter', 'PaginasController@fuerzasPorter')->name('paginas.porter');
Route::get('/factores-internos', 'PaginasController@factorInterno')->name('paginas.interno');
Route::get('/factores-externos', 'PaginasController@factorExterno')->name('paginas.externo');
Route::get('/matriz-foda', 'PaginasController@matrizFODA')->name('paginas.matrizFODA');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('informaciones', 'Admin\InformacionController')
        ->except(['show']);

    Route::resource('procesos', 'Admin\ProcesoController')
        ->except(['show']);
    Route::resource('subprocesos', 'Admin\SubprocesoController')
        ->except(['index, show']);

    Route::resource('areas', 'Admin\AreaController');
    Route::resource('actividades', 'Admin\ActividadController');

    Route::resource('fuerzas', 'Admin\FuerzaController');
    Route::resource('factores', 'Admin\FactorController');

    Route::resource('perspectivas', 'Admin\PerspectivaController')
        ->except(['index, show']);
    Route::resource('objetivos', 'Admin\ObjetivoController')
        ->except(['show']);
    Route::get('/asignar-estrategia/{objetivo_id}', 'Admin\ObjetivoController@asignarEstrategias')->name('asignarEstrategia');
    Route::put('/asignar-estrategia/{id}', 'Admin\ObjetivoController@asignar')->name('asignar');

    Route::get('/factor-interno', 'Admin\EvaluacionController@interno')->name('factor.interno');
    Route::get('/factor-externo', 'Admin\EvaluacionController@externo')->name('factor.externo');

    Route::get('/factor-interno-evaluar/{id}', 'Admin\EvaluacionController@internoEditar')->name('factor.internoEditar');
    Route::get('/factor-externo-evaluar/{id}', 'Admin\EvaluacionController@externoEditar')->name('factor.externoEditar');
    Route::put('/factor-interno/{id}', 'Admin\EvaluacionController@evaluacionInterno')->name('factor.evaluacionInterno');
    Route::put('/factor-externo/{id}', 'Admin\EvaluacionController@evaluacionExterno')->name('factor.evaluacionExterno');

    Route::get('/foda', 'Admin\EstrategiaController@foda')->name('estrategias.foda');
    Route::get('/foda/estrategia/{tipo}', 'Admin\EstrategiaController@create')->name('estrategias.create');
    Route::get('/foda/estrategia/{tipo}/{id}', 'Admin\EstrategiaController@edit')->name('estrategias.edit');

    Route::resource('estrategias', 'Admin\EstrategiaController')
        ->except(['index, show', 'create', 'edit']);
});