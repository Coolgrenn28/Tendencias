@extends('layouts.app')

@section('content')

<div class="container-fluid">

```
<div class="card">

    <div class="card-header bg-dark">
        <h3 class="card-title text-white">
            Nuevo Estado de Pedido
        </h3>
    </div>

    <form action="{{ route('estados.store') }}" method="POST">

        @csrf

        <div class="card-body">

            <div class="form-group">
                <label>Nombre del Estado</label>
                <input type="text"
                       name="nombre_estado"
                       class="form-control"
                       required>
            </div>

        </div>

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">
                Guardar
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
