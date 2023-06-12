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
          <li><form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <x-dropdown-link :href="route('admin.logout')"
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
                <h1>Order Masuk</h1>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Jumlah</th>
                      <th>      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($unconfirmed as $orders)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $orders->tanggal }}</td>
                      <td>
                        @if($orders->status == 1)
                        Sudah pesan & Belum dibayar
                        @else
                        Sudah dibayar
                        @endif
                      </td>
                      <td>{{ $orders->tanggal }} </td>
                      <td>
                        <a href="{{ route('admin.konfirmasiOrder', ['id' => $orders->id]) }}" class="btn btn-primary">Konfirmasi</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <h1>Proses</h1>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Jumlah</th>
                      <th>      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($process as $orders)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $orders->tanggal }}</td>
                      <td>
                        @if($orders->status == 1)
                        Sudah pesan & Belum dibayar
                        @else
                        Sudah dibayar
                        @endif
                      </td>
                      <td>{{ $orders->tanggal }} </td>
                      <td>
                        <a href="{{ url('konfirmasi-order') }}" class="btn btn-primary">Konfirmasi</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-body">
                <h1>Sedang Diantar</h1>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Jumlah</th>
                      <th>      </th>
                    </tr>
                  </thead>
                  <tbody>
                    @php $no = 1; @endphp
                    @foreach($shipping as $orders)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $orders->tanggal }}</td>
                      <td>
                        @if($orders->status == 1)
                        Sudah pesan & Belum dibayar
                        @else
                        Sudah dibayar
                        @endif
                      </td>
                      <td>{{ $orders->tanggal }} </td>
                      <td>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
 