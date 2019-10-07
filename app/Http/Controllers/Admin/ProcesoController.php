<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Informacion;
use App\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{

    public function index()
    {
        $procesos = Proceso::paginate(6);
        $informacion = Informacion::first();

        return view('admin.procesos.index', [
            'procesos' => $procesos,
            'informacion' => $informacion,
        ]);
    }

    public function create()
    {
        return view('admin.procesos.create', [
            'proceso' => new Proceso,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $proceso = new Proceso();
        $proceso->titulo = $request->titulo;

        if ($proceso->save()) {
            return redirect()->route('procesos.index')
                ->with('msg', 'Registro completado con exito');
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
            'titulo' => 'required|max:100',
        ]);

        $proceso = Proceso::findOrFail($id);
        $proceso->titulo = $request->titulo;

        if ($proceso->save()) {
            return redirect()->route('procesos.index')
                ->with('msg', 'Edicion completada con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $proceso = Proceso::findOrFail($id);
        if ($proceso->delete()) {
            return redirect()->route('procesos.index')
                ->with('msg', 'Registro eliminado con exito');
        } else {
            return redirect()->route('procesos.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
