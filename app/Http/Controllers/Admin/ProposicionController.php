<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Proposicion;
use Illuminate\Http\Request;

class ProposicionController extends Controller
{

    public function index()
    {
        $proposicion = Proposicion::first();
        return view('admin.proposiciones.index', ['proposicion' => $proposicion]);
    }

    public function create()
    {
        return view('admin.proposiciones.create', ['proposicion' => new Proposicion]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'segmento' => 'required',
            'propuesta' => 'required',
            'elementos' => 'required',
            'estrategias' => 'required',
        ]);

        Proposicion::create($request->all());

        return redirect()->route('proposiciones.index')->with('msg', 'Registro completado con exito');
    }

    public function edit($id)
    {
        return view('admin.proposiciones.edit', ['proposicion' => Proposicion::find($id)]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'segmento' => 'required',
            'propuesta' => 'required',
            'elementos' => 'required',
            'estrategias' => 'required',
        ]);

        Proposicion::find($id)->update($request->all());

        return redirect()->route('proposiciones.index')->with('msg', 'Edicion completada con exito');
    }

    public function destroy($id)
    {
        Proposicion::find($id)->delete();
        return redirect()->route('proposiciones.index')->with('msg', 'Registro eliminado con exito');
    }
}
