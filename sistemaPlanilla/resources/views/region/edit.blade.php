<form action="{{ url('/region/'.$region -> idregion) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('region.form', ['mode' => 'edit'])
</form>