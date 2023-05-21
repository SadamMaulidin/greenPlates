<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
      
        <title>GreenPlates</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
      
        <!-- Favicons -->
        <link href="assets/img/g-icon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="assets/css/main.css" rel="stylesheet">

      </head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header menu fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/g-icon.png" alt="">
        <h1>GreenPlates<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a></li>
          <li><a href="#about">About</a></li>
          {{-- <li><a href="#menu">Menu</a></li> --}}
          {{-- <li><a href="#events">Events</a></li> --}}
          {{-- <li><a href="#chefs">Chefs</a></li> --}}
          {{-- <li><a href="#gallery">Gallery</a></li> --}}
          <li class="dropdown"><a href="#menu"><span>Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#menu-starters">Starters</a></li>
              <li><a href="#menu-breakfast">Breakfast</a></li>
              <li><a href="#menu-lunch">Lunch</a></li>
              <li><a href="#menu-dinner">Dinner</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-login" href="/login">Login</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <main>
    <!-- ======= Menu Section ======= -->
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">
      <div class="section-header">
        <h2>Our Menu</h2>
        <p>Check Our <span> Menu</span></p>
      </div>

      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
            <h4>Starters</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
            <h4>Breakfast</h4>
          </a><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lunch">
            <h4>Lunch</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-dinner">
            <h4>Dinner</h4>
          </a>
        </li><!-- End tab nav item -->

      </ul>

      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

        <div class="tab-pane fade active show" id="menu-starters">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Starters</h3>
          </div>

          <div class="row gy-5">

            @foreach ($starter as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{$item['harga']}},00
                </p>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Starter Menu Content -->

        <div class="tab-pane fade" id="menu-breakfast">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Breakfast</h3>
          </div>

          <div class="row gy-5">

            @foreach ($starter as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{$item['harga']}},00
                </p>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Breakfast Menu Content -->

        <div class="tab-pane fade" id="menu-lunch">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Lunch</h3>
          </div>

          <div class="row gy-5">

            @foreach ($starter as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{$item['harga']}},00
                </p>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Lunch Menu Content -->

        <div class="tab-pane fade" id="menu-dinner">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Dinner</h3>
          </div>

          <div class="row gy-5">

            @foreach ($starter as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{$item['harga']}},00
                </p>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Dinner Menu Content -->

      </div>

    </div>
  </section><!-- End Menu Section -->
  </main>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>