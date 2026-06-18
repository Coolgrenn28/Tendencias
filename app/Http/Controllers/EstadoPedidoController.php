<?php

namespace App\Http\Controllers;

use App\Models\EstadoPedido;
use Illuminate\Http\Request;

class EstadoPedidoController extends Controller
{
    public function index()
    {
        return view('estados.index', [
            'estados' => EstadoPedido::all()
        ]);
    }

    public function create()
    {
        return view('estados.create');
    }

    public function store(Request $request)
{
    $estadoPedido = new EstadoPedido();

    $estadoPedido->nombre_estado = $request->nombre_estado;
    $estadoPedido->estado = 'activo';
    $estadoPedido->registradopor = auth()->user()->name;

    $estadoPedido->save();

    return redirect()->route('estados.index')
        ->with('successMsg', 'Estado registrado correctamente');
}

    public function edit($id)
    {
        return view('estados.edit', [
            'estado' => EstadoPedido::findOrFail($id)
        ]);
    }

   public function update(Request $request, $id)
{
    $estado = EstadoPedido::findOrFail($id);

    $estado->nombre_estado = $request->nombre_estado;

    $estado->save();

    return redirect()->route('estados.index')
        ->with('successMsg', 'Estado actualizado correctamente');
}

    public function destroy($id)
    {
        EstadoPedido::destroy($id);
        return back()->with('successMsg', 'Eliminado');
    }
    public function cambioEstado(Request $request)
{
    $estadopedido = EstadoPedido::find($request->id);

    $estadopedido->estado = $request->estado;

    $estadopedido->save();

    return response()->json([
        'success' => true
    ]);
}
}