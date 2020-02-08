<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Laravel Task</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">@lang('Nav.home')</a>
            </li>
        </ul>


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    @if(app()->getLocale() == 'en')
                    <i class="flag-icon flag-icon-us"></i>
                        @else
                        <i class="flag-icon flag-icon-fr mr-2"></i>
                        @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right p-0">
                    @if(app()->getLocale() == 'en')
                    <a href="/locale/en" class="dropdown-item active">
                            <i class="flag-icon flag-icon-us mr-2"></i> English
                    </a>
                            <a href="/locale/fr" class="dropdown-item">
                                    <i class="flag-icon flag-icon-fr mr-2"></i> French
                    </a>
                        @else
                        <a href="/locale/en" class="dropdown-item">
                            <i class="flag-icon flag-icon-us mr-2"></i> English
                        </a>
                        <a href="/locale/fr" class="dropdown-item active">
                            <i class="flag-icon flag-icon-fr mr-2"></i> French
                        </a>

                        @endif

                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
            <img src="{{asset('assets/imgs/AdminLTELogo.png')}}"
                 alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('assets/imgs/avatar3.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    {{--Companies links start--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="far fa-building"></i>
                            <p>
                                @lang('Nav.companies')
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('companies')}}" class="nav-link">
                                    <i class="fas fa-gopuram"></i>
                                    <p>@lang('Nav.all') @lang('Nav.companies')</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('companyAdd')}}" class="nav-link">
                                    <i class="fas fa-plus-square"></i>
                                    <p>@lang('Nav.add') @lang('Nav.companies')</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    {{--Companies links end--}}

                    {{--Employees Links start--}}
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users-cog"></i>
                            <p>
                                @lang('Nav.employees')
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('employees')}}" class="nav-link">
                                    <i class="fas fa-users"></i>
                                    <p>@lang('Nav.all') @lang('Nav.employees')</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('employeeAdd')}}" class="nav-link">
                                    <i class="fas fa-user-plus"></i>
                                    <p>@lang('Nav.add') @lang('Nav.employees')</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    {{--Employees Links end--}}
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @yield('headerNav')
                </div>
            </div><!-- /.container-fluid -->
        </section>
@yield('content')
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.2
    </div>
    <strong>Copyright &copy;<a href="#">AdminLTE.io</a>.</strong> @lang('welcome.copyrights')
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('assets/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('js/demo.js')}}"></script>
@yield('js')
</body>
</html>
