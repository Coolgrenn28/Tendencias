@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Título -->
    <div class="row mb-3">
        <div class="col">
            <h3>Dashboard - Sistema de Pedidos</h3>
        </div>
    </div>

    <!-- TARJETAS -->
    <div class="row">

        <!-- Clientes -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Cliente::count() }}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('clientes.index') }}" class="small-box-footer">
                    Ver más <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Pedidos -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\Pedido::count() }}</h3>
                    <p>Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('pedidos.index') }}" class="small-box-footer">
                    Ver más <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Productos -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Producto::count() }}</h3>
                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('productos.index') }}" class="small-box-footer">
                    Ver más <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <!-- Transportistas -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\Transportista::count() }}</h3>
                    <p>Transportistas</p>
                </div>
                <div class="icon">
                    <i class="fas fa-truck"></i>
                </div>
                <a href="{{ route('transportistas.index') }}" class="small-box-footer">
                    Ver más <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- TABLA PEDIDOS RECIENTES -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Últimos Pedidos</h3>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Número</th>
                        <th>Cliente</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach(\App\Models\Pedido::latest()->take(5)->get() as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->numero_pedido }}</td>
                        <td>{{ $p->cliente->nombre ?? '' }}</td>
                        <td>
                            <span class="badge badge-info">
                                {{ $p->estadoPedido->nombre_estado ?? '' }}
                            </span>
                        </td>
                        <td>{{ $p->fecha_pedido }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection