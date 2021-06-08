@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<a href="{{ url('/centrocostos/create') }}">Agregar Presupuesto Inicial</a>
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Presupuesto Inicial</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($centroCostos as $centroCosto)
            <tr>
                <td>{{ $centroCosto -> idcentrocostos }}</td>
                <td>{{ $centroCosto -> presupuestoinicial }}</td>
                <td>
                    <a href="{{ url('/centrocostos/'.$centroCosto -> idcentrocostos.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/centrocostos/'.$centroCosto -> idcentrocostos) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>