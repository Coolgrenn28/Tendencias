@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Editar Transportista
        </h3>
    </div>

    <form action="{{ route('transportistas.update', $transportista->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       value="{{ $transportista->nombre }}"
                       required>
            </div>

            <div class="form-group">
                <label>Teléfono</label>
                <input type="text"
                       name="telefono"
                       class="form-control"
                       value="{{ $transportista->telefono }}"
                       required>
            </div>

        </div>

        <div class="card-footer">

            <button type="submit" class="btn btn-warning">
                Actualizar
            </button>

            <a href="{{ route('transportistas.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </div>

    </form>

</div>
```

</div>

@endsection
