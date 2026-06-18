@extends('layouts.app_authentication')

@section('title', 'Login')

@section('content')

<style>
    .login-box {
        width: 360px; /* 🔥 más compacto que register */
        margin: 6% auto;
    }

    .card-body {
        padding: 20px;
    }

    .login-box-msg {
        font-size: 14px;
        margin-bottom: 15px;
    }
</style>

<div class="login-box">
    <div class="card card-outline card-primary shadow-sm">

        <div class="card-header text-center">
            <img src="{{ asset('backend/dist/img/logo1.png') }}" alt="" style="width:140px;">
        </div>

        <div class="card-body">
            <p class="login-box-msg">Iniciar sesión</p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="input-group mb-2">
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}"
                        required autofocus placeholder="Correo">

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
                <div class="input-group mb-3">
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

                <!-- Botón -->
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Entrar
                        </button>
                    </div>
                </div>

                <hr>

                <!-- Links -->
                <div class="text-center">

                    @if (Route::has('password.request'))
                        <p class="mb-1">
                            <a href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        </p>
                    @endif

                    <p class="mb-0">
                        <a href="{{ route('register') }}">
                            Crear cuenta
                        </a>
                    </p>

                </div>

            </form>
        </div>
    </div>
</div>

@endsection