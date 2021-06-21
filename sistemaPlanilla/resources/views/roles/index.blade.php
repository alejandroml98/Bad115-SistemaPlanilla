<!----si---->
@extends('layouts.app')
@push('vendorcss')

<link rel="stylesheet" href="{{ asset('assets/vendor/select2/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />
@endpush
@section('content')
<a class=" btn btn-primary mb-3"  href="{{ url('/auth/role/create') }}" id="btnCrear">
    Agregar Rol <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
<section class="panel">
    <header class="panel-heading">
        <h2 class="panel-title">Roles Existentes</h2>
    </header>
    <div class="panel-body" lang="es">
        <table class="table table-bordered table-striped mb-none" >
            <thead>
                <tr>
                <th>ID</th>
            <th>Rol</th>
            <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
           
                    
              
              
            @foreach ($roles as $rol)
                <tr class="gradeX">
                <td>{{$loop -> iteration }}</td>
                <td>{{$rol -> name}}</td>
            
                <td class="text-center">
                        <a class=" btn btn-primary editar" id="{{'editar'. $rol -> id }}"  href="{{ url('/roles/'.$rol -> id.'/edit') }}" data-id="{{ $rol -> id}}" class="btn btn-warning">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        <form id="{{ 'formulario-prueba'.$rol -> id }}" class="btn btn-danger p-0" method="post" action="{{ url('/roles/'.$rol -> id) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger border-0" type="submit" onclick="presionar('{{ $rol -> id}}', '{{ $rol -> name}} ',' El rol ')">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
@push('vendorjs')
<script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
   
    <script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
<script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2.js')}}"></script>
<script src="{{asset('assets/vendor/select2/select2_locale_es.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
<script src="{{asset('assets/javascripts/tables/examples.datatables.default.js')}}"></script>

<script src="{{asset('js/profesion.js')}}"></script>
@endpush
