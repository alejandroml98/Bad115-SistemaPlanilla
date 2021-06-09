<form action="{{ url('/unidad/'.$unidadSeleccionada -> codigounidad) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('unidad.form', ['mode' => 'edit'])
</form>
<!-- Seccion Centro Costos -->
<h1>Centro de Costos</h1>
<a href="{{ url('/unidadcentrocostos/create', [$unidadSeleccionada -> codigounidad]) }}">Agregar Centro Costos</a>
@include('unidadcentrocostos.index')