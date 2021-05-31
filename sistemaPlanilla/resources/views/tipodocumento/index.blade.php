@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/tipodocumento/create') }}">Agregar Tipo Documento</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre Tipo Documento</th>
            <th>Cadena Regex</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposDocumentos as $tipoDocumento)
            <tr>
                <td>{{ $tipoDocumento -> idtipodocumento }}</td>
                <td>{{ $tipoDocumento -> nombretipodocumento }}</td>
                <td>{{ $tipoDocumento -> cadenaregex }}</td>
                <td>
                    <a href="{{ url('/tipodocumento/'.$tipoDocumento -> idtipodocumento.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tipodocumento/'.$tipoDocumento -> idtipodocumento) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>