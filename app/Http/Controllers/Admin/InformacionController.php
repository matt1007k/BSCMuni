<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Informacion;
use Illuminate\Http\Request;

class InformacionController extends Controller
{
    public function index()
    {
        $informaciones = Informacion::paginate();
        return view('admin.informaciones.index', [
            'informaciones' => $informaciones,
        ]);
    }

    public function organigrama()
    {
        return view('admin.informaciones.organigrama');
    }

    public function create()
    {
        return view('admin.informaciones.create', [
            'informacion' => new Informacion,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'vision' => 'required',
            'mision' => 'required',
            'macroproceso' => 'required',
        ]);

        $informacion = new Informacion();
        $informacion->nombre = $request->nombre;
        $informacion->mision = $request->mision;
        $informacion->vision = $request->vision;
        $informacion->macroproceso = $request->macroproceso;

        if ($informacion->save()) {
            return redirect()->route('informaciones.index')
                ->with('msg', 'Registro completado con exito');
        } else {
            return back();
        }
    }

    public function edit($id)
    {
        $informacion = Informacion::findOrFail($id);
        return view('admin.informaciones.edit', ['informacion' => $informacion]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'vision' => 'required',
            'mision' => 'required',
            'macroproceso' => 'required',
        ]);

        $informacion = Informacion::findOrFail($id);
        $informacion->nombre = $request->nombre;
        $informacion->mision = $request->mision;
        $informacion->vision = $request->vision;
        $informacion->macroproceso = $request->macroproceso;

        if ($informacion->save()) {
            return redirect()->route('informaciones.index')
                ->with('msg', 'Edicion completada con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $informacion = Informacion::findOrFail($id);
        if ($informacion->delete()) {
            return redirect()->route('informaciones.index')
                ->with('msg', 'Registro eliminado con exito');
        } else {
            return redirect()->route('informaciones.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
