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
<h2>{{ $mode == 'create' ? 'Agregar Profesión'  : 'Modificar Profesión' }}</h2>
<label for="nombreProfesion">{{ 'Nombre' }}</label>
<input type="text" name="nombreProfesion" id="nombreProfesion" value="{{ isset($profesion -> nombreprofesion) ? $profesion -> nombreprofesion : old('nombreProfesion') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/profesion/') }}">REGRESAR</a>