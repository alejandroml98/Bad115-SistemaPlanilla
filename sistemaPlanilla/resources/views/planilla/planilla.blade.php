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
               <td>{{ $empleado[0] }}</td>
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