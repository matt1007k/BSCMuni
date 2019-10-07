<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.areas.index', [
            'areas' => $areas,
        ]);
    }

    public function create()
    {
        return view('admin.areas.create', [
            'area' => new Area,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $area = new Area();
        $area->titulo = $request->titulo;

        if ($area->save()) {
            return redirect()->route('actividades.index')
                ->with('msg', 'Área registrado con exito');
        }
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('admin.areas.edit', ['area' => $area]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $area = Area::findOrFail($id);
        $area->titulo = $request->titulo;

        if ($area->save()) {
            return redirect()->route('actividades.index')
                ->with('msg', 'Área editada con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        if ($area->delete()) {
            return redirect()->route('actividades.index')
                ->with('msg', 'Área elimino con exito');
        } else {
            return redirect()->route('actividades.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
