<!DOCTYPE html>
    <style>
      .button-order:hover {
        color: black;
      }
      .button-order {
        display: flex;
        margin-top: 5px;
        margin-bottom: 10px;
        justify-content: center;
        align-items: center;
        background-color: #54B435;
        color: white;
        height: 40px;
        width: 100px;
        margin-left: auto; 
        margin-right: auto;
        border-radius: 20px;
        color: white;
      }
      .shopping-cart-icon {
        width: 24px;
        height: 24px;
        filter: brightness(0) saturate(100%) invert(67%) sepia(0%) saturate(20%) hue-rotate(358deg) brightness(91%) contrast(87%);
      }
      .shopping-cart-icon:hover {
        filter: brightness(0) saturate(100%) invert(0%) sepia(0%) saturate(0%) hue-rotate(0deg) brightness(100%) contrast(100%);
      }
      
    </style>
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
          <li><a href="/dashboard">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="/menu">Menu</a></li>
          <li><a href="#contact">Contact</a></li>
          <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
          </x-dropdown-link>
          <li class="nav-item dropdown">
            <?php
            $pesanan_utama = \App\Models\Pesanan::where('id_user', Auth::user()->id)->where('status', 0)->first();
            $notif = 0; // Inisialisasi nilai notif dengan 0
            if ($pesanan_utama) {
                $notif = \App\Models\PesananDetail::where('id_pesanan', $pesanan_utama->id)->count();
            }
            ?>
            <a href="/co">
                <img class="shopping-cart-icon nav-link dropdown-toggle" src="assets/img/shopping_cart.png" alt="">
                <span class="badge badge-danger">{{ $notif }}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="shoppingCartDropdown">
                <li><a class="dropdown-item" href="/history">History Order</a></li>
            </ul>
          </li>
          <li><form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form></li>
        </ul>
      </nav><!-- .navbar -->

      {{-- <a class="btn-login" href="/login">Login</a> --}}
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

      {{-- <div class="s130">
        <form action="{{ route('search') }}" method="GET">
          <div class="inner-form">
            <div class="input-field first-wrap">
              <div class="svg-wrapper">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                </svg>
              </div>
              <input id="search" type="text" placeholder="What are you looking for?" />
            </div>
            <div class="input-field second-wrap">
              <button class="btn-search" type="button">SEARCH</button>
            </div>
          </div>
        </form>
      </div>
      </div> --}}

      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-all">
            <h4>All</h4>
          </a>
        </li><!-- End tab nav item -->
        
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-starters">
            <h4>Diet</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-lowcarb">
            <h4>Low Carbo</h4>
          </a><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-vegan">
            <h4>Vegan</h4>
          </a>
        </li><!-- End tab nav item -->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-glutenfree">
            <h4>Glutten Free</h4>
          </a>
        </li><!-- End tab nav item -->

      </ul>

      <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

        <div class="tab-pane fade active show" id="menu-all">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>All</h3>
          </div>

          <div class="row gy-5">

            @foreach ($data_produk as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-1.png" class="glightbox"><img src="assets/img/menu/menu-item-1.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <!-- <p class="ingredients menu-desk">
                  {{$item['desk_produk']}}
                </p> -->
                <p class="price">
                  Rp. {{ number_format($item['harga'], 2, ',', '.') }}
                </p>
                <a href="{{ route('pesanan', ['id' => $item['id']]) }}" class="button-order">Order</a>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Starter Menu Content -->

        <div class="tab-pane fade" id="menu-diet">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Diet</h3>
          </div>

          <div class="row gy-5">

            @foreach ($starter as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-2.png" class="glightbox"><img src="assets/img/menu/menu-item-2.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients menu-desk">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{ number_format($item['harga'], 2, ',', '.') }}
                </p>
                <a href="{{ route('pesanan', ['id' => $item['id']]) }}" class="button-order">Order</a>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Starter Menu Content -->

        <div class="tab-pane fade" id="menu-lowcarb">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Low Carbo</h3>
          </div>

          <div class="row gy-5">

            @foreach ($breakfast as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-3.png" class="glightbox"><img src="assets/img/menu/menu-item-3.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients menu-desk">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{ number_format($item['harga'], 2, ',', '.') }}
                </p>
                <a href="{{ route('pesanan', ['id' => $item['id']]) }}" class="button-order">Order</a>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Breakfast Menu Content -->

        <div class="tab-pane fade" id="menu-vegan">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Vegan</h3>
            <h3>Vegan</h3>
          </div>

          <div class="row gy-5">

            @foreach ($lunch as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-4.png" class="glightbox"><img src="assets/img/menu/menu-item-4.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients menu-desk">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{ number_format($item['harga'], 2, ',', '.') }}
                </p>
                <a href="{{ route('pesanan', ['id' => $item['id']]) }}" class="button-order">Order</a>
              </div>
            @endforeach<!-- Menu Item -->

          </div>
        </div><!-- End Lunch Menu Content -->

        <div class="tab-pane fade" id="menu-glutenfree">

          <div class="tab-header text-center">
            <p>Menu</p>
            <h3>Glutten Free</h3>
          </div>

          <div class="row gy-5">

            @foreach ($dinner as $item)
              <div class="col-lg-4 menu-item">
                <a href="assets/img/menu/menu-item-5.png" class="glightbox"><img src="assets/img/menu/menu-item-5.png" class="menu-img img-fluid" alt=""></a>
                <h4>{{$item['nama_produk']}}</h4>
                <p class="ingredients menu-desk">
                  {{$item['desk_produk']}}
                </p>
                <p class="price">
                  Rp. {{ number_format($item['harga'], 2, ',', '.') }}
                </p>
                <a href="{{ route('pesanan', ['id' => $item['id']]) }}" class="button-order">Order</a>
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
  <script src="assets/js/extention/choices.js"></script>
</body>

</html>