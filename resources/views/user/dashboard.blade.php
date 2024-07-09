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
    .services {
    background: #f9f9f9;
    padding: 60px 0;
}

.section-title h2 {
    font-size: 32px;
    font-weight: 700;
    text-transform: uppercase;
    color: #333;
    margin-bottom: 10px;
}

.section-title p {
    font-size: 16px;
    color: #777;
}

.service-item {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
}

.service-item .icon {
    font-size: 3rem;
    color: #007bff;
    margin-bottom: 15px;
    transition: color 0.3s ease;
}

.service-item h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
    transition: color 0.3s ease;
}

.service-item p {
    font-size: 14px;
    color: #777;
    margin-bottom: 20px;
}

.service-item a.readmore {
    font-size: 14px;
    color: #007bff;
    text-transform: uppercase;
    font-weight: bold;
    transition: color 0.3s ease;
}

.service-item a.readmore:hover {
    color: #0056b3;
}

.service-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.service-item:hover .icon,
.service-item:hover h3 {
    color: #0056b3;
}

@keyframes fadeUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

[data-aos="fade-up"] {
    animation: fadeUp 1s ease forwards;
}

.logo i {
    font-size: 3rem; /* Ukuran ikon yang lebih besar */
    color: #ffffff; /* Warna putih untuk ikon */
    margin-right: 10px; /* Jarak dari kanan untuk ruang napas */
}


</style>


<body class="index-page">
    <header id="header" class="header fixed-top">

        <!-- <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a
                            href="mailto:contact@example.com">raflieriyanto810@gmail.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 8961 8681 090</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="https://www.instagram.com/_dolph1nsss" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>End Top Bar -->

        <div class="branding d-flex align-items-center">
    <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <i class="bi bi-bar-chart-line"></i> <!-- Ganti dengan ikon yang sesuai dengan SPK -->
            <!-- <h1 class="sitename">Chipset Laptop</h1> -->
            <!-- <span></span> -->
        </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home<br></a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                        
                        <li><a href="{{ route('user.rekomendasi') }}">Perhitungan</a></li>
                        <li><a href="{{ route('landing') }}">Logout</a></li>
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
        <div class="row gy-5 justify-content-between">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2><span>Apa Itu Topsis</span><span class="accent"></span></h2>
                <p>TOPSIS adalah singkatan dari "Technique for Order Preference by Similarity to Ideal Solution". Ini adalah metode analisis 
                    multikriteria yang digunakan dalam pengambilan keputusan untuk memilih alternatif terbaik dari sekelompok alternatif yang ada.
                     Metode ini berfokus pada membandingkan setiap alternatif terhadap solusi ideal dan solusi negatif ideal dalam ruang keputusan
                      yang dibentuk oleh kriteria yang diberikan.
                </p>
                <!-- <div class="d-flex">
                    <a href="#about" class="btn-get-started">Get Started</a>
                    <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                        class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div> -->
            </div>
            <div class="col-lg-5 order-1 order-lg-2">
                <img src="../AdminLTE/assets/img/hero-img.svg" class="img-fluid" alt="">
            </div>
        </div>
    </div>

    <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
                <div class="col-xl-3 col-md-6">
                    <div class="icon-box">
                    <div class="icon"><i class="bi bi-cpu-fill"></i></div>
                    <h4 class="title"><a href="#" class="stretched-link">Pemilihan Chipset</a></h4>
                    <p class="description">Temukan chipset terbaik untuk kebutuhan Anda.</p>
                </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-3 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-gear-wide-connected"></i></div>
                    <h4 class="title"><a href="#" class="stretched-link">Konfigurasi Chipset</a></h4>
                    <p class="description">Atur dan sesuaikan konfigurasi chipset dengan optimal.</p>
                </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-3 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-graph-up"></i></div>
                    <h4 class="title"><a href="#" class="stretched-link">Peningkatan Performa</a></h4>
                    <p class="description">Tingkatkan performa dengan langkah-langkah yang tepat.</p>
                </div>
            </div><!-- End Icon Box -->

            <div class="col-xl-3 col-md-6">
                <div class="icon-box">
                    <div class="icon"><i class="bi bi-lightning-charge-fill"></i></div>
                    <h4 class="title"><a href="#" class="stretched-link">Optimalisasi Kinerja</a></h4>
                    <p class="description">Optimalkan kinerja chipset untuk hasil terbaik.</p>
                </div>
            </div><!-- End Icon Box -->
        </div>
    </div>
