<form action="{{ url('/estadocivil') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('estadocivil.form', ['mode' => 'create'])
</form>