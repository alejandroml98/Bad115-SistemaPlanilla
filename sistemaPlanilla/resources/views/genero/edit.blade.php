<form action="{{ url('/genero/'.$genero -> idgenero) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('genero.form', ['mode' => 'edit'])
</form>