</section><!-- /Hero Section -->

        

        <!-- About Section -->
        <section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>About Chipset<br></h2>
        <p class="fst-italic">
            Muhammad Rafli Eriyanto
        </p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <h3> Apa Itu Chipset </h3>
                <img src="../AdminLTE/dist/img/avatar11.jpg" class="img-fluid rounded-4 mb-4 shadow-lg" alt="">
                <p class="text-justify">Chipset adalah serangkaian sirkuit terintegrasi di dalam komputer atau perangkat elektronik lainnya yang bertanggung jawab untuk mengoordinasikan komunikasi antara berbagai komponen perangkat keras. Chipset terdiri dari beberapa chip atau sirkuit terpadu yang bekerja bersama untuk mengontrol aliran data antara CPU (Central Processing Unit), RAM (Random Access Memory), kartu grafis, penyimpanan, dan perangkat keras lainnya yang terpasang di dalam sistem.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
                <div class="content ps-0 ps-lg-5">
                    <h3> Video Penjelasan Tentang Chipset </h3>
                    <p class="fst-italic">
                        Muhammad Rafli Eriyanto
                    </p>
                    <p class="text-justify">
                        Di video ini akan dijelaskan apa itu chipset, bagaimana chipset serta perbandingan chipset lainnya.
                    </p>

                    <div class="position-relative mt-4">
                        <img src="../AdminLTE/dist/img/avatar12.png" class="img-fluid rounded-4 shadow-lg" alt="">
                        <a href="https://youtu.be/WTpO7J2rj_4?si=zJs0CagIdNvH5Hok" class="glightbox play-btn"></a>
                    </div>
                </div>
            </div>
        </div>

<section id="services" class="services section">
<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Komponen Utama dalam Chipset</h2>
    <p>Berikut adalah beberapa komponen utama yang sering ditemukan dalam sebuah chipset:</p>
</div><!-- End Section Title -->

<div class="container">

    <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
                <div class="icon mx-auto">
                    <i class="bi bi-cpu-fill"></i>
                </div>
                <h3>CPU</h3>
                <p>Unit pengolah utama yang menjalankan instruksi program dan mengontrol operasi komputer.</p>
                <a href="https://www.jktgadget.com/komponen-laptop/" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
                <div class="icon mx-auto">
                    <i class="bi bi-memory"></i>
                </div>
                <h3>RAM</h3>
                <p>Memori yang digunakan untuk menyimpan data sementara yang sedang diakses oleh CPU.</p>
                <a href="https://www.jktgadget.com/komponen-laptop/" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
                <div class="icon mx-auto">
                    <i class="bi bi-gpu-card"></i>
                </div>
                <h3>GPU</h3>
                <p>Kartu grafis yang bertanggung jawab untuk render grafis dan gambar ke layar.</p>
                <a href="https://www.jktgadget.com/komponen-laptop/" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
                <div class="icon mx-auto">
                    <i class="bi bi-gear-wide-connected"></i>
                </div>
                <h3>Chipset</h3>
                <p>Komponen yang menghubungkan CPU dengan komponen lainnya di dalam komputer.</p>
                <a href="https://www.jktgadget.com/komponen-laptop/" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
                <div class="icon mx-auto">
                    <i class="bi bi-hdd"></i>
                </div>
                <h3>Storage</h3>
                <p>Media penyimpanan yang digunakan untuk menyimpan data secara permanen.</p>
                <a href="https://www.jktgadget.com/komponen-laptop/" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
                <div class="icon mx-auto">
                    <i class="bi bi-wifi"></i>
                </div>
                <h3>Network Interface</h3>
                <p>Komponen yang memungkinkan komputer untuk berkomunikasi dengan jaringan lainnya.</p>
                <a href="https://www.jktgadget.com/komponen-laptop/" class="readmore stretched-link">Selengkapnya <i class="bi bi-arrow-right"></i></a>
            </div>
        </div><!-- End Service Item -->

    </div>

</div>

