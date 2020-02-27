<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::orderBy('created_at')->paginate(6);

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

        Area::create($request->all());

        return redirect()->route('areas.index')
            ->with('msg', 'Área registrado con exito');
    }

    public function edit(Area $area)
    {
        return view('admin.areas.edit', ['area' => $area]);
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $area->update($request->all());

        return redirect()->route('areas.index')
            ->with('msg', 'Registro editado con exito');
    }

    public function destroy(Area $area)
    {
        $area->delete();
        return redirect()->route('areas.index')
            ->with('msg', 'Registro elimino con exito');
    }
}
