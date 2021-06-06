<form action="{{ url('/pais/'.$pais -> idpais) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('pais.form', ['mode' => 'edit'])
</form>