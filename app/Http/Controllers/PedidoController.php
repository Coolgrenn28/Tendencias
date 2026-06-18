<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Direccion;
use App\Models\Transportista;
use App\Models\EstadoPedido;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::with('cliente', 'transportista', 'estadoPedido')->get();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        return view('pedidos.create', [
            'clientes' => Cliente::all(),
            'direcciones' => Direccion::all(),
            'transportistas' => Transportista::all(),
            'estados' => EstadoPedido::all()
        ]);
    }
    public function store(Request $request)
    {
        $pedido = new Pedido();

        $pedido->numero_pedido = $request->numero_pedido;
        $pedido->fecha_pedido = $request->fecha_pedido;
        $pedido->fecha_estimada_entrega = $request->fecha_estimada_entrega;

        $pedido->cliente_id = $request->cliente_id;
        $pedido->direccion_id = $request->direccion_id;
        $pedido->transportista_id = $request->transportista_id;
        $pedido->estado_actual = $request->estado_actual;

        $pedido->estado = 'activo';
        $pedido->registradopor = auth()->user()->name;

        $pedido->save();

        return redirect()->route('pedidos.index')
            ->with('successMsg', 'Pedido creado correctamente');
    }


    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);

        return view('pedidos.edit', [
            'pedido' => $pedido,
            'clientes' => Cliente::all(),
            'direcciones' => Direccion::all(),
            'transportistas' => Transportista::all(),
            'estados' => EstadoPedido::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->numero_pedido = $request->numero_pedido;
        $pedido->fecha_pedido = $request->fecha_pedido;
        $pedido->fecha_estimada_entrega = $request->fecha_estimada_entrega;

        $pedido->cliente_id = $request->cliente_id;
        $pedido->direccion_id = $request->direccion_id;
        $pedido->transportista_id = $request->transportista_id;
        $pedido->estado_actual = $request->estado_actual;

        $pedido->save();

        return redirect()->route('pedidos.index')
            ->with('successMsg', 'Pedido actualizado correctamente');
    }
    public function show($id)
    {
        $pedido = Pedido::with([
            'cliente',
            'transportista',
            'estadoPedido',
            'direccion',
            'detalles.producto'
        ])->findOrFail($id);

        return view('pedidos.show', compact('pedido'));
    }

    public function destroy($id)
    {
        Pedido::destroy($id);

        return back()->with('successMsg', 'Pedido eliminado');
    }

    // 🔍 TRACKING
    public function trackingForm()
    {
        return view('tracking.index');
    }

    public function trackingBuscar(Request $request)
    {
        $pedido = Pedido::where('numero_pedido', $request->numero_pedido)
            ->with('estadoPedido', 'cliente', 'transportista')
            ->first();

        return view('tracking.resultado', compact('pedido'));
    }

    public function cambioEstado(Request $request)
    {
        $pedido = Pedido::find($request->id);

        $pedido->estado = $request->estado;

        $pedido->save();

        return response()->json([
            'success' => true
        ]);
    }
    public function pdf($id)
{
    $pedido = Pedido::with([
        'cliente',
        'direccion',
        'transportista',
        'estadoPedido',
        'detalles.producto'
    ])->findOrFail($id);

    $pdf = Pdf::loadView(
        'pedidos.pdf',
        compact('pedido')
    );

    return $pdf->stream(
        'pedido_'.$pedido->numero_pedido.'.pdf'
    );
}
}