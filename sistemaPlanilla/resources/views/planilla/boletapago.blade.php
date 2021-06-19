<!-- 
    Les haré un favorcito, aquí tienen las siguientes cosas para esta vista:
    
    $boletaPago que se compone de...
    Código Empleado, Nombre Empleado + Apellido, Salario, Un array con los totales agrupados de descuentos,
    El total general de los descuentos, Un array con los totales agrupados de ingresos, el total general de ingresos,
    y el salario neto

    Así se formó el array para que tengan una mejor idea

            [0]array_push($boletaPago, $emp -> codigoempleado);
            [1]array_push($boletaPago, $emp -> primernombre.' '.$emp -> apellidopaterno);
            [2]array_push($boletaPago, $salario);
            [3]array_push($boletaPago, $totalDescuentosEmpleado);
            [4]array_push($boletaPago, $totalDescuentosEmpleadoActual);
            [5]array_push($boletaPago, $totalIngresosEmpleado);
            [6]array_push($boletaPago, $totalIngresosEmpleadoActual);
            [7]array_push($boletaPago, $salarioNetoEmpleado);

    $tipoIngresos que es...
    Todos los tipo ingresos de la tabla TipoIngresos es decir idtipoingreso, nombretipoingresos y así...

    $tipoDescuentos que es...
    Todos los tipo ingresos de la tabla TipoDescuento es decir idtipodescuento, nomretipodescuento y así...

    $unidad que es la unidad del empleado
    $unidadPrincipal que es la unidad padre, si la tiene, si no es null

    $emp que es el empleado seleccionado
    $empresa que es la empresa, alejandro dijo que lo pasara pero no sé exactamente para que
-->

<h1>Boleta de pago de {{ $emp -> primernombre. ' ' .$emp -> apellidopaterno }}</h1>
<h2>Empresa: {{ $empresa -> nombreempresa }}</h2>
<h2>Información Personal</h2>
<p>Código Empleado: {{ $emp -> codigoempleado }}</p>
<p>Nombre: {{ $emp -> primernombre. ' ' .$emp -> segundonombre .' '. $emp -> apellidopaterno .' '. $emp -> apellidomaterno .' '. $emp -> apellidocasado }}</p>
<p>Puesto: {{ $puesto -> nombrepuesto }}</p>
<p>Unidad: {{ $unidad -> nombreunidad }}</p>
@if (isset($unidadPrincipal))
    <p>Unidad Padre: {{ $unidadPrincipal -> nombreunidad }}</p>
@endif
<p>Salario: ${{ $emp -> salario }}</p>
<p>Correo Electrónico: <a href="mailto:{{ $emp -> correoelectronico }}">{{ $emp -> correoelectronico }}</a></p>
<h2>Ingresos</h2>
<table>
    @php
        $n = 0;
    @endphp
    @foreach ($tipoIngresos as $tipoIngreso)
        <tr>
            <th>{{ $tipoIngreso -> nombretipoingresos }}</th>
            <td>${{ $boletaPago[5][$n] }}</td>
        </tr>
    @php
        $n++;
    @endphp
    @endforeach
        <tr>
            <th>Total Ingresos: ${{ $boletaPago[6] }}</th>          
        </tr>
</table>
<h2>Descuentos</h2>
<table>
    @php
        $n = 0;
    @endphp
    @foreach ($tipoDescuentos as $tipoDescuento)
        <tr>
            <th>{{ $tipoDescuento -> nombretipodescuento }}</th>
            <td>${{ $boletaPago[3][$n] }}</td>
        </tr>
    @php
        $n++;
    @endphp
    @endforeach
        <tr>
            <th>Total Descuentos: ${{ $boletaPago[4] }}</th>          
        </tr>
</table>
<h3>Total a recibir: ${{ $boletaPago[7] }}</h3>