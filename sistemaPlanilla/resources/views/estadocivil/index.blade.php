@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/estadocivil/create') }}">Agregar Estado Civil</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Nombre Estado Civil</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($estadosCiviles as $estadoCivil)
            <tr>
                <td>{{ $estadoCivil -> idestadocivil }}</td>
                <td>{{ $estadoCivil -> nombreestadocivil }}</td>
                <td>
                    <a href="{{ url('/estadocivil/'.$estadoCivil -> idestadocivil.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/estadocivil/'.$estadoCivil -> idestadocivil) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>