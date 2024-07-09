<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK | Chipset</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ url('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('AdminLTE/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css" />
    <style>
    /* Menghilangkan garis biru di atas teks "SPK" */
    .card-header.text-center a {
      border: none !important;
      outline: none !important;
      text-decoration: none !important;
      background-color: #f4f6f9;
      border-bottom: none !important; /* Menghilangkan garis */
    }

    /* Memberikan warna hijau pada tombol "Submit" */
    .btn-primary {
      background-color: #20c997 !important;
      border-color: #28a745 !important;
    }

    /* Mengubah warna teks pada tombol "Submit" saat dihover */
    .btn-primary:hover {
      color: #fff !important;
    }

    /* Menghilangkan garis biru pada tombol */
    .btn-primary,
    .btn-info,
    .btn-danger,
    .btn-secondary {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background-color: #FFA500;
    }

    /* Memberikan warna teks pada tombol saat dihover */
    .btn-primary:hover,
    .btn-info:hover,
    .btn-danger:hover,
    .btn-secondary:hover {
        color: white !important;
    }

    /* Mengubah warna navbar */
    .main-header {
        background-color: #343a40 !important; /* Warna baru untuk navbar */
    }

    .main-header .nav-link {
        color: #ffffff !important; /* Warna teks navbar */
    }

    /* Mengubah warna sidebar */
    .main-sidebar {
        background-color: #6c757d !important; /* Warna baru untuk sidebar */
    }

    .nav-sidebar .nav-link {
        color: #ffffff !important; /* Warna teks sidebar */
    }

    .nav-sidebar .nav-link.active {
        background-color: #007bff !important; /* Warna link aktif di sidebar */
        color: #ffffff !important;
    }

    /* Mengubah warna dashboard (konten utama) */
    .content-wrapper {
        background-color: #f8f9fa !important; /* Warna baru untuk background konten */
    }

    .content-header h1 {
        color: #343a40 !important; /* Warna teks judul konten */
    }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('layout.navbar')
        @include('layout.sidebar')
        @yield('content')
        @include('layout.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ url('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('AdminLTE/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ url('AdminLTE/dist/js/demo.js') }}"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap4.js"></script>
    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            searching: true,
            ordering: true,
            paging: true
        });
    });
    $(document).ready(function() {
        $('#example2').DataTable({
            searching: true,
            ordering: true,
            paging: true
        });
    });
    </script>
</body>

</html>
