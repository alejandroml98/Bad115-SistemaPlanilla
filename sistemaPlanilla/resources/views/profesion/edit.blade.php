<form action="{{ url('/profesion/'.$profesion -> idprofesion) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('profesion.form', ['mode' => 'edit'])
</form>