<form action="{{ url('/tipounidad/'.$tipoUnidadSeleccionada -> idtipounidad) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('tipounidad.form', ['mode' => 'edit'])
</form>