@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/tipounidad/create') }}">Agregar Tipo Unidad</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Tipo Unidad</th>
            <th>Tipo Unidad Padre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposUnidades as $tipoUnidad)
            <tr>
                <td>{{ $tipoUnidad -> idtipounidad }}</td>
                <td>{{ $tipoUnidad -> nombretipounidad }}</td>
                @if (isset($tipoUnidad -> idtipounidadpadre))
                    @foreach ($tiposUnidades as $tipoUnidad2)
                        @if ($tipoUnidad -> idtipounidadpadre == $tipoUnidad2 -> idtipounidad)
                            <td>{{ $tipoUnidad2 -> nombretipounidad }}</td>        
                        @endif
                    @endforeach                              
                @else
                    <td>{{ 'N/A' }}</td>
                @endif                
                <td>
                    <a href="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tipounidad/'.$tipoUnidad -> idtipounidad) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>