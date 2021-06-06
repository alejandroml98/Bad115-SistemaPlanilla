@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/pais/create') }}">Agregar País</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>País</th>
            <th>Tipo Region</th>
            <th>Tipo SubRegion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($paises as $pais)
            <tr>
                <td>{{ $pais -> idpais }}</td>
                <td>{{ $pais -> nombrepais }}</td>
                @foreach ($tiposRegion as $tipoRegion)
                    @if ($pais -> idtiporegion == $tipoRegion -> idtiporegion)
                        <td>{{ $tipoRegion -> nombretiporegion }}</td>
                        <td>{{ $tipoRegion -> nombretiposubregion }}</td>
                    @endif
                @endforeach
                <td>
                    <a href="{{ url('/pais/'.$pais -> idpais.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/pais/'.$pais -> idpais) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>