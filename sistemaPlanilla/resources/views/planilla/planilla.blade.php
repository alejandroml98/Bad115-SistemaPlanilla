<!-- 
    Les haré un favorcito, aquí tienen las siguientes cosas para esta vista:
    
    $planilla que es una array de arrays, los internos se componen así...
    [codigoEmpleado, salario, [Descuentos Agrupados], totalDescuentos, [Ingresos Agrupados], 
    totalIngresos, salarioNeto] 
    los [] son arrays internos de los arrays del array
    OJO: NO PUEDEN ACCEDE ASÍ A LOS ATRIBUTOS $planilla -> xxxxxx porque es un array
    no una colección, por eso me baso en las posiciones del array

    OJO 2: Como hago que coincidan los ingresos y descuentos? porque están en un orden específico,
    es decir por ejemplo se que descuento[0] es renta, entonces se que todos los empleados el primer
    descuento será la renta.

    $totalTipoIngresos que es el total general de cada tipo de ingreso, por ejemplo la suma de todas las bonificaciones    
    $totalTipoDescuentos que es el total general de cada tipo de descuento, por ejemplo la suma de todas las rentas

    $totalIngresos que es el total general de TODOS los ingresos osea la suma de los totales de cada empleado
    $totalDescuentos que es el total general de TODOS los descuentos osea la suma de los totales de cada empleado

    $totalAPagarUnidad que es el total de TODOOOOOO o en otras palabras la suma de los salarios netos
    $totalSalarios la suma de todos los salarios brutos
    $totalEmpleados el total de los empleados

    $tipoIngresos que es...
    Todos los tipo ingresos de la tabla TipoIngresos es decir idtipoingreso, nombretipoingresos y así...

    $tipoDescuento que es...
    Todos los tipo ingresos de la tabla TipoDescuento es decir idtipodescuento, nomretipodescuento y así...

    $unidad que es la unidad de la planilla    
    
-->
<h1>Planilla para la unidad de: {{ $unidad -> nombreunidad }}</h1>
<table>
    <thead>
        <tr>
            <th>Código Empleado</th>
            <th>Nombre Empleado</th>
            <th>Salario</th>
            @foreach ($tipoDescuentos as $tipoD)
                <th>{{ $tipoD -> nombretipodescuento }}</th>
            @endforeach
            <th>Total Descuentos</th>
            @foreach ($tipoIngresos as $tipoI)
                <th>{{ $tipoI -> nombretipoingresos }}</th>
            @endforeach
            <th>Total Ingresos</th>
            <th>Salario Neto</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($planilla as $empleado)
           <tr>
               <td><a href="{{ url('/planilla/'.$empleado[0].'/boletapago') }}">{{ $empleado[0] }}</a></td>
               <td>{{ $empleado[1] }}</td>
               <td>{{ $empleado[2] }}</td>                                  
               @foreach ($empleado[3] as $descuento)
                   <td>{{ $descuento }}</td>
               @endforeach
               <td>{{ $empleado[4] }}</td>
               @foreach ($empleado[5] as $ingreso)
                   <td>{{ $ingreso }}</td>
               @endforeach
               <td>{{ $empleado[6] }}</td>
               <td>{{ $empleado[7] }}</td>
           </tr> 
        @endforeach
        <tr>
            <td>TOTALES</td>
            <td>Empleados: {{ $totalEmpleados }}</td>
            <td>{{ $totalSalarios }}</td>
            @foreach ($totalTipoDescuentos as $tipoDescuento)
                   <td>{{ $tipoDescuento }}</td>
            @endforeach
            <td>{{ $totalDescuentos }}</td>
            @foreach ($totalTipoIngresos as $tipoIngreso)
                   <td>{{ $tipoIngreso }}</td>
            @endforeach
            <td>{{ $totalIngresos }}</td>
            <td>{{ $totalAPagarUnidad }}</td>
        </tr>
    </tbody>
</table>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>