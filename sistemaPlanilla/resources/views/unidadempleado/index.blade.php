@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>            
            <th>Nombre Unidad</th>
            <th>Es Jefe</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($unidadesEmpleados as $unidadEmpleado)            
            <tr>
                <td>{{ $unidadEmpleado -> idunidadempleado }}</td>
                @foreach ($unidades as $unidad)
                    @if ($unidad -> codigounidad == $unidadEmpleado -> codigounidad)
                        <td>{{ $unidad -> nombreunidad }}</td>
                    @endif
                @endforeach
                @if ($unidadEmpleado -> esjefe == '1')
                    <td>&#x2713;</td>
                @else
                    <td>&#x2717;</td>
                @endif
                <td>
                    <a href="{{ url('/unidadempleado/'.$unidadEmpleado -> idunidadempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/unidadempleado/'.$unidadEmpleado -> idunidadempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoEmpleado" hidden value="{{ $unidadEmpleado -> codigoempleado }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>