<form action="{{ url('/estadocivil/'.$estadoCivil -> idestadocivil) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('estadocivil.form', ['mode' => 'edit'])
</form>