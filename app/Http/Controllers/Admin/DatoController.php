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
            $slug = Perspectiva::first()->slug;
        }

        $perspectivas = Perspectiva::all();
        $perspectivaObjetivos = Perspectiva::where('slug', $slug)->first();

        return view('admin.datos.index', [
            'perspectivas' => $perspectivas,
            'perspectivaObjetivos' => $perspectivaObjetivos,
        ]);
    }

    public function create($indicador_id)
    {

        return view('admin.datos.create', [
            'indicador_id' => $indicador_id,
            'dato' => new Dato,
        ]);
    }

    public function grafica($indicador_id)
    {
        $indicador = Indicador::findOrFail($indicador_id);

        $datos = array();

        foreach ($indicador->datos as $dato) {
            $random_number1 = rand(0, 255);
            $random_number2 = rand(0, 255);
            $random_number3 = rand(0, 255);
            array_push($datos, (object) [
                "label" => $dato->anio,
                "backgroundColor" => "rgb($random_number1, $random_number2, $random_number3)",
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
        return view('admin.datos.grafico', ['datos' => $datos, 'indicador' => $indicador]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'anio' => 'required|unique:datos,anio,NULL,id,indicador_id,' . $request->indicador_id,
            'enero' => 'required',
            'febrero' => 'required',
            'marzo' => 'required',
            'abril' => 'required',
            'mayo' => 'required',
            'junio' => 'required',
            'julio' => 'required',
            'agosto' => 'required',
            'septiembre' => 'required',
            'octubre' => 'required',
            'noviembre' => 'required',
            'diciembre' => 'required',
        ]);

        $dato = new Dato();
        $indicador = Indicador::findOrfail($request->indicador_id);

        $dato->anio = $request->anio;
        $dato->enero = $request->enero;
        $dato->febrero = $request->febrero;
        $dato->marzo = $request->marzo;
        $dato->abril = $request->abril;
        $dato->mayo = $request->mayo;
        $dato->junio = $request->junio;
        $dato->julio = $request->julio;
        $dato->agosto = $request->agosto;
        $dato->septiembre = $request->septiembre;
        $dato->octubre = $request->octubre;
        $dato->noviembre = $request->noviembre;
        $dato->diciembre = $request->diciembre;

        $total = ($dato->enero + $dato->febrero + $dato->marzo + $dato->abril + $dato->mayo + $dato->junio + $dato->julio + $dato->agosto + $dato->septiembre + $dato->octubre + $dato->noviembre + $dato->diciembre);
        $dato->total = $total;
        $dato->indicador_id = $request->indicador_id;

        $porcentaje = 0;

        if ($indicador->tipo == 'porcentaje') {
            $porcentaje = number_format(($total / ($indicador->datos->sum('total') + $total)) * 100, 2);
        } elseif ($indicador->tipo == 'reducir') {
            foreach ($indicador->datos as $dato_db) {
                if (count($indicador->datos) > 0) {
                    $porcentaje = number_format((($dato_db->total - $total) / $dato_db->total) * 100, 2);
                    $dato->anterior = $dato_db->id;
                }
            }
        } elseif ($indicador->tipo == 'incremento') {
            foreach ($indicador->datos as $dato_db) {
                if (count($indicador->datos) > 0) {
                    $porcentaje = number_format((($total - $dato_db->total) / $total) * 100, 2);
                    $dato->anterior = $dato_db->id;

                }
            }
        } else {
            $porcentaje = 0;
        }

        $dato->porcentaje = round($porcentaje);

        if ($dato->save()) {
            $indicador_db = Indicador::findOrfail($request->indicador_id);
            if ($indicador_db->datos->count() > 0) {

                if ($indicador_db->tipo == 'porcentaje') {

                    foreach ($indicador_db->datos as $dato_db) {
                        if (isset($indicador_db)) {
                            $porcentaje_new = 0;
                            if ($dato->id == $dato_db->id) {
                                $porcentaje_new = number_format(($total / $indicador_db->datos->sum('total')) * 100, 2);

                            } else {
                                $porcentaje_new = number_format(($dato_db->total / $indicador_db->datos->sum('total')) * 100, 2);

                            }
                            $dato_db->porcentaje = round($porcentaje_new);
                            $dato_db->save();
                        }
                    };
                }
            }
            return redirect()->route('datos.index')
                ->with('msg', 'Datos registrados con exito');
        } else {
            return back();
        }

    }

    public function edit($id, $indicador_id)
    {
        $dato = Dato::findOrFail($id);

        return view('admin.datos.edit', [
            'dato' => $dato,
            'indicador_id' => $indicador_id,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'anio' => "required|unique:datos,anio,$id,id,indicador_id," . $request->indicador_id,
            'enero' => 'required',
            'febrero' => 'required',
            'marzo' => 'required',
            'abril' => 'required',
            'mayo' => 'required',
            'junio' => 'required',
            'julio' => 'required',
            'agosto' => 'required',
            'septiembre' => 'required',
            'octubre' => 'required',
            'noviembre' => 'required',
            'diciembre' => 'required',
        ]);
        $dato = Dato::findOrFail($id);
        $indicador = $dato->indicador;

        $dato->anio = $request->anio;
        $dato->enero = $request->enero;
        $dato->febrero = $request->febrero;
        $dato->marzo = $request->marzo;
        $dato->abril = $request->abril;
        $dato->mayo = $request->mayo;
        $dato->junio = $request->junio;
        $dato->julio = $request->julio;
        $dato->agosto = $request->agosto;
        $dato->septiembre = $request->septiembre;
        $dato->octubre = $request->octubre;
        $dato->noviembre = $request->noviembre;
        $dato->diciembre = $request->diciembre;

        $total = ($dato->enero + $dato->febrero + $dato->marzo + $dato->abril + $dato->mayo + $dato->junio + $dato->julio + $dato->agosto + $dato->septiembre + $dato->octubre + $dato->noviembre + $dato->diciembre);

        $dato->indicador_id = $request->indicador_id;

        $diferencia = 0;
        $porcentaje = 0;
        if ($dato->total !== $total) {
            $diferencia = $dato->total - $total;
        }

        foreach ($indicador->datos as $dato_db) {
            if ($indicador->tipo == 'porcentaje') {
                if (count($indicador->datos) > 0) {
                    if ($dato->total !== $total) {
                        if ($id == $dato_db->id) {
                            $porcentaje = number_format(($total / ($indicador->datos->sum('total') - $diferencia)) * 100, 2);}
                    } else {
                        $porcentaje = $dato->porcentaje;
                    }
                }
            } elseif ($indicador->tipo == 'reducir') {
                if (count($indicador->datos) >= 1) {
                    if ($dato->total != $total) {
                        if ($id == $dato_db->id) {
                            $anterior = Dato::findOrfail($dato_db->anterior);
                            $porcentaje = number_format((($anterior->total - $total) / $anterior->total) * 100, 2);
                        }
                    } else {
                        $porcentaje = $dato->porcentaje;
                    }
                }
            } elseif ($indicador->tipo == 'incremento') {
                if (count($indicador->datos) >= 1) {
                    if ($dato->total != $total) {
                        if ($id == $dato_db->id) {
                            $anterior = Dato::findOrfail($dato_db->anterior);
                            $porcentaje = number_format((($total - $anterior->total) / $total) * 100, 2);
                        }
                    } else {
                        $porcentaje = $dato->porcentaje;
                    }

                }
            } else {
                $porcentaje = 0;
            }
        }
        // return round($porcentaje);
        $dato->total = $total;
        $dato->porcentaje = round($porcentaje);

        if ($dato->save()) {
            if (count($indicador->datos) > 0) {
                if ($indicador->tipo == 'porcentaje') {
                    // return $indicador->datos;
                    foreach ($indicador->datos as $dato_db) {

                        $porcentaje_new = 0;
                        if ($dato->id == $dato_db->id) {
                            $porcentaje_new = number_format((($total / ($indicador->datos->sum('total') - $diferencia)) * 100), 2);
                        } else {
                            $porcentaje_new = number_format((($dato_db->total / ($indicador->datos->sum('total') - $diferencia)) * 100), 2);
                        }
                        $dato_db->porcentaje = round($porcentaje_new);
                        $dato_db->save();

                    }
                }
            }
            return redirect()->route('datos.index')
                ->with('msg', 'Datos editados con exito');
        } else {
            return back();
        }
    }

    public function destroy($id)
    {
        $dato = Dato::findOrFail($id);
        $indicador = $dato->indicador;
        $total_deleted = $dato->total;
        if ($dato->delete()) {

            if (count($indicador->datos) > 0) {
                if ($indicador->tipo == 'porcentaje') {
                    // return $indicador->datos;
                    foreach ($indicador->datos as $dato_db) {

                        $porcentaje_new = 0;
                        $porcentaje_new = number_format((($dato_db->total / ($indicador->datos->sum('total') - $total_deleted)) * 100), 2);

                        $dato_db->porcentaje = round($porcentaje_new);
                        $dato_db->save();

                    }
                }
            }

            return redirect()->route('datos.index')
                ->with('msg', 'Datos eliminados con exito');
        } else {
            return redirect()->route('datos.index')
                ->with('msg', 'Error al eliminar el registro');
        }
    }
}
