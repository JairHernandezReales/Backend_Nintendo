@extends('layouts.app')

@section('content')
<main class="dashboard">
    <header>
        <h2>Administrar VideoJuegos</h2>
        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            class="close"></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </header>
    <a href="{{ route('juegos.create')}}" class="add"></a>
    <table>
        @foreach($datos as $items)
        <tr>
            <td>
                <figure class="cover">
                    <img src="{{asset($items -> image)}}" alt="">
                </figure>
                <div class="info">
                    <h3>{{$items -> plarform}}</h3>
                    <h4>{{$items -> title}}</h4>
                </div>
                <div class="controls">
                    <a href="{{ route('juegos.show', $items)}}" class="show"></a>
                    <a href="{{ route('juegos.edit', $items)}}" class="edit"></a>
                    <a href="{{route('juegos.destroy', $items -> id)}}" class="delete"
                        onclick="event.preventDefault(); if(confirm('¿Estás seguro?')){ document.getElementById('delete-form-{{ $items -> id }}').submit(); }"></a>
                </div>
                <form id="delete-form-{{ $items -> id }}" action="{{ route('juegos.destroy', $items -> id) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</main>
@endsection
