<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tambahkan CSS yang dibutuhkan -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        /* Warna dan Tampilan Sidebar */
        .sidebar-dark-primary .nav-sidebar .nav-link {
            color: #ffffff; /* Warna teks */
        }
        .sidebar-dark-primary .nav-sidebar .nav-link.active {
            background-color: #343a40; /* Warna latar belakang saat aktif */
            color: #ffffff; /* Warna teks saat aktif */
        }
        .sidebar-dark-primary .nav-sidebar .nav-link:hover {
            background-color: #495057; /* Warna latar belakang saat hover */
            color: #ffffff; /* Warna teks saat hover */
        }
        /* Brand Logo dan Teks Brand */
        .brand-link {
            background-color: #23272b; /* Warna latar belakang */
            color: #ffffff; /* Warna teks */
        }
        .brand-link .brand-text {
            color: #ffffff; /* Warna teks branding */
        }
        /* Form Search di Sidebar */
        .form-control-sidebar {
            background-color: #343a40; /* Warna latar belakang */
            color: #ffffff; /* Warna teks */
        }
        /* Warna teks sidebar heading */
        .sidebar-heading {
            color: #ffffff;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="{{ asset('AdminLTE/dist/img/logo.png') }}" alt="SPK" class="brand-image img-circle elevation-3" style="opacity: .8;">
            <span class="brand-text font-weight-light"> Chipset</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- SidebarSearch Form -->
            <div class="form-inline mt-3">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Menu Dashboard -->
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <!-- Menu Alternatif -->
                    <li class="nav-item">
                        <a href="{{route('admin.alternatif')}}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Alternatif</p>
                        </a>
                    </li>
                    <!-- Menu Kriteria -->
                    <li class="nav-item">
                        <a href="{{route('admin.subkriteria')}}" class="nav-link">
                            <i class="nav-icon fas fa-cube"></i>
                            <p>Kriteria</p>
                        </a>
                    </li>
                    <!-- Menu Nilai -->
                    <li class="nav-item">
                        <a href="{{route('admin.kriteria')}}" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>Nilai</p>
                        </a>
                    </li>
                    <!-- Divider untuk pemisahan -->
                    <hr class="sidebar-divider">
                    <!-- Menu Master User -->
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Master User
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <!-- Menu Data Profil -->
                            <li class="nav-item">
                                <a href="{{route('admin.akun')}}" class="nav-link">
                                    <i class="nav-icon fas fa-fw fa-user"></i>
                                    <p>Data Profil</p>
                                </a>
                            </li>
                            <!-- Menu Keluar -->
                            <li class="nav-item">
                                <a href="{{ route('landing') }}" class="nav-link">
                                    <i class="nav-icon fas fa-fw fa-sign-out-alt"></i>
                                    <p>Keluar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Tampilkan atau sembunyikan heading sidebar saat di-collapse atau di-expand
            $('[data-widget="pushmenu"]').on('click', function () {
                setTimeout(function () {
                    if ($('body').hasClass('sidebar-collapse')) {
                        $('#mySidebarHeading').hide();
                    } else {
                        $('#mySidebarHeading').show();
                    }
                }, 100);
            });
        });
    </script>
</body>
</html>
