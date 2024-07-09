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
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2><span>Apa Itu Topsis </span><span class="accent"></span></h2>
                        <p>TTOPSIS adalah singkatan dari "Technique for Order Preference by Similarity to Ideal Solution". Ini adalah metode analisis 
                    multikriteria yang digunakan dalam pengambilan keputusan untuk memilih alternatif terbaik dari sekelompok alternatif yang ada.
                     Metode ini berfokus pada membandingkan setiap alternatif terhadap solusi ideal dan solusi negatif ideal dalam ruang keputusan
                      yang dibentuk oleh kriteria yang diberikan.</p>
                        <!-- <div class="d-flex">
                            <a href="#about" class="btn-get-started">Get Started</a>
                            <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                                class="glightbox btn-watch-video d-flex align-items-center"><i
                                    class="bi bi-play-circle"></i><span>Watch Video</span></a>
                        </div> -->
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="{{ asset('AdminLTE/assets/img/hero-img.svg') }}" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </section>
        {{-- membuat form preferensi pengguna --}}
        <section>
            <div class="col-12 p-5">
                <h3>Preferensi Pengguna</h3>
                <form action="{{ route('user.rekomendasi.process') }}" method="POST">
                    @csrf
                    {{-- multiple select2 chipset --}}
                    <div class="form-group mt-3">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                {{-- append pilih chipset --}}
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Pilih Chipset</span>
                                </div>
                                <select name="chipset[]" id="chipset" class=" select2 form-control" multiple
                                    style="width: 89%; height: 100%" required>
                                    @foreach($chipsets as $chipset)
                                        <option value="{{ $chipset->id }}">{{ $chipset->alternatif->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {{-- div class tombol tambah referensi pengguna --}}
                    <div class="form-group mt-3">
                        <button class="btn btn-secondary" type="button" id="addPreference">Tambah Preferensi
                            Pribadi</button>
                        {{-- tombol hapus preferensi --}}
                        <button class="btn btn-danger ml-2 d-none" type="button" id="removePreference">Hapus Preferensi
                            Pribadi</button>
                    </div>
                    <input type="hidden" name="user_preference" value="0">
                    {{-- div preferensi user nama chipset, loop kriteriaList untuk inputan bobot--}}
                    <div class="form-group mt-3 d-none" id="nama_chipset">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Nama Chipset
                            </div>
                            <input type="text" class="user-pref form-control" name="user_chipset">
                        </div>
                    </div>
                    <div class="form-group mt-3 d-none" id="preferenceList">
                        @foreach($kriteriaList as $kriteria)
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">{{ $kriteria->name }}</span>
                                </div>
                                <input type="number" class="user-pref  form-control" name="bobot[{{$loop->iteration}}]"
>
                            </div>
                        @endforeach
                    </div>

                    <button type="submit" class="col-12 mt-4 btn btn-primary">Proses</button>
                </form>
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
    <script>
        $(document).ready(function () {
            $('#chipset').select2();
            // tombol tambah preferensi
            $('#addPreference').click(function () {
                $('#nama_chipset').removeClass('d-none');
                $('#preferenceList').removeClass('d-none');
                $('#removePreference').removeClass('d-none');
                $('#addPreference').addClass('d-none');
                $('input[name="user_preference"]').val(1);
                // tambahkan required pada inputan bobot
                $('.user-pref').attr('required', 'required');
            });

            // tombol hapus preferensi
            $('#removePreference').click(function () {
                $('#nama_chipset').addClass('d-none');
                $('#preferenceList').addClass('d-none');
                $('#removePreference').addClass('d-none');
                $('#addPreference').removeClass('d-none');
                $('input[name="user_preference"]').val(0);
                // hapus required pada inputan bobot
                $('.user-pref').removeAttr('required');
            });

        });
    </script>
</body>

</html>