<form action="{{ url('/ventasempleado') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('ventasempleado.form', ['mode' => 'create'])
</form>