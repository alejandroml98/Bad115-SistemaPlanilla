<form action="{{ url('/pais') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('pais.form', ['mode' => 'create'])
</form>