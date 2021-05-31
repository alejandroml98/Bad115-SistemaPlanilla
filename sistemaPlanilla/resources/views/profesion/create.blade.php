<form action="{{ url('/profesion') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('profesion.form', ['mode' => 'create'])
</form>