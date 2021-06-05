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
<h2>{{ $mode == 'create' ? 'Agregar Tipo Región'  : 'Modificar Tipo Región' }}</h2>
<label for="nombreTipoRegion">{{ 'Tipo Region' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombreTipoRegion" id="nombreTipoRegionCreate" value="{{ old('nombreTipoRegionCreate') }}">
@else
    <input type="text" name="nombreTipoRegion" id="nombreTipoRegion" value="{{ isset($tipoRegion -> nombretiporegion) ? $tipoRegion -> nombretiporegion : old('nombreTipoRegion') }}">
@endif
<label for="nombreTipoSubRegion">{{ 'Tipo Sub Region' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombreTipoSubRegion" id="nombreTipoSubRegionCreate" value="{{ old('nombreTipoSubRegionCreate') }}">
@else
    <input type="text" name="nombreTipoSubRegion" id="nombreTipoSubRegion" value="{{ isset($tipoRegion -> nombretiposubregion) ? $tipoRegion -> nombretiposubregion : old('nombreTipoSubRegion') }}">
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/tiporegion/') }}">REGRESAR</a>