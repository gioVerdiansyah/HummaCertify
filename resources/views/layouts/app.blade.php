<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="horizontal" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-topbar="light" data-sidebar-visibility="show" data-layout-style="default" data-bs-theme="light" data-layout-width="fluid" data-layout-position="scrollable">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  {{-- IMPORT FONT --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap"
    rel="stylesheet">

  {{-- IMPORT CSS --}}
  <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">

  <!-- jsvectormap css -->
  <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Layout config Js -->
  <script src="{{ asset('assets/js/layout.js') }}"></script>
  <!-- Bootstrap Css -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">

      <header id="page-topbar">
  <div class="layout-width">
      <div class="navbar-header">
          <div class="d-flex">
              <!-- LOGO -->
              <div class="navbar-brand-box horizontal-logo">
                  <a href="{{route('home')}}" class="logo logo-dark">
                      <span class="logo-sm">
                          <img src="{{asset('image/logo-text.png')}}" alt="" height="22">
                      </span>
                      <span class="logo-lg">
                          <img src="{{asset('image/logo-text.png')}}" alt="" height="35">
                      </span>
                  </a>

                  <a href="{{route('home')}}" class="logo logo-light">
                      <span class="logo-sm">
                          <img src="{{asset('image/logo-text.png')}}" alt="" height="22">
                      </span>
                      <span class="logo-lg">
                          <img src="{{asset('image/logo-text.png')}}" alt="" height="35">
                      </span>
                  </a>
              </div>

              <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                  <span class="hamburger-icon">
                      <span></span>
                      <span></span>
                      <span></span>
                  </span>
              </button>
          </div>

          <div class="d-flex align-items-center">

              <div class="dropdown ms-sm-3 header-item topbar-user">
                  <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="d-flex align-items-center">
                          <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                          <span class="text-start ms-xl-2">
                              <span class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">{{Auth::user()->name}}</span>
                              <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Certificate App</span>
                          </span>
                      </span>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item" href=""><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                    data-key="t-logout">Logout</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>

      <!-- ========== App Menu ========== -->
      <div class="app-menu navbar-menu">
          <!-- LOGO -->
          <div class="navbar-brand-box">
              <!-- Dark Logo-->
              <a href="index.html" class="logo logo-dark">
                  <span class="logo-sm">
                      <img src="{{asset('image/logo-text.png')}}" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                      <img src="{{asset('image/logo-text.png')}}" alt="" height="17">
                  </span>
              </a>
              <!-- Light Logo-->
              <a href="index.html" class="logo logo-light">
                  <span class="logo-sm">
                      <img src="{{asset('image/logo-text.png')}}" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                      <img src="{{asset('image/logo-text.png')}}" alt="" height="17">
                  </span>
              </a>
              <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                  <i class="ri-record-circle-line"></i>
              </button>
          </div>

          <div id="scrollbar">
              <div class="container-fluid">

                  <div id="two-column-menu">
                  </div>
                  <ul class="navbar-nav" id="navbar-nav">
                      <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                      <li class="nav-item">
                          <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                              <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                          </a>
                          <div class="collapse menu-dropdown" id="sidebarDashboards">
                              <ul class="nav nav-sm flex-column">
                                  <li class="nav-item">
                                      <a href="dashboard-analytics.html" class="nav-link" data-key="t-analytics"> Analytics </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="dashboard-crm.html" class="nav-link" data-key="t-crm"> CRM </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="index.html" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                                  </li>
                                  <li class="nav-item">
                                      <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a>
                                  </li>
                              </ul>
                          </div>
                      </li> <!-- end Dashboard Menu -->
                  </ul>
              </div>
              <!-- Sidebar -->
          </div>

          <div class="sidebar-background"></div>
      </div>
      <!-- Left Sidebar End -->
      <!-- Vertical Overlay-->
      <div class="vertical-overlay"></div>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">

          <!-- End Page-content -->

          <footer class="footer">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-sm-6">
                          <script>document.write(new Date().getFullYear())</script> © HummaCertify.
                      </div>
                      <div class="col-sm-6">
                          <div class="text-sm-end d-none d-sm-block">
                              Design & Develop by HummaTech
                          </div>
                      </div>
                  </div>
              </div>
          </footer>
      </div>
      <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->

  <!--start back-to-top-->
  <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
      <i class="ri-arrow-up-line"></i>
  </button>
  <!--end back-to-top-->

  <!-- JAVASCRIPT -->
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
  <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>

  <!-- apexcharts -->
  <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

  <!-- Vector map-->
  <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
  <script src="{{ asset('assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

  <!--Swiper slider js-->
  <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Dashboard init -->
  <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
@if (session('message'))
  <script>
    Swal.fire({
      icon: "{{ session('message')['icon'] ?? 'success' }}",
      title: "{{ session('message')['title'] ?? 'Oops' }}",
      text: "{{ session('message')['text'] ?? 'Success' }}",
    })
  </script>
@endif

</html>
