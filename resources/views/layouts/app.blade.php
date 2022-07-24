<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    {{-- Data table --}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datatable-bs5/datatables.min.css')}}"/>

    {{-- Sweet Alert --}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/sweetalert2/sweetalert2.min.css')}}"/>

    {{-- Date picker --}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/datepicker/css/bootstrap-datepicker.min.css')}}"/>

    {{-- Time picker --}}
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/timepicker/jquery.timepicker.min.css')}}">

    <!-- Styles -->
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

    @stack('css')

    <style>
        body {
            font-family: 'Kanit', 'Source Sans Pro';
        }
        .color-default {
            background-color: #98191E;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('layouts.navbar')

        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content pb-3">
            <div class="container-fluid">

                @if (session('status'))
                <div class="alert alert-{{session('status')->type}} alert-dismissible fade show">
                    <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> {{session('status')->title}}</h5>
                    {{session('status')->msg}}
                </div>
                @endif

                <div id="app">
                    @yield('content')
                </div>
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>

    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{asset('plugins/datatable-bs5/datatables.min.js')}}"></script>
    {{-- <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script> --}}

    {{-- Sweet Alert --}}
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('js/utils/sweetAlert.js')}}"></script>

    {{-- Date picker --}}
    <script src="{{asset('plugins/datepicker/js/bootstrap-datepicker.min.js')}}"></script>

    {{-- Time picker --}}
    <script src="{{asset('plugins/timepicker/jquery.timepicker.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

    @stack('scripts')
</body>
</html>
