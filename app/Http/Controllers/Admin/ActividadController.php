<?php

namespace App\Http\Controllers\Admin;

use App\Actividad;
use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function fceCm()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.fceCm', ['actividades' => $actividades]);
    }

    public function create(Area $area)
    {
        return view('admin.actividades.create', [
            'area' => $area,
            'actividad' => new Actividad,
        ]);
    }

    public function store(Request $request, Area $area)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);

        $area->actividades()->create($request->all());
        return redirect()->route('areas.index')
            ->with('msg', 'Registro guardado con exito');
    }

    public function edit(Area $area, Actividad $activity)
    {
        return view('admin.actividades.edit', [
            'area' => $area,
            'actividad' => $activity,
        ]);
    }

    public function update(Request $request, Area $area, Actividad $activity)
    {
        $request->validate([
            'titulo' => 'required|max:100'
        ]);

        $activity->update($request->all());
        return redirect()->route('areas.index')
            ->with('msg', 'Registro editado con exito');
    }

    public function destroy(Area $area, Actividad $activity)
    {
        $activity->delete();
        return redirect()->route('areas.index')
            ->with('msg', 'Registro eliminado con exito');
    }
}
