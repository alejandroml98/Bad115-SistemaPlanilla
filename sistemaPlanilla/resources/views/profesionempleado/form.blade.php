<header class="panel-heading">
    <h2 class="panel-title">
        @if ($mode == 'create')
            {{ 'Agregar Profesión para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @else
            {{ 'Modificar Profesión para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @endif
    </h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idTipoDocumento">Profesion del empleado</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idProfesion" id="idProfesion">
                <option value="" selected disabled>Seleccione una profesión</option>
                @foreach ($profesiones as $profesion)
                    <option value="{{ $profesion -> idprofesion }}">{{ $profesion -> nombreprofesion }}</option>
                @endforeach
            </select>
        </div>  
    @else
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idTipoDocumento">Profesion del empleado</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idProfesion" id="idProfesion">
                @foreach ($profesiones as $profesion)
                @if ($profesionEmpleado -> idprofesion == $profesion -> idprofesion)
                    <option value="{{ $profesion -> idprofesion }}" selected>{{ $profesion -> nombreprofesion }}</option>
                @else
                <option value="{{ $profesion -> idprofesion }}">{{ $profesion -> nombreprofesion }}
                @endif            
                @endforeach
            </select>
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
        <a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" class="btn btn-danger">Cancelar</a>
    </div>
</div>