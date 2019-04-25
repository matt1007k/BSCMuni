<?php

namespace App\Http\Controllers;

use App\Area;
use App\Fuerza;
use App\Amenaza;
use App\Proceso;
use App\Debilidad;
use App\Fortaleza;
use App\Estrategia;
use App\Informacion;
use App\Oportunidad;
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
                'titulo' => 'Información de la organización',
                'icono' => 'eva eva-briefcase-outline',
                'ruta' => 'paginas.informacion'
            ],
            [
                'titulo' => 'Macro Proceso',
                'icono' => 'eva eva-corner-right-down-outline',
                'ruta' => 'paginas.macroproceso'
            ],
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
                'titulo' => '5 Fuerzas de Porter',
                'icono' => 'eva eva-shield-off-outline',
                'ruta' => 'paginas.externo'
            ],
            [
                'titulo' => 'Matriz foda',
                'icono' => 'eva eva-keypad-outline',
                'ruta' => 'paginas.matrizFODA'
            ]
        ];

        return view('welcome', ['paginas' => $paginas]);
    }

    public function informacion(){
        $informaciones = Informacion::paginate();
        return view('paginas.informacion',[
            'informaciones' => $informaciones
        ]);        
    }

    public function macroproceso(){
        $procesos = Proceso::paginate();
        $informacion = Informacion::first();

        return view('paginas.macroproceso',[
            'informacion' => $informacion,
            'procesos' => $procesos
        ]);        
    }

    public function cadenaValor(){
        $areas = Area::orderBy('created_at')->paginate(6);

        return view('paginas.cadena',[
            'areas' => $areas
        ]);
    }

    public function fuerzasPorter(){
        $fuerzas = Fuerza::orderBy('created_at')->paginate(6);
        return view('paginas.porter',[
            'fuerzas' => $fuerzas
        ]);
    }

    public function factorInterno(){
        $areas = Area::orderBy('created_at')->paginate(6);

        return view('paginas.interno',[
            'areas' => $areas
        ]);
    }

    public function factorExterno(){
        $fuerzas = Fuerza::orderBy('created_at')->paginate(6);
        
        return view('paginas.externo',[
            'fuerzas' => $fuerzas
        ]);
    }

    public function matrizFODA(Request $request){
        $tipo = 'FO';
        if($request->get('tipo') !== null){
            $tipo = $request->get('tipo');
        }
        
        $fortalezas = Fortaleza::all();        
        $debilidades = Debilidad::all();
        $oportunidades = Oportunidad::all();
        $amenazas = Amenaza::all();
        
        $estrategias = Estrategia::where('tipo', $tipo)->get();

        return view('paginas.matrizFODA',[
            'fortalezas' => $fortalezas,
            'debilidades' => $debilidades,
            'oportunidades' => $oportunidades,
            'amenazas' => $amenazas,
            'tipo' => $tipo,
            'estrategias' => $estrategias,
        ]);
    }
}
