<section class="panel panel-featured">
    <header class="panel-heading">
        <div class="panel-actions">
            <a href="#" class="fa fa-caret-down"></a>
        </div>
        <h2 class="panel-title">Centro de costos para esta unidad</h2>
        <a class="panel-subtitle btn btn-success p-2 mt-4" href="{{ url('/unidadcentrocostos/create', [$unidadSeleccionada -> codigounidad]) }}">
            Agregar detalles al centro de Costos <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
            <div> 
                <span class="panel-subtitle align-self-center">¿No se tiene un presupuesto inicial asignado?</span>
                <a class="panel-subtitle btn btn-success p-2" href="{{ route('centrocostos.index') }}">Agregar Presupuesto Inicial</a>
            </div>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none mostrar" id="datatable-default">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Presupuesto Inicial</th>
                    <th>Presupuesto Final</th>
                    <th>Gasto Total</th>
                    <th>Año</th>
                    <th style="width: 1%;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unidadesCentroCostos as $unidadCentroCostos)   
                <tr class="gradeX">
                    <td>{{ $loop -> iteration}}</td>
                    @foreach ($centrosCostos as $centroCostos)
                    @if ($centroCostos -> idcentrocostos == $unidadCentroCostos -> idcentrocostos)
                        <td>{{ $centroCostos -> presupuestoinicial }}</td>
                    @endif
                    @endforeach
                    <td>{{ $unidadCentroCostos -> presupuestofinal }}</td>
                    <td>{{ $unidadCentroCostos -> gastototal }}</td>
                    <td>{{ $unidadCentroCostos -> anio }}</td>
                    <td class="text-center">
                        <a href="{{ url('/unidadcentrocostos/'.$unidadCentroCostos -> idunidadcentrocostos.'/edit') }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-pruebaCentroC'.$unidadCentroCostos -> idunidadcentrocostos }}" class="btn btn-danger p-0" method="post" action="{{ url('/unidadcentrocostos/'.$unidadCentroCostos -> idunidadcentrocostos) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="text" name="codigoUnidad" hidden value="{{ $unidadCentroCostos -> codigounidad }}">
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $unidadCentroCostos -> idunidadcentrocostos }}', '{{ $centroCostos -> presupuestoinicial }}','la unidad con presupuesto inicial')">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>