<form action="{{ url('/tipodescuentoempleado') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('tipodescuentoempleado.form', ['mode' => 'create'])
</form>