@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header bg-dark py-2">

            <div class="d-flex justify-content-between align-items-center">

                <h3 class="card-title text-white mb-0">
                    Nuevo Cliente
                </h3>

                <a href="{{ route('clientes.index') }}"
                   class="btn btn-secondary btn-sm">

                    <i class="fas fa-arrow-left"></i>

                </a>

            </div>

        </div>

        <form action="{{ route('clientes.store') }}" method="POST">

            @csrf

            <div class="card-body">

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Nombre</label>

                            <input type="text"
                                   name="nombre"
                                   class="form-control"
                                   placeholder="Ingrese el nombre"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Correo</label>

                            <input type="email"
                                   name="correo"
                                   class="form-control"
                                   placeholder="Ingrese el correo"
                                   required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Teléfono</label>

                            <input type="text"
                                   name="telefono"
                                   class="form-control"
                                   placeholder="Ingrese el teléfono"
                                   required>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Dirección</label>

                            <input type="text"
                                   name="direccion"
                                   class="form-control"
                                   placeholder="Ingrese la dirección"
                                   required>

                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Estado</label>

                            <select name="estado"
                                    class="form-control"
                                    required>

                                <option value="">Seleccione</option>

                                <option value="1">Activo</option>

                                <option value="0">Inactivo</option>

                            </select>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">

                            <label>Registrado Por</label>

                            <input type="text"
                                   name="registradopor"
                                   class="form-control"
                               a    placeholder="Ingrese responsable"
                                   required>

                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer">

                <button type="submit" class="btn btn-primary">

                    <i class="fas fa-save"></i> Guardar

                </button>

                <a href="{{ route('clientes.index') }}"
                   class="btn btn-secondary">

                    Cancelar

                </a>

            </div>

        </form>

    </div>

</div>

@endsection