<form action="{{ url('/renta/'.$renta -> idrenta ) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('renta.form', ['mode' => 'edit'])
</form>
