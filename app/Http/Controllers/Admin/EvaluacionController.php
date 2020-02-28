<?php

namespace App\Http\Controllers\Admin;

use App\Actividad;
use App\Amenaza;
use App\Area;
use App\Debilidad;
use App\Factor;
use App\Fortaleza;
use App\Fuerza;
use App\Http\Controllers\Controller;
use App\Oportunidad;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{

    public function interno()
    {
        $areas = Area::orderBy('titulo')->paginate(6);

        return view('admin.evaluacion.interno', [
            'areas' => $areas,
        ]);
    }

    public function externo()
    {
        $fuerzas = Fuerza::orderBy('titulo')->paginate(6);

        return view('admin.evaluacion.externo', [
            'fuerzas' => $fuerzas,
        ]);
    }

    public function internoEditar($id)
    {
        $actividad = Actividad::findOrFail($id);

        return view('admin.evaluacion.internoEditar', ['actividad' => $actividad]);
    }

    public function externoEditar($id)
    {
        $factor = Factor::findOrFail($id);

        return view('admin.evaluacion.externoEditar', ['factor' => $factor]);
    }

    public function evaluacionInterno(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);

        $evaluacion = $this->evaluarFactorInterno($actividad, $request);

        if ($evaluacion) {
            $fortaleza = Fortaleza::where('actividad_id', $actividad->id)->first();
            $debilidad = Debilidad::where('actividad_id', $actividad->id)->first();
            if ($fortaleza) {
                if ($actividad->valor < 0) {
                    $numero = 1;
                    $fortaleza->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Fortaleza::all();
                    if (count($slugUpdate) > 0) {
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'F' . $numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las debilidades
                    $length = Debilidad::all();
                    $debilidad = new Debilidad();
                    $debilidad->titulo = $actividad->titulo;
                    $debilidad->slug = 'D' . ($length->count() + 1);
                    $debilidad->actividad_id = $fortaleza->actividad_id;
                    $debilidad->save();
                } else {

                    return redirect()->route('factor.interno')->with('msg', 'La calificacion no se realizo');
                }
            } else if ($debilidad) {
                if ($actividad->valor > 0) {
                    $numero = 1;
                    $debilidad->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Debilidad::all();
                    if (count($slugUpdate) > 0) {
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'D' . $numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las fortalezas
                    $length = Fortaleza::all();
                    $fortaleza = new Fortaleza();
                    $fortaleza->titulo = $actividad->titulo;
                    $fortaleza->slug = 'F' . ($length->count() + 1);
                    $fortaleza->actividad_id = $debilidad->actividad_id;
                    $fortaleza->save();
                } else {
                    return redirect()->route('factor.interno')->with('msg', 'La calificacion no se ha realizado');

                }
            } else {
                if ($actividad->valor > 0) {
                    $length = Fortaleza::all();
                    $fortaleza = new Fortaleza();
                    $fortaleza->titulo = $actividad->titulo;
                    $fortaleza->slug = 'F' . ($length->count() + 1);
                    $fortaleza->actividad_id = $actividad->id;
                    $fortaleza->save();
                } else if ($actividad->valor < 0) {

                    $length = Debilidad::all();
                    $debilidad = new Debilidad();
                    $debilidad->titulo = $actividad->titulo;
                    $debilidad->slug = 'D' . ($length->count() + 1);
                    $debilidad->actividad_id = $actividad->id;
                    $debilidad->save();

                }
            }

            return redirect()->route('factor.interno')->with('msg', 'La calificacion se ha realizado con exito');
        } else {
            return back();
        }
    }

    public function evaluacionExterno(Request $request, $id)
    {
        $factor = Factor::findOrFail($id);

        $evaluacion = $this->evaluarFactorExterno($factor, $request);

        if ($evaluacion) {
            $oportunidad = Oportunidad::where('factor_id', $factor->id)->first();
            $amenaza = Amenaza::where('factor_id', $factor->id)->first();
            if ($oportunidad) {
                if ($factor->valor < 0) {
                    $numero = 1;
                    $oportunidad->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Oportunidad::all();
                    if (count($slugUpdate) > 0) {
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'O' . $numero++;
                            $value->save();
                        }
                    }

                    // Copiamos a las amenazas
                    $length = Amenaza::all();
                    $amenaza = new Amenaza();
                    $amenaza->titulo = $factor->titulo;
                    $amenaza->slug = 'A' . ($length->count() + 1);
                    $amenaza->factor_id = $oportunidad->factor_id;
                    $amenaza->save();
                } else {

                    return redirect()->route('factor.externo')->with('msg', 'La calificacion no se realizo');
                }
            } else if ($amenaza) {
                if ($factor->valor > 0) {
                    $numero = 1;
                    $amenaza->delete();
                    // Actualizamos el slug en orden ascendente
                    $slugUpdate = Amenaza::all();
                    if (count($slugUpdate) > 0) {
                        foreach ($slugUpdate as $key => $value) {
                            $value->slug = 'A' . $numero++;
                            $value->save();
                        }
                    }
                    // Copiamos a las oportunidads
                    $length = Oportunidad::all();
                    $oportunidad = new Oportunidad();
                    $oportunidad->titulo = $factor->titulo;
                    $oportunidad->slug = 'O' . ($length->count() + 1);
                    $oportunidad->factor_id = $amenaza->factor_id;
                    $oportunidad->save();
                } else {
                    return redirect()->route('factor.externo')->with('msg', 'La calificacion no se ha realizado');

                }
            } else {
                if ($factor->valor > 0) {
                    $length = Oportunidad::all();
                    $oportunidad = new Oportunidad();
                    $oportunidad->titulo = $factor->titulo;
                    $oportunidad->slug = 'O' . ($length->count() + 1);
                    $oportunidad->factor_id = $factor->id;
                    $oportunidad->save();
                } else if ($factor->valor < 0) {

                    $length = Amenaza::all();
                    $amenaza = new Amenaza();
                    $amenaza->titulo = $factor->titulo;
                    $amenaza->slug = 'A' . ($length->count() + 1);
                    $amenaza->factor_id = $factor->id;
                    $amenaza->save();

                }
            }

            return redirect()->route('factor.externo')->with('msg', 'La calificacion se realizo con exito');
        } else {
            return back();
        }
    }

    public function evaluarFactorInterno($actividad, $request)
    {
        if ($request->importancia === '3') {
            $actividad->alta = (int) $request->importancia;
            $actividad->media = 0;
            $actividad->baja = 0;
        } elseif ($request->importancia === '2') {
            $actividad->media = (int) $request->importancia;
            $actividad->alta = 0;
            $actividad->baja = 0;
        } elseif ($request->importancia === '1') {
            $actividad->baja = (int) $request->importancia;
            $actividad->alta = 0;
            $actividad->media = 0;
        }

        if ($request->desempeno === '2') {
            $actividad->muy_bueno = (int) $request->desempeno;
            $actividad->bueno = 0;
            $actividad->deficiente = 0;
            $actividad->muy_deficiente = 0;
        } elseif ($request->desempeno === '1') {
            $actividad->bueno = (int) $request->desempeno;
            $actividad->muy_bueno = 0;
            $actividad->deficiente = 0;
            $actividad->muy_deficiente = 0;
        } elseif ($request->desempeno === '-1') {
            $actividad->deficiente = (int) $request->desempeno;
            $actividad->muy_bueno = 0;
            $actividad->bueno = 0;
            $actividad->muy_deficiente = 0;
        } elseif ($request->desempeno === '-2') {
            $actividad->muy_deficiente = (int) $request->desempeno;
            $actividad->muy_bueno = 0;
            $actividad->bueno = 0;
            $actividad->deficiente = 0;
        }

        $valor = (($actividad->alta + $actividad->media + $actividad->baja) * ($actividad->muy_bueno + $actividad->bueno + $actividad->deficiente + $actividad->muy_deficiente));

        $actividad->valor = $valor;
        return $actividad->save();
    }

    public function evaluarFactorExterno($factor, $request)
    {
        if ($request->probabilidad === '3') {
            $factor->alta = (int) $request->probabilidad;
            $factor->media = 0;
            $factor->baja = 0;
        } elseif ($request->probabilidad === '2') {
            $factor->media = (int) $request->probabilidad;
            $factor->alta = 0;
            $factor->baja = 0;
        } elseif ($request->probabilidad === '1') {
            $factor->baja = (int) $request->probabilidad;
            $factor->alta = 0;
            $factor->media = 0;
        }

        if ($request->impacto === '2') {
            $factor->muy_positivo = (int) $request->impacto;
            $factor->positivo = 0;
            $factor->negativo = 0;
            $factor->muy_negativo = 0;
        } elseif ($request->impacto === '1') {
            $factor->positivo = (int) $request->impacto;
            $factor->muy_positivo = 0;
            $factor->negativo = 0;
            $factor->muy_negativo = 0;
        } elseif ($request->impacto === '-1') {
            $factor->negativo = (int) $request->impacto;
            $factor->muy_positivo = 0;
            $factor->positivo = 0;
            $factor->muy_negativo = 0;
        } elseif ($request->impacto === '-2') {
            $factor->muy_negativo = (int) $request->impacto;
            $factor->muy_positivo = 0;
            $factor->positivo = 0;
            $factor->negativo = 0;
        }

        $valor = (($factor->alta + $factor->media + $factor->baja) * ($factor->muy_positivo + $factor->positivo + $factor->negativo + $factor->muy_negativo));

        $factor->valor = $valor;
        return $factor->save();
    }

}
