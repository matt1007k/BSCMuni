<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paginas = [
            [
                'titulo' => 'La organización',
                // 'icono' => 'eva eva-briefcase-outline',
                'ruta' => 'informaciones.index',
            ],
            [
                'titulo' => 'Macro Proceso',
                // 'icono' => 'eva eva-corner-right-down-outline',
                'ruta' => 'procesos.index',
            ],
            [
                'titulo' => 'Organigrama',
                'ruta' => 'informaciones.organigrama',
            ],
            [
                'titulo' => 'Cadena de valor',
                // 'icono' => 'eva eva-activity-outline',
                'ruta' => 'actividades.index',
            ],
            [
                'titulo' => 'Fuerzas de porter',
                // 'icono' => 'eva eva-shield-outline',
                'ruta' => 'factores.index',
            ],
            [
                'titulo' => 'Factores Internos',
                // 'icono' => 'eva eva-options-2-outline',
                'ruta' => 'factor.interno',
            ],
            [
                'titulo' => 'Factores Externos',
                // 'icono' => 'eva eva-shield-off-outline',
                'ruta' => 'factor.externo',
            ],
            [
                'titulo' => 'Factores Claves del Exito vs Capacidades Medulares',
                'ruta' => 'fce.cm',
            ],
            [
                'titulo' => 'Matriz foda',
                // 'icono' => 'eva eva-keypad-outline',
                'ruta' => 'estrategias.foda',
            ],
            [
                'titulo' => 'Proposición de Valor',
                'ruta' => 'proposiciones.index',
            ],
            [
                'titulo' => 'Visión en Acción',
                'ruta' => 'objetivos.accion',
            ],
            [
                'titulo' => 'Objetivos Estratégico',
                // 'icono' => 'eva eva-checkmark-square-outline',
                'ruta' => 'objetivos.index',
            ],
            [
                'titulo' => 'Mapa Estratégico',
                // 'icono' => 'eva eva-map',
                'ruta' => 'mapas.index',
            ],
            [
                'titulo' => 'Indicadores',
                // 'icono' => 'eva eva-bar-chart-outline',
                'ruta' => 'indicadores.index',
            ],
            [
                'titulo' => 'Datos',
                // 'icono' => 'eva eva-pie-chart',
                'ruta' => 'datos.index',
            ],
            [
                'titulo' => 'Maestro',
                // 'icono' => 'eva eva-trending-up-outline',
                'ruta' => 'maestro.index',
            ],
            [
                'titulo' => 'Resumen de BSC',
                // 'icono' => 'eva eva-list-outline',
                'ruta' => 'maestro.resumen',
            ],
        ];

        return view('home', ['paginas' => $paginas]);
    }
}
