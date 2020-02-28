<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/mapa-estrategico', 'PaginasController@mapaEstrategico')->name('paginas.mapa');
Route::get('/objetivos/indicadores', 'PaginasController@indicadores')->name('paginas.indicadores');
Route::get('/objetivos/datos', 'PaginasController@datos')->name('paginas.datos');
Route::get('/objetivos/grafica-datos/{indicador_id}', 'PaginasController@grafica')->name('paginas.grafica');

Route::get('/maestro', 'PaginasController@maestro')->name('paginas.maestro');
Route::get('/resumen', 'PaginasController@resumen')->name('paginas.resumen');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::redirect('/home', '/informaciones', 301);

    Route::namespace ('Admin')->group(function () {

        Route::resource('informaciones', 'InformacionController')->except(['show']);
        Route::get('/organigrama', 'InformacionController@organigrama')->name('informaciones.organigrama');

        Route::resource('procesos', 'ProcesoController')->except(['show']);
        Route::resource('procesos.subprocesos', 'SubprocesoController')->except(['index, show']);

        Route::resource('areas', 'AreaController');
        Route::resource('areas.activities', 'ActividadController')->except(['index', 'show']);

        Route::resource('fuerzas', 'FuerzaController');
        Route::resource('fuerzas.factores', 'FactorController')->except(['index, show']);

        Route::resource('perspectivas', 'PerspectivaController')->except(['show']);
        Route::resource('perspectivas.objetivos', 'ObjetivoController')->except(['index', 'show']);
        Route::get('/vision-accion', 'ObjetivoController@visionAccion')->name('objetivos.accion');

        Route::resource('mapas', 'MapaController')->except(['update', 'create', 'edit', 'show']);

        Route::resource('indicadores', 'IndicadorController')->except(['show', 'create', 'edit']);
        Route::get('/indicadores/create/{objetivo_id}', 'IndicadorController@create')->name('indicadores.create');
        Route::get('/indicadores/{id}/edit/{objetivo_id}', 'IndicadorController@edit')->name('indicadores.edit');

        Route::resource('datos', 'DatoController')->except(['show', 'create', 'edit']);
        Route::get('/datos/create/{indicador_id}', 'DatoController@create')->name('datos.create');
        Route::get('/datos/{id}/edit/{indicador_id}', 'DatoController@edit')->name('datos.edit');
        Route::get('/datos/grafica/{indicador_id}', 'DatoController@grafica')->name('datos.grafica');
        Route::get('/datos/graficas/{objetivo}', 'DatoController@graficas')->name('datos.graficas');

        Route::get('/asignar-estrategia/{objetivo_id}', 'ObjetivoController@asignarEstrategias')->name('asignarEstrategia');
        Route::put('/asignar-estrategia/{id}', 'ObjetivoController@asignar')->name('asignar');

        Route::get('/factor-interno', 'EvaluacionController@interno')->name('factor.interno');
        Route::get('/factor-externo', 'EvaluacionController@externo')->name('factor.externo');

        Route::get('/factor-interno/evaluar/{id}', 'EvaluacionController@internoEditar')->name('factor.internoEditar');
        Route::get('/factor-externo/evaluar/{id}', 'EvaluacionController@externoEditar')->name('factor.externoEditar');
        Route::put('/factor-interno/{id}', 'EvaluacionController@evaluacionInterno')->name('factor.evaluacionInterno');
        Route::put('/factor-externo/{id}', 'EvaluacionController@evaluacionExterno')->name('factor.evaluacionExterno');

        Route::get('/foda', 'EstrategiaController@foda')->name('estrategias.foda');
        Route::get('/foda/estrategia/{tipo}', 'EstrategiaController@create')->name('estrategias.create');
        Route::get('/foda/estrategia/{tipo}/{id}', 'EstrategiaController@edit')->name('estrategias.edit');

        Route::resource('estrategias', 'EstrategiaController')->except(['index, show', 'create', 'edit']);

        Route::get('perspectivas-maestro', 'MaestroController@maestro')->name('maestro.index');
        Route::get('perspectivas-resumen', 'MaestroController@resumen')->name('maestro.resumen');
        Route::get('fce-cm', 'ActividadController@fceCm')->name('fce.cm');
        Route::resource('proposiciones', 'ProposicionController')->except(['show']);

        Route::get('/resumen/grafica/{perspectiva_id}', 'MaestroController@grafica')->name('maestro.resumen.grafica');
    });
});
