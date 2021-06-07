<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearProfesionTitle">{{ $mode == 'create' ? 'Agregar Tipo Documento'  : 'Modificar Tipo Documento' }}</h5>
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
            <input type="text" class="form-control" name="nombreTipoDocumento" id="nombreTipoDocumentoCreate" value="{{ old('nombreTipoDocumento') }}" required />
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label" for="cadenaRegex">{{ 'Cadena Regex' }}</label>
        <div class="col-sm-8 pb-2">
            <input class="form-control" type="text" name="cadenaRegex" id="cadenaRegex" value="{{ old('cadenaRegex') }}">
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