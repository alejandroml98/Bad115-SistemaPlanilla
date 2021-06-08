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
<h2>{{ $mode == 'create' ? 'Agregar Tipo Unidad'  : 'Modificar Tipo Unidad' }}</h2>
@if ($mode == 'create')
    <label for="nombreTipoUnidad">{{ 'Nombre' }}</label>
    <input type="text" name="nombreTipoUnidad" id="nombreTipoUnidadCreate" value="{{ old('nombreTipoUnidadCreate') }}">
    <select name="idTipoUnidadPadre" id="idTipoUnidadPadreCreate">
        <option value="">Tipo Unidad Padre</option>
        @foreach ($tiposUnidades as $tipoUnidad)        
            <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
        @endforeach
    </select>
@else   
    <label for="nombreTipoUnidad">{{ 'Nombre' }}</label>
    <input type="text" name="nombreTipoUnidad" id="nombreTipoUnidad" value="{{ isset($tipoUnidadSeleccionada -> nombretipounidad) ? $tipoUnidadSeleccionada -> nombretipounidad : old('nombreTipoUnidad') }}">
    <select name="idTipoUnidadPadre" id="idTipoUnidadPadre">
        <option value="">Tipo Unidad Padre</option>
        @foreach ($tiposUnidades as $tipoUnidad)
            @if ($tipoUnidadSeleccionada -> idtipounidadpadre == $tipoUnidad -> idtipounidad)
                <option value="{{ $tipoUnidad -> idtipounidad }}" selected>{{ $tipoUnidad -> nombretipounidad }}</option>
            @else
                <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
            @endif                    
        @endforeach
    </select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"> 
<a href="{{ url('/tipounidad/') }}">REGRESAR</a>