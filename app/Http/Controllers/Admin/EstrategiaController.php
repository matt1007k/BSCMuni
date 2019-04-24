<?php

namespace App\Http\Controllers\Admin;


use App\Fortaleza;
use App\Debilidad;
use App\Oportunidad;
use App\Amenaza;

use App\Estrategia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstrategiaController extends Controller
{
   
    public function foda(Request $request)
    {
        $tipo = 'FO';
        if($request->get('tipo') !== null){
            $tipo = $request->get('tipo');
        }
        
        $fortalezas = Fortaleza::all();        
        $debilidades = Debilidad::all();
        $oportunidades = Oportunidad::all();
        $amenazas = Amenaza::all();
        
        $estrategias = Estrategia::where('tipo', $tipo)->get();

        return view('admin.estrategias.foda',[
            'fortalezas' => $fortalezas,
            'debilidades' => $debilidades,
            'oportunidades' => $oportunidades,
            'amenazas' => $amenazas,
            'tipo' => $tipo,
            'estrategias' => $estrategias,
        ]);
    }

   
    public function create($tipo)
    {        

        return view('admin.estrategias.create',[
            'tipo' => $tipo
        ]);
    }

    public function store(Request $request)
    {
       $request->validate([
           'foda' => 'required',
           'contenido' => 'required'
       ]);
    
       $estrategia = new Estrategia();
       $estrategia->foda = $request->foda;
       $estrategia->contenido = $request->contenido;
       $estrategia->tipo = $request->tipo;

       if($estrategia->save()){
           return redirect()->route('estrategias.foda')
                            ->with('msg', 'Estrategia registrado correctamente');
       }else{
           return back();
       }

    }

    public function edit($tipo, $id)
    {
        $estrategia = Estrategia::findOrFail($id);
        
        return view('admin.estrategias.edit',[
            'tipo' => $tipo,
            'estrategia' => $estrategia
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foda' => 'required',
            'contenido' => 'required'
        ]);

        $estrategia = Estrategia::findOrFail($id);
        $estrategia->foda = $request->foda;
        $estrategia->contenido = $request->contenido;
        $estrategia->tipo = $request->tipo;

        if($estrategia->save()){
            return redirect()->route('estrategias.foda')
                            ->with('msg', 'Estrategia modifico correctamente');
        }else{
            return back();
        }
    }

    
    public function destroy($id)
    {
        $estrategia = Estrategia::findOrFail($id);
        if($estrategia->delete()){
            return redirect()->route('estrategias.foda')
                            ->with('msg', 'Estrategia eliminado correctamente');
        }else{
            return redirect()->route('estrategias.foda')
                            ->with('msg', 'Error al eliminar el registro');
        }
    }
}
