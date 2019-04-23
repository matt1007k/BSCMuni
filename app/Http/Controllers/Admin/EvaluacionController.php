<?php

namespace App\Http\Controllers\Admin;


use App\Area;
use App\Factor;
use App\Fuerza;
use App\Actividad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EvaluacionController extends Controller
{
    
    public function interno()
    {
        $areas = Area::orderBy('titulo')->paginate(6);

        return view('admin.evaluacion.interno' ,[
            'areas' => $areas
        ]);
    }

    public function externo()
    {
        $fuerzas = Fuerza::orderBy('titulo')->paginate(6);

        return view('admin.evaluacion.externo' ,[
            'fuerzas' => $fuerzas
        ]);
    }

    public function internoEditar($id){
        $actividad = Actividad::findOrFail($id);

        return view('admin.evaluacion.internoEditar', ['actividad' => $actividad]);
    }

    public function externoEditar($id){
        $factor = Factor::findOrFail($id);

        return view('admin.evaluacion.externoEditar', ['factor' => $factor]);
    }

    
    public function evaluacionInterno(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);
        
        $this->evaliacionInterno($actividad, $request);

        return $actividad; 
    }

    
    public function evaluacionExterno(Request $request, $id)
    {
        //
    }


    public function evaliacionInterno($actividad, $request){
        if($request->importancia === '3'){
            $actividad->alta = (int)$request->importancia;
            $actividad->media = 0;
            $actividad->baja = 0;
        }elseif($request->importancia === '2'){
            $actividad->media = (int)$request->importancia;
            $actividad->alta = 0;
            $actividad->baja = 0;
        }elseif($request->importancia === '1'){
            $actividad->baja = (int)$request->importancia;
            $actividad->alta = 0;
            $actividad->media = 0;
        }

        if($request->desempeno === '2'){
            $actividad->muy_bueno = (int)$request->desempeno;
            $actividad->bueno = 0;
            $actividad->deficiente = 0;
            $actividad->muy_deficiente = 0;
        }elseif($request->desempeno === '1'){
            $actividad->bueno = (int)$request->desempeno;
            $actividad->muy_bueno = 0;
            $actividad->deficiente = 0;
            $actividad->muy_deficiente = 0;
        }elseif($request->desempeno === '-1'){
            $actividad->deficiente = (int)$request->desempeno;
            $actividad->muy_bueno = 0;
            $actividad->bueno = 0;
            $actividad->muy_deficiente = 0;
        }elseif($request->desempeno === '-2'){
            $actividad->muy_deficiente = (int)$request->desempeno;
            $actividad->muy_bueno = 0;
            $actividad->bueno = 0;
            $actividad->deficiente = 0;
        }

        $valor = (($actividad->alta + $actividad->media + $actividad->baja) * ($actividad->muy_bueno + $actividad->bueno + $actividad->deficiente + $actividad->muy_deficiente));
                
        $actividad->valor = $valor;
        return $actividad->save();
    }

}
