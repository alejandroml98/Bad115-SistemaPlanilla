<form action="{{ url('/empleado/'.$empleado -> codigoempleado) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('empleado.form', ['mode' => 'edit'])    
</form>
<!-- Seccion Cuentas Bancarias -->
<h1>CUENTAS BANCARIAS ASOCIADAS</h1>
<a href="{{ url('/cuentabancaria/create', [$empleado -> codigoempleado]) }}">Agregar Cuenta Bancaria</a>
@include('cuentabancaria.index')
<!-- Seccion Documentos -->
<h1>DOCUMENTOS ASOCIADOS</h1>
<a href="{{ url('/tipodocumentoempleado/create', [$empleado -> codigoempleado]) }}">Agregar Documento</a>
@include('tipodocumentoempleado.index')
<!-- Seccion Descuentos -->
<h1>DESCUENTOS DESIGNADOS</h1>
<a href="{{ url('/tipodescuentoempleado/create', [$empleado -> codigoempleado]) }}">Agregar Descuento</a>
@include('tipodescuentoempleado.index')
<!-- Seccion Ingresos -->
<h1>INGRESOS GENERADOS</h1>
<a href="{{ url('/tipoingresosempleado/create', [$empleado -> codigoempleado]) }}">Agregar Ingreso</a>
@include('tipoingresoempleado.index')