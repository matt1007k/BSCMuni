<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Perspectiva;
use App\Relacion;
use Illuminate\Http\Request;

class MapaController extends Controller
{
    public function index()
    {
        $perspectivas = Perspectiva::all();
        $relaciones = Relacion::all();
        return view('admin.objetivos.mapa-estrategico', [
            'perspectivas' => $perspectivas,
            'relaciones' => $relaciones,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['relacion' => ['required']]);

        $relacion = Relacion::create(['campos' => $request->relacion]);

        if ($relacion) {
            return back()->with('msg', 'Registro creado con exito');
        }
    }

    public function destroy($id)
    {
        $relacion = Relacion::findOrfail($id);

        if ($relacion->delete()) {
            return back()->with('msg', 'Registro eliminado con exito');
        }
    }

}
