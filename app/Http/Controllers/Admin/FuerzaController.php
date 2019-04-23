<?php

namespace App\Http\Controllers\Admin;

use App\Fuerza;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuerzaController extends Controller
{
    public function index()
    {
        return view('admin.fuerzas.index',[
            'fuerzas' => $fuerzas
        ]);
    }
    
    public function create()
    {
        return view('admin.fuerzas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);
 
        $fuerza = new Fuerza();
        $fuerza->titulo = $request->titulo;
 
        if($fuerza->save()){
            return redirect()->route('factores.index')
                            ->with('msg', 'Fuerza registrado correctamente.');
        }
    }

    

    
    public function edit($id)
    {
        $fuerza = Fuerza::findOrFail($id);
        return view('admin.fuerzas.edit', ['fuerza' => $fuerza]);
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);

        $fuerza = Fuerza::findOrFail($id);
        $fuerza->titulo = $request->titulo;
 
        if($fuerza->save()){
            return redirect()->route('factores.index')
                            ->with('msg', 'Fuerza modificada correctamente.');
        }else{
            return back();
        }
    }

   
    public function destroy($id)
    {
        $fuerza = Fuerza::findOrFail($id);
        if($fuerza->delete()){
            return redirect()->route('factores.index')
                            ->with('msg', 'Fuerza se elimino correctamente.');
        }else{
            return redirect()->route('factores.index')
                            ->with('msg', 'Error al eliminar el registro');
        }
    }
}
