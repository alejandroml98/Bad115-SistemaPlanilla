@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/tiporegion/create') }}">Agregar Tipo Region</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tipo Region</th>
            <th>Tipo SubRegion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposRegion as $tipoRegion)
            <tr>
                <td>{{ $tipoRegion -> idtiporegion }}</td>
                <td>{{ $tipoRegion -> nombretiporegion }}</td>
                <td>{{ $tipoRegion -> nombretiposubregion }}</td>
                <td>
                    <a href="{{ url('/tiporegion/'.$tipoRegion -> idtiporegion.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tiporegion/'.$tipoRegion -> idtiporegion) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>