<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('judul_halaman')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">4 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" role="button">
                        <i class="fas fa-power-off"></i> <b>Logout</b>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('img/logo_jateng.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">DINSOS PROV JATENG</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ session()->get('nama') }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-desktop"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        @if (auth()->user()->level == '1')
                            <li class="nav-item">
                                <a href="{{ route('manageuser') }}" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>Manage Pegawai</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('pegawai') }}" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>Data Pegawai</p>
                                </a>
                            </li> --}}
                        @endif
                        @if (auth()->user()->level == '1' or auth()->user()->level == '2')
                            <li class="nav-item dropdown">
                                <a class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>Data Pengembangan<br> Kompetensi
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('diklat_kepeminpinan') }}" class="nav-link">
                                            <i class="nav-icon far fa-circle"></i>
                                            <p>Diklat Kepemimpinan</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('diklat_fungsional') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diklat Fungsional</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('diklat_teknis') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Diklat Teknis</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('bimtek') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Workshop/Seminar/Bimtek</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (auth()->user()->level == '1' or auth()->user()->level == '3')
                            <li class="nav-item">
                                <a href="{{ route('usulan_input') }}" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>Usulan Pengembangan Kompetensi</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-header"><br>== PROFILE ==</li>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('form_ubah_password') }}" class="nav-link">
                                <i class="nav-icon fa fa-fw fa-lock"></i>
                                <p>Ubah Password</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- MAIN CONTENT -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">@yield('judul_content')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('isi_content')
                    </div>
                </div>
            </section>
        </div>
        <!-- FOOTER -->
        <footer class="main-footer">
            <strong><a href="#">Damanhuri</a> &copy; 2021</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/adminlte.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    @yield('script_js')

</body>

</html>
