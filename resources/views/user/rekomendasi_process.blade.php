<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rekomendasi Chipset">
    <title>Rekomendasi Chipset</title>
    <link href="{{ asset('AdminLTE/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('AdminLTE/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('AdminLTE/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminLTE/assets/css/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/sp-2.3.1/datatables.min.css"
        rel="stylesheet">
    <style>
        .select2-selection {
            height: 38px !important;
        }

        .logo i {
            font-size: 3rem;
            /* Ukuran ikon yang lebih besar */
            color: #ffffff;
            /* Warna putih untuk ikon */
            margin-right: 10px;
            /* Jarak dari kanan untuk ruang napas */
        }
    </style>

</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center">
                        <a href="mailto:raflieriyanto810@gmail.com">raflieriyanto810@gmail.com</a>
                    </i>
                    <i class="bi bi-phone d-flex align-items-center ms-4">
                        <span>+62 8961 8681 090</span>
                    </i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <i class="bi bi-bar-chart-line"></i> <!-- Ganti dengan ikon yang sesuai dengan SPK -->
                    <!-- <h1 class="sitename">Chipset Laptop</h1> -->
                    <!-- <span></span> -->
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('user.dashboard') }}" class="active">Home</a></li>
                        <li><a href="{{ route('user.rekomendasi') }}">Perhitungan</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 justify-content-between p-2">
                    <h2 class="text-center">PROSES PERHITUNGAN</h2>
                </div>
            </div>
        </section>
        {{-- membuat form preferensi pengguna --}}
        <section class="p-5">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title">Data Alternatif</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Alternatif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $key => $alternatif)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $alternatif['code'] }}</td>
                                        <td>{{ $alternatif['name'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow mt-5">
                <div class="card-header">
                    <h4 class="card-title">Data Kriteria</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th>Attribut</th>
                                    <th>Bobot</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $key => $kriteria)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $kriteria['code'] }}</td>
                                        <td>{{ $kriteria['name'] }}</td>
                                        <td>{{ $kriteria['attribute'] }}</td>
                                        <td>{{ $kriteria['bobot'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow mt-5">
                <div class="card-header">
                    <h4 class="card-title">Nilai Alternatif</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    @foreach ($kriterias as $key => $kriteria)
                                        <th>{{ $kriteria['code'] }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatifs as $key => $alternatif)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $alternatif['code'] }}</td>
                                        <td>{{ $alternatif['c1'] }}</td>
                                        <td>{{ $alternatif['c2'] }}</td>
                                        <td>{{ $alternatif['c3'] }}</td>
                                        <td>{{ $alternatif['c4'] }}</td>
                                        <td>{{ $alternatif['c5'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <hr>
            <h3 class="mt-3"> Proses Perhitungan</h2>
                <div class="card shadow mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Normalisasi Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        @foreach ($kriterias as $key => $kriteria)
                                            <th>{{ $kriteria['code'] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($normalisasis as $key => $normalisasi)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $alternatif['code'] }}</td>
                                            <td>{{ $normalisasi['c1'] }}</td>
                                            <td>{{ $normalisasi['c2'] }}</td>
                                            <td>{{ $normalisasi['c3'] }}</td>
                                            <td>{{ $normalisasi['c4'] }}</td>
                                            <td>{{ $normalisasi['c5'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td class="text-end fw-bold">{{ $normalisasi_total['c1'] }}</td>
                                        <td class="text-end fw-bold">{{ $normalisasi_total['c2'] }}</td>
                                        <td class="text-end fw-bold">{{ $normalisasi_total['c3'] }}</td>
                                        <td class="text-end fw-bold">{{ $normalisasi_total['c4'] }}</td>
                                        <td class="text-end fw-bold">{{ $normalisasi_total['c5'] }}</td>
                                    </tr>
                                </tfooter>
                            </table>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        @foreach ($kriterias as $key => $kriteria)
                                            <th>{{ $kriteria['code'] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($normalisas_tahap_2 as $key => $normalisasi)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $alternatif['code'] }}</td>
                                            <td>{{ $normalisasi['c1'] }}</td>
                                            <td>{{ $normalisasi['c2'] }}</td>
                                            <td>{{ $normalisasi['c3'] }}</td>
                                            <td>{{ $normalisasi['c4'] }}</td>
                                            <td>{{ $normalisasi['c5'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Normalisasi Terbobot</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        @foreach ($kriterias as $key => $kriteria)
                                            <th>{{ $kriteria['code'] }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($normalisasi_terbobot as $key => $normalisasi)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $alternatif['code'] }}</td>
                                            <td>{{ $normalisasi['c1'] }}</td>
                                            <td>{{ $normalisasi['c2'] }}</td>
                                            <td>{{ $normalisasi['c3'] }}</td>
                                            <td>{{ $normalisasi['c4'] }}</td>
                                            <td>{{ $normalisasi['c5'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Matriks Solusi Ideal</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @foreach ($kriterias as $key => $kriteria)
                                            <th>{{ $kriteria['code']  }} ({{$kriteria['attribute']}})</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matriks_solusi_ideal as $key => $matriks)
                                        <tr>
                                            <td>{{ $key }}</td>
                                            <td>{{ $matriks['c1'] }}</td>
                                            <td>{{ $matriks['c2'] }}</td>
                                            <td>{{ $matriks['c3'] }}</td>
                                            <td>{{ $matriks['c4'] }}</td>
                                            <td>{{ $matriks['c5'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-5">
                    <div class="card-header">
                        <h4 class="card-title">Hasil</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class=" table-hasil table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Positif</th>
                                        <th>Negatif</th>
                                        <th>Preferensi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($total as $key => $tot)
                                        <tr>
                                            <td>{{ $tot['code'] }}</td>
                                            <td>{{ $tot['positif'] }}</td>
                                            <td>{{ $tot['negatif'] }}</td>
                                            <td>{{ $tot['preferensi'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- text saran --}}
                        <div class="mt-3">
                            <h4>Saran</h4>
                            <p>Chipset yang direkomendasikan adalah chipset dengan kode
                                <strong>{{ $rekomendasi_terbaik['code'] }}</strong> dengan nama
                                <strong>{{ $rekomendasi_terbaik['name'] }}</strong> dengan nilai preferensi
                                <strong>{{ $rekomendasi_terbaik['preferensi'] }}</strong>
                            </p>
                        </div>
                    </div>
                </div>


        </section>

    </main>

    </footer>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('AdminLTE/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script
        src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.0.8/af-2.7.0/b-3.0.2/b-colvis-3.0.2/b-html5-3.0.2/b-print-3.0.2/r-3.0.2/sp-2.3.1/datatables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.datatable').DataTable();
            $('.table-hasil').DataTable({
                "order": [[3, "desc"]]
            });
        });
    </script>
</body>

</html>