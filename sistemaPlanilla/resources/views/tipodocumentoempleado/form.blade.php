<header class="panel-heading">
    <h2 class="panel-title">
        @if ($mode == 'create')
            {{ 'Agregar Documento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @else
            {{ 'Modificar Documento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
        @endif
    </h2>
</header>
<div class="panel-body p-5">
    @if ($mode == 'create')
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idTipoDocumento">Tipo de documento</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoDocumento" id="idTipoDocumento">
                <option value="" selected disabled>Seleccione el tipo de documento</option>
                @foreach ($tiposDocumentos as $tipoDocumento)
                    <option value="{{ $tipoDocumento -> idtipodocumento }}">{{ $tipoDocumento -> nombretipodocumento }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valorDocumento">{{ 'Valor del documento' }}</label>
            <input type="text" name="valorDocumento" id="valorDocumentoCreate" value="{{ old('valorDocumentoCreate') }}" class="form-control" placeholder="Ingrese los digitos del documento">
        </div>   
    @else
        <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
        <div class="form-group">
            <label for="idTipoDocumento">Tipo de documento</label>
            <select data-plugin-selectTwo class="form-control mt-1" name="idTipoDocumento" id="idTipoDocumento">
                @foreach ($tiposDocumentos as $tipoDocumento)
                    @if ($tipoDocumentoEmpleado -> idtipodocumento == $tipoDocumento -> idtipodocumento)
                        <option value="{{ $tipoDocumento -> idtipodocumento }}" selected>{{ $tipoDocumento -> nombretipodocumento }}</option>
                    @else
                        <option value="{{ $tipoDocumento -> idtipodocumento }}">{{ $tipoDocumento -> nombretipodocumento }}</option>
                    @endif            
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="valorDocumento">{{ 'Valor del documento' }}</label>
            <input type="text" name="valorDocumento" id="valorDocumento" value="{{ isset($tipoDocumentoEmpleado -> valordocumento) ? $tipoDocumentoEmpleado -> valordocumento : old('valorDocumento') }}" class="form-control" placeholder="Ingrese los digitos del documento">
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