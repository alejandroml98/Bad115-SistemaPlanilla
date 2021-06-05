<form action="{{ url('/tiporegion') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('tiporegion.form', ['mode' => 'create'])
</form>