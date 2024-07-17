@extends('layouts.app')

@section('content')
<main class="resetPswd">
    <header>
        <h2>Restablecer Contraseña</h2>
        <a href="{{route('juegos.dashboard')}}" class="back"></a>
    </header>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <input type="text" name="email" id="email" class="@error('email') is-invalid @enderror"
            value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <button>restaurar contraseña</button>
    </form>
</main>
@endsection
