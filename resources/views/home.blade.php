<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Bali Climbing</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

     <!-- Favicons -->
     <link href="{{ asset('assets/img/avatars/bali-remove.png') }}" rel="icon">
     <link href="{{{ asset('assets/frontend/img/apple-touch-icon.png') }}}" rel="apple-touch-icon">

     <!-- Vendor CSS Files -->
     <link href="{{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}}" rel="stylesheet">
     <link href="{{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}}" rel="stylesheet">
     <link href="{{{ asset('assets/frontend/vendor/aos/aos.css') }}}" rel="stylesheet">
     <link href="{{{ asset('assets/frontend/vendor/glightbox/css/glightbox.min.css') }}}" rel="stylesheet">
     <link href="{{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.css') }}}" rel="stylesheet">

     <!-- Main CSS File -->
     <link href="{{{ asset('assets/frontend/css/main.css') }}}" rel="stylesheet">

     <style>
          .portfolio-img-wrapper {
  width: 100%;
  height: 230px;
  overflow: hidden;
  border-radius: 8px;
}

.portfolio-img-wrapper img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

     </style>

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Bali Climbing</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Class</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="{{ route('loginShow') }}">Login</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{{ asset('assets/frontend/img/brand.png') }}}" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
       <h2 data-aos="fade-up" data-aos-delay="100">CLIMB. CHALLENGE. CONQUER.</h2>
          <p data-aos="fade-up" data-aos-delay="200">Join our passionate climbing community and experience the thrill of vertical adventure in Bali.</p>

        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="{{ route('loginShow') }}" class="btn-get-started">Login</a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
   <section id="about" class="about section">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <h3>About Bali Climbing</h3>
        <img src="{{{ asset('assets/frontend/img/book2.jpg') }}}" class="img-fluid rounded-2 mb-4" alt="">
        <p>Bali Climbing adalah pusat panjat tebing terkemuka di Pulau Dewata, menawarkan fasilitas indoor dan outdoor bagi para pendaki dari semua tingkatan. Kami hadir untuk memperkenalkan olahraga panjat tebing secara menyenangkan, aman, dan menantang di tengah suasana tropis Bali.</p>
        <p>Terletak di jantung budaya Bali, kami menyediakan beragam rute panjat, pelatihan bersertifikat, hingga tur panjat alam terbuka ke tebing-tebing alami di sekitar pulau. Instruktur profesional kami siap membimbing pemula maupun pendaki berpengalaman dalam menjelajahi dunia climbing dengan teknik yang benar dan penuh semangat.</p>
      </div>
      <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
        <div class="content ps-0 ps-lg-5">
        <p>Baik Anda ingin mencoba aktivitas seru selama liburan, meningkatkan skill panjat, atau membangun komunitas dengan sesama climber — Bali Climbing adalah rumah kedua Anda di dinding tebing.</p>

          <p class="fst-italic">
            Discover a new way to connect with nature, challenge yourself, and be part of Bali’s growing climbing community.
          </p>
          <ul>
            <li><i class="bi bi-check-circle-fill"></i> <span>Indoor & outdoor climbing facilities</span></li>
            <li><i class="bi bi-check-circle-fill"></i> <span>Certified instructors and guided trips</span></li>
            <li><i class="bi bi-check-circle-fill"></i> <span>Perfect for beginners, families, and seasoned climbers</span></li>
          </ul>
          <p>
            Bergabunglah dengan kami dan rasakan sendiri sensasi panjat tebing di surga tropis. Book your session today!
          </p>
          <div class="position-relative mt-4">
            <img src="{{{ asset('assets/frontend/img/app4.jpg') }}}" class="img-fluid rounded-4" alt="">
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox pulsating-play-btn"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalPeserta }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Customer</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalClasses }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Class Available</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalPeserta }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Instruktur</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalBookings }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Pesanan Di Proses</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

     <section id="services" class="services section">

      <!-- Section Title -->
     <div class="container section-title" data-aos="fade-up">
  <h2>Daftar</h2>
  <p>Class</p>
</div>

