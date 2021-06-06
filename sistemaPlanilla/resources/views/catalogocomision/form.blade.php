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
<h2>{{ $mode == 'create' ? 'Agregar Tipo Documento'  : 'Modificar Tipo Documento' }}</h2>
<label for="nombreComision">{{ 'Nombre' }}</label>
<input type="text" name="nombreComision" id="nombreComision" value="{{ isset($catalogoComision -> nombrecomision) ? $catalogoComision -> nombrecomision : old('nombreComision') }}">
<label for="porcentaje">{{ 'Porcentaje' }}</label>
<input type="number" name="porcentaje" id="porcentaje" value="{{ isset($catalogoComision -> porcentaje) ? $catalogoComision -> porcentaje : old('porcentaje') }}">
<label for="valMinComision">{{ 'Valor Minimo' }}</label>
<input type="number" min=0 name="valMinComision" id="valMinComision" value="{{ isset($catalogoComision -> valmincomision) ? $catalogoComision -> valmincomision : old('valMinComision') }}">
<label for="valMaxComision">{{ 'Valor Maximo' }}</label>
<input type="number" name="valMaxComision" id="valMaxComision" value="{{ isset($catalogoComision -> valmaxcomision) ? $catalogoComision -> valmaxcomision : old('valMaxComision') }}">

<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/catalogocomision/') }}">REGRESAR</a>