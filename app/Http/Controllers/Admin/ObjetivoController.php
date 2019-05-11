<?php

namespace App\Http\Controllers\Admin;

use App\Estrategia;
use App\Http\Controllers\Controller;
use App\Objetivo;
use App\Perspectiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObjetivoController extends Controller
{

    public function index(Request $request)
    {
        $perspectivas = Perspectiva::orderBy('created_at')->paginate(6);

        return view('admin.objetivos.index', [
            'perspectivas' => $perspectivas,
        ]);
    }

    public function create()
    {
        $perspectivas = Perspectiva::orderBy('titulo')->get();

        return view('admin.objetivos.create', [
            'perspectivas' => $perspectivas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|max:250',
        ]);

        $objetivo = new Objetivo();
        $objetivo->contenido = $request->contenido;
        $objetivo->perspectiva_id = $request->perspectiva_id;

        $perspectiva = Perspectiva::findOrFail($request->perspectiva_id);
        $primera_letra = substr($perspectiva->slug, 0, 1);

        $length = Objetivo::where('perspectiva_id', $perspectiva->id)->get();
        $objetivo->slug = $primera_letra . ($length->count() + 1);

        if ($objetivo->save()) {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Registro creado correctamente');
        } else {
            return back();
        }

    }

    public function edit($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        $perspectivas = Perspectiva::orderBy('titulo')->get();

        return view('admin.objetivos.edit', [
            'perspectivas' => $perspectivas,
            'objetivo' => $objetivo,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contenido' => 'required|max:250',
        ]);

        $objetivo = Objetivo::findOrFail($id);
        $objetivo->contenido = $request->contenido;
        if ($request->perspectiva_id !== $objetivo->perspectiva_id) {
            $perspectiva = Perspectiva::findOrFail($request->perspectiva_id);
            $primera_letra = substr($perspectiva->slug, 0, 1);

            $length = Objetivo::where('perspectiva_id', $perspectiva->id)->get();
            $objetivo->slug = $primera_letra . ($length->count() + 1);
        }

        $objetivo->perspectiva_id = $request->perspectiva_id;

        if ($objetivo->save()) {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Registro se modifico correctamente');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $objetivo = Objetivo::findOrFail($id);
        if ($objetivo->delete()) {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Registro se eliminado correctamente');
        } else {
            return redirect()->route('objetivos.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }

    public function asignarEstrategias($objetivo_id)
    {
        $objetivo = Objetivo::findOrFail($objetivo_id);
        $estrategias = Estrategia::paginate(10);
        return view('admin.objetivos.asignarEstrategia', [
            'estrategias' => $estrategias,
            'objetivo' => $objetivo,
        ]);
    }
    public function asignar(Request $request, $id)
    {
        $messages = [
            'required' => 'El objetivo debe tener :attribute.',
        ];

        $validator = Validator::make($request->all(), [
            'estrategias' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()
                ->route('asignarEstrategia', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // return $id;

        $objetivo = Objetivo::findOrFail($id);
        $objetivo->estrategias()->sync($request->estrategias);

        return redirect()->route('objetivos.index')
            ->with('msg', 'Estrategias asignadas con exitó');

    }
}