<form action="{{ url('/unidad/'.$unidadSeleccionada -> codigounidad) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('unidad.form', ['mode' => 'edit'])
</form>