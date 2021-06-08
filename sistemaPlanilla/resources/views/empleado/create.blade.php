<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('empleado.form', ['mode' => 'create'])
</form>