<form action="{{ url('/banco/'.$banco -> idbanco ) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('banco.form', ['mode' => 'edit'])
</form>