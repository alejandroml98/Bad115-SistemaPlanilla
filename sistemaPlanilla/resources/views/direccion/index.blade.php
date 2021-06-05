@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/direccion/create') }}">Agregar País</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>País</th>
            <th>Region</th>
            <th>Sub Region</th>
            <th>Detalle</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($direcciones as $direccion)
            <tr>
                <td>{{ $direccion -> iddireccion }}</td>            
                @foreach ($subRegiones as $subRegion)
                    @if ($subRegion -> idsubregion == $direccion -> idsubregion)
                        @foreach ($regiones as $region)
                            @if ($region -> idregion == $subRegion -> idregion)
                                @foreach ($paises as $pais)
                                    @if ($pais -> idpais == $region -> idpais)
                                        <td>{{ $pais -> nombrepais }}</td>
                                        <td>{{ $region -> nombreregion }}</td>
                                        <td>{{ $subRegion -> nombresubregion }}</td>
                                        <td>{{ $direccion -> detalledireccion }}</td>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <td>
                    <a href="{{ url('/direccion/'.$direccion -> iddireccion.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/direccion/'.$direccion -> iddireccion) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>