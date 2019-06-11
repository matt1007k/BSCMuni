<?php

namespace App\Http\Controllers;

use App\Amenaza;
use App\Area;
use App\Debilidad;
use App\Estrategia;
use App\Fortaleza;
use App\Fuerza;
use App\Indicador;
use App\Informacion;
use App\Oportunidad;
use App\Perspectiva;
use App\Proceso;
use App\Relacion;
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
                'ruta' => 'paginas.informacion',
            ],
            [
                'titulo' => 'Macro Proceso',
                'icono' => 'eva eva-corner-right-down-outline',
                'ruta' => 'paginas.macroproceso',
            ],
            [
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-activity-outline',
                'ruta' => 'paginas.cadena',
            ],
            [
                'titulo' => 'Fuerzas de porter',
                'icono' => 'eva eva-shield-outline',
                'ruta' => 'paginas.porter',
            ],
            [
                'titulo' => 'Cadena de valor',
                'icono' => 'eva eva-options-2-outline',
                'ruta' => 'paginas.interno',
            ],
            [
                'titulo' => '5 Fuerzas de Porter',
                'icono' => 'eva eva-shield-off-outline',
                'ruta' => 'paginas.externo',
            ],
            [
                'titulo' => 'Matriz foda',
                'icono' => 'eva eva-keypad-outline',
                'ruta' => 'paginas.matrizFODA',
            ],
            [
                'titulo' => 'Mapa Estratégico',
                'icono' => 'eva eva-map',
                'ruta' => 'paginas.mapa',
            ],
            [
                'titulo' => 'Indicadores',
                'icono' => 'eva eva-bar-chart-outline',
                'ruta' => 'paginas.indicadores',
            ],
            [
                'titulo' => 'Datos',
                'icono' => 'eva eva-pie-chart',
                'ruta' => 'paginas.datos',
            ],
            [
                'titulo' => 'Maestro',
                'icono' => 'eva eva-trending-up-outline',
                'ruta' => 'paginas.maestro',
            ],
            [
                'titulo' => 'Resumen',
                'icono' => 'eva eva-list-outline',
                'ruta' => 'paginas.resumen',
            ],
        ];

        return view('welcome', ['paginas' => $paginas]);
    }

    public function informacion()
    {
        $informaciones = Informacion::paginate();
        return view('paginas.informacion', [
            'informaciones' => $informaciones,
        ]);
    }

    public function macroproceso()
    {
        $procesos = Proceso::paginate();
        $informacion = Informacion::first();

        return view('paginas.macroproceso', [
            'informacion' => $informacion,
            'procesos' => $procesos,
        ]);
    }

    public function cadenaValor()
    {
        $areas = Area::orderBy('created_at')->paginate(6);

        return view('paginas.cadena', [
            'areas' => $areas,
        ]);
    }

    public function fuerzasPorter()
    {
        $fuerzas = Fuerza::orderBy('created_at')->paginate(6);
        return view('paginas.porter', [
            'fuerzas' => $fuerzas,
        ]);
    }

    public function factorInterno()
    {
        $areas = Area::orderBy('created_at')->paginate(6);

        return view('paginas.interno', [
            'areas' => $areas,
        ]);
    }

    public function factorExterno()
    {
        $fuerzas = Fuerza::orderBy('created_at')->paginate(6);

        return view('paginas.externo', [
            'fuerzas' => $fuerzas,
        ]);
    }

    public function matrizFODA(Request $request)
    {
        $tipo = 'FO';
        if ($request->get('tipo') !== null) {
            $tipo = $request->get('tipo');
        }

        $fortalezas = Fortaleza::all();
        $debilidades = Debilidad::all();
        $oportunidades = Oportunidad::all();
        $amenazas = Amenaza::all();

        $estrategias = Estrategia::where('tipo', $tipo)->get();

        return view('paginas.matrizFODA', [
            'fortalezas' => $fortalezas,
            'debilidades' => $debilidades,
            'oportunidades' => $oportunidades,
            'amenazas' => $amenazas,
            'tipo' => $tipo,
            'estrategias' => $estrategias,
        ]);
    }

    public function mapaEstrategico()
    {
        $perspectivas = Perspectiva::all();
        $relaciones = Relacion::all();

        return view('paginas.mapa-estrategico', [
            'perspectivas' => $perspectivas,
            'relaciones' => $relaciones,
        ]);
    }

    public function indicadores(Request $request)
    {
        $slug = $request->perspectiva;
        if (!isset($request->perspectiva)) {
            $slug = 'FI';
        }

        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('paginas.indicadores.index', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
        ]);
    }

    public function datos(Request $request)
    {
        $slug = $request->perspectiva;
        if (!isset($request->perspectiva)) {
            $slug = 'FI';
        }

        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('paginas.datos.index', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
        ]);
    }

    public function grafica($indicador_id)
    {
        $indicador = Indicador::findOrFail($indicador_id);

        $datos = array();

        foreach ($indicador->datos as $dato) {
            $random_number1 = rand(0, 255);
            $random_number2 = rand(0, 255);
            $random_number3 = rand(0, 255);
            array_push($datos, (object) [
                "label" => $dato->anio,
                "backgroundColor" => "rgb($random_number1, $random_number2, $random_number3)",
                //Data to be represented on y-axis
                "data" => [
                    $dato->enero,
                    $dato->febrero,
                    $dato->marzo,
                    $dato->abril,
                    $dato->mayo,
                    $dato->junio,
                    $dato->julio,
                    $dato->agosto,
                    $dato->septiembre,
                    $dato->octubre,
                    $dato->noviembre,
                    $dato->diciembre,
                ],
            ]);
        }

        // return $datos;
        return view('paginas.datos.grafico', ['datos' => $datos]);
    }

    public function maestro(Request $request)
    {
        $slug = $request->perspectiva;
        if (!isset($request->perspectiva)) {
            $slug = 'FI';
        }

        $anio_anterior = $request->anio_anterior ? $request->anio_anterior : '2018';
        $anio_actual = $request->anio_actual ? $request->anio_actual : '2019';
        $semaforo = $request->semaforo ? $request->anio_actual : '2019';

        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('paginas.maestro.index', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
        ]);

    }

    public function resumen(Request $request)
    {
        $slug = $request->perspectiva;
        if (!isset($request->perspectiva)) {
            $slug = 'FI';
        }
        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('paginas.maestro.resumen', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
        ]);

    }
}
