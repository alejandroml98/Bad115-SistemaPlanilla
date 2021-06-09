<form action="{{ url('/ventasempleado/'.$ventasEmpleado -> idventasempleado) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('ventasempleado.form', ['mode' => 'edit'])
</form>