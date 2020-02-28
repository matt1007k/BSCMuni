<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Perspectiva;
use Illuminate\Http\Request;

class PerspectivaController extends Controller
{

    public function index()
    {
        $perspectivas = Perspectiva::orderBy('created_at')->paginate(6);

        return view('admin.perspectivas.index', [
            'perspectivas' => $perspectivas,
        ]);
    }

    public function create()
    {
        return view('admin.perspectivas.create', ['perspectiva' => new Perspectiva]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:100|min:4',
        ]);
        $titulo = $request->titulo;
        $dos_letras = substr($titulo, 0, 2);
        // Convertimos en mayusculas
        $slug = strtoupper($dos_letras);

        Perspectiva::create([
            'slug' => $slug,
            'titulo' => $titulo,
        ]);

        return redirect()->route('perspectivas.index')
            ->with('msg', 'Registro completado con exito');
    }

    public function edit(Perspectiva $perspectiva)
    {
        return view('admin.perspectivas.edit', ['perspectiva' => $perspectiva]);
    }

    public function update(Request $request, Perspectiva $perspectiva)
    {
        $request->validate([
            'titulo' => 'required|max:100',
        ]);

        $titulo = $request->titulo;
        $dos_letras = substr($titulo, 0, 2);
        // Convertimos en mayusculas
        $slug = strtoupper($dos_letras);

        $perspectiva->update([
            'slug' => $slug,
            'titulo' => $titulo,
        ]);

        return redirect()->route('perspectivas.index')
            ->with('msg', 'Registro editada con exito');
    }

    public function destroy(Perspectiva $perspectiva)
    {
        $perspectiva->delete();
        return redirect()->route('perspectivas.index')
            ->with('msg', 'Registro elimino con exito');
    }
}
