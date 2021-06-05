@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/subregion/create') }}">Agregar Sub Region</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Sub Región</th>
            <th>Región</th>        
            <th>País</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subRegiones as $subRegion)
            <tr>
                <td>{{ $subRegion -> idsubregion }}</td>
                <td>{{ $subRegion -> nombresubregion }}</td>
                @foreach ($regiones as $region)
                    @if ($region -> idregion == $subRegion -> idregion)
                        <td>{{ $region -> nombreregion }}</td>
                        @foreach ($paises as $pais)
                            @if ($pais -> idpais == $region -> idpais)
                                <td>{{ $pais -> nombrepais }}</td>
                            @endif
                        @endforeach                        
                    @endif
                @endforeach
                <td>
                    <a href="{{ url('/subregion/'.$subRegion -> idsubregion.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/subregion/'.$subRegion -> idsubregion) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>