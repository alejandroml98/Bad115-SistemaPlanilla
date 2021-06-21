<form action="{{ url('/auth/role/store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('roles.form', ['mode' => 'create'])
</form>