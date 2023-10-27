<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="horizontal" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-topbar="light" data-sidebar-visibility="show" data-layout-style="default"
  data-bs-theme="light" data-layout-width="fluid" data-layout-position="scrollable">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.js" integrity="sha512-4lykFR6C2W55I60sYddEGjieC2fU79R7GUtaqr3DzmNbo0vSaO1MfUjMoTFYYuedjfEix6uV9jVTtRCSBU/Xiw==" crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- css -->
  <link rel="stylesheet" href="{{ asset('css/page/LandingPage.css') }}">
  <link href="{{ asset('landingpage/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('landingpage/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('landingpage/css/style.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  {{-- script --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20">

  <!--Navbar Start-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top navdar-custom" id="navbar">
    <div class="container">
      <!-- LOGO -->
      <a class="navbar-brand logo" href="index-1.html">
        <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-dark" height="35" />
        <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-light" height="35" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
          <li class="nav-item">
            <a href="#home" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="#tentang" class="nav-link">Tentang</a>
          </li>
          <li class="nav-item">
            <a href="#contoh" class="nav-link">Contoh</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Kontak</a>
          </li>
          @auth
            <li>
              <a href="#" class="nav-link">Sertifikat</a>
            </li>
            <li>
              <a href="#" class="nav-link">Profile</a>
            </li>
          @endauth
        </ul>
        <a href="{{ route('login') }}" class="btn btn-sm rounded-pill nav-btn ms-lg-3">Masuk</a>
        <div class="switcher-hover" id="style-switcher">
          <div class="bottom">
            <a href="javascript: void(0);" id="mode" class="mode-btn text-white">
              <i class="bi bi-brightness-high text-dark mode-light"></i>
              <i class="bi bi-moon mode-dark"></i>
            </a>
            <a href="javascript: void(0);" class="settings" onclick="toggleSwitcher()"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- end container -->
  </nav>
  <!-- Navbar End -->

  <!-- Hero Start -->
  <section class="hero-6 bg-center position-relative overflow-hidden" style="background-image: url({{ asset('landingpage/images/hero-6-bg.png') }});" id="home">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-5">
          <i class="mb-4 icon-lg sw-1_5 text-primary" data-feather="sunrise"></i>
          <h1 class="font-weight-semibold mb-4 hero-6-title">Selamat Datang di <b class="text-gradient">HummaCertify</b></h1>
          <p class="mb-5 text-muted">Verifikasi keaslian sertifikat Anda dengan memasukkan kode sertifikat
            yang Anda terima</p>
          {{-- <a href="#" class="btn btn-primary me-2">Get Started <i class="icon-sm ms-1" data-feather="arrow-right"></i></a> --}}
          <div class="searchBox">
            <input class="searchInput"type="search" name="" placeholder="Search">
            <button class="searchButton" href="#">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
        <div class="col-lg-6 col-sm-10 mx-auto ms-lg-auto me-lg-0">
          <div class="mt-lg-0 mt-5">
            <img src="{{ asset('landingpage/images/image1.png') }}" alt="" class="img-xl-responsive" />
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero End -->

  <!-- Services start -->
  <section class="section" id="">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold text-gradient">Pelayanan Kami</h2>
          <p class="text-muted">Platform kami yang mengakomodasi Anda dalam menemukan dan memverifikasi
            sertifikat Hummatech Anda dengan cepat dan mudah, menegaskan keaslian setiap pencapaian</p>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-lg-4">
          <div class="service-box text-center px-4 py-5 position-relative mb-4">
            <div class="service-box-content p-4">
              <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.390137" width="72" height="72" rx="36" fill="#FBFBFB" />
                  <path
                    d="M47.1427 30.5984V26.8333C47.1427 26.3471 46.9471 25.8808 46.5988 25.537C46.2505 25.1931 45.7781 25 45.2856 25H24.8571C24.3646 25 23.8922 25.1931 23.5439 25.537C23.1957 25.8808 23 26.3471 23 26.8333V41.4995C23 41.9857 23.1957 42.452 23.5439 42.7958C23.8922 43.1396 24.3646 43.3328 24.8571 43.3328H37.8571V46.0827C37.8569 46.239 37.8973 46.3928 37.9744 46.5294C38.0514 46.6659 38.1626 46.7808 38.2973 46.863C38.432 46.9452 38.5857 46.9921 38.7439 46.9991C38.9021 47.0061 39.0595 46.9731 39.2012 46.9031L42.4999 45.2738L45.7986 46.9031C45.9402 46.9731 46.0976 47.0061 46.2558 46.9991C46.414 46.9921 46.5678 46.9452 46.7025 46.863C46.8372 46.7808 46.9483 46.6659 47.0254 46.5294C47.1024 46.3928 47.1428 46.239 47.1427 46.0827V39.5677C48.3331 38.3707 49 36.7604 49 35.083C49 33.4057 48.3331 31.7953 47.1427 30.5984ZM35.0714 36.9163H28.5714C28.3251 36.9163 28.0889 36.8197 27.9148 36.6478C27.7407 36.4759 27.6428 36.2428 27.6428 35.9997C27.6428 35.7566 27.7407 35.5234 27.9148 35.3515C28.0889 35.1796 28.3251 35.083 28.5714 35.083H35.0714C35.3176 35.083 35.5538 35.1796 35.728 35.3515C35.9021 35.5234 35.9999 35.7566 35.9999 35.9997C35.9999 36.2428 35.9021 36.4759 35.728 36.6478C35.5538 36.8197 35.3176 36.9163 35.0714 36.9163ZM35.0714 33.2498H28.5714C28.3251 33.2498 28.0889 33.1532 27.9148 32.9813C27.7407 32.8094 27.6428 32.5762 27.6428 32.3331C27.6428 32.09 27.7407 31.8569 27.9148 31.685C28.0889 31.513 28.3251 31.4165 28.5714 31.4165H35.0714C35.3176 31.4165 35.5538 31.513 35.728 31.685C35.9021 31.8569 35.9999 32.09 35.9999 32.3331C35.9999 32.5762 35.9021 32.8094 35.728 32.9813C35.5538 33.1532 35.3176 33.2498 35.0714 33.2498ZM45.2856 44.6L42.9154 43.429C42.7864 43.3653 42.6441 43.3321 42.4999 43.3321C42.3556 43.3321 42.2134 43.3653 42.0844 43.429L39.7142 44.6V40.8796C40.5847 41.2878 41.5362 41.4995 42.4999 41.4995C43.4635 41.4995 44.4151 41.2878 45.2856 40.8796V44.6ZM42.4999 39.6662C41.5816 39.6662 40.684 39.3974 39.9205 38.8938C39.157 38.3902 38.5619 37.6744 38.2105 36.8369C37.8591 35.9995 37.7671 35.0779 37.9463 34.1889C38.1254 33.2998 38.5676 32.4832 39.2169 31.8422C39.8662 31.2013 40.6935 30.7647 41.5941 30.5879C42.4947 30.4111 43.4283 30.5018 44.2766 30.8487C45.125 31.1956 45.8501 31.783 46.3603 32.5367C46.8704 33.2904 47.1427 34.1766 47.1427 35.083C47.1427 36.2986 46.6536 37.4643 45.7829 38.3238C44.9122 39.1834 43.7312 39.6662 42.4999 39.6662Z"
                    fill="#29344A" />
                </svg>
              </div>
              <h4 class="mb-3 font-size-22">Fungsi</h4>
              <p class="text-muted mb-0">Pencarian sertifikat adalah langkah kunci dalam memastikan keabsahan dokumen penting yang anda miliki</p>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="service-box text-center px-4 py-5 position-relative mb-4 active">
            <div class="service-box-content p-4">
              <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.390137" width="72" height="72" rx="36" fill="#FBFBFB" />
                  <g clip-path="url(#clip0_649_356)">
                    <path opacity="0.5"
                      d="M42.8461 25.3188L26.3969 28.8715C25.4621 29.0734 24.6457 29.6384 24.1274 30.4422C23.6092 31.246 23.4315 32.2228 23.6334 33.1576L24.3236 36.3535L32.9353 37.2974L40.368 35.692L47.8225 31.2782L47.1322 28.0823C46.9303 27.1475 46.3653 26.3311 45.5615 25.8129C44.7577 25.2946 43.781 25.1169 42.8461 25.3188Z"
                      fill="#29344A" />
                    <path
                      d="M32.2722 27.6026L32.0184 26.4277L36.7182 25.4126L36.972 26.5875L39.3218 26.08L39.0681 24.9051C38.9329 24.2822 38.5561 23.7383 38.0204 23.3929C37.4847 23.0475 36.8338 22.9288 36.2107 23.0627L31.5109 24.0778C30.888 24.213 30.3441 24.5898 29.9987 25.1255C29.6533 25.6612 29.5346 26.312 29.6685 26.9352L29.9223 28.1101L32.2722 27.6026ZM32.9359 37.2973L24.3242 36.3534L25.9178 43.7321C26.1206 44.6664 26.6858 45.4822 27.4894 46.0003C28.2929 46.5184 29.2692 46.6965 30.204 46.4956L46.6532 42.9429C47.5875 42.7401 48.4033 42.1749 48.9214 41.3713C49.4395 40.5678 49.6176 39.5915 49.4167 38.6567L47.8231 31.2781L40.3686 35.692L32.9359 37.2973Z"
                      fill="#29344A" />
                  </g>
                  <defs>
                    <clipPath id="clip0_649_356">
                      <rect width="28.8489" height="28.8489" fill="white" transform="translate(19 23.0908) rotate(-12.1877)" />
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <h4 class="mb-3 font-size-22">Manfaat</h4>
              <p class="text-muted mb-0">Sertifikat adalah bukti konkrit pencapaian dan digunakan dalam berbagai konteks, mulai dari peerjaan hingga pendidikan</p>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="service-box text-center px-4 py-5 position-relative mb-4">
            <div class="service-box-content p-4">
              <div class="icon-mono service-icon avatar-md mx-auto mb-4">
                <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <rect y="0.390137" width="72" height="72" rx="36" fill="#FBFBFB" />
                  <path
                    d="M36 34.5C39.1562 34.5 41.7143 31.926 41.7143 28.75C41.7143 25.574 39.1562 23 36 23C32.8438 23 30.2857 25.574 30.2857 28.75C30.2857 31.926 32.8438 34.5 36 34.5ZM40.2768 35.9645L38.1429 44.5625L36.7143 38.4531L38.1429 35.9375H33.8571L35.2857 38.4531L33.8571 44.5625L31.7232 35.9645C28.5402 36.1172 26 38.7361 26 41.975V43.8438C26 45.0342 26.9598 46 28.1429 46H43.8571C45.0402 46 46 45.0342 46 43.8438V41.975C46 38.7361 43.4598 36.1172 40.2768 35.9645Z"
                    fill="#29344A" />
                </svg>
              </div>
              <h4 class="mb-3 font-size-22">Bukti</h4>
              <p class="text-muted mb-0">Sertifikat mewakili pengetahuan, keterampilan, atau status tertentu yang anda peroleh selama perjalanan hidup anda</p>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->

  </section>
  <!-- Services end -->

  <!-- Features start -->
  <section class="section bg-light" id="tentang">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold text-gradient">Tentang Website Kami</h2>
          <p class="text-muted">Apabila Anda menerima sertifikat magang dari Hummatech, Anda dapat memeriksa keaslian sertifikat tersebut dengan mengunjungi situs web resmi kami, yaitu HummaCertify</p>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
      <div class="row align-items-center mb-5">
        <div class="col-md-5 order-2 order-md-1 mt-md-0 mt-5">
          <p class="text-muted mb-5">Sertifikat kelulusan magang adalah wujud pengakuan atas upaya dan dedikasi siswa magang yang telah menyelesaikan program mereka. Sertifikat khusus acara, di sisi lain, adalah bukti kehadiran atau kontribusi dalam
            acara-acara tertentu yang mungkin relevan dengan pengalaman magang.
            <br><br>
            Kami menghargai pentingnya sertifikat-sertifikat ini dalam perjalanan pendidikan dan karier siswa magang dan guru magang. Oleh karena itu, kami dengan sepenuh hati berkomitmen untuk membantu Anda memeriksa keaslian sertifikat-sertifikat ini
            melalui platform kami.
          </p>
        </div>
        <!-- end col -->
        <div class="col-md-6 ms-md-auto order-1 order-md-2">
          <div class="position-relative">
            <div class="ms-5 features-img">
              <img src="{{ asset('landingpage/images/image2.png') }}" alt="" class="img-fluid d-block mx-auto rounded" />
            </div>
            <img src="{{ asset('landingpage/images/dot-img.png') }}" alt="" class="dot-img-left" />
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
      <div class="row align-items-center section pb-0">
        <div class="col-md-6">
          <div class="position-relative mb-md-0 mb-5">
            <div class="me-5 features-img">
              <img src="{{ asset('landingpage/images/image3.png') }}" alt="" class="img-fluid d-block mx-auto rounded" />
            </div>
            <img src="{{ asset('landingpage/images/dot-img.png') }}" alt="" class="dot-img-right" />
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-5 ms-md-auto">
          <p class="text-muted mb-5">Dengan penggunaan platform kami, Anda dapat dengan mudah memastikan bahwa sertifikat kelulusan magang dan sertifikat khusus acara yang Anda miliki adalah resmi dan sah sesuai dengan ketentuan perusahaan kami.
            <br><br>
            Jadi, jika Anda adalah seorang siswa magang atau guru magang yang ingin memverifikasi sertifikat Anda, silakan manfaatkan platform kami dengan percaya diri. Kami siap membantu Anda dalam proses ini dan memastikan keaslian sertifikat-sertifikat
            tersebut. Terima kasih atas kepercayaan Anda kepada layanan kami.
          </p>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- Features end -->

  <section class="section bg-gradient-costum" id="contoh">
    <div class="bg-overlay-img"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="text-center">
            <h1 class="text-white mb-4">Contoh Sertifikat</h1>
            <p class="text-white mb-5 font-size-16">Berikut ini adalah contoh sertifikat yang di dapat saat lulus PKL atau magang di HummaTech.</p>
            <a href="#" class="btn btn-lg btn-light">bisa dihapus</a>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- Cta end -->

  <!-- Pricing start -->
  <section class="section" style="display: none;" id="pricing">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold">Pricing Plan</h2>
          <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium totam rem ab illo inventore.</p>
        </div>
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-lg-12">
          <div class="text-center mb-4 pricing-tab">
            <ul class="nav nav-pills rounded-pill justify-content-center d-inline-block shadow-sm" id="pricingpills-tab" role="tablist">
              <li class="nav-item d-inline-block">
                <a class="nav-link rounded-pill active" id="pills-monthly-tab" data-bs-toggle="pill" href="#pills-monthly" role="tab" aria-controls="pills-monthly" aria-selected="true">Monthly</a>
              </li>
              <li class="nav-item d-inline-block">
                <a class="nav-link rounded-pill" id="pills-yearly-tab" data-bs-toggle="pill" href="#pills-yearly" role="tab" aria-controls="pills-yearly" aria-selected="false">Yearly</a>
              </li>
            </ul>
          </div>
          <div class="tab-content" id="pricingpills-tabContent">
            <div class="tab-pane fade show active" id="pills-monthly" role="tabpanel" aria-labelledby="pills-monthly-tab">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="circle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        <img src="images/pricing/1.png" alt="" class="img-fluid d-block mx-auto" />
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Basic</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">50MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$9.00 / Month
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <span class="badge badge-primary pricing-badge shadow-lg">Most
                        Popular</span>
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="square"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        <img src="images/pricing/2.png" alt="" class="img-fluid d-block mx-auto" />
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Standard</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">100MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">Yes</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$39.00 / Month
                      </p>
                      <a href="javascript: void(0);" class="btn btn-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="triangle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        <img src="images/pricing/3.png" alt="" class="img-fluid d-block mx-auto" />
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Premium</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">200MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$79.00 / Month
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end monthly tab pane -->

            <div class="tab-pane fade" id="pills-yearly" role="tabpanel" aria-labelledby="pills-yearly-tab">
              <div class="row">
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="circle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        <img src="images/pricing/1.png" alt="" class="img-fluid d-block mx-auto" />
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Basic</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">50MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$29.00 / Year
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                    <!-- end cardbody -->
                  </div>
                  <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="square"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        <img src="images/pricing/2.png" alt="" class="img-fluid d-block mx-auto" />
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Standard</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">100MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">Yes</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$49.00 / Year
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                    <!-- end cardbody -->
                  </div>
                  <!-- end card -->
                </div>
                <!-- end col -->
                <div class="col-lg-4">
                  <div class="card plan-card mt-4 rounded text-center border-0 shadow overflow-hidden">
                    <div class="card-body px-4 py-5">
                      <span class="badge badge-primary pricing-badge shadow-lg">Most
                        Popular</span>
                      <!-- <div class="icon-mono avatar-md bg-soft-primary text-primary rounded mx-auto mb-5"><i class="icon-lg" data-feather="triangle"></i></div> -->
                      <div class="icon-mono avatar-md bg-soft-primary rounded mx-auto mb-5 p-3">
                        <img src="images/pricing/3.png" alt="" class="img-fluid d-block mx-auto" />
                      </div>
                      <h4 class="text-uppercase mb-4 pb-1">Premium</h4>
                      <p class="text-muted">Onlinespace: <span class="fw-bold">200MB</span></p>
                      <p class="text-muted">Support: <span class="fw-bold">No</span></p>
                      <p class="text-muted mb-4 pb-1">Domain 1</p>
                      <p class="text-muted font-size-14 mb-1">All Extension Included</p>
                      <p class="font-size-16 font-weight-semibold mb-4 price-tag">$99.00 / Year
                      </p>
                      <a href="javascript: void(0);" class="btn btn-soft-primary">Buy Now</a>
                    </div>
                    <!-- end cardbody -->
                  </div>
                  <!-- end card -->
                </div>
                <!-- end col -->
              </div>
            </div>
            <!-- end yearly tab pane -->
          </div>
          <!-- end tab content -->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- Pricing end -->

  <!-- Team start -->
  <section class="section bg-light" style="display: none;" id="team">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold">Our Team Members</h2>
          <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium totam rem ab illo inventore.</p>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              <img src="images/team/1.jpg" alt="" class="img-fluid d-block mx-auto" />
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">Frances Thompson</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Developer</p>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              <img src="images/team/2.jpg" alt="" class="img-fluid d-block mx-auto" />
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">John Jones</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Ceo</p>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              <img src="images/team/3.jpg" alt="" class="img-fluid d-block mx-auto" />
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">Della Hobbs</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Designer</p>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-3 col-sm-6">
          <div class="team-box mt-4 position-relative overflow-hidden rounded text-center shadow">
            <div class="position-relative overflow-hidden">
              <img src="images/team/4.jpg" alt="" class="img-fluid d-block mx-auto" />
              <ul class="list-inline p-3 mb-0 team-social-item">
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-primary"><i class="icon-sm" data-feather="facebook"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-info"><i class="icon-sm" data-feather="twitter"></i></a>
                </li>
                <li class="list-inline-item mx-3">
                  <a href="javascript: void(0);" class="team-social-icon h-danger"><i class="icon-sm" data-feather="instagram"></i></a>
                </li>
              </ul>
            </div>
            <div class="p-4">
              <h5 class="font-size-19 mb-1">Troy Jordon</h5>
              <p class="text-muted text-uppercase font-size-14 mb-0">Developer</p>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- Team end -->

  <!-- Blog start -->
  <section class="section" id="blog">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-lg-7 text-center">
          <h2 class="fw-bold">Our Blog</h2>
          <p class="text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
            doloremque laudantium totam rem ab illo inventore.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mt-4 border-0 shadow">
            <div class="card-body p-4">
              <span class="badge badge-soft-primary">UI & UX Design</span>
              <h4 class="font-size-22 my-4"><a href="javascript: void(0);">Step bt step to conduct
                  usability testing</a></h4>
              <p class="text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                fugit.</p>
              <div class="d-flex align-items-center mt-4 pt-2">
                <img src="images/user/img-2.jpg" class="rounded-circle avatar-sm me-3" alt="..." />
                <div class="flex-body">
                  <h5 class="font-size-17 mb-0">John Yeager</h5>
                  <p class="text-muted mb-0 font-size-14">Designer, New York</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card mt-4 border-0 shadow">
            <div class="card-body p-4">
              <span class="badge badge-soft-primary">CEO</span>
              <h4 class="font-size-22 my-4"><a href="javascript: void(0);">Increase conversion rate from
                  ad to landing page</a></h4>
              <p class="text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                fugit.</p>
              <div class="d-flex align-items-center mt-4 pt-2">
                <img src="images/user/img-3.jpg" class="rounded-circle avatar-sm me-3" alt="..." />
                <div class="flex-body">
                  <h5 class="font-size-17 mb-0">Berneice Harris</h5>
                  <p class="text-muted mb-0 font-size-14">Designer, New York</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-4">
          <div class="card mt-4 border-0 shadow">
            <div class="card-body p-4">
              <span class="badge badge-soft-primary">Developer</span>
              <h4 class="font-size-22 my-4"><a href="javascript: void(0);">Why small business should
                  start marketing</a></h4>
              <p class="text-muted">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                fugit.</p>
              <div class="d-flex align-items-center mt-4 pt-2">
                <img src="images/user/img-1.jpg" class="rounded-circle avatar-sm me-3" alt="..." />
                <div class="flex-body">
                  <h5 class="font-size-17 mb-0">Sarah Pettway</h5>
                  <p class="text-muted mb-0 font-size-14">Designer, New York</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- Blog end -->

  <!-- CTA start -->
  <section class="section bg-center w-100 bg-light" style="background-image: url(images/cta-bg.png); display: none;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="card bg-gradient-primary text-center border-0">
            <div class="bg-overlay-img" style="background-image: url(images/demos.png);"></div>
            <div class="card-body mx-auto p-sm-5 p-4">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="p-3">
                    <h2 class="text-white mb-4">Join our Growing Community</h2>
                    <p class="text-white-70 font-size-16 mb-4 pb-3">Far far away, behind the word
                      mountains, far from the countries Vokalia and Consonantia, there live the
                      blind texts.</p>
                    <a href="javascript: void(0);" class="btn btn-light rounded-pill">Sign Up for
                      free</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- CTA end -->

  <!-- Contact us start -->
  <section class="section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="fw-bold text-gradient mb-4">Hubungi Kami</h2>
          <p class="text-muted mb-5">Anda bisa hubungi kami, dengan mengirimkan pesan pada form dibawah ini. Terima Kasih!</p>

          <div>
            <form method="post" id="send-notif-form" name="myForm">
              @csrf
              <p id="error-msg"></p>
              <div id="simple-msg"></div>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-4">
                    <label for="name" class="text-muted form-label">Nama</label>
                    <input name="name" id="name" type="text" class="form-control" placeholder="Masukkan nama">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-4">
                    <label for="email" class="text-muted form-label">Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Masukkan email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-4 pb-2">
                    <label for="comments" class="text-muted form-label">Pesan</label>
                    <textarea name="message" id="comments" rows="10" class="form-control" placeholder="Masukkan pesan..."></textarea>
                  </div>

                  <button type="submit" id="submit-button" name="send" class="btn bg-biru">
                    <span class="d-flex align-items-center">
                      <span class="flex-grow-1 me-2">
                        Kirim
                      </span>
                      <span class="spinner-border flex-shrink-0 d-none" role="status">
                        <span class="visually-hidden">Mengirim Pesan...</span>
                      </span>
                    </span>
                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>
        <!-- end col -->

        <div class="col-lg-5 ms-lg-auto">
          <div class="mt-5 mt-lg-0">
            <img src="{{ asset('landingpage/images/kontak.png') }}" alt="" class="img-fluid d-block" />
            <p class="text-muted mt-5 mb-3"><i class="me-2 far fa-envelope text-muted icon icon-xs"></i> hummacertify@gmail.com</p>
            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="phone"></i>+91 123 4556 789</p>
            <p class="text-muted mb-3"><i class="me-2 text-muted icon icon-xs" data-feather="map-pin"></i> Malang, Karangploso, Perum Permata</p>
            <ul class="list-inline pt-4">
              <li class="list-inline-item me-3">
                <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="facebook"></i></a>
              </li>
              <li class="list-inline-item me-3">
                <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="youtube"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="javascript: void(0);" class="social-icon icon-mono avatar-xs rounded-circle"><i class="icon-xs" data-feather="instagram"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- Contact us end -->

  <!-- Footer Start -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="mb-4">
            <a href="index-1.html"><img src="images/logo-light.png" alt="" class="" height="30" /></a>
            <p class="text-white-50 my-4">At vero eos et accusamus et iusto odio dignissimos ducimus qui
              blanditiis praesentium voluptatum deleniti.</p>
          </div>
        </div>
        <!-- end col -->

        <div class="col-lg-7 ms-lg-auto">
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Customer</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">Works</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Strategy</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Releases</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Press</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Mission</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Product</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">Trending</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Popular</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Customers</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Features</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Information</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">Developers</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Support</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Customer Service</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Get Started</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Guide</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-6">
              <div class="mt-4 mt-lg-0">
                <h4 class="text-white font-size-18 mb-3">Support</h4>
                <ul class="list-unstyled footer-sub-menu">
                  <li><a href="javascript: void(0);" class="footer-link">FAQ</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Contact</a></li>
                  <li><a href="javascript: void(0);" class="footer-link">Disscusion</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

      <div class="row">
        <div class="col-lg-12">
          <div class="text-center mt-5">
            <p class="text-white-50 f-15 mb-0">
              <script>
                document.write(new Date().getFullYear())
              </script> © Qexal. Design By Themesbrand
            </p>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

    </div>
    <!-- end container -->
  </footer>
  <!-- Footer End -->
  {{-- Coba nyalain --}}
  {{-- <script>
        document.addEventListener("contextmenu", e => e.preventDefault(), false);
        document.addEventListener("keydown", e => {
          if (e.ctrlKey || (e.keyCode>=112 && e.keyCode<=123)) {
          if (e.ctrlKey || e.keyCode==123) {
            e.stopPropagation();
            e.preventDefault();
          }
          }
        });
    </script> --}}
  <script>
    $(document).ready(function() {
      var sendCount = localStorage.getItem('sendCount') || 0;

      $("#send-notif-form").on("submit", function(event) {
        event.preventDefault();
        if (sendCount < 2) {
          $("#submit-button").attr('type', 'button');
          $("#submit-button .flex-grow-1").text("Loading...");
          $("#submit-button .spinner-border").removeClass("d-none");
          $.ajax({
            url: "{{ route('send_notif') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(response) {
              console.log(response);
              if (response.error) {
                let errorList = '<ul>';
                $.each(response.error, function(field, messages) {
                  $.each(messages, function(key, message) {
                    errorList += '<li>' + message + '</li>';
                  });
                });
                errorList += '</ul>';

                $("#error-msg").html("<div class='alert alert-danger'>Terjadi kesalahan:</div>" + errorList);

                $("#submit-button .flex-grow-1").text("Kirim");
                $("#submit-button .spinner-border").addClass("d-none");
              } else {
                $("#error-msg").empty();

                $("#simple-msg").html("<div class='alert alert-success'>" + response.success + "</div>");

                $("form")[0].reset();

                sendCount++;
                localStorage.setItem('sendCount', sendCount);

                $("#submit-button .flex-grow-1").text("Kirim");
                $("#submit-button .spinner-border").addClass("d-none");
              }
              $("#submit-button").attr('type', 'submit');
            },
            error: function(xhr, status, error) {
              $("#simple-msg").empty();
              $("#error-msg").html("<div class='alert alert-danger'>Terjadi kesalahan: " + error + "</div>");

              $("#submit-button .flex-grow-1").text("Kirim");
              $("#submit-button .spinner-border").addClass("d-none");
            }
          });
        } else {
          $("#error-msg").html("<div class='alert alert-danger'>Anda telah mencapai batas pengiriman pesan (3 kali).</div>");
        }
      });
    });
  </script>

  <!-- javascript -->
  <script src="{{ asset('landingpage/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/js/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('landingpage/js/app.js') }}"></script>

  <script src="https://unpkg.com/feather-icons"></script>
  </script>

  <!-- App Js -->
  <script src="js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/qexal/layout/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Oct 2023 07:16:52 GMT -->

</html>
