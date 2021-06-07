@if (Session::has('mensaje')){{
    Session::get('mensaje')
}}    
@endif
@if (isset($empresa -> codigoempresa))
    <form action="{{ url('/empresa/'.$empresa -> codigoempresa) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        @include('empresa.form', ['mode' => 'edit'])
    </form>
@else
    <H1>TODAVÍA NO SE HA REGISTRADO LA EMPRESA</H1>
    <a href="{{ url('/empresa/create') }}">Agregar Empresa</a>
@endif