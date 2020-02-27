<?php

namespace App\Http\Controllers\Admin;

use App\Factor;
use App\Fuerza;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    public function create(Fuerza $fuerza)
    {
        return view('admin.factores.create', [
            'fuerza' => $fuerza,
            'factor' => new Factor,
        ]);
    }

    public function store(Request $request, Fuerza $fuerza)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $fuerza->factores()->create($request->all());

        return redirect()->route('fuerzas.index')
            ->with('msg', 'Registro registrado con exito');
    }

    public function edit(Fuerza $fuerza, Factor $factore)
    {
        return view('admin.factores.edit', [
            'fuerza' => $fuerza,
            'factor' => $factore,
        ]);
    }

    public function update(Request $request, Fuerza $fuerza, Factor $factore)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $factore->update($request->all());

        return redirect()->route('fuerzas.index')
            ->with('msg', 'Registro editado con exito');
    }

    public function destroy(Fuerza $fuerza, Factor $factore)
    {
        $factore->delete();
        return redirect()->route('fuerzas.index')
            ->with('msg', 'Registro eliminado con exito');
    }
}
