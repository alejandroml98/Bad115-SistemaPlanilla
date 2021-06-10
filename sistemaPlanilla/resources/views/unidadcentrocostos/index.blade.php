@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
<table class="table table-light table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>            
            <th>Presupuesto Inicial</th>
            <th>Presupuesto Final</th>
            <th>Gasto Total</th>
            <th>Año</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($unidadesCentroCostos as $unidadCentroCostos)            
            <tr>
                <td>{{ $unidadCentroCostos -> idunidadcentrocostos }}</td>            
                @foreach ($centrosCostos as $centroCostos)
                    @if ($centroCostos -> idcentrocostos == $unidadCentroCostos -> idcentrocostos)
                        <td>{{ $centroCostos -> presupuestoinicial }}</td>
                    @endif
                @endforeach
                <td>{{ $unidadCentroCostos -> presupuestofinal }}</td>
                <td>{{ $unidadCentroCostos -> gastototal }}</td>
                <td>{{ $unidadCentroCostos -> anio }}</td>
                <td>
                    <a href="{{ url('/unidadcentrocostos/'.$unidadCentroCostos -> idunidadcentrocostos.'/edit') }}" class="btn btn-warning">Editar</a>
                    <form  method="post" action="{{ url('/unidadcentrocostos/'.$unidadCentroCostos -> idunidadcentrocostos) }}">                
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="text" name="codigoUnidad" hidden value="{{ $unidadCentroCostos -> codigounidad }}">
                        <button type="submit" onclick="return confirm('¿Borrar de verdad el registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>