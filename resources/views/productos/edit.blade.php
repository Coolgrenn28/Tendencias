@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Editar Producto
        </h3>
    </div>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="{{ $producto->nombre }}" required>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="number" step="0.01"
                       name="precio"
                       class="form-control"
                       value="{{ $producto->precio }}"
                       required>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-warning">
                Actualizar
            </button>

            <a href="{{ route('productos.index') }}"
               class="btn btn-secondary">
                Cancelar
            </a>
        </div>

    </form>

</div>
```

</div>

@endsection
