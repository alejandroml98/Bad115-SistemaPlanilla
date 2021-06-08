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
<h2>
    @if ($mode == 'create')
        {{ 'Agregar Documento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @else
        {{ 'Modificar Documento para ' }}{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}
    @endif
</h2>
@if ($mode == 'create')    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoDocumento" id="idTipoDocumento">
        <option value="" selected disabled>Seleccione el tipo de documento</option>
        @foreach ($tiposDocumentos as $tipoDocumento)
            <option value="{{ $tipoDocumento -> idtipodocumento }}">{{ $tipoDocumento -> nombretipodocumento }}</option>
        @endforeach
    </select>
    <label for="valorDocumento">{{ 'Valor del documento' }}</label>
    <input type="text" name="valorDocumento" id="valorDocumentoCreate" value="{{ old('valorDocumentoCreate') }}">    
@else    
    <input type="text" hidden name="codigoEmpleado" id="codigoEmpleadoCreate" value="{{ $empleado -> codigoempleado }}">
    <select name="idTipoDocumento" id="idTipoDocumento">        
        @foreach ($tiposDocumentos as $tipoDocumento)
            @if ($tipoDocumentoEmpleado -> idtipodocumento == $tipoDocumento -> idtipodocumento)
                <option value="{{ $tipoDocumento -> idtipodocumento }}" selected>{{ $tipoDocumento -> nombretipodocumento }}</option>
            @else
                <option value="{{ $tipoDocumento -> idtipodocumento }}">{{ $tipoDocumento -> nombretipodocumento }}</option>
            @endif            
        @endforeach
    </select>
    <label for="valorDocumento">{{ 'Valor del documento' }}</label>
    <input type="text" name="valorDocumento" id="valorDocumento" value="{{ isset($tipoDocumentoEmpleado -> valordocumento) ? $tipoDocumentoEmpleado -> valordocumento : old('valorDocumento') }}">    
@endif
<input type="submit" value="{{ $mode == 'create' ? 'Agregar' : 'Modificar' }}">
<a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}">REGRESAR</a>