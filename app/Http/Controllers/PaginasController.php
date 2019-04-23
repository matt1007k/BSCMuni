<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-activity-outline',
                'ruta' => 'paginas.cadena'
            ],
            [
                'titulo' => 'Fuerzas de porter',
                'icono' => 'eva eva-shield-outline',
                'ruta' => 'paginas.porter'
            ],
            [
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-options-2-outline',
                'ruta' => 'paginas.interno'
            ],
            [
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-shield-off-outline',
                'ruta' => 'paginas.externo'
            ]
        ];

        return view('welcome', ['paginas' => $paginas]);
    }

    public function cadenaValor(){
        return view('paginas.cadena');
    }

    public function fuerzasPorter(){
        return view('paginas.porter');
    }

    public function factorInterno(){
        return view('paginas.interno');
    }

    public function factorExterno(){
        return view('paginas.externo');
    }
}
