<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Proceso;
use App\Subproceso;
use Illuminate\Http\Request;

class SubprocesoController extends Controller
{

    public function create()
    {
        $procesos = Proceso::orderBy('titulo')->get();
        return view('admin.subprocesos.create', [
            'procesos' => $procesos,
            'subproceso' => new Subproceso,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'proceso_id' => 'required',
        ]);

        $subprocesos = new Subproceso();
        $subprocesos->titulo = $request->titulo;
        $subprocesos->proceso_id = $request->proceso_id;

        if ($subprocesos->save()) {
            return redirect()->route('procesos.index')
                ->with('msg', 'Registro completado con exito');
        }
    }

    public function edit($id)
    {
        $procesos = Proceso::orderBy('titulo')->get();
        $subproceso = Subproceso::findOrFail($id);
        return view('admin.subprocesos.edit', [
            'procesos' => $procesos,
            'subproceso' => $subproceso,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'proceso_id' => 'required',
        ]);

        $subproceso = Subproceso::findOrFail($id);
        $subproceso->titulo = $request->titulo;
        $subproceso->proceso_id = $request->proceso_id;

        if ($subproceso->save()) {
            return redirect()->route('procesos.index')
                ->with('msg', 'Edicion completada con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $subproceso = Subproceso::findOrFail($id);
        if ($subproceso->delete()) {
            return redirect()->route('procesos.index')
                ->with('msg', 'Registro eliminado con exito');
        } else {
            return redirect()->route('procesos.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
