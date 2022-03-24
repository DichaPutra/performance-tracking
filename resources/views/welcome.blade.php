<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Performance Tracking</title>

        <!--Icon-->
        <link rel="icon" href="{{asset('/favicon/favicon.png')}}" type="image/x-icon"/>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- ============ Addons ====================== -->
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="assetsLanding/vendor/aos/aos.css" rel="stylesheet">
        <link href="assetsLanding/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assetsLanding/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assetsLanding/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="assetsLanding/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assetsLanding/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="assetsLanding/css/style.css" rel="stylesheet">

        <!-- =======================================================
        * Template Name: BizLand - v3.1.0
        * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->

    </head>
    <body class="antialiased">
        <!-- ======= Top Bar ======= -->
<!--        <section id="topbar" class="d-flex align-items-center" style="background-color:#002C5F;">
            <div class="container d-flex justify-content-center justify-content-md-between" >
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">munir.ali@crowe.id</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 21 25535699</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                </div>
            </div>
        </section>-->

        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <!--<h1 class="logo"><a href="{{ url('/') }}">BizLand<span>.</span></a></h1>-->
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="{{ url('/') }}" class="logo"><img src="assetsLanding/img/logo.png" alt=""></a>

                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li><a class="nav-link scrollto" href="#about">About</a></li>
                        <li><a class="nav-link scrollto" href="#services">Services</a></li>
                        <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>
                        <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                        @if (Route::has('login'))

                        @auth
                        <li><a class="nav-link scrollto" href="{{ route('client.home') }}" class="text-sm text-gray-700 underline">Dashbard</a></li>
                        @else
                        <li><a class="nav-link scrollto" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a></li>

                        @if (Route::has('register'))
                        <li><a class="nav-link scrollto" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a></li>
                        @endif
                        @endauth

                        @endif
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header>
        <!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <h1>Welcome to <span style="color:#002C5F;">Performance Tracking</span></h1>
                <h2>Tracking performance made easy and quick</h2>
                <div class="d-flex">
                    <a href="{{ route('register') }}" class="btn-get-started scrollto" style="background-color:#002C5F;">Get Started</a>
                    <!--<a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>-->
                </div>
            </div>
        </section><!-- End Hero -->

        <main id="main">
            <!--======= Featured Services Section =======--> 
<!--            <section id="featured-services" class="featured-services">
                <div class="container" data-aos="fade-up">

                    <div class="row">
                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon"><i class="bx bxl-dribbble"></i></div>
                                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                                <div class="icon"><i class="bx bx-tachometer"></i></div>
                                <h4 class="title"><a href="">Magni Dolores</a></h4>
                                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
                            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                                <div class="icon"><i class="bx bx-world"></i></div>
                                <h4 class="title"><a href="">Nemo Enim</a></h4>
                                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section> -->
            <!--End Featured Services Section--> 

            <!-- ======= About Section ======= -->
            <section id="about" class="about section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>About</h2>
                        <h3>Find Out More <span>About Us</span></h3>
                        <p>  </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                            <img src="assetsLanding/img/about2.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                            <h3>Overview</h3>
                            <p class="fst-italic">

                            </p>
                            <ul>
                                <li>
                                    <i class="bx bx-star"></i>
                                    <div>
                                        <h5>About Us</h5>
                                        <p>Crowe Indonesia didirikan pada tahun 2003 sebagai CIBA Consulting Group oleh beberapa Mitra senior dari perusahaan jasa profesional terbesar di Indonesia.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-line-chart"></i>
                                    <div>
                                        <h5>CIBA</h5>
                                        <p>CIBA telah berkembang pesat menjadi salah satu perusahaan jasa profesional terbesar di Indonesia yang menyediakan audit berkualitas tinggi & jaminan, pajak dan penasihat bisnis serta keuangan perusahaan layanan seperti penasihat keuangan, uji tuntas dan penilaian di Indonesia.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-user"></i>
                                    <div>
                                        <h5>Our People</h5>
                                        <p>Saat ini didukung oleh lebih dari 500 staf profesional dan melayani sekitar 800 klien di Indonesia</p>
                                    </div>
                                </li>
                            </ul>
