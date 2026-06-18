<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedido {{ $pedido->numero_pedido }}</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        .seccion{
            margin-bottom:15px;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:10px;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:8px;
        }

        th{
            background:#eaeaea;
        }

    </style>

</head>
<body>

<h2>Detalle del Pedido</h2>

<div class="seccion">

    <h3>Información General</h3>

    <p><strong>Número Pedido:</strong> {{ $pedido->numero_pedido }}</p>

    <p><strong>Fecha Pedido:</strong> {{ $pedido->fecha_pedido }}</p>

    <p><strong>Fecha Estimada:</strong> {{ $pedido->fecha_estimada_entrega }}</p>

    <p><strong>Estado Pedido:</strong>
        {{ $pedido->estadoPedido->nombre_estado ?? 'Sin estado' }}
    </p>

    <p><strong>Estado Registro:</strong>
        {{ $pedido->estado }}
    </p>

    <p><strong>Registrado por:</strong>
        {{ $pedido->registradopor }}
    </p>

</div>

<hr>

<div class="seccion">

    <h3>Cliente</h3>

    <p><strong>Nombre:</strong>
        {{ $pedido->cliente->nombre ?? '' }}
    </p>

    <p><strong>Correo:</strong>
        {{ $pedido->cliente->correo ?? '' }}
    </p>

    <p><strong>Teléfono:</strong>
        {{ $pedido->cliente->telefono ?? '' }}
    </p>

</div>

<hr>

<div class="seccion">

    <h3>Dirección de Entrega</h3>

    <p><strong>Dirección:</strong>
        {{ $pedido->direccion->direccion ?? '' }}
    </p>

    <p><strong>Ciudad:</strong>
        {{ $pedido->direccion->ciudad ?? '' }}
    </p>

    <p><strong>País:</strong>
        {{ $pedido->direccion->pais ?? '' }}
    </p>

</div>

<hr>

<div class="seccion">

    <h3>Transportista</h3>

    <p><strong>Nombre:</strong>
        {{ $pedido->transportista->nombre ?? '' }}
    </p>

    <p><strong>Teléfono:</strong>
        {{ $pedido->transportista->telefono ?? '' }}
    </p>

</div>

<hr>

<div class="seccion">

    <h3>Productos del Pedido</h3>

    <table>

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

                <td>
                    {{ $detalle->producto->nombre }}
                </td>

                <td>
                    ${{ number_format($detalle->producto->precio,2) }}
                </td>

                <td>
                    {{ $detalle->cantidad }}
                </td>

                <td>
                    ${{ number_format($subtotal,2) }}
                </td>

            </tr>

        @endforeach

        <tr>

            <td colspan="3" align="right">
                <strong>Total</strong>
            </td>

            <td>
                <strong>
                    ${{ number_format($total,2) }}
                </strong>
            </td>

        </tr>

        </tbody>

    </table>

</div>

</body>
</html>