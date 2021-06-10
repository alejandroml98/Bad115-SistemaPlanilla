@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>            
            <th>Nombre Profesión</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($profesionesEmpleados as $profesionEmpleado)            
            <tr>
                <td>{{ $profesionEmpleado -> idprofesionempleado }}</td>
                @foreach ($profesiones as $profesion)
                    @if ($profesion -> idprofesion == $profesionEmpleado -> idprofesion)
                        <td>{{ $profesion -> nombreprofesion }}</td>
                    @endif
                @endforeach                                           
                <td>
                    <a href="{{ url('/profesionempleado/'.$profesionEmpleado -> idprofesionempleado.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/profesionempleado/'.$profesionEmpleado -> idprofesionempleado) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoEmpleado" hidden value="{{ $profesionEmpleado -> codigoempleado }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Quitar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>