@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        ```
        <div class="card">

            <div class="card-header bg-dark">
                <h3 class="card-title text-white">
                    Nuevo Pedido
                </h3>
            </div>

            <form action="{{ route('pedidos.store') }}" method="POST">

                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label>Número Pedido</label>
                        <input type="text" name="numero_pedido" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Fecha Pedido</label>
                        <input type="datetime-local" name="fecha_pedido" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Fecha Estimada Entrega</label>
                        <input type="datetime-local" name="fecha_estimada_entrega" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Cliente</label>
                        <select name="cliente_id" class="form-control" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">
                                    {{ $cliente->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Dirección</label>
                        <select name="direccion_id" class="form-control" required>
                            @foreach($direcciones as $direccion)
                                <option value="{{ $direccion->id }}">
                                    {{ $direccion->direccion }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Transportista</label>
                        <select name="transportista_id" class="form-control" required>
                            @foreach($transportistas as $transportista)
                                <option value="{{ $transportista->id }}">
                                    {{ $transportista->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Estado Pedido</label>
                        <select name="estado_actual" class="form-control" required>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}">
                                    {{ $estado->nombre_estado }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Guardar
                    </button>

                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>
        ```

    </div>

@endsection