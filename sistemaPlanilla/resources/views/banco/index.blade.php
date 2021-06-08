@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/banco/create') }}">Agregar Banco</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bancos as $banco)
            <tr>
                <td>{{ $banco -> idbanco }}</td>
                <td>{{ $banco -> nombrebanco}}</td>
                <td>
                    <a href="{{ url('/banco/'.$banco -> idbanco.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/banco/'.$banco -> idbanco) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>