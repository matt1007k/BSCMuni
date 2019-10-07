<?php

namespace App\Http\Controllers\Admin;

use App\Factor;
use App\Fuerza;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function index()
    {
        $fuerzas = Fuerza::orderBy('created_at')->paginate(6);

        return view('admin.factores.index', [
            'fuerzas' => $fuerzas,
        ]);
    }

    public function create()
    {
        $fuerzas = Fuerza::orderBy('titulo')->get();

        return view('admin.factores.create', [
            'fuerzas' => $fuerzas,
            'factor' => new Factor,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'fuerza_id' => 'required',
        ]);

        $factor = new Factor();
        $factor->titulo = $request->titulo;
        $factor->fuerza_id = $request->fuerza_id;

        if ($factor->save()) {
            return redirect()->route('factores.index')
                ->with('msg', 'Factor registrado con exito');
        } else {
            return back();
        }

    }

    public function edit($id)
    {
        $factor = Factor::findOrFail($id);
        $fuerzas = Fuerza::orderBy('titulo')->get();

        return view('admin.factores.edit', [
            'fuerzas' => $fuerzas,
            'factor' => $factor,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'fuerza_id' => 'required',
        ]);

        $factor = Factor::findOrFail($id);
        $factor->titulo = $request->titulo;
        $factor->fuerza_id = $request->fuerza_id;

        if ($factor->save()) {
            return redirect()->route('factores.index')
                ->with('msg', 'Factor editado con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $factor = Factor::findOrFail($id);
        if ($factor->delete()) {
            return redirect()->route('factores.index')
                ->with('msg', 'Factor eliminado con exito');
        } else {
            return redirect()->route('factores.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
