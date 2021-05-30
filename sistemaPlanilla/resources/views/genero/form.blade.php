@if (count($errors) > 0)
    <h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </h3>
@endif
<h2>{{ $mode == 'create' ? 'Agregar Género'  : 'Modificar Género' }}</h2>
<label for="nombreGenero">{{ 'Nombre' }}</label>
<input type="text" name="nombreGenero" id="nombreGenero" value="{{ isset($genero -> nombregenero) ? $genero -> nombregenero : old('nombregenero') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/genero/') }}">REGRESAR</a>