<form action="{{ url('/region') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('region.form', ['mode' => 'create'])
</form>