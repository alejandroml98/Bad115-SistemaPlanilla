<form action="{{ url('/genero') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('genero.form', ['mode' => 'create'])
</form>