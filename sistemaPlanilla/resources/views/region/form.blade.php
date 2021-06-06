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
<h2>{{ $mode == 'create' ? 'Agregar Región'  : 'Modificar Región' }}</h2>
<label for="nombreRegion">{{ 'Nombre Región' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombreRegion" id="nombreRegionCreate" value="{{ old('nombreRegionCreate') }}">
@else
    <input type="text" name="nombreRegion" id="nombreRegion" value="{{ isset($region -> nombreregion) ? $region -> nombreregion : old('nombreRegion') }}">
@endif
<label for="idPais">{{ 'País' }}</label>
@if ($mode == 'create')
    <select name="idPais" id="idPaisCreate" required>
        <option value="">Selecciona el país de origen</option>
        @foreach ($paises as $pais)            
            <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>                
        @endforeach
    </select>
@else
    <select name="idPais" id="idPais" required>
        <option value="">Selecciona el país de origen</option>
        @foreach ($paises as $pais)
            @if (isset($region -> idpais))
                @if ($region -> idpais == $pais -> idpais)
                    <option value="{{ $pais -> idpais }}" selected>{{ $pais -> nombrepais }}</option>                    
                @else
                    <option value="{{ $pais -> idpais }}">{{ $pais -> nombrepais }}</option>                                
                @endif            
            @endif
        @endforeach
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/region/') }}">REGRESAR</a>