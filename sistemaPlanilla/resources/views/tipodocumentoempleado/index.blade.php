@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tipo Documento</th>
            <th>Valor Documento</th>            
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposDocumentosEmpleados as $tipoDocumentoEmpleado)            
            <tr>
                <td>{{ $tipoDocumentoEmpleado -> idtipodocumentoempleado }}</td>
                @foreach ($tiposDocumentos as $tipoDocumento)
                    @if ($tipoDocumento -> idtipodocumento == $tipoDocumentoEmpleado -> idtipodocumento)
                        <td>{{ $tipoDocumento -> nombretipodocumento }}</td>
                    @endif
                @endforeach
                <td>{{ $tipoDocumentoEmpleado -> valordocumento }}</td>                            
                <td>
                    <a href="{{ url('/tipodocumentoempleado/'.$tipoDocumentoEmpleado -> idtipodocumentoempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tipodocumentoempleado/'.$tipoDocumentoEmpleado -> idtipodocumentoempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoEmpleado" hidden value="{{ $tipoDocumentoEmpleado -> codigoempleado }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>