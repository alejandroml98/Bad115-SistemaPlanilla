<form action="{{ url('/cuentabancaria') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('cuentabancaria.form', ['mode' => 'create'])
</form>