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
<h2>{{ $mode == 'create' ? 'Agregar Tipo Ingresos'  : 'Modificar Tipo Ingresos' }}</h2>
<label for="nombreTipoIngresos">{{ 'Nombre' }}</label>
<input type="text" name="nombreTipoIngresos" id="nombreTipoIngresos" value="{{ isset($tipoIngreso -> nombretipoingresos) ? $tipoIngreso -> nombretipoingresos : old('nombreTipoIngresos') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/tipoingresos/') }}">REGRESAR</a>