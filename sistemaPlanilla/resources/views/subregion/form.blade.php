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
<h2>{{ $mode == 'create' ? 'Agregar Sub Región'  : 'Modificar Sub Región' }}</h2>
<label for="nombreSubRegion">{{ 'Nombre Sub Región' }}</label>
@if ($mode == 'create')
    <input type="text" name="nombreSubRegion" id="nombreSubRegionCreate" value="{{ old('nombreSubRegionCreate') }}">
@else
    <input type="text" name="nombreSubRegion" id="nombreSubRegion" value="{{ isset($subRegion -> nombresubregion) ? $subRegion -> nombresubregion : old('nombreSubRegion') }}">
@endif
<label for="idRegion">{{ 'Región - País' }}</label>
@if ($mode == 'create')
    <select name="idRegion" id="idRegionCreate" required>
        <option value="">Selecciona la región de origen</option>
        @foreach ($regiones as $region)
            @foreach ($paises as $pais)
                @if ($pais -> idpais == $region -> idpais)
                    <option value="{{ $region -> idregion }}">{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>
                @endif                
            @endforeach                        
        @endforeach
    </select>
@else
    <select name="idRegion" id="idRegion" required>
        <option value="">Selecciona el país de origen</option>
        @foreach ($regiones as $region)
            @if (isset($subRegion -> idregion))
                @foreach ($paises as $pais)
                    @if ($pais -> idpais == $region -> idpais && $subRegion -> idregion == $region -> idregion)
                        <option value="{{ $region -> idregion }}" selected>{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>
                    @elseif ($pais -> idpais == $region -> idpais)
                        <option value="{{ $region -> idregion }}" >{{ $region -> nombreregion }} - {{ $pais -> nombrepais }}</option>        
                    @endif                
                @endforeach          
            @endif
        @endforeach        
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/subregion/') }}">REGRESAR</a>