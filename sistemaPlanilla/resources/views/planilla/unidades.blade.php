<table>
    <thead>
        <tr>
            <th>Código Unidad</th>
            <th>Nombre Unidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($unidadesPrincipales as $u)
            <tr>
                <td>{{ $u -> codigounidad }}</td>
                <td>{{ $u -> nombreunidad }}</td>
                <td>
                    <a class=" btn btn-primary editar"  href="{{ url('/planilla/'.$u -> codigounidad.'/generarplanilla') }}">
                        Generar Planilla
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>