@extends('layouts.app')

@section('content')
<main class="edit">
    <header>
        <h2>Modificar VideoJuego</h2>
        <a href="{{route('juegos.dashboard')}}" class="back"></a>
    </header>
    <figure class="photo-preview">
        <img id="imagePreview" src="{{asset($juegos -> image)}}" alt="">
    </figure>
    <form action="{{ route('juegos.update', $juegos)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="text" name="title" placeholder="Title" value="{{$juegos->title}}">
        <div class="select">
            <select name="plarform">
                <option value="{{ $juegos -> plarform }}">{{ $juegos -> plarform }}</option>
                <option value="Atari 2600">Atari 2600</option>
                <option value="Dreamcast">Dreamcast</option>
                <option value="Game Boy Advance">Game Boy Advance</option>
                <option value="GameCube">GameCube</option>
                <option value="Nintendo 3DS">Nintendo 3DS</option>
                <option value="Nintendo DS">Nintendo DS</option>
                <option value="Nintendo Entertainment System (NES)">Nintendo Entertainment System (NES)</option>
                <option value="Nintendo Switch">Nintendo Switch</option>
                <option value="Nintendo Wii">Nintendo Wii</option>
                <option value="Nintendo Wii U">Nintendo Wii U</option>
                <option value="PlayStation">PlayStation</option>
                <option value="PlayStation 2">PlayStation 2</option>
                <option value="PlayStation 3">PlayStation 3</option>
                <option value="PlayStation 4">PlayStation 4</option>
                <option value="Play Station 5">PlayStation 5</option>
                <option value="PlayStation Portable (PSP)">PlayStation Portable (PSP)</option>
                <option value="PlayStation Vita">PlayStation Vita</option>
                <option value="Sega Genesis">Sega Genesis</option>
                <option value="Super Nintendo Entertainment System (SNES)">Super Nintendo Entertainment System (SNES)
                </option>
                <option value="Xbox">Xbox</option>
                <option value="Xbox 360">Xbox 360</option>
                <option value="Xbox One">Xbox One</option>
                <option value="Xbox Series X">Xbox Series X</option>
            </select>
        </div>

        <div class="select">
            <select name="category">
                <option value="{{$juegos -> category}}">{{ $juegos -> category }}</option>
                <option value="Acción">Acción</option>
                <option value="Arcade">Arcade</option>
                <option value="Aventura">Aventura</option>
                <option value="Aventura Gráfica">Aventura Gráfica</option>
                <option value="Battle Royale">Battle Royale</option>
                <option value="Carreras">Carreras</option>
                <option value="Deportes">Deportes</option>
                <option value="Disparos (FPS)">Disparos (FPS)</option>
                <option value="Educativo">Educativo</option>
                <option value="Estrategia">Estrategia</option>
                <option value="Lucha">Lucha</option>
                <option value="MMORPG (Massively Multiplayer Online RPG)">MMORPG (Massively Multiplayer Online RPG)
                </option>
                <option value="MOBA (Multiplayer Online Battle Arena)">MOBA (Multiplayer Online Battle Arena)</option>
                <option value="Metroidvania">Metroidvania</option>
                <option value="Música/Ritmo">Música/Ritmo</option>
                <option value="Party">Party</option>
                <option value="Plataformas">Plataformas</option>
                <option value="Puzzle">Puzzle</option>
                <option value="Roguelike">Roguelike</option>
                <option value="RPG">RPG</option>
                <option value="Sandbox">Sandbox</option>
                <option value="Simulación">Simulación</option>
                <option value="Survival Horror">Survival Horror</option>
                <option value="Terror">Terror</option>
                <option value="Realidad Virtual (VR)">Realidad Virtual (VR)</option>
            </select>
        </div>

        <button type="button" class="upload" onclick="document.getElementById('fileInput').click();">Subir
            Portada</button>
        <input type="file" id="fileInput" name="fileInput" style="display:none;" onchange="previewImage(event);">
        <input type="text" name="year" placeholder="Year" value="{{$juegos->year}}">
        <button type="submit" class="update">Modificar</button>
    </form>
</main>

@endsection


@section('scripts')
<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagePreview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

</script>
@endsection
