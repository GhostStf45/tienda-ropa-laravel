<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Sistema de ventas de ropa </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.min.js') }}"></script>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="{{ asset ('css/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset ('css/sb-admin-2.min.css') }}" rel="stylesheet">

    </head>
    <body class="page-top" class="vsc-initialized">
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                    <div class="sidebar-brand-text mx-3">Sistema de ventas de ropa</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="index.html">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Administración
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class=" fas fa-tshirt"></i>
                        <span>Productos (Ropa)</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('productos.list') }}">Ropa</a>
                            <h6 class="collapse-header">Tipos y marcas:</h6>
                            <a class="collapse-item" href="{{ route('tiposRopa.list') }}">Tipo de ropa</a>
                            <a class="collapse-item" href="{{ route('marcas.list') }}">Marca</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vendedores.list') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Vendedores</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tiendas.list') }}">
                        <i class="fas fa-user-cog"></i>
                        <span>Tiendas</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ventas.list') }}">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Ventas</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <div class="container-fluid mt-4">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
        </div>

         <!-- Bootstrap core JavaScript-->

         <script src="{{ mix('/js/app.js') }}"></script>
        <script src="{{ asset ('js/jquery.min.js')}}"></script>
        <script src="{{ asset ('js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset ('js/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset ('js/sb-admin-2.min.js')}}"></script>

        @include('sweetalert::alert')


    </body>
</html>
