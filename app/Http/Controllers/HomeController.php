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
                'titulo' => 'Información de la organización',
                'icono' => 'eva eva-briefcase-outline',
                'ruta' => 'informaciones.index',
            ],
            [
                'titulo' => 'Macro Proceso',
                'icono' => 'eva eva-corner-right-down-outline',
                'ruta' => 'procesos.index',
            ],
            [
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-activity-outline',
                'ruta' => 'actividades.index',
            ],
            [
                'titulo' => 'Fuerzas de porter',
                'icono' => 'eva eva-shield-outline',
                'ruta' => 'factores.index',
            ],
            [
                'titulo' => 'Factores Internos',
                'icono' => 'eva eva-options-2-outline',
                'ruta' => 'factor.interno',
            ],
            [
                'titulo' => 'Factores Externos',
                'icono' => 'eva eva-shield-off-outline',
                'ruta' => 'factor.externo',
            ],
            [
                'titulo' => 'Matriz foda',
                'icono' => 'eva eva-keypad-outline',
                'ruta' => 'estrategias.foda',
            ],
            [
                'titulo' => 'Objetivos Estratégico',
                'icono' => 'eva eva-checkmark-square-outline',
                'ruta' => 'objetivos.index',
            ],
            [
                'titulo' => 'Mapa Estratégico',
                'icono' => 'eva eva-map',
                'ruta' => 'objetivos.index',
            ],
            [
                'titulo' => 'Indicadores',
                'icono' => 'eva eva-bar-chart-outline',
                'ruta' => 'indicadores.index',
            ],
            [
                'titulo' => 'Datos',
                'icono' => 'eva eva-pie-chart',
                'ruta' => 'datos.index',
            ],
            [
                'titulo' => 'Maestro',
                'icono' => 'eva eva-pie-chart',
                'ruta' => 'maestro.index',
            ],
            [
                'titulo' => 'Resumen',
                'icono' => 'eva eva-pie-chart',
                'ruta' => 'maestro.resumen',
            ],
        ];

        return view('home', ['paginas' => $paginas]);
    }
}
