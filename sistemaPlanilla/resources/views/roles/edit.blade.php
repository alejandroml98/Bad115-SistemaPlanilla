<form action="{{ url('/roles/'.$rol -> id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('roles.form', ['mode' => 'edit'])
</form>