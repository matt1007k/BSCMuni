<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                'ruta' => 'informaciones.index'
            ],
            [
                'titulo' => 'Macro Proceso',
                'icono' => 'eva eva-corner-right-down-outline',
                'ruta' => 'procesos.index'
            ],
            [
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-activity-outline',
                'ruta' => 'actividades.index'
            ],
            [
                'titulo' => 'Fuerzas de porter',
                'icono' => 'eva eva-shield-outline',
                'ruta' => 'factores.index'
            ],
            [
                'titulo' => 'Factores Internos',
                'icono' => 'eva eva-options-2-outline',
                'ruta' => 'factor.interno'
            ],
            [
                'titulo' => 'Factores Externos',
                'icono' => 'eva eva-shield-off-outline',
                'ruta' => 'factor.externo'
            ],
            [
                'titulo' => 'Matriz foda',
                'icono' => 'eva eva-keypad-outline',
                'ruta' => 'estrategias.foda'
            ]
        ];
        
        return view('home', ['paginas' => $paginas]);
    }
}
