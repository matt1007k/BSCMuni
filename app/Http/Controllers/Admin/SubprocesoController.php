<?php

namespace App\Http\Controllers\Admin;

use App\Proceso;
use App\Subproceso;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubprocesoController extends Controller
{
       
    public function create()
    {
        $procesos = Proceso::orderBy('titulo')->get();
        return view('admin.subprocesos.create', [
            'procesos' => $procesos
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);
 
        $subprocesos = new Subproceso();
        $subprocesos->titulo = $request->titulo;
        $subprocesos->proceso_id = $request->proceso_id;
 
        if($subprocesos->save()){
            return redirect()->route('procesos.index')
                            ->with('msg', 'Registro registrado correctamente');
        }
    }

    

    
    public function edit($id)
    {
        $procesos = Proceso::orderBy('titulo')->get();
        $subproceso = Subproceso::findOrFail($id);
        return view('admin.subprocesos.edit', [
            'procesos' => $procesos,
            'subproceso' => $subproceso
        ]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);

        $subproceso = Subproceso::findOrFail($id);
        $subproceso->titulo = $request->titulo;
        $subproceso->proceso_id = $request->proceso_id;
 
        if($subproceso->save()){
            return redirect()->route('procesos.index')
                            ->with('msg', 'Registro modificado correctamente');
        }else{
            return back();
        }
    }

   
    public function destroy($id)
    {
        $subproceso = Subproceso::findOrFail($id);
        if($subproceso->delete()){
            return redirect()->route('procesos.index')
                            ->with('msg', 'Registro eliminado correctamente');
        }else{
            return redirect()->route('procesos.index')
                            ->with('msg', 'Error al eliminar el registro');
        }
    }
}
