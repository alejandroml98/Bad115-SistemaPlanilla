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
<h2>{{ $mode == 'create' ? 'Agregar Tipo de Renta'  : 'Modificar Tipo de Renta' }}</h2>
@if ($mode == 'create')
<label for="valMin">{{ 'Valor Minimo' }}</label>
<input type="number" step=".01" min="0" name="valMin"  id="valMin" value="{{ isset($renta -> valmin) ? $renta -> valmin : old('valMin') }}">
<label for="valMax">{{ 'Valor Maximo' }}</label>
<input type="number"  step=".01" min="0" name="valMax" id="valMax" value="{{ isset($renta -> valmax) ? $renta -> valmax : old('valMax') }}">
<label for="valorFijo">{{ 'Valor Fijo' }}</label>
<input type="number" step=".01" min="0" name="valorFijo" id="valorFijo" value="{{ isset($renta -> valorfijo) ? $renta -> valorfijo : old('valorFijo') }}">
<label for="exceso">{{ 'Exceso' }}</label>
<input type="number" step=".01" min="0" name="exceso" id="exceso" value="{{ isset($renta -> exceso) ? $renta -> exceso : old('exceso') }}">
<label for="periodo">{{ 'Periodo' }}</label>
<input type="text" name="periodo" id="periodo" value="{{ old('periodo') }}">
@else   
<label for="valMin">{{ 'Valor Minimo' }}</label>
<input type="number" name="valMin" step=".01" min="0" id="valMin" value="{{ isset($renta -> valmin) ? $renta -> valmin : old('valMin') }}">
<label for="valMax">{{ 'Valor Maximo' }}</label>
<input type="number" step=".01" min="0" name="valMax" id="valMax" value="{{ isset($renta -> valmax) ? $renta -> valmax : old('valMax') }}">
<label for="valorFijo">{{ 'Valor Fijo' }}</label>
<input type="number" step=".01" min="0" name="valorFijo" id="valorFijo" value="{{ isset($renta -> valorfijo) ? $renta -> valorfijo : old('valorFijo') }}">
<label for="exceso">{{ 'Exceso' }}</label>
<input type="number" step=".01" min="0" name="exceso" id="exceso" value="{{ isset($renta -> exceso) ? $renta -> exceso : old('exceso') }}">
<label for="periodo">{{ 'Periodo' }}</label>
<input type="text" name="periodo" id="periodo" value="{{ isset($renta -> periodo) ? $renta -> periodo : old('periodo') }}">

@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/renta/') }}">REGRESAR</a> -->
<!--nuevo-->

<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearProfesionTitle">{{ $mode == 'create' ? 'Agregar Tipo de Renta'  : 'Modificar Tipo de Renta' }}</h5>
        <button type="button" class="close modal-dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">{{ 'Valor Mínimo' }}</label>
        <div class="col-sm-8 pb-2">
    @if ($mode == 'create')
        @if (count($errors) > 0 && Session::get('peticion') == 'crear')
            <input class="form-control" type="number" step=".01" min="0" name="valMin"  id="valMin" value="{{ old('valMin') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Valor Máximo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="valMax" id="valMax" value="{{ old('valMax') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Valor Fijo' }}</label>
        <div class="col-sm-8 pb-2" >
        <input class="form-control" type="number" step=".01" min="0" name="valorFijo" id="valorFijo" value="{{ old('valorFijo') }}">
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Exceso' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="exceso" id="exceso" value="{{ old('exceso') }}">
        </div>
    </div>
     <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Exceso' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="periodo" id="periodo" value="{{ old('periodo') }}">
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
        <input class="form-control" type="number" step=".01" min="0" name="valMin"  id="valMin"  required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Valor Máximo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="valMax" id="valMax" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Valor Fijo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="valorFijo" id="valorFijo" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Exceso' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="exceso" id="exceso" >
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Proceso' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="periodo" id="periodo">
        </div>
    </div>
    @endif
    @else
    <input  class="form-control" type="number" step=".01" min="0" name="valMin"  id="valMin" value="{{ old('valMin') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Valor Máximo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="valMax" id="valMax" value="{{ old('valMax') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Valor Fijo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="valorFijo" id="valorFijo" value="{{ old('valorFijo') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Exceso' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="number" step=".01" min="0" name="exceso" id="exceso" value="{{ old('exceso') }}">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Periodo' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="periodo" id="periodo" value="{{ old('periodo') }}">
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