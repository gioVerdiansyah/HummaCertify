<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">

  <!-- Core Css -->
  <link id="themeColors" rel="stylesheet" href="{{ asset('dist/css/style.min.css') }}" />

</head>

<body>

  {{-- PRELOAD --}}
  <div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
      alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div class="preloader">
    <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico"
      alt="loader" class="lds-ripple img-fluid" />
  </div>
  {{-- END PRELOAD --}}

  {{-- HEADER AND SIDEBAR --}}
  <div class="page-wrapper" id="main-wrapper" data-theme="blue_theme" data-layout="vertical" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{route('home')}}" class="text-nowrap logo-img">
            <img
              src="{{asset('image/logo-text.png')}}"
              class="dark-logo" width="180" alt="" />
            <img
              src="{{asset('image/logo-text.png')}}"
              class="light-logo" width="180" alt="" />
          </a>
          <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-muted"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
          <ul id="sidebarnav">
            <!-- ============================= -->
            <!-- Home -->
            <!-- ============================= -->
            {{-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li> --}}
            <!-- =================== -->
            <!-- Dashboard -->
            <!-- =================== -->
            <li class="sidebar-item">
              <a class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index2.html" aria-expanded="false">
                <span>
                  <i class="ti ti-shopping-cart"></i>
                </span>
                <span class="hide-menu">Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index3.html" aria-expanded="false">
                <span>
                  <i class="ti ti-currency-dollar"></i>
                </span>
                <span class="hide-menu">Kategori</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav quick-links d-none d-lg-flex">
            <li class="nav-item dropdown hover-dd d-none d-lg-block">
              <a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown">Apps<span class="mt-1"><i
                    class="ti ti-chevron-down"></i></span></a>
              <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                <div class="row">
                  <div class="col-8">
                    <div class=" ps-7 pt-7">
                      <div class="border-bottom">
                        <div class="row">
                          <div class="col-6">
                            <div class="position-relative">
                              <a href="app-chat.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-chat.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Chat Application</h6>
                                  <span class="fs-2 d-block text-dark">New messages arrived</span>
                                </div>
                              </a>
                              <a href="app-invoice.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-invoice.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Invoice App</h6>
                                  <span class="fs-2 d-block text-dark">Get latest invoice</span>
                                </div>
                              </a>
                              <a href="app-contact2.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-mobile.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Contact Application</h6>
                                  <span class="fs-2 d-block text-dark">2 Unsaved Contacts</span>
                                </div>
                              </a>
                              <a href="app-email.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-message-box.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Email App</h6>
                                  <span class="fs-2 d-block text-dark">Get new emails</span>
                                </div>
                              </a>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="position-relative">
                              <a href="page-user-profile.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-cart.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">User Profile</h6>
                                  <span class="fs-2 d-block text-dark">learn more information</span>
                                </div>
                              </a>
                              <a href="app-calendar.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-date.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Calendar App</h6>
                                  <span class="fs-2 d-block text-dark">Get dates</span>
                                </div>
                              </a>
                              <a href="app-contact.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-lifebuoy.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Contact List Table</h6>
                                  <span class="fs-2 d-block text-dark">Add new contact</span>
                                </div>
                              </a>
                              <a href="app-notes.html"
                                class="d-flex align-items-center pb-9 position-relative text-decoration-none text-decoration-none text-decoration-none text-decoration-none">
                                <div
                                  class="bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                  <img
                                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-dd-application.svg"
                                    alt="" class="img-fluid" width="24" height="24">
                                </div>
                                <div class="d-inline-block">
                                  <h6 class="mb-1 fw-semibold bg-hover-primary">Notes Application</h6>
                                  <span class="fs-2 d-block text-dark">To-do and Daily tasks</span>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row align-items-center py-3">
                        <div class="col-8">
                          <a class="fw-semibold text-dark d-flex align-items-center lh-1 text-decoration-none"
                            href="#"><i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions</a>
                        </div>
                        <div class="col-4">
                          <div class="d-flex justify-content-end pe-4">
                            <button class="btn btn-primary">Check</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-4 ms-n4">
                    <div class="position-relative p-7 border-start h-100">
                      <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                      <ul class="">
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="page-pricing.html">Pricing Page</a>
                        </li>
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="authentication-login.html">Authentication Design</a>
                        </li>
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="authentication-register.html">Register Now</a>
                        </li>
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="authentication-error.html">404 Error Page</a>
                        </li>
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="app-notes.html">Notes App</a>
                        </li>
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="page-user-profile.html">User Application</a>
                        </li>
                        <li class="mb-3">
                          <a class="fw-semibold text-dark bg-hover-primary text-decoration-none text-decoration-none text-decoration-none text-decoration-none"
                            href="page-account-settings.html">Account Settings</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
              <a class="nav-link" href="">Chat</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
              <a class="nav-link" href="">Calendar</a>
            </li>
            <li class="nav-item dropdown-hover d-none d-lg-block">
              <a class="nav-link" href="">Email</a>
            </li>
          </ul>
          <div class="d-block d-lg-none">
            <img
              src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
              class="dark-logo" width="180" alt="" />
            <img
              src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/light-logo.svg"
              class="light-logo" width="180" alt="" />
          </div>
          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
              <i class="ti ti-dots fs-7"></i>
            </span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
              <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                <li class="nav-item dropdown">
                  <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="d-flex align-items-center">
                      <div class="user-profile-img">
                        <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle" width="35"
                          height="35" alt="" />
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop1">
                    <div class="profile-dropdown position-relative" data-simplebar>
                      <div class="py-3 px-7 pb-0">
                        <h5 class="mb-0 fs-5 fw-semibold">HummaCertify</h5>
                      </div>
                      <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                        <img src="../../dist/images/profile/user-1.jpg" class="rounded-circle" width="80"
                          height="80" alt="" />
                        <div class="ms-3">
                          <h5 class="mb-1 fs-3">{{ Auth::guard('admin')->user()->name }}</h5>
                          <p class="mb-0 d-flex text-dark align-items-center gap-2">
                            <i class="ti ti-mail fs-4"></i> {{ Auth::guard('admin')->user()->email }}
                          </p>
                        </div>
                      </div>
                      {{-- <div class="message-body">
                        <a href="page-user-profile.html" class="py-8 px-7 mt-8 d-flex align-items-center">
                          <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                            <img
                              src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-account.svg"
                              alt="" width="24" height="24">
                          </span>
                          <div class="w-75 d-inline-block v-middle ps-3">
                            <h6 class="mb-1 bg-hover-primary fw-semibold"> My Profile </h6>
                            <span class="d-block text-dark">Account Settings</span>
                          </div>
                        </a>
                        <a href="app-email.html" class="py-8 px-7 d-flex align-items-center">
                          <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                            <img
                              src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-inbox.svg"
                              alt="" width="24" height="24">
                          </span>
                          <div class="w-75 d-inline-block v-middle ps-3">
                            <h6 class="mb-1 bg-hover-primary fw-semibold">My Inbox</h6>
                            <span class="d-block text-dark">Messages & Emails</span>
                          </div>
                        </a>
                        <a href="app-notes.html" class="py-8 px-7 d-flex align-items-center">
                          <span class="d-flex align-items-center justify-content-center bg-light rounded-1 p-6">
                            <img
                              src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-tasks.svg"
                              alt="" width="24" height="24">
                          </span>
                          <div class="w-75 d-inline-block v-middle ps-3">
                            <h6 class="mb-1 bg-hover-primary fw-semibold">My Task</h6>
                            <span class="d-block text-dark">To-do and Daily Tasks</span>
                          </div>
                        </a>
                      </div> --}}
                      <div class="d-grid py-4 px-7 pt-8">
                        <a href="{{ route('logout-admin') }}" class="btn btn-outline-primary"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                          Out</a>
                      </div>
                      <form id="logout-form" action="{{ route('logout-admin') }}" method="POST" class="d-none">
                        @csrf
                      </form>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <div class="container-fluid">
        <!--  Owl carousel -->
        <div class="owl-carousel counter-carousel owl-theme">
          <div class="item">
            <div class="card border-0 zoom-in bg-light-primary shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-user-male.svg"
                    width="50" height="50" class="mb-3" alt="" />
                  <p class="fw-semibold fs-3 text-primary mb-1"> Employees </p>
                  <h5 class="fw-semibold text-primary mb-0">96</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card border-0 zoom-in bg-light-warning shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-briefcase.svg"
                    width="50" height="50" class="mb-3" alt="" />
                  <p class="fw-semibold fs-3 text-warning mb-1">Clients</p>
                  <h5 class="fw-semibold text-warning mb-0">3,650</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-mailbox.svg"
                    width="50" height="50" class="mb-3" alt="" />
                  <p class="fw-semibold fs-3 text-info mb-1">Projects</p>
                  <h5 class="fw-semibold text-info mb-0">356</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card border-0 zoom-in bg-light-danger shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-favorites.svg"
                    width="50" height="50" class="mb-3" alt="" />
                  <p class="fw-semibold fs-3 text-danger mb-1">Events</p>
                  <h5 class="fw-semibold text-danger mb-0">696</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card border-0 zoom-in bg-light-success shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-speech-bubble.svg"
                    width="50" height="50" class="mb-3" alt="" />
                  <p class="fw-semibold fs-3 text-success mb-1">Payroll</p>
                  <h5 class="fw-semibold text-success mb-0">$96k</h5>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="card border-0 zoom-in bg-light-info shadow-none">
              <div class="card-body">
                <div class="text-center">
                  <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/svgs/icon-connect.svg"
                    width="50" height="50" class="mb-3" alt="" />
                  <p class="fw-semibold fs-3 text-info mb-1">Reports</p>
                  <h5 class="fw-semibold text-info mb-0">59</h5>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section id="content">
          @yield('content')
        </section>
      </div>
    </div>
  </div>

  <script src="{{ asset('dist/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/libs/simplebar/dist/simplebar.min.js') }}"></script>
  <!--  core files -->
  <script src="{{ asset('dist/js/app.min.js') }}"></script>
  <script src="{{ asset('dist/js/app.init.js') }}"></script>
  <script src="{{ asset('dist/js/app-style-switcher.js') }}"></script>
  <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('dist/js/custom.js') }}"></script>
  <!--  current page js files -->
  <script src="{{ asset('dist/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('../../dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dist/js/dashboard.js') }}"></script>
</body>

</html>
