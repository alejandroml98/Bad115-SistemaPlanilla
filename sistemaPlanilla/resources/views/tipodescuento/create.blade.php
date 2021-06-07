<form action="{{ url('/tipodescuento') }}" method="post">
    {{ csrf_field() }}
    @include('tipodescuento.form', ['mode' => 'create'])
</form>