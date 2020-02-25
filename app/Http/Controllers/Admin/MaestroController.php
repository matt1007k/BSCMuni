<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Perspectiva;
use Illuminate\Http\Request;

class MaestroController extends Controller
{

    public function maestro(Request $request)
    {
        $slug = $request->perspectiva;
        if (!isset($request->perspectiva)) {
            $slug = Perspectiva::first()->slug;
        }

        $anio_anterior = $request->anio_anterior ? $request->anio_anterior : '2018';
        $anio_actual = $request->anio_actual ? $request->anio_actual : '2019';
        $semaforo = $request->semaforo ? $request->anio_actual : '2019';

        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('admin.maestro.index', [
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
            $slug = Perspectiva::first()->slug;
        }
        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('admin.maestro.resumen', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
        ]);

    }

    public function grafica($perspectiva_id){

        $perspectiva = Perspectiva::find($perspectiva_id);
        $objetivos = array();

        foreach ($perspectiva->objetivos as $objetivo) {
            $datos = array();
            $total = 0.0;
            $signo = '';
            foreach($objetivo->indicadores as $indicador){ 
                if($indicador->datos->last()->porcentaje != 0.00){
                     $total = number_format($indicador->datos->last()->porcentaje, 0);
                     $signo = "%";
                }else
                {
                    $total = $indicador->datos->last()->total; 
                    $signo = '';
                }
                
                 array_push($datos, (object) [
                    "label" => $indicador->datos->last()->anio."({$total}{$signo})",
                     "backgroundColor" => "#0074d9",
                     //Data to be represented on y-axis
                     "data" => [
                         $total,
                     ],
                 ]);
                         
                 array_push($datos, (object) [
                    "label" => "Meta({$indicador->meta}{$signo})",
                     "backgroundColor" => "#28a745",
                     //Data to be represented on y-axis
                     "data" => [
                         $indicador->meta
                     ],
                 ]);
                
                
            }
            array_push($objetivos, [
                'objetivo' => $objetivo->contenido,
                'indicadores' => $datos
            ]);
         }

         //return $objetivos;

        return view('admin.maestro.grafica', ['perspectiva' => $perspectiva,'objetivos' => $objetivos]);
    }

}
