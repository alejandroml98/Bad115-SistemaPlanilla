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
    @if ($tipoUnidadSeleccionada -> idtipounidad == $tipoUnidad -> idtipounidad || $tipoUnidadSeleccionada -> idtipounidad == $tipoUnidad -> idtipounidadpadre)
    @elseif ($tipoUnidadSeleccionada -> idtipounidadpadre == $tipoUnidad -> idtipounidad)
    <option value="{{ $tipoUnidad -> idtipounidad }}" selected>{{ $tipoUnidad -> nombretipounidad }}</option>
    @else
    <option value="{{ $tipoUnidad -> idtipounidad }}">{{ $tipoUnidad -> nombretipounidad }}</option>
    @endif
    @endforeach
</select>
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/tipounidad/') }}">REGRESAR</a>

<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearTipoUTitle">{{ $mode == 'create' ? 'Agregar Tipo Unidad'  : 'Modificar Tipo Unidad' }}</h5>
        <button type="button" class="close modal-dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">{{ 'Nombre' }}</label>
        <div class="col-sm-8 pb-2">
            @if ($mode == 'create')
            @if (count($errors) > 0 && Session::get('peticion') == 'crear')
            <input type="text" class="form-control" name="nombreTipoUnidad" id="nombreTipoUnidadCreate" value="{{ old('nombreTipoUnidadCreate') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Cadena Regex' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="cadenaRegex" id="cadenaRegex" value="{{ old('cadenaRegex') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="idRangoSalarial">Rango Salarial</label>
        <select data-plugin-selectTwo class="form-control mt-1" name="idRangoSalarial" id="idRangoSalarialCreate">
            <option value="" disabled selected>Salario Mínimo - Salario Máximo</option>
            @foreach ($rangosSalariales as $rangoSalarial)
            <option value="{{ $rangoSalarial -> idrangosalarial }}">${{ $rangoSalarial -> salariominimo }} - ${{ $rangoSalarial -> salariomaximo }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @else
    <input type="text" class="form-control" name="nombreTipoDocumento" id="nombreTipoDocumentoCreate" required />
</div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Cadena Regex' }}</label>
    <div class="col-sm-8 pb-2">
        <input class="form-control" type="text" name="cadenaRegex" id="cadenaRegex">
    </div>
</div>
@endif
@else
<input type="text" class="form-control" name="nombreTipoDocumento" id="nombreTipoDocumento" value="{{ old('nombreTipoDocumento') }}" required />
</div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Cadena Regex' }}</label>
    <div class="col-sm-8 pb-2">
        <input class="form-control" type="text" name="cadenaRegex" id="cadenaRegex" value="{{ old('cadenaRegex') }}">
    </div>
</div>
@if (count($errors) > 0 && Session::get('peticion') != 'crear')
<div class="form-group row alert alert-danger mt-2" role="alert" id="{{'error'.Session::get('peticion')}}">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif
@endif
</div>
<div class="modal-footer">
    <button type="button" class="modal-dismiss btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <input type="submit" class="btn btn-primary" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"></input>
</div>