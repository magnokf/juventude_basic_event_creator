<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta name="theme-color" content="#06BBF0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('vendor/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables-plugins/responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('vendor/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="../../index3.html" class="nav-link">Home</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item d-none d-sm-inline-block">--}}
{{--                <a href="#" class="nav-link">Contact</a>--}}
{{--            </li>--}}
        </ul>

        <!-- Right navbar links -->

    </nav>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            <img src="{{asset('images/folder1.jpeg')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <br>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
{{--                <div class="input-group" data-widget="sidebar-search">--}}
{{--                    <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <button class="btn btn-sidebar">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <!-- Sidebar Menu -->
            @include('layouts.sidemenu')
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
@yield('content-header')

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>

        </section>



    </div>





@include('layouts.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

</body>
<!-- jQuery -->

<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->

<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->

<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vendor/datatables-plugins/buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->

<script src="{{asset('vendor/adminlte/dist/js/adminlte.min.js')}}"></script>

<!-- Page specific script -->
@stack('js')
</body>
</html>

