@extends('layouts.app')

@section('content')
<main class="show">
    <header>
        <h2>Consultar VideoJuego</h2>
        <a href="{{route('juegos.dashboard')}}" class="back"></a>
    </header>
    <figure class="photo-preview">
        <img src="{{asset($juegos -> image)}}" alt="">
    </figure>
    <div>
        <article class="info-title">
            <p>{{$juegos->title}}</p>
        </article>
        <article class="info-platform">
            <p>{{$juegos->plarform}}</p>
        </article>
        <article class="info-category">
            <p>{{$juegos->category}}</p>
        </article>
        <article class="info-year">
            <p>{{$juegos->year}}</p>
        </article>
    </div>
</main>
@endsection
