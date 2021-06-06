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
<h2>{{ $mode == 'create' ? 'Agregar Pais'  : 'Modificar Pais' }}</h2>
<label for="nombrePais">{{ 'Nombre país' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombrePais" id="nombrePaisCreate" value="{{ old('nombrePaisCreate') }}">
@else
    <input type="text" name="nombrePais" id="nombrePais" value="{{ isset($pais -> nombrepais) ? $pais -> nombrepais : old('nombrePais') }}">
@endif
<label for="idTipoRegion">{{ 'Tipo Sub Region' }}</label>
@if ($mode == 'create')
    <select name="idTipoRegion" id="idTipoRegionCreate" required>
        <option value="">Selecciona un tipo de región</option>
        @foreach ($tiposRegion as $tipoRegion)            
            <option value="{{ $tipoRegion -> idtiporegion }}">{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                
        @endforeach
    </select>
@else
    <select name="idTipoRegion" id="idTipoRegion" required>
        <option value="">Selecciona un tipo de región</option>
        @foreach ($tiposRegion as $tipoRegion)
            @if (isset($pais -> idtiporegion))
                @if ($pais -> idtiporegion == $tipoRegion -> idtiporegion)
                    <option value="{{ $tipoRegion -> idtiporegion }}" selected>{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                    
                @else
                    <option value="{{ $tipoRegion -> idtiporegion }}">{{ $tipoRegion -> nombretiporegion }} - {{ $tipoRegion -> nombretiposubregion }}</option>                                
                @endif            
            @endif
        @endforeach
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/pais/') }}">REGRESAR</a>