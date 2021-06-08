@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/empleado/create') }}">Agregar Empleado</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Código</th>
            <th>Nombres</th>            
            <th>Apellidos</th>                        
            <th>Puesto</th>
            <th>Correo Empresarial</th>                       
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado -> codigoempleado }}</td>
                <td>{{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> segundonombre }}</td>                
                <td>{{ $empleado -> apellidopaterno }}{{ ' ' }}{{ $empleado -> apellidomaterno }}{{ ' ' }}{{ $empleado -> apellidocasado }}</td>
                @foreach ($puestos as $puesto)
                    @if ($puesto -> codigopuesto == $empleado -> codigopuesto)
                        <td>{{ $puesto -> nombrepuesto }}</td>
                    @endif
                @endforeach
                <td>{{ $empleado -> correoempresarial }}</td>
                <td>
                    <a href="{{ url('/empleado/'.$empleado -> codigoempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/empleado/'.$empleado -> codigoempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>