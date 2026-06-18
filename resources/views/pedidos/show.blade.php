@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="card">

            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">
                    Pedido #{{ $pedido->numero_pedido }}
                </h3>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <h5><strong>Información General</strong></h5>

                        <p>
                            <strong>Número:</strong>
                            {{ $pedido->numero_pedido }}
                        </p>

                        <p>
                            <strong>Fecha Pedido:</strong>
                            {{ $pedido->fecha_pedido }}
                        </p>

                        <p>
                            <strong>Entrega Estimada:</strong>
                            {{ $pedido->fecha_estimada_entrega }}
                        </p>

                        <p>
                            <strong>Estado:</strong>
                            {{ $pedido->estadoPedido->nombre_estado ?? 'Sin estado' }}
                        </p>

                    </div>

                    <div class="col-md-6">

                        <h5><strong>Cliente</strong></h5>

                        <p>
                            <strong>Nombre:</strong>
                            {{ $pedido->cliente->nombre ?? '' }}
                        </p>

                        <p>
                            <strong>Correo:</strong>
                            {{ $pedido->cliente->correo ?? '' }}
                        </p>

                        <p>
                            <strong>Teléfono:</strong>
                            {{ $pedido->cliente->telefono ?? '' }}
                        </p>

                        <p>
                            <strong>Dirección:</strong>
                            {{ $pedido->direccion->direccion ?? '' }}
                        </p>

                    </div>

                </div>

                <hr>

                <h5>
                    <strong>Transportista</strong>
                </h5>

                <p>
                    {{ $pedido->transportista->nombre ?? '' }}
                </p>

                <p>
                    {{ $pedido->transportista->telefono ?? '' }}
                </p>

                <hr>

                <h5>
                    <strong>Productos del Pedido</strong>
                </h5>

                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @php
                            $total = 0;
                        @endphp

                        @foreach($pedido->detalles as $detalle)

                            @php
                                $subtotal = $detalle->producto->precio * $detalle->cantidad;
                                $total += $subtotal;
                            @endphp

                            <tr>

                                <td>{{ $detalle->producto->nombre }}</td>

                                <td>
                                    ${{ number_format($detalle->producto->precio, 2) }}
                                </td>

                                <td>{{ $detalle->cantidad }}</td>

                                <td>
                                    ${{ number_format($subtotal, 2) }}
                                </td>

                            </tr>

                        @endforeach

                        <tr>

                            <td colspan="3" class="text-end">
                                <strong>Total</strong>
                            </td>

                            <td>
                                <strong>
                                    ${{ number_format($total, 2) }}
                                </strong>
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

            <div class="card-footer">

                <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">

                    Volver

                </a>

            </div>

        </div>

    </div>

@endsection