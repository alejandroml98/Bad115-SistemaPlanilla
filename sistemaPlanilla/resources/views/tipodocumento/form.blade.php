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
<h2>{{ $mode == 'create' ? 'Agregar Tipo Documento'  : 'Modificar Tipo Documento' }}</h2>
<label for="nombreTipoDocumento">{{ 'Nombre' }}</label>
<input type="text" name="nombreTipoDocumento" id="nombreTipoDocumento" value="{{ isset($tipoDocumento -> nombretipodocumento) ? $tipoDocumento -> nombretipodocumento : old('nombreTipoDocumento') }}">
<label for="cadenaRegex">{{ 'Cadena Regex' }}</label>
<input type="text" name="cadenaRegex" id="cadenaRegex" value="{{ isset($tipoDocumento -> cadenaregex) ? $tipoDocumento -> cadenaregex : old('cadenaRegex') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/tipodocumento/') }}">REGRESAR</a>