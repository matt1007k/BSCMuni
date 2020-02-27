<?php

namespace App\Http\Controllers\Admin;

use App\Fuerza;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuerzaController extends Controller
{
    public function index()
    {
        $fuerzas = Fuerza::orderBy('created_at')->paginate(6);

        return view('admin.fuerzas.index', [
            'fuerzas' => $fuerzas,
        ]);
    }

    public function create()
    {
        return view('admin.fuerzas.create', ['fuerza' => new Fuerza]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        Fuerza::create($request->all());

        return redirect()->route('fuerzas.index')
            ->with('msg', 'Registro registrado con exito.');
    }

    public function edit(Fuerza $fuerza)
    {
        return view('admin.fuerzas.edit', ['fuerza' => $fuerza]);
    }

    public function update(Request $request, Fuerza $fuerza)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $fuerza->update($request->all());

        return redirect()->route('fuerzas.index')
            ->with('msg', 'Registro editada con exito.');
    }

    public function destroy(Fuerza $fuerza)
    {
        $fuerza->delete();
        return redirect()->route('fuerzas.index')
            ->with('msg', 'Registro se elimino con exito.');
    }
}