</section><!-- /Services Section -->


        

        <!-- Clients Section -->
        <section id="clients" class="clients section">

            <div class="container">

                <div class="swiper">
                    <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 2,
              "spaceBetween": 40
            },
            "480": {
              "slidesPerView": 3,
              "spaceBetween": 60
            },
            "640": {
              "slidesPerView": 4,
              "spaceBetween": 80
            },
            "992": {
              "slidesPerView": 6,
              "spaceBetween": 120
            }
          }
        }
      </script>

                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- Stats Section -->
        <section id="stats" class="stats section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card-lg shadow p-4 rounded">
            <div class="row gy-4 align-items-center">
                <div class="col-lg-5">
                    <!-- Bootstrap Carousel -->
                    <div id="chipsetCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-clock="4.0" data-core="8" data-thread="16" data-grafis="9">
                                <img src="../AdminLTE/assets/img/haha.jpg" class="d-block w-100 img-fluid" alt="Chipset Image 1">
                            </div>
                            <div class="carousel-item" data-clock="3.6" data-core="6" data-thread="12" data-grafis="7">
                                <img src="../AdminLTE/assets/img/intelcore.png" class="d-block w-100 img-fluid" alt="Chipset Image 2">
                            </div>
                            <div class="carousel-item" data-clock="3.8" data-core="10" data-thread="20" data-grafis="8">
                                <img src="../AdminLTE/assets/img/amd1.jpg" class="d-block w-100 img-fluid" alt="Chipset Image 3">
                            </div>
                            <!-- Add more images as needed -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#chipsetCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#chipsetCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="stats-item d-flex align-items-center p-3 rounded bg-light shadow-sm">
                                <i class="bi bi-alarm flex-shrink-0 display-4 text-primary me-3"></i>
                                <div>
                                    <span id="clockValue" class="purecounter display-4 text-dark"></span>
                                    <p class="mb-0"><strong>Jumlah Clock</strong> <span>Prosesor (GHz)</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="stats-item d-flex align-items-center p-3 rounded bg-light shadow-sm">
                                <i class="bi bi-memory flex-shrink-0 display-4 text-primary me-3"></i>
                                <div>
                                    <span id="coreValue" class="purecounter display-4 text-dark"></span>
                                    <p class="mb-0"><strong>Jumlah Inti</strong> <span>Cores</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="stats-item d-flex align-items-center p-3 rounded bg-light shadow-sm">
                                <i class="bi bi-archive flex-shrink-0 display-4 text-primary me-3"></i>
                                <div>
                                    <span id="threadValue" class="purecounter display-4 text-dark"></span>
                                    <p class="mb-0"><strong>Jumlah</strong> <span>Thread</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="stats-item d-flex align-items-center p-3 rounded bg-light shadow-sm">
                                <i class="bi bi-cpu flex-shrink-0 display-4 text-primary me-3"></i>
                                <div>
                                    <span id="grafisValue" class="purecounter display-4 text-dark"></span>
                                    <p class="mb-0"><strong>Kinerja Grafis</strong> <span>CPU</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.getElementById('chipsetCarousel');
        const clockValue = document.getElementById('clockValue');
        const coreValue = document.getElementById('coreValue');
        const threadValue = document.getElementById('threadValue');
        const grafisValue = document.getElementById('grafisValue');

        const updateStats = () => {
            const activeItem = carousel.querySelector('.carousel-item.active');
            clockValue.textContent = activeItem.getAttribute('data-clock');
            coreValue.textContent = activeItem.getAttribute('data-core');
            threadValue.textContent = activeItem.getAttribute('data-thread');
            grafisValue.textContent = activeItem.getAttribute('data-grafis');
        };

        updateStats();

        carousel.addEventListener('slid.bs.carousel', updateStats);
    });
</script>




       


        <!-- Contact Section -->
        <section id="contact" class="contact section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
    <p class="fst-italic">Muhammad Rafli Eriyanto</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gx-lg-0 gy-4">

        <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p>Jln. Mangga RT 03 RW 04 Procot Baru, NY 535022</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p>+62 8961 8681 090</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p>raflieriyanto810@gmail.com</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                    <i class="bi bi-clock flex-shrink-0"></i>
                    <div>
                        <h3>Office Hours</h3>
                        <p>Mon - Fri: 8:00 AM - 5:00 PM</p>
                    </div>
                </div><!-- End Info Item -->

            </div>
        </div>

        <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade"
                data-aos-delay="100">
                <div class="row gy-4">

                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                    </div>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                    </div>

                    <div class="col-md-12">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="message" rows="8" placeholder="Message" required=""></textarea>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>

                        <button type="submit">Send Message</button>
                    </div>

                </div>
            </form>
        </div><!-- End Contact Form -->

    </div>

</div>

</section><!-- /Contact -->


    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Sosial Media</span>
                    </a>
                    <p>Kenali saya lebih dekat</p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href="https://www.instagram.com/_dolph1nsss"><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Study</h4>
                    <ul>
                        <li><a href="#">TK</a></li>
                        <li><a href="#">SD</a></li>
                        <li><a href="#">SMP</a></li>
                        <li><a href="#">SMK</a></li>
                        <li><a href="#">KULIAH</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p> Muhammad Rafli Eriyanto</p>
                    <p>Slawi, Jln. Mangga Procot Baru</p>
                    <p>Indonesia</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+628 9618 681090</span></p>
                    <p><strong>Email:</strong> <span>raflieriyanto810.com</span></p>
                </div>

            </div>
        </div>

        <!-- <div class="container copyright text-center mt-4">
            <p> <span>Muhammad Rafli Eriaynto</span> <strong class="px-1 sitename">Impact</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
        </div>
        </div> -->

    </footer>

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