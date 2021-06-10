<header class="panel-heading">
    <h2 class="panel-title">{{ $mode == 'create' ? 'Agregar Unidad'  : 'Modificar Unidad' }}</h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <div class="form-group">
            <label for="codigoUnidad">{{ 'Código' }}</label>
            <input type="text" name="codigoUnidad" maxlength="7" id="codigoUnidadCreate" value="{{ old('codigoUnidadCreate') }}" class="form-control" placeholder="Ingrese el codigo">
            <small id="codigoUnidad" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
        </div>
        <div class="form-group">
            <label for="nombreUnidad">{{ 'Nombre' }}</label>
            <input type="text" name="nombreUnidad" id="nombreUnidadCreate" value="{{ old('nombreUnidadCreate') }}" class="form-control" aria-describedby="nombrePuesto" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group">
            <label for="idTipoUnidad">Tipo de unidad</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoUnidad" id="idTipoUnidadCreate">
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
        </div>
        <div class="form-group">
            <label for="codigoUnidadAntecesora">Tipo de unidad</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="codigoUnidadAntecesora" id="codigoUnidadAntecesoraCreate">
                <option value="" selected>Unidad Padre</option>
                @foreach ($unidades as $unidad)        
                    <option value="{{ $unidad -> codigounidad }}">{{ $unidad -> nombreunidad }}</option>
                @endforeach
            </select>
        </div>
    @else
    <input hidden type="text" name="codigoUnidadAnterior" maxlength="7" id="codigoUnidadAnterior" value="{{ isset($unidadSeleccionada -> codigounidad) ? $unidadSeleccionada -> codigounidad : old('codigoUnidadCreate') }}">
    <div class="form-group">
            <label for="codigoUnidad">{{ 'Código' }}</label>
            <input type="text" name="codigoUnidad" maxlength="7" id="codigoUnidad" value="{{ isset($unidadSeleccionada -> codigounidad) ? $unidadSeleccionada -> codigounidad : old('codigoUnidadCreate') }}" class="form-control" placeholder="Ingrese el codigo">
            <small id="codigoUnidad" class="form-text text-muted">El código consta de 2 letras y 5 números.</small>
        </div>
        <div class="form-group">
            <label for="nombreUnidad">{{ 'Nombre' }}</label>
            <input type="text" name="nombreUnidad" id="nombreUnidad" value="{{ isset($unidadSeleccionada -> nombreunidad) ? $unidadSeleccionada -> nombreunidad : old('nombreUnidad') }}" class="form-control" aria-describedby="nombrePuesto" placeholder="Ingrese el nombre">
        </div>
        <div class="form-group">
            <label for="idTipoUnidad">Tipo de unidad</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoUnidad" id="idTipoUnidad">
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
        </div>
        <div class="form-group">
            <label for="codigoUnidadAntecesora">Tipo de unidad</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="codigoUnidadAntecesora" id="codigoUnidadAntecesoraCreate">
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
        <a href="{{ url('/unidad/') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>