@extends('layouts.app_authentication')

@section('title', 'Register')

@section('content')

<style>
    .login-box {
        width: 380px; /* 🔥 más pequeño */
        margin: 5% auto; /* centrado vertical */
    }

    .card-body {
        padding: 20px; /* menos espacio interno */
    }

    .login-box-msg {
        font-size: 14px;
        margin-bottom: 15px;
    }
</style>

<div class="login-box">
    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header text-center">
            <img src="{{ asset('backend/dist/img/logo1.png') }}" alt="" style="width:150px;">
        </div>

        <div class="card-body">
            <p class="login-box-msg">{{ __('Crear cuenta') }}</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="input-group mb-2">
                    <input id="name" type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}"
                        required autofocus placeholder="Nombre completo">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                    @error('name')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="input-group mb-2">
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"
                        required placeholder="Correo">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="input-group mb-2">
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" required placeholder="Contraseña">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirmar -->
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password"
                        class="form-control"
                        name="password_confirmation"
                        required placeholder="Confirmar contraseña">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- Botón -->
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Registrarse
                        </button>
                    </div>
                </div>

                <hr>

                <!-- Login -->
                <p class="mb-0 text-center">
                    <a href="{{ route('login') }}">
                        ¿Ya tienes cuenta? Inicia sesión
                    </a>
                </p>

            </form>
        </div>
    </div>
</div>

@endsection