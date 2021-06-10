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
<h2>{{ $mode == 'create' ? 'Agregar Comision'  : 'Modificar Comision' }}</h2>
@if ($mode == 'create')
<label for="nombreComision">{{ 'Nombre' }}</label>
<input type="text" name="nombreComision" id="nombreComision" value="{{ old('nombreComision') }}">
<label for="porcentaje">{{ 'Porcentaje' }}</label>
<input type="number" step=".01" name="porcentaje" id="porcentaje" value="{{ old('porcentaje') }}">
<label for="valMinComision">{{ 'Valor Minimo' }}</label>
<input type="number" min="0" name="valMinComision" id="valMinComision" value="{{ old('valMinComision') }}">
<label for="valMaxComision">{{ 'Valor Maximo' }}</label>
<input type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ old('valMaxComision') }}">
@else   
<label for="nombreComision">{{ 'Nombre' }}</label>
<input type="text" name="nombreComision" id="nombreComision" value="{{ isset($catalogoComision -> nombrecomision) ? $catalogoComision -> nombrecomision : old('nombreComision') }}">
<label for="porcentaje">{{ 'Porcentaje' }}</label>
<input type="number"  step=".01" name="porcentaje" id="porcentaje" value="{{ isset($catalogoComision -> porcentaje) ? $catalogoComision -> porcentaje : old('porcentaje') }}">
<label for="valMinComision">{{ 'Valor Minimo' }}</label>
<input type="number" min="0" name="valMinComision" id="valMinComision" value="{{ isset($catalogoComision -> valmincomision) ? $catalogoComision -> valmincomision : old('valMinComision') }}">
<label for="valMaxComision">{{ 'Valor Maximo' }}</label>
<input type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ isset($catalogoComision -> valmaxcomision) ? $catalogoComision -> valmaxcomision : old('valMaxComision') }}">

@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/catalogocomision/') }}">REGRESAR</a> -->



<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearProfesionTitle">{{ $mode == 'create' ? 'Agregar Comisión'  : 'Modificar Comisión' }}</h5>
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
            <input  class="form-control" name="nombreComision" id="nombreComision" value="{{ old('nombreComision') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Porcentaje' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" name="porcentaje" id="porcentaje" value="{{ old('porcentaje') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Minimo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" min="0" name="valMinComision" id="valMinComision" value="{{ old('valMinComision') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Máximo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ old('valMaxComision') }}">
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
        <input  class="form-control" name="nombreComision" id="nombreComision"  required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Porcentaje' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" name="porcentaje" id="porcentaje" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Minimo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" min="0" name="valMinComision" id="valMinComision" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Máximo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" min="0" name="valMaxComision" id="valMaxComision" >
        </div>
    </div>
    @endif
    @else
    <input  class="form-control" name="nombreComision" id="nombreComision" value="{{ old('nombreComision') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Porcentaje' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" name="porcentaje" id="porcentaje" value="{{ old('porcentaje') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Minimo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" min="0" name="valMinComision" id="valMinComision" value="{{ old('valMinComision') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Máximo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ old('valMaxComision') }}">
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

