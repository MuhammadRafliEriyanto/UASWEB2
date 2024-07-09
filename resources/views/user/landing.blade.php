<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPK | Users</title>
  <link href="{{ asset('AdminLTE/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('AdminLTE/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('AdminLTE/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('AdminLTE/assets/css/main.css') }}" rel="stylesheet">
</head>
<style>
  p {
    font-size: 20px;
    /* Ubah ukuran sesuai keinginan Anda */
  }

  .btn-get-started {
    margin-right: 10px;
    /* Ubah nilai margin sesuai dengan preferensi Anda */
  }
  .logo i {
    font-size: 3rem; /* Ukuran ikon yang lebih besar */
    color: #ffffff; /* Warna putih untuk ikon */
    margin-right: 10px; /* Jarak dari kanan untuk ruang napas */
}

</style>

<body class="index-page">
  <header id="header" class="header fixed-top">


    </div><!-- End Top Bar -->

    <<div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <i class="bi bi-bar-chart-line"></i> <!-- Ganti dengan ikon yang sesuai dengan SPK -->
            <!-- <h1 class="sitename">Chipset Laptop</h1> -->
            <!-- <span></span> -->
        </a>

        <nav id="navmenu" class="navmenu">
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</div>

</div>



  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span> SPK REKOMENDASI CHIPSET</span></h2>
            <p>Website ini berisi tentang apa itu chipset, pemilihan yang baik untuk chipset serta berisikan perhitungan
              SPK.</p>
            <div class="d-flex">
              <a href="{{ route('login') }}" class="btn-get-started">Login</a>
              <a href="{{ route('register') }}" class="btn-get-started">Register</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{ asset('AdminLTE/assets/img/hero-img.svg') }}" class="img-fluid" alt="Hero Image">
          </div>
        </div>
      </div>
      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">
            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-diagram-3"></i></div>
                <h4 class="title"><a href="" class="stretched-link">SPK</a></h4>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-calculator"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Perhitungan</a></h4>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-bar-chart"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Metode</a></h4>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-graph-up"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Topsis</a></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('AdminLTE/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('AdminLTE/assets/js/main.js') }}"></script>

</body>

</html>