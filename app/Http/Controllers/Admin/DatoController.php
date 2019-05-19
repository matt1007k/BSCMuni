<?php

namespace App\Http\Controllers\Admin;

use App\Dato;
use App\Http\Controllers\Controller;
use App\Indicador;
use App\Perspectiva;
use Illuminate\Http\Request;

class DatoController extends Controller
{

    public function index(Request $request)
    {
        $slug = $request->perspectiva;
        if (!isset($request->perspectiva)) {
            $slug = 'FI';
        }

        $perspectivas = Perspectiva::orderBy('titulo', 'asc')->get();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('admin.datos.index', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
        ]);
    }

    public function create($objetivo_id)
    {

        return view('admin.datos.create', [
            'objetivo_id' => $objetivo_id,
        ]);
    }

    public function grafica($indicador_id)
    {
        $indicador = Indicador::findOrFail($indicador_id);

        $datos = array();

        foreach ($indicador->datos as $dato) {

            array_push($datos, (object) [
                "label" => $dato->anio,
                "backgroundColor" => "rgb($dato->enero, $dato->diciembre, $dato->total)",
                //Data to be represented on y-axis
                "data" => [
                    $dato->enero,
                    $dato->febrero,
                    $dato->marzo,
                    $dato->abril,
                    $dato->mayo,
                    $dato->junio,
                    $dato->julio,
                    $dato->agosto,
                    $dato->septiembre,
                    $dato->octubre,
                    $dato->noviembre,
                    $dato->diciembre,
                ],
            ]);
        }

        // return $datos;
        return view('admin.datos.grafico', ['datos' => $datos]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'indicador' => 'required|max:200',
            'tipo' => 'required',
            'unidad' => 'required',
            'tiempo' => 'required',
            'meta' => 'required|integer',
            'verde' => 'required|max:30',
            'amarillo' => 'required|max:30',
            'rojo' => 'required|max:30',
        ]);

        $indicador = new Dato();
        $indicador->indicador = $request->indicador;
        $indicador->tipo = $request->tipo;
        $indicador->unidad = $request->unidad;
        $indicador->tiempo = $request->tiempo;
        $indicador->meta = $request->meta;
        $indicador->verde = $request->verde;
        $indicador->amarillo = $request->amarillo;
        $indicador->rojo = $request->rojo;
        $indicador->objetivo_id = $request->objetivo_id;

        if ($indicador->save()) {
            return redirect()->route('datos.index')
                ->with('msg', 'Indicador registrado correctamente');
        } else {
            return back();
        }

    }

    public function edit($id, $objetivo_id)
    {
        $indicador = Indicador::findOrFail($id);

        return view('admin.datos.edit', [
            'indicador' => $indicador,
            'objetivo_id' => $objetivo_id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'indicador' => 'required|max:200',
            'tipo' => 'required',
            'unidad' => 'required',
            'tiempo' => 'required',
            'meta' => 'required|integer',
            'verde' => 'required|max:30',
            'amarillo' => 'required|max:30',
            'rojo' => 'required|max:30',
        ]);

        $indicador = Indicador::findOrFail($id);
        $indicador->indicador = $request->indicador;
        $indicador->tipo = $request->tipo;
        $indicador->unidad = $request->unidad;
        $indicador->tiempo = $request->tiempo;
        $indicador->meta = $request->meta;
        $indicador->verde = $request->verde;
        $indicador->amarillo = $request->amarillo;
        $indicador->rojo = $request->rojo;
        $indicador->objetivo_id = $request->objetivo_id;

        if ($indicador->save()) {
            return redirect()->route('datos.index')
                ->with('msg', 'Indicador modifico correctamente');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $indicador = Indicador::findOrFail($id);
        if ($indicador->delete()) {
            return redirect()->route('datos.index')
                ->with('msg', 'Indicador eliminado correctamente');
        } else {
            return redirect()->route('datos.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}