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
    <script src="assets/vendor/modernizr/modernizr.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="assets/images/logo.png">
</head>

<body>
    <section class="body">

        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="{{ url('/') }}" class="logo" style="vertical-align: middle; text-decoration: none;">
                    <img src="assets/images/logo.png" height="40" width="40" alt="JSOFT Admin" /> <span style="font-size: 18px; color:#3c4f60; vertical-align: middle;">&nbsp;{{ config('app.name', 'Across') }} </span>
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <!-- start: search & user box -->
            <div class="header-right">
                @auth
                <form action="pages-search-results.html" class="search nav-form">
                    <div class="input-group input-search">
                        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>

                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="{{ Auth::user()->name }}" data-lock-email="{{ Auth::user()->email }}">
                            <span class="name">{{ Auth::user()->name }}</span>
                            <span class="role">administrator</span>
                        </div>

                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> Perfil</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Bloquear pantalla</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
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
                    <a class="register-links" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                </li>

                <li>
                    <a class="register-links" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                </li>
                @endguest
            </ul>
            </div>
        </header>
        <!-- end: header -->
        <div class="inner-wrapper">
            <!-- start: sidebar -->
            @auth
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        Navegación
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
                                    <a href="index.html">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Inicio</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="mailbox-folder.html">
                                        <i class="fa fa-empire" aria-hidden="true"></i>
                                        <span>Centro de Costos</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        @role('writers')
                                            <span>Empleados</span>
                                        @else
                                            <span>No Empleados</span>
                                        @endrole
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="pages-signup.html">
                                                Enlace 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pages-signin.html">
                                                Enlace 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pages-recover-password.html">
                                                Enlace 3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="pages-lock-screen.html">
                                                Enlace 4
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                                        <span>Unidad Organizacional</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="ui-elements-typography.html">
                                                Enlace 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="ui-elements-icons.html">
                                                Enlace 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="ui-elements-tabs.html">
                                                Enlace 3
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-building" aria-hidden="true"></i>
                                        <span>Empresa</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="forms-basic.html">
                                                Enlace 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forms-advanced.html">
                                                Enlace 2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forms-validation.html">
                                                Enlace 3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="forms-layouts.html">
                                                Enlace 4
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        <span>Comisiones</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="tables-basic.html">
                                                Enlace 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tables-advanced.html">
                                                Enlace 2
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span>Usuarios</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a href="maps-google-maps.html">
                                                Enlace 1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="maps-google-maps-builder.html">
                                                Enlace 2
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('profesion.index') }}">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        <span>Puestos</span>
                                    </a>
                                </li>
                                <li class="nav-parent">
                                    <a>
                                        <i class="fa fa-align-left" aria-hidden="true"></i>
                                        <span>Menu Levels</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li>
                                            <a>First Level</a>
                                        </li>
                                        <li class="nav-parent">
                                            <a>Second Level</a>
                                            <ul class="nav nav-children">
                                                <li class="nav-parent">
                                                    <a>Third Level</a>
                                                    <ul class="nav nav-children">
                                                        <li>
                                                            <a>Third Level Link #1</a>
                                                        </li>
                                                        <li>
                                                            <a>Third Level Link #2</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a>Second Level Link #1</a>
                                                </li>
                                                <li>
                                                    <a>Second Level Link #2</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>
            @endauth
            <!-- end: sidebar -->

            <section role="main" class="content-body">
                <header class="page-header">
                    @auth
                    <h2>{{ Route::currentRouteName() }}</h2>

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
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="assets/vendor/magnific-popup/magnific-popup.js"></script>

    <!-- Specific Page Vendor -->
    <script src="assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>

    @stack('vendorjs')

    <!-- Theme Base, Components and Settings -->
    <script src="assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="assets/javascripts/theme.init.js"></script>

    <!-- sweetAlert library -->
    @include('sweetalert::alert')

</body>

</html>