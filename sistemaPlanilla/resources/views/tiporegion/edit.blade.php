<form action="{{ url('/tiporegion/'.$tipoRegion -> idtiporegion) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('tiporegion.form', ['mode' => 'edit'])
</form>