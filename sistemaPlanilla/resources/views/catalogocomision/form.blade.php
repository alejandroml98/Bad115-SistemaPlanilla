<header class="panel-heading">
    <h2 class="panel-title">{{ $mode == 'create' ? 'Agregar Comisión '  : 'Modificar Comisión ' }}</h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
    <div class="form-group">
        <label for="nombreComision">{{ 'Nombre' }}</label>
        <input type="text" name="nombreComision" id="nombreComision" value="{{ old('nombreComision') }}" class="form-control" placeholder="Ingrese el nombre para identificar la Comisión ">
    </div>
    <div class="form-group">
        <label for="porcentaje">{{ 'Porcentaje' }}</label>
        <input type="number" step=".01" name="porcentaje" id="porcentaje" value="{{ old('porcentaje') }}" class="form-control" placeholder="Porcentaje a ganar por la Comisión ">
    </div>
    <div class="form-group">
        <label for="valMinComision">{{ 'Valor Minimo' }}</label>
        <input type="number" min="0" name="valMinComision" id="valMinComision" value="{{ old('valMinComision') }}" class="form-control" placeholder="Valor minimo para aplicar a la Comisión ">
    </div>
    <div class="form-group">
        <label for="valMaxComision">{{ 'Valor Maximo' }}</label>
        <input type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ old('valMaxComision') }}" class="form-control" placeholder="Valor maximo para aplicar a la Comisión ">
    </div>
    @else
    <div class="form-group">
        <label for="nombreComision">{{ 'Nombre' }}</label>
        <input type="text" name="nombreComision" id="nombreComision" value="{{ isset($catalogoComision -> nombrecomision) ? $catalogoComision -> nombrecomision : old('nombreComision') }}" class="form-control" placeholder="Ingrese el nombre para identificar la Comisión ">
    </div>
    <div class="form-group">
        <label for="porcentaje">{{ 'Porcentaje' }}</label>
        <input type="number" step=".01" name="porcentaje" id="porcentaje" value="{{ isset($catalogoComision -> porcentaje) ? $catalogoComision -> porcentaje : old('porcentaje') }}" class="form-control" placeholder="Porcentaje a ganar por la Comisión ">
    </div>
    <div class="form-group">
        <label for="valMinComision">{{ 'Valor Minimo' }}</label>
        <input type="number" min="0" name="valMinComision" id="valMinComision" value="{{ isset($catalogoComision -> valmincomision) ? $catalogoComision -> valmincomision : old('valMinComision') }}" class="form-control" placeholder="Valor minimo para aplicar a la Comisión ">
    </div>
    <div class="form-group">
        <label for="valMaxComision">{{ 'Valor Maximo' }}</label>
        <input type="number" min="0" name="valMaxComision" id="valMaxComision" value="{{ isset($catalogoComision -> valmaxcomision) ? $catalogoComision -> valmaxcomision : old('valMaxComision') }}" class="form-control" placeholder="Valor maximo para aplicar a la Comisión ">
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
        <a href="{{ url('/catalogocomision/') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>