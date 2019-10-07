<?php

namespace App\Http\Controllers\Admin;

use App\Actividad;
use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadController extends Controller
{

    public function index()
    {
        $areas = Area::orderBy('created_at')->paginate(6);

        return view('admin.actividades.index', [
            'areas' => $areas,
        ]);
    }

    public function create()
    {
        $areas = Area::orderBy('titulo')->get();

        return view('admin.actividades.create', [
            'areas' => $areas,
            'actividad' => new Actividad,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'area_id' => 'required',
        ]);

        $actividad = new Actividad();
        $actividad->titulo = $request->titulo;
        $actividad->area_id = $request->area_id;

        if ($actividad->save()) {
            return redirect()->route('actividades.index')
                ->with('msg', 'Actividad registrado con exito');
        } else {
            return back();
        }

    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        $areas = Area::orderBy('titulo')->get();

        return view('admin.actividades.edit', [
            'areas' => $areas,
            'actividad' => $actividad,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'area_id' => 'required',
        ]);

        $actividad = Actividad::findOrFail($id);
        $actividad->titulo = $request->titulo;
        $actividad->area_id = $request->area_id;

        if ($actividad->save()) {
            return redirect()->route('actividades.index')
                ->with('msg', 'Actividad editada con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        if ($actividad->delete()) {
            return redirect()->route('actividades.index')
                ->with('msg', 'Actividad eliminado con exito');
        } else {
            return redirect()->route('actividades.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
