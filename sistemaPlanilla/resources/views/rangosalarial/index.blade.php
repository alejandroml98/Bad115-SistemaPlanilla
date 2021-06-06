@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/rangosalarial/create') }}">Agregar Rango Salarial</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Salario Mínimo</th>
            <th>Salario Máximo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rangosSalariales as $rangoSalarial)
            <tr>
                <td>{{ $rangoSalarial -> idrangosalarial }}</td>
                <td>{{ $rangoSalarial -> salariominimo }}</td>
                <td>{{ $rangoSalarial -> salariomaximo }}</td>
                <td>
                    <a href="{{ url('/rangosalarial/'.$rangoSalarial -> idrangosalarial.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/rangosalarial/'.$rangoSalarial -> idrangosalarial) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>