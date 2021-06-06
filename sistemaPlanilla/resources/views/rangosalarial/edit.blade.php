<form action="{{ url('/rangosalarial/'.$rangoSalarial -> idrangosalarial) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('rangosalarial.form', ['mode' => 'edit'])
</form>