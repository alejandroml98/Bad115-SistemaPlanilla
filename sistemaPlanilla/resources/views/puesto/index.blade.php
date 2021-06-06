@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/puesto/create') }}">Agregar Puesto</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Código</th>
            <th>Puesto</th>
            <th>¿Administrativo?</th>
            <th>Salario Mínimo - Salario Máximo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($puestos as $puesto)
            <tr>
                <td>{{ $puesto -> codigopuesto }}</td>
                <td>{{ $puesto -> nombrepuesto }}</td>
                @if ($puesto -> esadministrativo == '1')
                    <td>&#x2713;</td>
                @else
                    <td>&#x2717;</td>
                @endif
                @foreach ($rangosSalariales as $rangoSalarial)
                    @if ($rangoSalarial -> idrangosalarial == $puesto -> idrangosalarial)
                        <td>{{ $rangoSalarial -> salariominimo }} - {{ $rangoSalarial -> salariomaximo }}</td>
                    @endif
                @endforeach                
                <td>
                    <a href="{{ url('/puesto/'.$puesto -> codigopuesto.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/puesto/'.$puesto -> codigopuesto) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>