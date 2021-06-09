@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>            
            <th>Tipo Descuento</th>            
            <th>Valor Descuento (%)</th>
            <th>Contador Descuento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tiposDescuentosEmpleados as $tipoDescuentoEmpleado)            
            <tr>
                <td>{{ $tipoDescuentoEmpleado -> idtipodescuentoempleado }}</td>
                @foreach ($tiposDescuentos as $tipoDescuento)
                    @if ($tipoDescuento -> idtipodescuento == $tipoDescuentoEmpleado -> idtipodescuento)
                        <td>{{ $tipoDescuento -> nombretipodescuento }}</td>
                    @endif
                @endforeach
                <td>{{ $tipoDescuentoEmpleado -> valortipodescuentoempleado }}</td>
                <td>{{ $tipoDescuentoEmpleado -> contadortipodescuentoempleado }}</td>                           
                <td>
                    <a href="{{ url('/tipodescuentoempleado/'.$tipoDescuentoEmpleado -> idtipodescuentoempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/tipodescuentoempleado/'.$tipoDescuentoEmpleado -> idtipodescuentoempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoEmpleado" hidden value="{{ $tipoDescuentoEmpleado -> codigoempleado }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>