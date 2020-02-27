<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Proceso;
use App\Subproceso;
use Illuminate\Http\Request;

class SubprocesoController extends Controller
{

    public function create(Proceso $proceso)
    {
        return view('admin.subprocesos.create', [
            'proceso' => $proceso,
            'subproceso' => new Subproceso,
        ]);
    }

    public function store(Request $request, Proceso $proceso)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $proceso->subprocesos()->create($request->all());

        return redirect()->route('procesos.index')
            ->with('msg', 'Registro completado con exito');
    }

    public function edit(Proceso $proceso, Subproceso $subproceso)
    {
        return view('admin.subprocesos.edit', [
            'proceso' => $proceso,
            'subproceso' => $subproceso,
        ]);
    }

    public function update(Request $request, Proceso $proceso, Subproceso $subproceso)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'proceso_id' => 'required',
        ]);

        $subproceso->update($request->all());

        return redirect()->route('procesos.index')
            ->with('msg', 'Edicion completada con exito');
    }

    public function destroy(Proceso $proceso, Subproceso $subproceso)
    {
        $subproceso->delete();
        return redirect()->route('procesos.index')
            ->with('msg', 'Registro eliminado con exito');
    }
}
