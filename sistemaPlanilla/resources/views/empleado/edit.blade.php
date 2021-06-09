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
<!-- Seccion Ingresos -->
<h1>PROFESIONES</h1>
<a href="{{ url('/profesionempleado/create', [$empleado -> codigoempleado]) }}">Agregar Profesion</a>
@include('profesionempleado.index')
<!-- Seccion Unidades -->
<h1>UNIDADES EN LAS QUE PARTICIPA</h1>
<a href="{{ url('/unidadempleado/create', [$empleado -> codigoempleado]) }}">Agregar Unidad</a>
@include('unidadempleado.index')