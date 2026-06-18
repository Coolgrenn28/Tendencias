@extends('layouts.app')

@section('content')
<div class="container-fluid">

   <div class="card-header bg-dark"
     style="padding: 8px 15px; min-height: 40px;">

    <div class="d-flex justify-content-between align-items-center w-100">

        <h3 class="card-title text-white mb-0"
            style="font-size:17px; line-height:1;">
            Clientes
        </h3>

       <div class="d-flex align-items-center">

    <a href="{{ route('clientes.excel') }}"
       class="btn btn-success btn-sm me-2"
       title="Exportar Excel">

        <i class="fas fa-file-excel"></i>

    </a>

    <a href="{{ route('clientes.create') }}"
       class="btn btn-primary btn-sm rounded-circle d-flex align-items-center justify-content-center"
       style="width:30px; height:30px;"
       title="Nuevo">

        <i class="fas fa-plus"></i>

    </a>

</div>

    </div>

</div>

        <div class="card-body">
            <table id="tablaClientes" class="table table-bordered table-striped">
                <thead>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Correo</th>
    <th>Teléfono</th>
    <th>Dirección</th>
    <th>Estado</th>
    <th>Registrado Por</th>
    <th>Acciones</th>
</tr>
</thead>

<tbody>
@foreach($clientes as $cliente)
<tr>
    <td>{{ $cliente->id }}</td>
    <td>{{ $cliente->nombre }}</td>
    <td>{{ $cliente->correo }}</td>
    <td>{{ $cliente->telefono }}</td>
    <td>{{ $cliente->direccion }}</td>
    <td>

<input type="checkbox"
       class="toggle-class"
       data-id="{{ $cliente->id }}"
       data-type="cliente"
       {{ $cliente->estado == 1 ? 'checked' : '' }}
       data-toggle="toggle"
       data-on="Activo"
       data-off="Inactivo"
       data-onstyle="success"
       data-offstyle="danger">

</td>
    <td>{{ $cliente->registradopor }}</td>
    <td class="text-center">

        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">
            <i class="fas fa-edit"></i>
        </a>

        <form action="{{ route('clientes.destroy', $cliente->id) }}"
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

@push('scripts')
<script>
$(document).ready(function () {

    $('#tablaClientes').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            zeroRecords: "No se encontraron resultados",
            paginate: {
                next: "Siguiente",
                previous: "Anterior"
            }
        }
    });

});
</script>
@endpush