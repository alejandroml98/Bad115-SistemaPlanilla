@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/pais/create') }}">Agregar País</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Codigo del Empleado</th>
            <th>Valor de las Ventas</th>
            <th>Fecha de Venta</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ventasEmpleado as $ventaEmpleado)
            <tr>
                <td>{{ $ventaEmpleado -> idventasempleado }}</td>
                @foreach ($empleados as $empleado)
                    @if ($ventasEmpleado -> codigoempleado == $empleado -> codigoempleado)
                        <td>{{ $empleado -> codigoempleado }}</td>
                    @endif
                @endforeach
                <td>{{ $ventaEmpleado -> valorventa }}</td>
                <td>{{ $ventaEmpleado -> fechaventa }}</td>
                <td>
                    <a href="{{ url('/ventasempleado/'.$ventaEmpleado -> idventasempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/ventasempleado/'.$ventaEmpleado -> idventasempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>