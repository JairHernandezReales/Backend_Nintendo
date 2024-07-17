@extends('layouts.app')

@section('content')
<main class="register">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" id="name" class="@error('name') is-invalid @enderror" value="{{ old('name') }}"
            required autocomplete="name" autofocus placeholder="Nombre completo">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" name="password" id="password" class="@error('password') is-invalid @enderror" required
            autocomplete="new-password" placeholder="Contraseña">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input type="password" name="password_confirmation" id="password-confirmation" required
            autocomplete="new-password" placeholder="Confirmar contraseña">
        <button>Registrarse</button>
        <p>¿ya tienes una cuenta? <a href="{{ route('login') }}">inicia sesion</a></p>
    </form> 
</main>
@endsection
