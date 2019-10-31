<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Objetivo;
use App\Perspectiva;
use App\Relacion;
use Illuminate\Http\Request;

class MapaController extends Controller
{
    public function index()
    {
        $perspectivas2 = [
            (object) [
                'key' => "_BANDS",
                'category' => "Bands",
                'itemArray' => [
                    ['text' => "FINANCIERA"],
                    ['text' => "CLIENTE"],
                ],

            ],
            ['key' => "F1", 'text' => "F1: Gestionar eficazmente el presupuesto asignado para el año", 'parent' => "F3", 'color' => "red"],
            ['key' => "F2", 'text' => "F2: Incrementar la rentabilidad en la empresa", 'parent' => "", 'color' => "red"],
            ['key' => "F3", 'text' => "F3: Adquirir nuevos buses Generación 7(G7)para mejorar la demanda de los clientes.", 'parent' => "", 'color' => "red"],
            ['key' => "C1", 'text' => "C1: Incrementar la cartera de clientes turistas con la realización de eventos y promociones", 'parent' => "F2", 'color' => "blue"],
            ['key' => "C2", 'text' => "C2: Fidelizar a los clientes por medio de las tarjetas turismo Libertadores Pass", 'parent' => "F2", 'color' => "#0074d9"],
            ['key' => "C3", 'text' => "C3: Minimizar las quejas de los clientes con rápidas atenciones de reclamos presentados", 'parent' => "F3", 'color' => "blue"],
            ['key' => "P1", 'text' => "P1:  Propiciar la incorporación de nuevas herramientas de tecnologias de información en la gestión logística de la empresa.", 'parent' => "F1", 'color' => "#17a2b8"],
            ['key' => "P2", 'text' => "P2:  Reducir impactos negativos en cuanto al tiempo y costo de viaje.", 'parent' => "C3", 'color' => "#17a2b8"],
            ['key' => "P3", 'text' => "P3:  Identificar las oportunidades de mejoras y prevenir posibles inconvenientes en las distintas áreas laborales.", 'parent' => "C3", 'color' => "#17a2b8"],
        ];
        $objetivos = Objetivo::all();
        $perspectivas_db = Perspectiva::orderBy('created_at', 'ASC')->get();
        $relaciones = [];
        $color = 'red';
        $perspectivas_name = $perspectivas_db->map(function ($perspectiva) {
            return ['text' => $perspectiva->titulo];
        });
        foreach ($objetivos as $objetivo) {
            if ($objetivo->perspectiva->slug == 'FI') {
                $color = 'red';
            } else if ($objetivo->perspectiva->slug == 'CL') {
                $color = '#17a2b8';
            } else if ($objetivo->perspectiva->slug == 'PR') {
                $color = '#0074d9';
            } else if ($objetivo->perspectiva->slug == 'AP') {
                $color = 'blue';
            }
            array_push($relaciones, (object) [
                'key' => $objetivo->slug,
                'text' => "$objetivo->slug: $objetivo->contenido",
                'parent' => $objetivo->relacion != null ? $objetivo->relacion : "",
                'color' => $color,
            ]);

        }

        array_push($relaciones, [
            'key' => "_BANDS",
            'category' => "Bands",
            'itemArray' => $perspectivas_name,
        ]);

        // return $perspectivas_db;
        return view('admin.objetivos.mapa-estrategico', [
            'perspectivas' => $relaciones,
            'objetivos' => $objetivos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'relacion' => ['required'],
            'objetivo_id' => ['required'],
        ]);

        $objetivo = Objetivo::find($request->objetivo_id)->update(['relacion' => $request->relacion]);

        if ($objetivo) {
            return back()->with('msg', 'Registro creado con exito');
        }
    }

    public function destroy($id)
    {
        $relacion = Relacion::findOrfail($id);

        if ($relacion->delete()) {
            return back()->with('msg', 'Registro eliminado con exito');
        }
    }

    public function update(Request $request)
    {

    }

}
