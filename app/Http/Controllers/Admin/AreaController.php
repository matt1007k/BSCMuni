<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.areas.index',[
            'areas' => $areas
        ]);
    }
    
    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);
 
        $area = new Area();
        $area->titulo = $request->titulo;
 
        if($area->save()){
            return redirect()->route('actividades.index')
                            ->with('msg', 'Área registrado correctamente');
        }
    }

    

    
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('admin.areas.edit', ['area' => $area]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);

        $area = Area::findOrFail($id);
        $area->titulo = $request->titulo;
 
        if($area->save()){
            return redirect()->route('actividades.index')
                            ->with('msg', 'Área modifico correctamente');
        }else{
            return back();
        }
    }

   
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        if($area->delete()){
            return redirect()->route('actividades.index')
                            ->with('msg', 'Área elimino correctamente');
        }else{
            return redirect()->route('actividades.index')
                            ->with('msg', 'Error al eliminar el registro');
        }
    }
}
