<form action="{{ url('/puesto/'.$puesto -> codigopuesto) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('puesto.form', ['mode' => 'edit'])
</form>