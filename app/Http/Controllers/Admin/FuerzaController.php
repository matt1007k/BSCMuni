<?php

namespace App\Http\Controllers\Admin;

use App\Fuerza;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuerzaController extends Controller
{
    public function index()
    {
        return view('admin.fuerzas.index', [
            'fuerzas' => $fuerzas,
        ]);
    }

    public function create()
    {
        return view('admin.fuerzas.create', ['fuerza' => new Fuerza]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $fuerza = new Fuerza();
        $fuerza->titulo = $request->titulo;

        if ($fuerza->save()) {
            return redirect()->route('factores.index')
                ->with('msg', 'Fuerza registrado con exito.');
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
            'titulo' => 'required|max:100',
        ]);

        $fuerza = Fuerza::findOrFail($id);
        $fuerza->titulo = $request->titulo;

        if ($fuerza->save()) {
            return redirect()->route('factores.index')
                ->with('msg', 'Fuerza editada con exito.');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $fuerza = Fuerza::findOrFail($id);
        if ($fuerza->delete()) {
            return redirect()->route('factores.index')
                ->with('msg', 'Fuerza se elimino con exito.');
        } else {
            return redirect()->route('factores.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
