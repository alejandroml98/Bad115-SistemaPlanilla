<form action="{{ url('/catalogocomision/'.$catalogoComision -> idcatalogocomision ) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('catalogocomision.form', ['mode' => 'edit'])
</form>