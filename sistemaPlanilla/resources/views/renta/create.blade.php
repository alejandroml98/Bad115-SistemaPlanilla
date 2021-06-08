<form action="{{ url('/renta') }}" method="post">
    {{ csrf_field() }}
    @include('renta.form', ['mode' => 'create'])
</form>
           
           
           
           
           
