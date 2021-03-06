<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Across') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/magnific-popup.css') }}" />
   
    @stack('vendorcss')

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.css') }}" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/skins/default.css') }}" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-custom.css') }}">

    <!-- Head Libs -->
    <script src="{{ asset('assets/vendor/modernizr/modernizr.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="{{ url('/') }}" class="logo" style="vertical-align: middle; text-decoration: none;">
                    <img src="{{ asset('assets/images/logo.png') }}" height="40" width="40" alt="JSOFT Admin" /> <span style="font-size: 18px; color:#3c4f60; vertical-align: middle;">&nbsp;{{ config('app.name', 'Across') }} </span>
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">
                @auth
                <div id="MyClockDisplay" class="search nav-form text-right" onload="showTime()"></div>
                
                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="{{ asset('assets/images/!logged-user.jpg') }}" alt="Joseph Doe" class="img-circle" data-lock-picture="{{ asset('assets/images/!logged-user.jpg')}}" />
                        </figure>
                        <div class="profile-info" data-lock-name="{{ Auth::user()->name }}" data-lock-email="{{ Auth::user()->email }}">
                            <span class="name">{{ Auth::user()->name }}</span>
                            @if (Auth::user()->activo==1)
                                <span class="role" name = "unidad"></span>                                
                            @endif
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/profile/') }}" role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> Perfil</a>
                            </li>
                            <!--<li>
                                <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Bloquear pantalla</a>
                            </li>-->
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Cerrar Sesi??n</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>            
            @endauth
            <!-- Right Side Of Navbar -->
            <ul class="notifications">
                @guest
                <li>
                    <a class="register-links" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp; {{ __('Iniciar Sesi??n') }}</a>
                </li>
                @endguest
            </ul>
            </div>
        </header>
        <!-- end: header -->
        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @auth
            @if (Auth::user()->activo==1)
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navegaci??n
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main">
                                <li class="nav-active">
                                    <a href="{{ route('home') }}">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Inicio</span>
                                    </a>
                                </li>                                
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        <span>Planilla</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        @can('Generar Planilla')
                                        <li>
                                            <a href="{{ route('planilla.unidades') }}">                                        
                                            Unidades</a>
                                        </li>
                                        @endcan
                                        @can('Generar Boleta de Pago')
                                        <li>
                                            <a id="linkBoleta">                                        
                                            Boleta de Pago</a>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>
                                @can('Listar Unidad')                                
                                <li>
                                    <a href="{{ route('unidad.index') }}">
                                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                                        <span>Unidad Organizacional</span>
                                    </a>
                                </li>
                                @endcan                                
                                @role('admin')
                                <li>
                                    <a href="{{ route('empresa.index') }}">
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        <span>Empresa</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        <span>Informacion General</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="{{ route('estadocivil.index') }}">Estado Civil</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('genero.index') }}">Genero</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tipodocumento.index') }}">Tipos de documento</a>
                                        </li>                                        
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        <span>Informacion Financiera</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="{{ route('tipodescuento.index') }}">Tipos de descuento</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('rangosalarial.index') }}">Rango Salarial</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tipoingresos.index') }}">Tipo Ingreso</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('banco.index') }}">Bancos</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('renta.index') }}">Renta</a>
                                        </li>                                          
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-dollar" aria-hidden="true"></i>
                                        <span>Ventas</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="{{ route('catalogocomision.index') }}">
                                                Comisiones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('ventasempleado.index') }}">
                                                Ventas por empleado
                                            </a>
                                        </li>                                            
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-folder" aria-hidden="true"></i>
                                        <span>Cat??logos</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="{{ route('puesto.index') }}">
                                                Puestos de la Empresa
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('profesion.index') }}">
                                                Profesiones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('tipounidad.index') }}">
                                                Tipos de Unidad Organizacional
                                            </a>
                                        </li>                                                                               
                                    </ul>
                                </li>
                                    <li>
                                        <a href="{{ route('empleado.index') }}">
                                            <i class="fa fa-users" aria-hidden="true"></i>
                                            <span>Empleados</span>
                                        </a>    
                                    </li>                                   
                                    
                                    <li class="nav-parent">
                                        <a>
                                            <i class="fa fa-align-left" aria-hidden="true"></i>
                                            <span>Configuraciones</span>
                                        </a>
                                        <ul class="nav nav-children">
                                            <li class="nav-parent">
                                                <a>Ubicaci??n</a>
                                                <ul class="nav nav-children">
                                                    <li>
                                                    <a href="{{ route('pais.index') }}">Pais</a>
                                                    </li>
                                                    <li>
                                                    <a href="{{ route('tiporegion.index') }}">Tipos Regi??n</a>
                                                    </li>
                                                    <li>
                                                    <a href="{{ route('region.index') }}">Regiones</a>
                                                    </li>
                                                    <li>
                                                    <a href="{{ route('subregion.index') }}">Sub Regiones</a>
                                                    </li> 
                                                </ul>
                                            </li>   
                                                                       
                                        </ul>
                                        <ul class="nav nav-children">
                                            <li class="nav-parent">
                                                <a>Permisos</a>
                                                <ul class="nav nav-children">
                                                <li>
                                                    <a href="{{ url('user/index') }}">Usuarios</a>
                                                    </li>
                                                    <li>
                                                    <a href="{{ url('roles/index') }}">Roles</a>
                                                    </li>
                                                     
                                                </ul>
                                            </li>   
                                                                      
                                        </ul>
                                    </li>
                                @endrole
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>
            @endif
            @endauth
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    @auth
                    <!--<h2>{{ Route::currentRouteName() }}</h2>-->

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.html">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>{{ Route::currentRouteName() }}</span></li>
                        </ol>
                    </div>
                    @endauth
                </header>
                <main class="col-12">
                    @yield('content')
                </main>
            </section>
        </div>
    </section>

    <!-- Vendor -->
    <script src="{{ asset('assets/vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/magnific-popup.js') }}"></script>

    <!-- Specific Page Vendor -->
    <script src="{{ asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js') }}"></script>

    @stack('vendorjs')

    <!-- Theme Base, Components and Settings -->
    <script src="{{ asset('assets/javascripts/theme.js') }}"></script>

    <!-- Theme Custom -->
    <script src="{{ asset('assets/javascripts/theme.custom.js') }}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{ asset('assets/javascripts/theme.init.js') }}"></script>

    <!-- sweetAlert library -->
    @include('sweetalert::alert')

    <script>
        $(function() {                                    
            var url = "{{ url('/user/unidad') }}";
            $.get(url, function(data) {
                var span = $('span[name=unidad]');            
                span.append(data);                                                       
            });                                    
        });        
    </script>

    <script>
        $(function() {                                    
            var url = "{{ url('/user/codigo') }}";            
            $.get(url, function(data) {
                var link = $('#linkBoleta');
                link.attr('href', '/planilla/'+data+'/boletapago');                                                  
            });                                    
        });
    </script>

</body>

</html>