<form action="{{ url('/catalogocomision') }}" method="post">
    {{ csrf_field() }}
    @include('catalogocomision.form', ['mode' => 'create'])
</form>