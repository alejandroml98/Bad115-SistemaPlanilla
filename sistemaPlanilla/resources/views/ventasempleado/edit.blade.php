<form action="{{ url('/ventasempleado/'.$ventaEmpleado -> idventasempleado) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('ventasempleado.form', ['mode' => 'edit'])
</form>