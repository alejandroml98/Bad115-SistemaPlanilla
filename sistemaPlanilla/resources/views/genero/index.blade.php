@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/genero/create') }}">Agregar Genero</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre Genero</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($generos as $genero)
            <tr>
                <td>{{ $genero -> idgenero }}</td>
                <td>{{ $genero -> nombregenero }}</td>
                <td>
                    <a href="{{ url('/genero/'.$genero -> idgenero.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/genero/'.$genero -> idgenero) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>