<!--                            <p>
                                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum
                            </p>-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->

            <!-- ======= Skills Section ======= -->
            <!--                        <section id="skills" class="skills">
                <div class="container" data-aos="fade-up">

                    <div class="row skills-content">

                        <div class="col-lg-6">

                            <div class="progress">
                                <span class="skill">HTML <i class="val">100%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">CSS <i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">JavaScript <i class="val">75%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="progress">
                                <span class="skill">PHP <i class="val">80%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">WordPress/CMS <i class="val">90%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="progress">
                                <span class="skill">Photoshop <i class="val">55%</i></span>
                                <div class="progress-bar-wrap">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </section>-->
            <!-- End Skills Section -->

            <!-- ======= Counts Section ======= -->
            <!--            <section id="counts" class="counts">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="count-box">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Happy Clients</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                            <div class="count-box">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Projects</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <i class="bi bi-headset"></i>
                                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Hours Of Support</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                            <div class="count-box">
                                <i class="bi bi-people"></i>
                                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                                <p>Hard Workers</p>
                            </div>
                        </div>

                    </div>

                </div>
            </section>-->
            <!-- End Counts Section -->
            <!-- ======= Services Section ======= -->
            <section id="about" class="services section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <!--<h2>Services</h2>-->
                        <h3>Latar Belakang Pembuatan <span>Aplikasi</span></h3>
                        <!--<p>Berikut beberapa keunggulan Performance Apps by Crowe </p>-->
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4><a href="">Inisiatif</a></h4>
                                <p>
                                <ol>
                                    <li style="text-align: left;">Membantu para pimpinan perusahaan logistik dalam memahami kinerja perusahaan dan tantangan dalam industri secara tepat waktu, dengan cara menggunakan Performance Apps yang sederhana dan terjangkau.</li>
                                    <li style="text-align: left;">Mengembangkan daya saing para pelaku usaha di industri logistik dan supply chain nasional dengan basis informasi kinerja yang memadai.</li>
                                </ol>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-bulb"></i></div>
                                <h4><a href="">Masa Depan</a></h4>
                                <p>
                                <ol>
                                    <li style="text-align: left;">Pasar Logistik Indonesia 2020 - 2024 Diperkirakan memiliki pertumbuhan rata-rata CAGR 7,9% dengan estimasi pendapatan mencapai angka US$ 300.3 Miliar pada tahun 2024</li>
                                    <li style="text-align: left;">Prospek bisnis ini meliputi: Freight transport, freight forwarding, warehousing, courier, express and parcel (CEP), value added services dan cold chain logistics segments</li>
                                </ol>
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxs-user-account"></i></div>
                                <h4><a href="">Disiapkan khusus untuk</a></h4>
                                <p>Perusahaan logistik skala kecil dan menengah, dengan tim yang memiliki ambisi untuk memacu pertumbuhan kinerja melalui kolaborasi yang solid.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Services Section -->

            <!-- ======= Services Section ======= -->
            <section id="services" class="services">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Services</h2>
                        <h3>Check our <span>Services</span></h3>
                        <p>Berikut beberapa keunggulan Performance Apps by Crowe </p>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-library"></i></div>
                                <h4><a href="">KPI Library</a></h4>
                                <p>Aplikasi Performance Apps by Crowe menyediakan gallery pilihan KPI (Key Performance Indicators) yang merupakan standar kinerja perusahaan di industri logistik secara khusus, sehingga memudahkan user untuk menentukan target team dari waktu ke waktu.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-file"></i></div>
                                <h4><a href="">Strategic Initiatives Library</a></h4>
                                <p>Di samping itu, Apps ini juga menyediakan gallery pilihan Strategic Initiatives yang dapat membantu user dalam memilih solusi ketika target dalam KPI yang sudah ditetapkan tidak tercapai sesuai harapan.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-tachometer"></i></div>
                                <h4><a href="">Collaboration Tool for Team</a></h4>
                                <p>Aplikasi Performance Apps by Crowe dapat memfasilitasi member dalam satu user team untuk berkolaborasi dalam menentukan  target, mengevaluasi pencapaiannya,pencapaiannya serta menemukan solusi ketika target tidak tercapai.</p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bxs-dashboard"></i></div>
                                <h4><a href="">Dashboard Team Performance</a></h4>
                                <p>Apps ini juga memberikan kemudahan bagi user team leader dan member untuk tracking dan monitoring capaian kinerja secara periodik sesuai target yang telah ditetapkan pada periode tersebut. </p>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                            <div class="icon-box">
                                <div class="icon"><i class="bx bx-chat"></i></div>
                                <h4><a href="">Live Chat for Team Users</a></h4>
                                <p>Aplikasi Performance Apps by Crowe memfasilitasi user leader dan member dalam berkomunikasi sebagai team dengan menggunakan fungsi live chat yang tersedia secara real time.</p>
                            </div>
                        </div>

                        <!--                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                                                    <div class="icon-box">
                                                        <div class="icon"><i class="bx bx-arch"></i></div>
                                                        <h4><a href="">Divera don</a></h4>
                                                        <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
                                                    </div>
                                                </div>-->

                    </div>

                </div>
            </section>
            <!-- End Services Section -->

            <!-- ======= Testimonials Section ======= -->
