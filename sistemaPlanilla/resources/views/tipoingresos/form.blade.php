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
<h2>{{ $mode == 'create' ? 'Agregar Tipo Ingresos'  : 'Modificar Tipo Ingresos' }}</h2>
<label for="nombreTipoIngresos">{{ 'Nombre' }}</label>
<input type="text" name="nombreTipoIngresos" id="nombreTipoIngresos" value="{{ isset($tipoIngreso -> nombretipoingresos) ? $tipoIngreso -> nombretipoingresos : old('nombreTipoIngresos') }}">
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/tipoingresos/') }}">REGRESAR</a> -->

<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearProfesionTitle">{{ $mode == 'create' ? 'Agregar Tipo Ingreso'  : 'Modificar Tipo Ingreso' }}</h5>
        <button type="button" class="close modal-dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <label class="col-sm-3 control-label pb-5">{{ 'Nombre' }}</label>
    <div class="col-sm-9 pb-2">
        @if ($mode == 'create')        
            @if (count($errors) > 0 && Session::get('peticion') == 'crear')
            <input type="text" class="form-control" name="nombreTipoIngresos" id="nombreProfesionCreate" value="{{ old('nombreTipoIngresos') }}" required />
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @else
            <input type="text" class="form-control" name="nombreTipoIngresos" id="nombreProfesionCreate" required />
            @endif
        @else
        <input type="text" class="form-control" name="nombreTipoIngresos" id="nombreTipoIngresos" value="{{ old('nombreTipoIngresos') }}" required />
            @if (count($errors) > 0 && Session::get('peticion') != 'crear')
            <div class="alert alert-danger mt-2" role="alert" id="{{'error'.Session::get('peticion')}}">
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
</div>
<div class="modal-footer">
    <button type="button" class="modal-dismiss btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <input type="submit" class="btn btn-primary" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"></input>
</div>