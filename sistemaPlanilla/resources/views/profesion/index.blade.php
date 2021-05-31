@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/profesion/create') }}">Agregar Profesión</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre Genero</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profesiones as $profesion)
            <tr>
                <td>{{ $profesion -> idprofesion }}</td>
                <td>{{ $profesion -> nombreprofesion }}</td>
                <td>
                    <a href="{{ url('/profesion/'.$profesion -> idprofesion.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/profesion/'.$profesion -> idprofesion) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>