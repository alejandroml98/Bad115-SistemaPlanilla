<form action="{{ url('/tipodocumento/'.$tipoDocumento -> idtipodocumento) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('tipodocumento.form', ['mode' => 'edit'])
</form>