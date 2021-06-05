@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/region/create') }}">Agregar Region</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Región</th>
            <th>País</th>        
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($regiones as $region)
            <tr>
                <td>{{ $region -> idregion }}</td>
                <td>{{ $region -> nombreregion }}</td>
                @foreach ($paises as $pais)
                    @if ($region -> idpais == $pais -> idpais)
                        <td>{{ $pais -> nombrepais }}</td>                        
                    @endif
                @endforeach
                <td>
                    <a href="{{ url('/region/'.$region -> idregion.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/region/'.$region -> idregion) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>