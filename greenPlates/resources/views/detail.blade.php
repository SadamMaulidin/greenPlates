<!DOCTYPE html>
<style>
    main {
        margin-top: 80px; /* Sesuaikan nilai margin-top sesuai kebutuhan */
    }
    .nama-produk {
        text-align: left;
        color: #54B435;
        font-size: 50px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .harga {
        text-align: left;
        font-weight: bold;
        color: black;
        font-size: 30px;
        margin-bottom: 50px;
    }
    .deskripsi {
        font-weight: bold;
        font-size: 18px;
    }
    .btn-minus,
    .btn-plus {
        padding: 5px 10px;
        background-color: #f2f2f2;
        border: none;
        cursor: pointer;
    }

    .input-jumlah {
        width: 500;
        text-align: center;
    }
    .button-keranjang {
        display: flex;
        margin-top: 20px;
        margin-bottom: 0px;
        justify-content: center;
        align-items: center;
        background-color: #54B435;
        color: white;
        height: 40px;
        width: 500px;
        margin-left: 0;
        border-radius: 5px;
        color: white;
    }
    .shopping-cart-icon {
        width: 24px;
        height: 24px;
        fill: white;     
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
        <link href="{{ asset('assets/img/g-icon.png') }}" rel="icon">
        <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
      
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
      
        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
      
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

        <!-- <link href="assets/css/main.css" rel="stylesheet"> -->

      </head>
<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header menu fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('assets/img/g-icon.png') }}" alt="">
        <h1>GreenPlates<span>.</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/dashboard">Home</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/menu">Menu</a></li>
          {{-- <li><a href="#events">Events</a></li> --}}
          {{-- <li><a href="#chefs">Chefs</a></li> --}}
          {{-- <li><a href="#gallery">Gallery</a></li> --}}
          {{-- <li class="dropdown"><a><span>Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#menu-starters">Starters</a></li>
              <li><a data-bs-target="#menu-breakfast">Breakfast</a></li>
              <li><a href="#menu-lunch">Lunch</a></li>
              <li><a href="#menu-dinner">Dinner</a></li>
            </ul>
          </li> --}}
          <li><a href="/contact">Contact</a></li>
          <x-dropdown-link :href="route('profile.edit')">
            {{ __('Profile') }}
          </x-dropdown-link>
          <li class="nav-item dropdown">
            <a href="/co"><img class="shopping-cart-icon nav-link dropdown-toggle" src="{{ asset('assets/img/shopping_cart.png') }}" alt=""></a>
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
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body">
          <h3>Sukses Check Out</h3>
          <h5>Pesanan anda berhasil di Check Out, untuk pembayaran selanjutnya silahkan transfer ke rekening 
            <strong>Bank BRI Nomor Rekening : 1234-56789-123</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></h5>
        </div>
      </div>
        <div class="card mt-2">
            <div class="card-body">
                <h1>Detail Order</h1>
                @if(!empty($pesanan_detail))
                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach($pesanan_detail as $detail)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $detail->produk->nama_produk }}</td>
                            <td>{{ $detail->jumlah }}</td>
                            <td>Rp. {{ $detail->produk->harga }}</td>
                            <td>Rp. {{ $detail->jumlah_harga }}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                          <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="4" align="right"><strong>Kode Unik :</strong></td>
                          <td><strong>{{ number_format($pesanan->kode) }}</strong></td>
                        </tr>
                        <tr>
                          <td colspan="4" align="right"><strong>Total yang harus dibayar</strong></td>
                          <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
  </main>

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/extention/choices.js') }}"></script>
    </body>
</html>
 