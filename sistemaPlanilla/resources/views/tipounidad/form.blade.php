<header class="panel-heading">
    <h2 class="panel-title">{{ $mode == 'create' ? 'Agregar Tipo Unidad'  : 'Modificar Tipo Unidad' }}</h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <div class="form-group">
            <label for="nombreTipoUnidad">{{ 'Nombre' }}</label>
            <input type="text" name="nombreTipoUnidad" id="nombreTipoUnidadCreate" value="{{ old('nombreTipoUnidadCreate') }}" class="form-control" placeholder="Ingrese el nombre del nuevo tipo">
        </div>
        <div class="form-group">
            <label for="idTipoUnidadPadre">Tipo Unidad Padre</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoUnidadPadre" id="idTipoUnidadPadreCreate">
                <option value="">Tipo Unidad Padre</option>
                @foreach ($tiposUnidades as $tipoUnidad)
                <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
                @endforeach
            </select>
        </div>    
    @else
    <div class="form-group">
        <label for="nombreTipoUnidad">{{ 'Nombre' }}</label>
        <input type="text" name="nombreTipoUnidad" id="nombreTipoUnidad" value="{{ isset($tipoUnidadSeleccionada -> nombretipounidad) ? $tipoUnidadSeleccionada -> nombretipounidad : old('nombreTipoUnidad') }}" class="form-control" placeholder="Ingrese el nombre del nuevo tipo">
    </div>
    <div class="form-group">
        <label for="idTipoUnidadPadre">Tipo Unidad Padre</label>
        <select data-plugin-selectTwo class="form-control mt-1" name="idTipoUnidadPadre" id="idTipoUnidadPadreCreate">
        <option value="">Tipo Unidad Padre</option>
            @foreach ($tiposUnidades as $tipoUnidad)
            @if ($tipoUnidadSeleccionada -> idtipounidad == $tipoUnidad -> idtipounidad || $tipoUnidadSeleccionada -> idtipounidad == $tipoUnidad -> idtipounidadpadre)
            @elseif ($tipoUnidadSeleccionada -> idtipounidadpadre == $tipoUnidad -> idtipounidad)
            <option value="{{ $tipoUnidad -> idtipounidad }}" selected>{{ $tipoUnidad -> nombretipounidad }}</option>
            @else
            <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
            @endif
            @endforeach
        </select>
    </div>  
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}" class="btn btn-primary">
        <a href="{{ url('/tipounidad/') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>