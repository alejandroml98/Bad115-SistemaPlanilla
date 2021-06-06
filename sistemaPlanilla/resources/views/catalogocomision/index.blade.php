@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/catalogocomision/create') }}">Agregar Tipo Documento</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre Comision</th>
            <th>Porcentaje</th>
            <th>Valor Minimo</th>
            <th>Valor Maximo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($catalogoComisions as $catalogoComision)
            <tr>
                <td>{{ $catalogoComision -> idcatalogocomision }}</td>
                <td>{{ $catalogoComision -> nombrecomision }}</td>
                <td>{{ $catalogoComision -> porcentaje }}</td>
                <td>{{ $catalogoComision -> valmincomision }}</td>
                <td>{{ $catalogoComision -> valmaxcomision }}</td>
                <td>
                    <a href="{{ url('/catalogocomision/'.$catalogoComision -> idcatalogocomision.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/catalogocomision/'.$catalogoComision -> idcatalogocomision) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>