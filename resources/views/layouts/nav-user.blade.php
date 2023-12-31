<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="horizontal" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-topbar="light" data-sidebar-visibility="show" data-layout-style="default"
  data-bs-theme="light" data-layout-width="fluid" data-layout-position="scrollable">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <meta name="description" content="HummaCertify, pecetakan sertifikat untuk perusahaan HummaTech">
  <meta name="keywords" content="hummacertify">
  <meta name="author" content="Tim HummaCertify">
  <meta name="google-site-verification" content="WdbpK_OrpxHeWkYEQ-HzTW3rWGTYj_uC3RpaOLrqGOM" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Feather Icons -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.js" integrity="sha512-4lykFR6C2W55I60sYddEGjieC2fU79R7GUtaqr3DzmNbo0vSaO1MfUjMoTFYYuedjfEix6uV9jVTtRCSBU/Xiw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <link rel="canonical" href="{{ url()->current() }}" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Boxicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css" integrity="sha512-cn16Qw8mzTBKpu08X0fwhTSv02kK/FojjNLz0bwp2xJ4H+yalwzXKFw/5cLzuBZCxGWIA+95X4skzvo8STNtSg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/page/LandingPage.css') }}">
  <link href="{{ asset('landingpage/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('landingpage/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('landingpage/css/style.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- Open Graph Protocol for better sharing on social media -->
  <meta property="og:title" content="HummaCertify" />
  <meta property="og:description" content="HummaCertify, pecetakan sertifikat untuk perusahaan HummaTech" />
  <meta property="og:image" content="{{ asset('landingpage/images/image1.png') }}" />
  <meta property="og:url" content="https://sertifikat.hummatech.com/" />
  <meta property="og:type" content="website" />

  <!-- Twitter Card for Twitter sharing -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="HummaCertify">
  <meta name="twitter:description" content="HummaCertify, pecetakan sertifikat untuk perusahaan HummaTech">
  <meta name="twitter:image" content="{{ asset('landingpage/images/image1.png') }}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('image/Hummatech logo.png') }}" type="image/x-icon">

  <!-- jQuery and Boxicons Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Global CSS -->
  <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">

  <!-- CDN ICON -->
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

  <!-- Your additional meta tags for SEO -->
  <!-- Include the meta tags for SEO here -->
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20">
  <script src="{{ asset('js/themeLoader.js') }}"></script>

  <!--Navbar Start-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top navdar-custom" id="navbar">
    <div class="container">
      <!-- LOGO -->
      <a class="navbar-brand logo" href="{{ route('home') }}">
        <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="logo certifiy" class="logo-dark" height="35" />
        <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="text logo certify" class="logo-light" height="35" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse" style="margin-right: 20px">
        <ul class="navbar-nav ms-auto navbar-center" id="navbar-navlist">
          <li class="nav-item">
            <a href="{{ route('home') }}#home" id="beranda" class="nav-link">Beranda</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}#tentang" class="nav-link">Tentang</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}#contoh" class="nav-link">Contoh</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('home') }}#contact" class="nav-link">Kontak</a>
          </li>
          @auth
            <li>
              <a href="{{ route('sertifikat.user') }}" class="nav-link {{ request()->routeIs('sertifikat.user') ? 'active' : '' }}">Sertifikat</a>
            </li>
            <li>
              <a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
            </li>
          @endauth
        </ul>
        @guest
          <div class="logout-button">
            <a href="{{ route('login') }}" class="btn btn-sm rounded-pill nav-btn ms-lg-3" {{-- style="background-color: #1689d3; color: #FFFFFF;" --}}>Masuk</a>
          </div>
        @endguest
        @auth
          <form action="{{ route('logout') }}" method="POST" class="logout-button">
            @csrf
            <button type="submit" class="btn btn-sm rounded-pill nav-btn ms-lg-3" aria-label="logout">Logout</button>
          </form>
        @endauth
        <div class="switcher-hover nav" id="style-switcher">
          <div class="bottom">
            <a id="mode" class="mode-btn text-white" aria-label="Toggle Dark/Light Mode">
              <i class="bi bi-brightness-high mode-light" style="color: black"></i>
              <i class="bi bi-moon mode-dark"></i>
            </a>
            <a href="#" class="settings" onclick="toggleSwitcher()" aria-label="Toggle Settings"></a>
          </div>
        </div>
      </div>
    </div>
    <!-- end container -->
  </nav>
  <!-- Navbar End -->

  @yield('content')

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

  <!-- javascript -->
  <script src="{{ asset('landingpage/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/js/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('landingpage/js/app.js') }}"></script>

  <script src="https://unpkg.com/feather-icons"></script>

  <!-- App Js -->
  {{-- <script src="js/app.js"></script> --}}
</body>

</html>
