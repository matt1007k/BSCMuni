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
            $slug = 'FI';
        }

        $anio_anterior = $request->anio_anterior ? $request->anio_anterior : '2018';
        $anio_actual = $request->anio_actual ? $request->anio_actual : '2019';
        $semaforo = $request->semaforo ? $request->anio_actual : '2019';

        $perspectivas = Perspectiva::orderBy('titulo', 'asc')->get();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        foreach ($perspectivaObjetivos->objetivos as $objetivo) {
            foreach ($objetivo->indicadores as $indicador) {
                // return $indicador->With(['datos'])->get();
                return $indicador->datos->last();
                // return $indicador->datos->byAnio($anio_actual)->first();
            }
        }

        return view('admin.maestro.index', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
            'anio_anterior' => $anio_anterior,
            'anio_actual' => $anio_actual,
            'semaforo' => $semaforo,
        ]);
    }

    public function resumen()
    {
        return view('admin.maestro.resumen');

    }

}
