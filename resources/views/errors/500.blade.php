@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header bg-danger">
            <h3 class="card-title text-white">
                Error 500
            </h3>
        </div>

        <div class="card-body text-center">

            <h1 style="font-size:80px;">500</h1>

            <h3>Error interno del servidor</h3>

            <p>
                Ocurrió un error inesperado.
            </p>

            <a href="{{ route('home') }}" class="btn btn-primary">
                Volver al inicio
            </a>

        </div>

    </div>

</div>

@endsection