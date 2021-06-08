<form action="{{ url('/banco') }}" method="post">
    {{ csrf_field() }}
    @include('banco.form', ['mode' => 'create'])
</form>