@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>            
            <th>Tipo Ingreso</th>            
            <th>Valor Ingreso</th>
            <th>Contador Ingreso</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposIngresosEmpleados as $tipoIngresoEmpleado)            
            <tr>
                <td>{{ $tipoIngresoEmpleado -> idtipoingresoempleado }}</td>
                @foreach ($tiposIngresos as $tipoIngreso)
                    @if ($tipoIngreso -> idtipoingresos == $tipoIngresoEmpleado -> idtipoingresos)
                        <td>{{ $tipoIngreso -> nombretipoingresos }}</td>
                    @endif
                @endforeach
                <td>{{ $tipoIngresoEmpleado -> valotipoingresoempleado }}</td>
                <td>{{ $tipoIngresoEmpleado -> contadortipoingresoempleado }}</td>                           
                <td>
                    <a href="{{ url('/tipoingresosempleado/'.$tipoIngresoEmpleado -> idtipoingresoempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tipoingresosempleado/'.$tipoIngresoEmpleado -> idtipoingresoempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoEmpleado" hidden value="{{ $tipoIngresoEmpleado -> codigoempleado }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>