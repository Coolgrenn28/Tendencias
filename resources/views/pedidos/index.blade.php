@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card">
       <div class="card-header bg-dark"
     style="padding: 8px 15px; min-height: 40px;">

    <div class="d-flex justify-content-between align-items-center w-100">

        <h3 class="card-title text-white mb-0"
            style="font-size:17px; line-height:1;">
            Pedidos
        </h3>

        <a href="{{ route('pedidos.create') }}"
           class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
           style="width:30px; height:30px;"
           title="Nuevo">

            <i class="fas fa-plus"></i>

        </a>

    </div>

</div>

        <div class="card-body">
            <table class="table table-bordered">
               <thead>
<tr>
    <th>ID</th>
    <th>Número</th>
    <th>Cliente</th>
    <th>Dirección</th>
    <th>Transportista</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>Registrado Por</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>
@foreach($pedidos as $p)
<tr>
    <td>{{ $p->id }}</td>
    <td>{{ $p->numero_pedido }}</td>
    <td>{{ $p->cliente->nombre ?? '' }}</td>
    <td>{{ $p->direccion->direccion ?? '' }}</td>
    <td>{{ $p->transportista->nombre ?? '' }}</td>
    <td>

<input type="checkbox"
       class="toggle-class"
       data-id="{{ $p->id }}"
       data-type="pedido"
       {{ $p->estado == 1 ? 'checked' : '' }}
       data-toggle="toggle"
       data-on="Activo"
       data-off="Inactivo"
       data-onstyle="success"
       data-offstyle="danger">

</td>
    <td>{{ $p->fecha_pedido }}</td>
    <td>{{ $p->registradopor }}</td>

    <td class="text-center">
        <a href="{{ route('pedidos.pdf', $p->id) }}"
   class="btn btn-danger btn-sm"
   target="_blank"
   title="PDF">

    <i class="fas fa-file-pdf"></i>

</a>
        <a href="{{ route('pedidos.show', $p->id) }}"
   class="btn btn-info btn-sm">
    <i class="fas fa-eye"></i>
</a>
        <a href="{{ route('pedidos.edit', $p->id) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('pedidos.destroy', $p->id) }}" method="POST" style="display:inline;">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

            </table>
        </div>
    </div>

</div>
@endsection
