<form action="{{ url('/tipodocumento') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('tipodocumento.form', ['mode' => 'create'])
</form>