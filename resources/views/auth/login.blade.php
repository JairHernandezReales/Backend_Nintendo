@extends('layouts.app')

@section('content')
<main class="login">
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Correo Electrónico">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" required
            autocomplete="current-password" placeholder="Contraseña">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button>Ingresar</button>
        <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Registrate</a></p>
    </form>
    <a href="{{ route('password.request') }}">Restaurar contraseña</a>
</main>
@endsection
