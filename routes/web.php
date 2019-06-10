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

    Route::namespace ('Admin')->group(function () {

        Route::resource('informaciones', 'InformacionController')
            ->except(['show']);

        Route::resource('procesos', 'ProcesoController')
            ->except(['show']);
        Route::resource('subprocesos', 'SubprocesoController')
            ->except(['index, show']);

        Route::resource('areas', 'AreaController');
        Route::resource('actividades', 'ActividadController');

        Route::resource('fuerzas', 'FuerzaController');
        Route::resource('factores', 'FactorController');

        Route::resource('perspectivas', 'PerspectivaController')
            ->except(['index, show']);
        Route::resource('objetivos', 'ObjetivoController')
            ->except(['show']);
        Route::resource('mapas', 'MapaController')
            ->except(['create', 'edit', 'show']);

        Route::resource('indicadores', 'IndicadorController')
            ->except(['show', 'create', 'edit']);
        Route::get('/indicadores/create/{objetivo_id}', 'IndicadorController@create')->name('indicadores.create');
        Route::get('/indicadores/{id}/edit/{objetivo_id}', 'IndicadorController@edit')->name('indicadores.edit');

        Route::resource('datos', 'DatoController')
            ->except(['show', 'create', 'edit']);
        Route::get('/datos/create/{indicador_id}', 'DatoController@create')->name('datos.create');
        Route::get('/datos/{id}/edit/{indicador_id}', 'DatoController@edit')->name('datos.edit');
        Route::get('/datos/grafica/{indicador_id}', 'DatoController@grafica')->name('datos.grafica');

        Route::get('/asignar-estrategia/{objetivo_id}', 'ObjetivoController@asignarEstrategias')->name('asignarEstrategia');
        Route::put('/asignar-estrategia/{id}', 'ObjetivoController@asignar')->name('asignar');

        Route::get('/factor-interno', 'EvaluacionController@interno')->name('factor.interno');
        Route::get('/factor-externo', 'EvaluacionController@externo')->name('factor.externo');

        Route::get('/factor-interno-evaluar/{id}', 'EvaluacionController@internoEditar')->name('factor.internoEditar');
        Route::get('/factor-externo-evaluar/{id}', 'EvaluacionController@externoEditar')->name('factor.externoEditar');
        Route::put('/factor-interno/{id}', 'EvaluacionController@evaluacionInterno')->name('factor.evaluacionInterno');
        Route::put('/factor-externo/{id}', 'EvaluacionController@evaluacionExterno')->name('factor.evaluacionExterno');

        Route::get('/foda', 'EstrategiaController@foda')->name('estrategias.foda');
        Route::get('/foda/estrategia/{tipo}', 'EstrategiaController@create')->name('estrategias.create');
        Route::get('/foda/estrategia/{tipo}/{id}', 'EstrategiaController@edit')->name('estrategias.edit');

        Route::resource('estrategias', 'EstrategiaController')
            ->except(['index, show', 'create', 'edit']);

        Route::get('perspectivas-maestro', 'MaestroController@maestro')->name('maestro.index');
        Route::get('perspectivas-resumen', 'MaestroController@resumen')->name('maestro.resumen');
    });

});