<!--            <section id="testimonials" class="testimonials">
                <div class="container" data-aos="zoom-in">

                    <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div> 

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <p>
                                        <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                        Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                    </p>
                                </div>
                            </div> 
                            End testimonial item 
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>
            </section>-->
            <!-- End Testimonials Section -->

            <!-- ======= Pricing Section ======= -->
<!--            <section id="pricing" class="pricing">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Pricing</h2>
                        <h3>Check our <span>Pricing</span></h3>
                        <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
                    </div>

                    <div class="row">

                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="box">
                                <h3>Free</h3>
                                <h4><sup>$</sup>0<span> / month</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li class="na">Pharetra massa</li>
                                    <li class="na">Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
                            <div class="box featured">
                                <h3>Business</h3>
                                <h4><sup>$</sup>19<span> / month</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li>Pharetra massa</li>
                                    <li class="na">Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
                            <div class="box">
                                <h3>Developer</h3>
                                <h4><sup>$</sup>29<span> / month</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li>Pharetra massa</li>
                                    <li>Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Buy Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                            <div class="box">
                                <span class="advanced">Advanced</span>
                                <h3>Ultimate</h3>
                                <h4><sup>$</sup>49<span> / month</span></h4>
                                <ul>
                                    <li>Aida dere</li>
                                    <li>Nec feugiat nisl</li>
                                    <li>Nulla at volutpat dola</li>
                                    <li>Pharetra massa</li>
                                    <li>Massa ultricies mi</li>
                                </ul>
                                <div class="btn-wrap">
                                    <a href="#" class="btn-buy">Buy Now</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>-->
            <!-- End Pricing Section -->

            <!-- ======= Frequently Asked Questions Section ======= -->
            <section id="faq" class="faq section-bg">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>F.A.Q</h2>
                        <h3>Frequently Asked <span>Questions</span></h3>
                        <p> </p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <ul class="faq-list">

                                <li>
                                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apakah yang dimaksud Performance Apps  by Crowe?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Aplikasi yang bertujuan untuk membantu team dalam mengukur efektifvitas Kinerja dalam menggunakan sumber daya perusahan untuk mencapai tujuan team.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Apa Keunggulan Performance Apps by Crowe? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Pengguna dapat menggunakan KPI library yang telah disiapkan oleh para konsultan berpengalaman untuk membantu anda dalam menjalankan usaha dengan lebih efisien dan terukur
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Siapa saja yang dapat menggunakan Performance Apps by Crowe?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Aplikasi ini dikhususkan untuk anda yang memiliki dan/danatau memimpin usaha/perusahaan skala kecil dan menengah di bidang logistik
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Bagaimana cara user/pengguna baru dalam menggunakan Performance Apps by Crowe? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            User dapat langsung mendaftar dan menggunakanya dengan mengikuti Instruction yang telah  tersedia, dan Tim Developer akan selalu bersedia membantu  anda bilamana ada kendala.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Apa yang dimaksud dengan KPI Library dan Strategic Initiatives Library? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            <b>KPI Library</b> bertujuan untuk menyediakan pilihan Key Performance Indicators (KPI), yang bersifat umum di industri logistik dan dibuat sedemikian rupa sehingga secara otomatis dapat memvisualisasikan metrik dan tren kinerja untuk eksekutif bisnis di sektor logistik.
                                        </p>
                                        <p>
                                            <b>Strategic Initiatives Library</b> bertujuan untuk menyediakan pilihan solusi bagi organisasi dalam menerjemahkan tujuan dan visinya ke dalam praktik,praktik, terutama ketika target KPI tidak tercapai. 
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Berapa Biaya untuk dapat menggunakan Performance Apps by Crowe dengan lisensi resmi?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Lisensi Penggunaan Dasar Performance Apps disediakan secara gratis.
                                            Untuk Fitur-Fitur Plus, Pro dan Enterprise atau tambahan lainya dapat langsung menghubungi Admin untuk mendapat informasi lebih lanjut.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <div data-bs-toggle="collapse" href="#faq7" class="collapsed question">Apa saja yang menjadi parameter pengukuran dalam Performance Apps by Crowe?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq7" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Kami menfokuskan kedalam 5 Parameter Utama Logistik yaitu: <br>
                                            1. Cost <br>
                                            2. Lead Time <br>
                                            3. Damage <br>
                                            4. Track & Trace, <br>
                                            5. Bukti Penyerahan Barang (Proof of Delivery)
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div data-bs-toggle="collapse" href="#faq8" class="collapsed question">Apakah Performance Apps by Crowe ini hanya sekedar mengukur, tapi belum sampai pada tingkat merekomendasikan actions lebih lanjut? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq8" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Tentu, Ketika dalam team memiliki hasil yang kurang memuaskan atau memerlukan improvement, Konsultan kami siap menghubungi dan mendampingi hingga anda mendapatkan Hasil yang memuaskan. 
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div data-bs-toggle="collapse" href="#faq9" class="collapsed question">Apa saja yang dicover oleh apps ini untuk pengukuran kinerja bagi perusahaan penyedia jasa logistik? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq9" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Saat ini Performance Apps by Crowe mengcover  Analisa Kinerja Tim berdasarkan Objektif dan KPI. Selanjutnya,Selanjutnya kami siap melakukan pendampingan khusus agar goals  yang diharapkan Perusahaan user dapat segera tercapai.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div data-bs-toggle="collapse" href="#faq10" class="collapsed question">Berapa lama training yang diperlukan bagi perusahaan Logistik yang ingin mencoba apps ini? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq10" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Training dilakukan dapat melalui Online atau Offline Meeting dengan pendampingan selama 1-3 hari.
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div data-bs-toggle="collapse" href="#faq11" class="collapsed question">Apa saja persyaratan yang harus dipenuhi oleh perusahaan yang ingin mencoba menerapkan apps ini?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                                    <div id="faq11" class="collapse" data-bs-parent=".faq-list">
                                        <p>
                                            Persyaratannya antara lain Legalitas Perusahaan Logistik sesuai Peraturan yang berlaku dan Keyakinan tim yang memiliki ambisi untuk memacu pertumbuhan kinerja melalui kolaborasi yang solid
                                        </p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </section><!-- End Frequently Asked Questions Section -->

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Contact</h2>
                        <h3><span>Contact Us</span></h3>
                        <!--<p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>-->
                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">


                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">

                        <div class="col-md-6 ">
                            <div class="mapouter"><div class="gmap_canvas"><iframe width="650" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Cyber%202%20Towe&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://soap2day-to.com"></a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:650px;}</style><a href="https://www.embedgooglemap.net">google maps for websites</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:650px;}</style></div></div>
                            <!--<iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>-->
                        </div>

                        <div class="col-md-6">
                            <div class="info-box mb-4">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p>Cyber 2 Tower 20th-21st Floor Jalan Hr. Rasuna Said Blok X-5, RT.7/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950</p>
                            </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="info-box mb-4">
                                        <i class="bx bx-envelope"></i>
                                        <h3>Email Us</h3>
                                        <p>munir.ali@crowe.id</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="info-box mb-4">
                                        <i class="bx bx-phone-call"></i>
                                        <h3>Call Us</h3>
                                        <p>+62 21 25535699</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <!--            <div class="footer-top">
                            <div class="container">
                                <div class="row">
            
                                    <div class="col-lg-3 col-md-6 footer-contact">
                                        <h3>BizLand<span>.</span></h3>
                                        <p>
                                            A108 Adam Street <br>
                                            New York, NY 535022<br>
                                            United States <br><br>
                                            <strong>Phone:</strong> +1 5589 55488 55<br>
                                            <strong>Email:</strong> info@example.com<br>
                                        </p>
                                    </div>
            
                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4>Useful Links</h4>
                                        <ul>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                                        </ul>
                                    </div>
            
                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4>Our Services</h4>
                                        <ul>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                                        </ul>
                                    </div>
            
                                    <div class="col-lg-3 col-md-6 footer-links">
                                        <h4>Our Social Networks</h4>
                                        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
                                        <div class="social-links mt-3">
                                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                                        </div>
                                    </div>
            
                                </div>
                            </div>
                        </div>-->

            <div class="container py-4">
                <div class="copyright">
                    &copy; Copyright <strong><span>Crowe Indonesia</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
                    <!--                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
                </div>
            </div>
        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="assetsLanding/vendor/aos/aos.js"></script>
        <script src="assetsLanding/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assetsLanding/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assetsLanding/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assetsLanding/vendor/php-email-form/validate.js"></script>
        <script src="assetsLanding/vendor/purecounter/purecounter.js"></script>
        <script src="assetsLanding/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assetsLanding/vendor/waypoints/noframework.waypoints.js"></script>

        <!-- Template Main JS File -->
        <script src="assetsLanding/js/main.js"></script>
    </body>
</html>
