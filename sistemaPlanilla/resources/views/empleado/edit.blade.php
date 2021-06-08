<form action="{{ url('/empleado/'.$empleado -> codigoempleado) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('empleado.form', ['mode' => 'edit'])
</form>