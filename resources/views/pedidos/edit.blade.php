@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Editar Pedido
        </h3>
    </div>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Número Pedido</label>
                <input type="text"
                       name="numero_pedido"
                       class="form-control"
                       value="{{ $pedido->numero_pedido }}"
                       required>
            </div>

            <div class="form-group">
                <label>Fecha Pedido</label>
                <input type="datetime-local"
                       name="fecha_pedido"
                       class="form-control"
                       value="{{ date('Y-m-d\TH:i', strtotime($pedido->fecha_pedido)) }}"
                       required>
            </div>

            <div class="form-group">
                <label>Fecha Estimada Entrega</label>
                <input type="datetime-local"
                       name="fecha_estimada_entrega"
                       class="form-control"
                       value="{{ $pedido->fecha_estimada_entrega ? date('Y-m-d\TH:i', strtotime($pedido->fecha_estimada_entrega)) : '' }}">
            </div>

            <div class="form-group">
                <label>Cliente</label>
                <select name="cliente_id" class="form-control">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}"
                            {{ $pedido->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <select name="direccion_id" class="form-control">
                    @foreach($direcciones as $direccion)
                        <option value="{{ $direccion->id }}"
                            {{ $pedido->direccion_id == $direccion->id ? 'selected' : '' }}>
                            {{ $direccion->direccion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Transportista</label>
                <select name="transportista_id" class="form-control">
                    @foreach($transportistas as $transportista)
                        <option value="{{ $transportista->id }}"
                            {{ $pedido->transportista_id == $transportista->id ? 'selected' : '' }}>
                            {{ $transportista->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Estado Pedido</label>
                <select name="estado_actual" class="form-control">
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}"
                            {{ $pedido->estado_actual == $estado->id ? 'selected' : '' }}>
                            {{ $estado->nombre_estado }}
                        </option>
                    @endforeach
                </select>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-warning">
                Actualizar
            </button>

            <a href="{{ route('pedidos.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
```

</div>

@endsection
