<form action="{{ url('/cuentabancaria/'.$cuentaBancaria -> idcuentabancaria) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('cuentabancaria.form', ['mode' => 'edit'])
</form>