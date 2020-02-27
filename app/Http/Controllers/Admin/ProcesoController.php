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
        Proceso::create($request->all());

        return redirect()->route('procesos.index')
            ->with('msg', 'Registro completado con exito');
    }

    public function edit(Proceso $proceso)
    {
        return view('admin.procesos.edit', ['proceso' => $proceso]);
    }

    public function update(Request $request, Proceso $proceso)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $proceso->update($request->all());
        return redirect()->route('procesos.index')
            ->with('msg', 'Edicion completada con exito');
    }

    public function destroy(Proceso $proceso)
    {
        $proceso->delete();
        return redirect()->route('procesos.index')
            ->with('msg', 'Registro eliminado con exito');
    }
}
