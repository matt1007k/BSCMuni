<?php

namespace App\Http\Controllers\Admin;

use App\Informacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformacionController extends Controller
{
    public function index()
    {
        $informaciones = Informacion::paginate();
        return view('admin.informaciones.index',[
            'informaciones' => $informaciones
        ]);
    }
    
    public function create()
    {
        return view('admin.informaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'vision' => 'required',
            'mision' => 'required',
            'macroproceso' => 'required'
        ]);
 
        $informacion = new Informacion();
        $informacion->nombre = $request->nombre;
        $informacion->mision = $request->mision;
        $informacion->vision = $request->vision;
        $informacion->macroproceso = $request->macroproceso;
 
        if($informacion->save()){
            return redirect()->route('informaciones.index')
                            ->with('msg', 'Registro registrado correctamente');
        }else{
            return back();
        }
    }

    

    
    public function edit($id)
    {
        $informacion = Informacion::findOrFail($id);
        return view('admin.informaciones.edit', ['informacion' => $informacion]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'vision' => 'required',
            'mision' => 'required',
            'macroproceso' => 'required'
        ]);

        $informacion = Informacion::findOrFail($id);
        $informacion->nombre = $request->nombre;
        $informacion->mision = $request->mision;
        $informacion->vision = $request->vision;
        $informacion->macroproceso = $request->macroproceso;
 
        if($informacion->save()){
            return redirect()->route('informaciones.index')
                            ->with('msg', 'Registro modificado correctamente');
        }else{
            return back();
        }
    }

   
    public function destroy($id)
    {
        $informacion = Informacion::findOrFail($id);
        if($informacion->delete()){
            return redirect()->route('informaciones.index')
                            ->with('msg', 'Registro eliminado correctamente');
        }else{
            return redirect()->route('informaciones.index')
                            ->with('msg', 'Error al eliminar el registro');
        }
    }
}
