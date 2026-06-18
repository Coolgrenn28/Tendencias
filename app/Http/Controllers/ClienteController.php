<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Exports\ClientesExport;
use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

   public function store(Request $request)
{
    $cliente = new Cliente();

    $cliente->nombre = $request->nombre;
    $cliente->correo = $request->correo;
    $cliente->telefono = $request->telefono;
    $cliente->direccion = $request->direccion;
    $cliente->estado = 'activo';
    $cliente->registradopor = auth()->user()->name;

    $cliente->save();

    return redirect()->route('clientes.index')
        ->with('successMsg', 'Cliente registrado correctamente');
}

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
{
    $cliente = Cliente::findOrFail($id);

    $cliente->nombre = $request->nombre;
    $cliente->correo = $request->correo;
    $cliente->telefono = $request->telefono;
    $cliente->direccion = $request->direccion;

    $cliente->save();

    return redirect()->route('clientes.index')
        ->with('successMsg', 'Cliente actualizado correctamente');
}

    public function destroy($id)
    {
        Cliente::destroy($id);
        return back()->with('successMsg', 'Cliente eliminado');
    }

    public function cambioEstado(Request $request)
{
    $cliente = Cliente::find($request->id);

    $cliente->estado = $request->estado;

    $cliente->save();

    return response()->json([
        'success' => true
    ]);   
}

public function exportExcel()
{
    return Excel::download(
        new ClientesExport,
        'clientes.xlsx'
    );
}




}