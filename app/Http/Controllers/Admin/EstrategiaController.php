<?php

namespace App\Http\Controllers\Admin;

use App\Amenaza;
use App\Debilidad;
use App\Estrategia;
use App\Fortaleza;
use App\Http\Controllers\Controller;
use App\Oportunidad;
use Illuminate\Http\Request;

class EstrategiaController extends Controller
{

    public function foda(Request $request)
    {
        $tipo = 'FO';
        if ($request->get('tipo') !== null) {
            $tipo = $request->get('tipo');
        }

        $fortalezas = Fortaleza::all();
        $debilidades = Debilidad::all();
        $oportunidades = Oportunidad::all();
        $amenazas = Amenaza::all();

        $estrategias = Estrategia::where('tipo', $tipo)->get();

        return view('admin.estrategias.foda', [
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

        return view('admin.estrategias.create', [
            'tipo' => $tipo,
            'estrategia' => new Estrategia(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'foda' => 'required',
            'contenido' => 'required',
        ]);

        $estrategia = new Estrategia();
        $estrategia->foda = $request->foda;
        $estrategia->contenido = $request->contenido;
        $estrategia->tipo = $request->tipo;

        if ($estrategia->save()) {
            return redirect('/foda?tipo=' . $request->tipo)
                ->with('msg', 'Estrategia registrado con exito');
        } else {
            return back();
        }

    }

    public function edit($tipo, $id)
    {
        $estrategia = Estrategia::findOrFail($id);

        return view('admin.estrategias.edit', [
            'tipo' => $tipo,
            'estrategia' => $estrategia,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'foda' => 'required',
            'contenido' => 'required',
        ]);

        $estrategia = Estrategia::findOrFail($id);
        $estrategia->foda = $request->foda;
        $estrategia->contenido = $request->contenido;
        $estrategia->tipo = $request->tipo;

        if ($estrategia->save()) {
            return redirect('/foda?tipo=' . $request->tipo)
                ->with('msg', 'Estrategia editada con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $estrategia = Estrategia::findOrFail($id);
        if ($estrategia->delete()) {
            return redirect('/foda?tipo=' . $estrategia->tipo)
                ->with('msg', 'Estrategia eliminado con exito');
        } else {
            return redirect('/foda?tipo=' . $estrategia->tipo)
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
