@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/renta/create') }}">Agregar Tipo de Renta</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Valor Minimo</th>
            <th>Valor Maximo</th>
            <th>Valor Fijo</th>
            <th>Exceso</th>
            <th>Periodo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rentas as $renta)
            <tr>
                <td>{{ $renta -> idrenta }}</td>
                <td>{{ $renta -> valmin }}</td>
                <td>{{ $renta -> valmax }}</td>
                <td>{{ $renta -> valorfijo }}</td>
                <td>{{ $renta -> exceso }}</td>
                <td>{{ $renta -> periodo }}</td>
                <td>
                    <a href="{{ url('/renta/'.$renta -> idrenta.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/renta/'.$renta -> idrenta) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>