<!-- Section Daftar Kelas -->
      <div class="container">
 <div class="row gy-4">
  @foreach ($classPackages as $class)
    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
      <div class="service-item">
        <div class="img">
          <img 
            src="{{ $class->image ? asset('storage/' . $class->image) : asset('assets/frontend/img/services-1.jpg') }}" 
            class="img-fluid" 
            alt="Gambar Kelas" 
            style="width: 100%; height: 230px; object-fit: cover;"
          >
        </div>
        <div class="details position-relative">
          <div class="icon">
            <i class="bi bi-mortarboard"></i>
          </div>
          <a href="#" class="">
            <h3>{{ $class->name }}</h3>
          </a>
          <p>{{ Str::limit($class->description, 100) }}</p>
          <p><strong>Harga:</strong> Rp{{ number_format($class->price, 0, ',', '.') }}</p>
          <p><strong>Durasi:</strong> {{ $class->duration }} jam</p>
          <p><strong>Jadwal:</strong> {{ \Carbon\Carbon::parse($class->schedule)->translatedFormat('d M Y, H:i') }}</p>

          <div class="text-center mt-3">
            <a href="{{ route('loginShow') }}" class="btn btn-primary btn-sm">
              Booking Sekarang
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

</div>
<!-- /Services Section -->

 <section id="portfolio" class="portfolio section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Portfolio</h2>
    <p>CHECK OUR PORTFOLIO</p>
  </div>

  <div class="container">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">Event</li>
        <li data-filter=".filter-product">Outdor</li>
        <li data-filter=".filter-branding">ETC</li>
      </ul>

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ([
          ['App 1', 'app1.jpg', 'app'],
          ['Product 1', 'product1.jpg', 'product'],
          ['Branding 1', 'branding-1.jpg', 'branding'],
          ['Books 1', 'book1.jpg', 'branding'],
          ['App 2', 'app2.jpg', 'app'],
          ['Product 2', 'product2.jpg', 'product'],
          ['Branding 2', 'book2.jpg', 'branding'],
          ['Books 2', 'book2.jpg', 'branding'],
          ['App 3', 'app2.jpg', 'app'],
          ['Product 3', 'app3.jpg', 'product'],
          ['Branding 3', 'book3.jpg', 'branding'],
          ['Books 3', 'app4.jpg', 'branding'],
        ] as [$title, $filename, $filter])
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $filter }}">
  <div class="portfolio-content h-100">
    <div class="portfolio-img-wrapper">
      <img src="{{ asset('assets/frontend/img/portfolio/' . $filename) }}" alt="{{ $title }}">
    </div>
    <div class="portfolio-info">
      <h4>{{ $title }}</h4>
      <p>Lorem ipsum, dolor sit amet consectetur</p>
      <a href="{{ asset('assets/frontend/img/portfolio/' . $filename) }}" title="{{ $title }}"
         data-gallery="portfolio-gallery-{{ $filter }}" class="glightbox preview-link">
        <i class="bi bi-zoom-in"></i>
      </a>
      <a href="{{ url('portfolio-details') }}" title="More Details" class="details-link">
        <i class="bi bi-link-45deg"></i>
      </a>
    </div>
  </div>
</div>

        @endforeach

      </div>
    </div>
  </div>
</section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Message</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p> Canggu, Kec. Kuta Utara, Kabupaten Badung, Bali</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+62 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>baliclimbing@info.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">
           <form id="whatsappForm" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
          <div class="row gy-4">
          <div class="col-md-12">
               <input type="text" id="name" class="form-control" placeholder="Your Name" required>
          </div>

          

          <div class="col-md-12">
               <textarea id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          </div>

          <div class="col-md-12 text-center">
               <div class="loading">Loading</div>
               <div class="error-message"></div>
               <div class="sent-message">Your message has been sent. Thank you!</div>

               <button type="submit">Send Message via WhatsApp</button>
          </div>
          </div>
     </form>

          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Bali CLimbing</strong> <span>All Rights Reserved</span></p>
      <div class="credits">

     
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
     <!-- JS Files -->
     <script src="{{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/php-email-form/validate.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/aos/aos.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/glightbox/js/glightbox.min.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/purecounter/purecounter_vanilla.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/swiper/swiper-bundle.min.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}}"></script>
     <script src="{{{ asset('assets/frontend/vendor/isotope-layout/isotope.pkgd.min.js') }}}"></script>

     <!-- Main JS File -->
     <script src="{{{ asset('assets/frontend/js/main.js') }}}"></script>

     <script>
          document.getElementById("whatsappForm").addEventListener("submit", function(e) {
          e.preventDefault(); // Stop normal form submit

          let name = document.getElementById("name").value;
          let message = document.getElementById("message").value;

          let waMessage = `Hallo Team Bali Climbing,%0ASaya ${name},%0A${message}`;
          let waURL = `https://wa.me/62895610420278?text=${waMessage}`;

          window.open(waURL, '_blank'); // Open WhatsApp in a new tab
          });
     </script>

     </body>

</html>