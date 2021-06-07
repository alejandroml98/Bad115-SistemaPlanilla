<form action="{{ url('/empresa') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('empresa.form', ['mode' => 'create'])
</form>