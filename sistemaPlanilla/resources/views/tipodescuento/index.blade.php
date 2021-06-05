@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/tipodescuento/create') }}">Agregar Tipo Descuento</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
                    <th>ID</th>
                    <th>Descuentos</th>
                    <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tipoDescuentos as $tipoDescuento)
                <tr class="gradeX">
                    <td>{{ $tipoDescuento -> idtipodescuento }}</td>
                    <td>{{ $tipoDescuento -> nombretipodescuento }}</td>
                    <td>
                    <a href="{{ url('/tipodescuento/'.$tipoDescuento -> idtipodescuento.'/edit') }}" class="btn btn-warning">Editar</a>
                        <form method="post" action="{{ url('/tipodescuento/'.$tipoDescuento -> idtipodescuento) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar de verdad el registro?')"> Eliminar </button>
                        </form>
                    </td>
                </tr>
        @endforeach
    </tbody>
</table>