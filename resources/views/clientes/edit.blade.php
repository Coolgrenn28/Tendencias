@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Editar Cliente
        </h3>
    </div>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="{{ $cliente->nombre }}" required>
            </div>

            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control"
                       value="{{ $cliente->correo }}" required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text" name="telefono" class="form-control"
                       value="{{ $cliente->telefono }}" required>
            </div>

            <div class="form-group">
                <label>Dirección</label>
                <input type="text" name="direccion" class="form-control"
                       value="{{ $cliente->direccion }}" required>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-warning">
                Actualizar
            </button>

            <a href="{{ route('clientes.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
```

</div>

@endsection
