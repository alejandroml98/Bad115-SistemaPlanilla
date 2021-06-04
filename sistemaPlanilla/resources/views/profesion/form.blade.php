<div class="modal-header bg-primary">
    <h4 class="modal-title" id="modalCrearProfesionTitle">{{ $mode == 'create' ? 'Agregar Profesión'  : 'Modificar Profesión' }}</h5>
        <button type="button" class="close modal-dismiss" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <label class="col-sm-3 control-label pb-5">{{ 'Nombre' }}</label>
    <div class="col-sm-9 pb-5">
        @if ($mode == 'create')
        <input type="text" class="form-control" name="nombreProfesionCrear" value="{{ old('nombreProfesionCrear') }}" required />
        @else
        <input type="text" class="form-control" name="nombreProfesion" id="nombreProfesion" value="{{ isset($profesion -> nombreprofesion) ? $profesion -> nombreprofesion : old('nombreProfesion') }}" required />
        @endif
    </div>
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
</div>
<div class="modal-footer">
    <button type="button" class="modal-dismiss btn btn-secondary" data-dismiss="modal">Cancelar</button>
    <input type="submit" class="btn btn-primary" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}"></input>
</div>