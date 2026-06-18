@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Editar Estado de Pedido
        </h3>
    </div>

    <form action="{{ route('estados.update', $estado->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nombre del Estado</label>
                <input type="text"
                       name="nombre_estado"
                       class="form-control"
                       value="{{ $estado->nombre_estado }}"
                       required>
            </div>

        </div>

        <div class="card-footer">

            <button type="submit" class="btn btn-warning">
                Actualizar
            </button>

            <a href="{{ route('estados.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>

        </div>

    </form>

</div>
```

</div>

@endsection
