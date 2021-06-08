<form action="{{ url('/empleado/'.$empleado -> codigoempleado) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('empleado.form', ['mode' => 'edit'])    
</form>
<!-- Seccion Cuentas Bancarias -->
<h1>CUENTAS BANCARIAS ASOCIADAS</h1>
<a href="{{ url('/cuentabancaria/create', [$empleado -> codigoempleado]) }}">Agregar Cuenta Bancaria</a>
@include('cuentabancaria.index')