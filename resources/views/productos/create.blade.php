@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Nuevo Producto
        </h3>
    </div>

    <form action="{{ route('productos.store') }}" method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Nombre</label>
                <input type="text"
                       name="nombre"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Precio</label>
                <input type="number"
                       step="0.01"
                       name="precio"
                       class="form-control"
                       required>
            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">
                Guardar
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
