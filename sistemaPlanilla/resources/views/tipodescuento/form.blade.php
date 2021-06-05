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
<h2>{{ $mode == 'create' ? 'Agregar Descuento'  : 'Modificar Descuento' }}</h2>
<label for="nombreTipoDescuento">{{ 'Nombre' }}</label>
<input type="text" name="nombreTipoDescuento" id="nombreTipoDescuento" value="{{ isset($tipoDescuento -> nombretipodescuento) ? $tipoDescuento -> nombretipodescuento : old('nombreTipoDescuento') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/tipodescuento') }}">REGRESAR</a>