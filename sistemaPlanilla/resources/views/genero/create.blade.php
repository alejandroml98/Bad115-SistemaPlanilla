<form action="{{ url('/genero') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <label for="nombreGenero">{{ 'Nombre' }}</label>
    <input type="text" name="nombreGenero" id="nombreGenero" value="">
    <input type="submit" value="Agregar">
</form>
<a href="{{ url('/genero/') }}">REGRESAR</a>