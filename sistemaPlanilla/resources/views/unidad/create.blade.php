<form action="{{ url('/unidad') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('unidad.form', ['mode' => 'create'])
</form>