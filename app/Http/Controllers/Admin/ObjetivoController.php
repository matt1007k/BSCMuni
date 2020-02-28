<?php

namespace App\Http\Controllers\Admin;

use App\Estrategia;
use App\Http\Controllers\Controller;
use App\Informacion;
use App\Objetivo;
use App\Perspectiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObjetivoController extends Controller
{

    public function visionAccion(Request $request)
    {
        $perspectivas = Perspectiva::orderBy('created_at')->get();
        $estrategias = Estrategia::all();
        $informacion = Informacion::first();

        return view('admin.objetivos.vision_accion', [
            'perspectivas' => $perspectivas,
            'estrategias' => $estrategias,
            'informacion' => $informacion,
        ]);
    }

    public function create(Perspectiva $perspectiva)
    {
        $estrategias = Estrategia::all();

        return view('admin.objetivos.create', [
            'perspectiva' => $perspectiva,
            'estrategias' => $estrategias,
            'objetivo' => new Objetivo,
        ]);
    }

    public function store(Request $request, Perspectiva $perspectiva)
    {
        $request->validate([
            'contenido' => 'required|max:250',
        ]);

        $primera_letra = substr($perspectiva->slug, 0, 1);
        $length = Objetivo::where('perspectiva_id', $perspectiva->id)->get();
        $slug = $primera_letra . ($length->count() + 1);

        $objetivo = $perspectiva->objetivos()->create([
            'slug' => $slug,
            'contenido' => $request->contenido,
        ]);

        if ($request->has('estrategias')) {
            $objetivo->estrategias()->sync($request->estrategias);
        }

        return redirect()->route('perspectivas.index')
            ->with('msg', 'Registro completado con exito');
    }

    public function edit(Perspectiva $perspectiva, Objetivo $objetivo)
    {
        $estrategias = Estrategia::all();

        return view('admin.objetivos.edit', [
            'perspectiva' => $perspectiva,
            'estrategias' => $estrategias,
            'objetivo' => $objetivo,
        ]);
    }

    public function update(Request $request, Perspectiva $perspectiva, Objetivo $objetivo)
    {
        $request->validate([
            'contenido' => 'required|max:250',
        ]);

        $objetivo->update($request->all());
        // if ($request->perspectiva_id != $objetivo->perspectiva_id) {
        //     $perspectiva = Perspectiva::findOrFail($request->perspectiva_id);
        //     $primera_letra = substr($perspectiva->slug, 0, 1);

        //     $length = Objetivo::where('perspectiva_id', $perspectiva->id)->get();
        //     $objetivo->slug = $primera_letra . ($length->count() + 1);
        // }

        if ($request->has('estrategias')) {
            $objetivo->estrategias()->sync($request->estrategias);
        }

        return redirect()->route('perspectivas.index')
            ->with('msg', 'Registro editado con exito');
    }

    public function destroy(Perspectiva $perspectiva, Objetivo $objetivo)
    {
        $objetivo->delete();
        return redirect()->route('perspectivas.index')
            ->with('msg', 'Registro eliminado con exito');
    }

    public function asignarEstrategias($objetivo_id)
    {
        $objetivo = Objetivo::findOrFail($objetivo_id);
        $estrategias = Estrategia::all();
        return view('admin.objetivos.asignarEstrategia', [
            'estrategias' => $estrategias,
            'objetivo' => $objetivo,
        ]);
    }
    public function asignar(Request $request, $id)
    {
        $messages = [
            'required' => 'El objetivo debe tener :attribute, como minimo uno.',
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

        return redirect()->route('perspectivas.index')
            ->with('msg', 'Estrategias asignadas con exitó');

    }
}
