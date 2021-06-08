@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/unidad/create') }}">Agregar Tipo Unidad</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Código</th>
            <th>Unidad</th>
            <th>Unidad Padre</th>
            <th>Tipo Unidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($unidades as $unidad)
            <tr>
                <td>{{ $unidad -> codigounidad }}</td>
                <td>{{ $unidad -> nombreunidad }}</td>
                @if (isset($unidad -> codigounidadantecesora))
                    @foreach ($unidades as $unidad2)
                        @if ($unidad -> codigounidadantecesora == $unidad2 -> codigounidad)
                            <td>{{ $unidad2 -> nombreunidad }}</td>        
                        @endif
                    @endforeach                              
                @else
                    <td>{{ 'N/A' }}</td>
                @endif
                @foreach ($tiposUnidades as $tipoUnidad)
                    @if ($tipoUnidad -> idtipounidad == $unidad -> idtipounidad)
                        <td>{{ $tipoUnidad -> nombretipounidad }}</td>
                    @endif
                @endforeach              
                <td>
                    <a href="{{ url('/unidad/'.$unidad -> codigounidad.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/unidad/'.$unidad -> codigounidad) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>