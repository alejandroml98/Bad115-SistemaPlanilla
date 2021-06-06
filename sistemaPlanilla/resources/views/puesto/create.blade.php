<form action="{{ url('/puesto') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('puesto.form', ['mode' => 'create'])
</form>