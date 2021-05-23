<form action="{{ url('/genero/'.$genero -> idgenero) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <label for="nombreGenero">{{ 'Nombre' }}</label>
    <input type="text" name="nombreGenero" id="nombreGenero" value="{{ $genero -> nombregenero }}">
    <input type="submit" value="Editar">
</form>
<a href="{{ url('/genero/') }}">REGRESAR</a>