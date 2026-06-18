@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="card">

        <div class="card-header bg-info">
            <h3 class="card-title text-white">
                Error 419
            </h3>
        </div>

        <div class="card-body text-center">

            <h1 style="font-size:80px;">419</h1>

            <h3>Sesión expirada</h3>

            <p>
                Tu sesión ha expirado. Inicia sesión nuevamente.
            </p>

            <a href="{{ route('login') }}" class="btn btn-primary">
                Iniciar sesión
            </a>

        </div>

    </div>

</div>

@endsection