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
<h2>{{ $mode == 'create' ? 'Agregar Unidad'  : 'Modificar Unidad' }}</h2>
@if ($mode == 'create')
    <label for="codigoUnidad">{{ 'Código' }}</label>
    <input type="text" name="codigoUnidad" maxlength="7" id="codigoUnidadCreate" value="{{ old('codigoUnidadCreate') }}">
    <label for="nombreUnidad">{{ 'Nombre' }}</label>
    <input type="text" name="nombreUnidad" id="nombreUnidadCreate" value="{{ old('nombreUnidadCreate') }}">
    <select name="idTipoUnidad" id="idTipoUnidadCreate">
        <option value="" selected disabled>Seleccione el Tipo Unidad</option>
        @foreach ($tiposUnidades as $tipoUnidad)
            @if (isset($tipoUnidad -> idtipounidadpadre))
                @foreach ($tiposUnidades as $tipoUnidadPadre)
                    @if ($tipoUnidadPadre -> idtipounidad == $tipoUnidad -> idtipounidadpadre)
                        <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidadPadre -> nombretipounidad }}->{{ $tipoUnidad -> nombretipounidad }}</option>
                    @endif
                @endforeach
            @else
                <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
            @endif            
        @endforeach
    </select>
    <select name="codigoUnidadAntecesora" id="codigoUnidadAntecesoraCreate">
        <option value="" selected>Unidad Padre</option>
        @foreach ($unidades as $unidad)        
            <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
        @endforeach
    </select>
@else 
<input hidden type="text" name="codigoUnidadAnterior" maxlength="7" id="codigoUnidadAnterior" value="{{ isset($unidadSeleccionada -> codigounidad) ? $unidadSeleccionada -> codigounidad : old('codigoUnidadCreate') }}">
<label for="codigoUnidad">{{ 'Código' }}</label>
<input type="text" name="codigoUnidad" maxlength="7" id="codigoUnidad" value="{{ isset($unidadSeleccionada -> codigounidad) ? $unidadSeleccionada -> codigounidad : old('codigoUnidadCreate') }}">
    <label for="nombreUnidad">{{ 'Nombre' }}</label>
    <input type="text" name="nombreUnidad" id="nombreUnidad" value="{{ isset($unidadSeleccionada -> nombreunidad) ? $unidadSeleccionada -> nombreunidad : old('nombreUnidad') }}">
    <select name="idTipoUnidad" id="idTipoUnidad">        
        @foreach ($tiposUnidades as $tipoUnidad)
            @if ($unidadSeleccionada -> idtipounidad == $tipoUnidad -> idtipounidad)
                @if (isset($tipoUnidad -> idtipounidadpadre))
                    @foreach ($tiposUnidades as $tipoUnidadPadre)
                        @if ($tipoUnidadPadre -> idtipounidad == $tipoUnidad -> idtipounidadpadre)
                            <option value="{{ $tipoUnidad -> idtipounidad }}" selected>{{ $tipoUnidadPadre -> nombretipounidad }}->{{ $tipoUnidad -> nombretipounidad }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="{{ $tipoUnidad -> idtipounidad }}" selected>{{ $tipoUnidad -> nombretipounidad }}</option>
                @endif                
            @else
                @if (isset($tipoUnidad -> idtipounidadpadre))
                    @foreach ($tiposUnidades as $tipoUnidadPadre)
                        @if ($tipoUnidadPadre -> idtipounidad == $tipoUnidad -> idtipounidadpadre)
                            <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidadPadre -> nombretipounidad }}->{{ $tipoUnidad -> nombretipounidad }}</option>
                        @endif
                    @endforeach
                @else
                    <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
                @endif
            @endif                 
        @endforeach
    </select>
    <select name="codigoUnidadAntecesora" id="codigoUnidadAntecesora">
        <option value="">Unidad Padre</option>
        @foreach ($unidades as $unidad)    
            @if ($unidadSeleccionada -> codigounidad == $unidad -> codigounidad || $unidadSeleccionada -> codigounidad == $unidad -> codigounidadantecesora)                
            @elseif ($unidadSeleccionada -> codigounidadantecesora == $unidad -> codigounidad)
                <option value="{{ $unidad -> codigounidad }}" selected>{{ $unidad -> nombreunidad }}</option>            
            @else
            <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
            @endif                 
        @endforeach
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"> 
<a href="{{ url('/unidad/') }}">REGRESAR</a>