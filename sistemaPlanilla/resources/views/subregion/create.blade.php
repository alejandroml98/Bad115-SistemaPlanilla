<form action="{{ url('/subregion') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @include('subregion.form', ['mode' => 'create'])
</form>