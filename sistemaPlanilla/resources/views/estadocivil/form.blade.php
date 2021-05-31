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
<h2>{{ $mode == 'create' ? 'Agregar Estado Civil'  : 'Modificar Estado Civil' }}</h2>
<label for="nombreEstadoCivil">{{ 'Nombre' }}</label>
<input type="text" name="nombreEstadoCivil" id="nombreEstadoCivil" value="{{ isset($estadoCivil -> nombreestadocivil) ? $estadoCivil -> nombreestadocivil : old('nombreEstadoCivil') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/estadocivil/') }}">REGRESAR</a>