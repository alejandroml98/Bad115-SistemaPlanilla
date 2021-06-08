<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearCentroCTitle">{{ $mode == 'create' ? 'Agregar Presupuesto de Inicio'  : 'Modificar  Presupuesto de Inicio' }}</h5>
        <button type="button" class="close modal-dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <label class="col-sm-3 control-label pb-5">{{ 'Presupuesto Inicial' }}</label>
    <div class="col-sm-9 pb-2">
        @if ($mode == 'create')        
            @if (count($errors) > 0 && Session::get('peticion') == 'crear')
            <input class="form-control" type="number" min="0" step=".01" name="presupuestoInicial" id="presupuestoInicial" value="{{ old('presupuestoInicial') }}" required />
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
            <input class="form-control" type="number" min="0" step=".01" name="presupuestoInicial" id="presupuestoInicial" required />
            @endif
        @else
        <input class="form-control" type="number" min="0" step=".01" name="presupuestoInicial" id="presupuestoInicial" value="{{ old('presupuestoInicial') }}" required />
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