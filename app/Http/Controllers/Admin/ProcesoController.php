<?php

namespace App\Http\Controllers\Admin;

use App\Proceso;
use App\Informacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcesoController extends Controller
{
   
    public function index()
    {
        $procesos = Proceso::paginate(6);
        $informacion = Informacion::first();

        return view('admin.procesos.index',[
            'procesos' => $procesos,
            'informacion' => $informacion
        ]);
    }
    
    public function create()
    {
        return view('admin.procesos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);
 
        $proceso = new Proceso();
        $proceso->titulo = $request->titulo;
 
        if($proceso->save()){
            return redirect()->route('procesos.index')
                            ->with('msg', 'Registro registrado correctamente');
        }
    }

    

    
    public function edit($id)
    {
        $proceso = Proceso::findOrFail($id);
        return view('admin.procesos.edit', ['proceso' => $proceso]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);

        $proceso = Proceso::findOrFail($id);
        $proceso->titulo = $request->titulo;
 
        if($proceso->save()){
            return redirect()->route('procesos.index')
                            ->with('msg', 'Registro modificado correctamente');
        }else{
            return back();
        }
    }

   
    public function destroy($id)
    {
        $proceso = Proceso::findOrFail($id);
        if($proceso->delete()){
            return redirect()->route('procesos.index')
                            ->with('msg', 'Registro eliminado correctamente');
        }else{
            return redirect()->route('procesos.index')
                            ->with('msg', 'Error al eliminar el registro');
        }
    }
}
