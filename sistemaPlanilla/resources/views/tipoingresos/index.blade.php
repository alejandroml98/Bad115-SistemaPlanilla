@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/tipoingresos/create') }}">Agregar Ingresos</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Ingresos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposIngresos as $tipoIngreso)
            <tr>
                <td>{{ $tipoIngreso -> idtipoingresos }}</td>
                <td>{{ $tipoIngreso -> nombretipoingresos }}</td>
                <td>
                    <a href="{{ url('/tipoingresos/'.$tipoIngreso -> idtipoingresos.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tipoingresos/'.$tipoIngreso -> idtipoingresos) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>