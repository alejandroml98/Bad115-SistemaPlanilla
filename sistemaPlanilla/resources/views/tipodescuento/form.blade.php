<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearTipoDescTitle">{{ $mode == 'create' ? 'Agregar Descuento'  : 'Modificar Descuento' }}</h5>
        <button type="button" class="close modal-dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <label class="col-sm-3 control-label pb-5">{{ 'Nombre' }}</label>
    <div class="col-sm-9 pb-2">
        @if ($mode == 'create')        
            @if (count($errors) > 0 && Session::get('peticion') == 'crear')
            <input type="text" class="form-control" name="nombreTipoDescuento" id="nombreTipoDescuentoCreate" value="{{ old('nombreTipoDescuento') }}" required />
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
            <input type="text" class="form-control" name="nombreTipoDescuento" id="nombreTipoDescuentoCreate" required />
            @endif
        @else
        <input type="text" class="form-control" name="nombreTipoDescuento" id="nombreTipoDescuento" value="{{ old('nombreTipoDescuento') }}" required />
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