<!-- @if (count($errors) > 0)
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
<a href="{{ url('/tiporegion/') }}">REGRESAR</a> -->
<!--nuevo-->

<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearProfesionTitle">{{ $mode == 'create' ? 'Agregar Tipo Región'  : 'Modificar Tipo Region' }}</h5>
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
            <input type="text" class="form-control"name="nombreTipoRegion"name="nombreTipoRegion" id="nombreTipoRegion" value="{{ old('nombreTipoRegion') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Sub Region' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="nombreTipoSubRegion" id="nombreTipoSubRegion" value="{{ old('nombreTipoSubRegion') }}">
        </div>
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
            <input type="text" class="form-control" name="nombreTipoRegion" id="nombreTipoRegion" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="nombreTipoSubRegion">{{ 'Sub Región' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="nombreTipoSubRegion" id="nombreTipoSubRegion">
        </div>    
    </div>
    @endif
    @else
            <input type="text" class="form-control"name="nombreTipoRegion" id="nombreTipoRegion" value="{{ old('nombreTipoRegion') }}" required />
        </div>
    </div>
    <div class="form-group row"> 
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Sub Región' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text"name="nombreTipoSubRegion" id="nombreTipoSubRegion" value="{{ old('nombreTipoSubRegion') }}">
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