@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header bg-warning">
            <h3 class="card-title text-white">
                Error 403
            </h3>
        </div>

        <div class="card-body text-center">

            <h1 style="font-size:80px;">403</h1>

            <h3>Acceso denegado</h3>

            <p>
                No tienes permisos para acceder a este recurso.
            </p>

            <a href="{{ route('home') }}" class="btn btn-primary">
                Volver al inicio
            </a>

        </div>

    </div>

</div>

@endsection