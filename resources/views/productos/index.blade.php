@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <div class="card">
        <div class="card-header bg-dark"
     style="padding: 8px 15px; min-height: 40px;">

    <div class="d-flex justify-content-between align-items-center w-100">

        <h3 class="card-title text-white mb-0"
            style="font-size:17px; line-height:1;">
            Productos
        </h3>

        <a href="{{ route('productos.create') }}"
           class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
           style="width:30px; height:30px;"
           title="Nuevo">

            <i class="fas fa-plus"></i>

        </a>

    </div>

</div>

        <div class="card-body">
            <table id="tabla" class="table table-bordered">
                <thead>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Estado</th>
    <th>Registrado Por</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>
@foreach($productos as $producto)
<tr>
    <td>{{ $producto->id }}</td>
    <td>{{ $producto->nombre }}</td>
    <td>${{ $producto->precio }}</td>
    <td>

<input type="checkbox"
       class="toggle-class"
       data-id="{{ $producto->id }}"
       data-type="producto"
       {{ $producto->estado == 1 ? 'checked' : '' }}
       data-toggle="toggle"
       data-on="Activo"
       data-off="Inactivo"
       data-onstyle="success"
       data-offstyle="danger">

</td>
    <td>{{ $producto->registradopor }}</td>
    <td class="text-center">
        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('productos.destroy', $producto->id) }}"
      method="POST"
      class="delete-form"
      style="display:inline;">
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

