<form action="{{ url('/centrocostos') }}" method="post">
    {{ csrf_field() }}
    @include('centrocostos.form', ['mode' => 'create'])
</form>