<?php

namespace App\Http\Controllers;

use App\Models\Transportista;
use Illuminate\Http\Request;

class TransportistaController extends Controller
{
    public function index()
    {
        return view('transportistas.index', [
            'transportistas' => Transportista::all()
        ]);
    }

    public function create()
    {
        return view('transportistas.create');
    }

    public function store(Request $request)
{
    $transportista = new Transportista();

    $transportista->nombre = $request->nombre;
    $transportista->telefono = $request->telefono;
    $transportista->estado = 'activo';
    $transportista->registradopor = auth()->user()->name;

    $transportista->save();

    return redirect()->route('transportistas.index')
        ->with('successMsg', 'Transportista registrado correctamente');
}

    public function edit($id)
    {
        return view('transportistas.edit', [
            'transportista' => Transportista::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
{
    $transportista = Transportista::findOrFail($id);

    $transportista->nombre = $request->nombre;
    $transportista->telefono = $request->telefono;

    $transportista->save();

    return redirect()->route('transportistas.index')
        ->with('successMsg', 'Transportista actualizado correctamente');
}
    public function destroy($id)
    {
        Transportista::destroy($id);
        return back()->with('successMsg', 'Eliminado');
    }
    public function cambioEstado(Request $request)
{
    $transportista = Transportista::find($request->id);

    $transportista->estado = $request->estado;

    $transportista->save();

    return response()->json([
        'success' => true
    ]);
}
}
