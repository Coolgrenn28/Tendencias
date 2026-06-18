<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('productos.index', [
            'productos' => Producto::all()
        ]);
    }

    public function create()
    {
        return view('productos.create');
    }

   

    public function edit($id)
    {
        return view('productos.edit', [
            'producto' => Producto::findOrFail($id)
        ]);
    }public function store(Request $request)
{
    $producto = new Producto();

    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->estado = 'activo';
    $producto->registradopor = auth()->user()->name;

    $producto->save();

    return redirect()->route('productos.index')
        ->with('successMsg', 'Producto registrado correctamente');
}

    public function update(Request $request, $id)
{
    $producto = Producto::findOrFail($id);

    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;

    $producto->save();

    return redirect()->route('productos.index')
        ->with('successMsg', 'Producto actualizado correctamente');
}

    public function destroy($id)
{
    try {

        Producto::destroy($id);

        return redirect()->route('productos.index')
            ->with('successMsg', 'Producto eliminado correctamente');

    } catch (\Exception $e) {

        return redirect()->route('productos.index')
            ->withErrors('No se puede eliminar el producto porque tiene pedidos asociados');

    }
}

    public function cambioEstado(Request $request)
{
    $producto = Producto::find($request->id);

    $producto->estado = $request->estado;

    $producto->save();

    return response()->json([
        'success' => true
    ]);

    
}
}