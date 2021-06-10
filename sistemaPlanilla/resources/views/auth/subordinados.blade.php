<h1>Subordinados de {{ $empleado -> primernombre }}{{ ' ' }}{{ $empleado -> apellidopaterno }}</h1>
<h2>Unidad - {{ $unidad -> nombreunidad }}</h2>
<ul>
    @foreach ($subordinados as $subordinado)
        @foreach ($puestos as $puesto)
            @if ($puesto -> codigopuesto == $subordinado -> codigopuesto)
                <li>{{ $subordinado -> codigoempleado }}-{{ $subordinado -> primernombre }}{{ ' ' }}{{ $subordinado -> apellidopaterno }}-{{ $puesto -> nombrepuesto }}</li>
            @endif
        @endforeach        
    @endforeach
</ul>
