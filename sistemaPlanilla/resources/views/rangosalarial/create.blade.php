<form action="{{ url('/rangosalarial') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('rangosalarial.form', ['mode' => 'create'])
</form>