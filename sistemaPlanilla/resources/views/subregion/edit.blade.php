<form action="{{ url('/subregion/'.$subRegion -> idsubregion) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    @include('subregion.form', ['mode' => 'edit'])
</form>