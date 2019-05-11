<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Perspectiva;
use Illuminate\Http\Request;

class PerspectivaController extends Controller
{

    public function create()
    {
        return view('admin.perspectivas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100|min:4',
        ]);

        $perspectiva = new Perspectiva();

        $dos_letras = substr($request->titulo, 0, 2);
        // Convertimos en mayusculas
        $slug = strtoupper($dos_letras);

        $perspectiva->slug = $slug;
        $perspectiva->titulo = $request->titulo;

        if ($perspectiva->save()) {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Perspectiva registrado correctamente');
        }
    }

    public function edit($id)
    {
        $perspectiva = Perspectiva::findOrFail($id);
        return view('admin.perspectivas.edit', ['perspectiva' => $perspectiva]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $perspectiva = Perspectiva::findOrFail($id);
        $dos_letras = substr($request->titulo, 0, 2);
        // Convertimos en mayusculas
        $slug = strtoupper($dos_letras);

        $perspectiva->slug = $slug;
        $perspectiva->titulo = $request->titulo;

        if ($perspectiva->save()) {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Perspectiva modifico correctamente');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $perspectiva = Perspectiva::findOrFail($id);
        if ($perspectiva->delete()) {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Perspectiva elimino correctamente');
        } else {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}