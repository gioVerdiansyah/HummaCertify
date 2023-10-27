<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-sidebar="light"
  data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="enable" data-bs-theme="light"
  data-layout-width="fluid" data-layout-position="scrollable" data-layout-style="default" data-topbar="light"
  data-sidebar-visibility="show">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
    integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

  {{-- IMPORT FONT --}}
  <link
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

  {{-- IMPORT CSS --}}
  <link rel="stylesheet" href="{{ asset('css/auth/auth.css') }}">
  <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">
  <link rel="stylesheet" href="{{ asset('/css/admin/Dashboard.css') }}">

  <!-- jsvectormap css -->
  <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

  <!--Swiper slider css-->
  <link href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

  {{-- Flaticon Icon --}}
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css'>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

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
  {{-- Bootstrap Icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
              <a href="{{ route('admin.home') }}" class="logo logo-dark">
                <span class="logo-sm">
                  <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" height="50">
                </span>
                <span class="logo-lg">
                  <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" height="50">
                </span>
              </a>

              <a href="{{ route('admin.home') }}" class="logo logo-light">
                <span class="logo-sm">
                  <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" height="50">
                </span>
                <span class="logo-lg">
                  <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" height="50">
                </span>
              </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
              id="topnav-hamburger-icon">
              <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </button>
          </div>

          <div class="d-flex align-items-center">

            <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
              <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                aria-haspopup="true" aria-expanded="false">
                <i class='bx bx-bell fs-22'></i>
                @if ($notificationCount > 0)
                <span id="unread" class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">
                    {{ $notificationCount > 9 ? '9+' : $notificationCount }}
                </span>
                @endif
              </button>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-notifications-dropdown">

                <div class="dropdown-head bg-secondary bg-pattern rounded-top">
                  <div class="p-3">
                    <div class="row align-items-center">
                      <div class="col">
                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                      </div>
                      <div class="col-auto dropdown-tabs">
                      </div>
                    </div>
                  </div>

                  <div class="px-2 pt-2">
                    <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                      id="notificationItemsTab" role="tablist">
                      <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab"
                          aria-selected="true">
                          All
                        </a>
                      </li>
                    </ul>
                  </div>

                </div>

                <div class="tab-content position-relative" id="notificationItemsTabContent">
                 @forelse ($notification as $i => $data)
                 {{-- Foreach notif mulai dari sini --}}
                 <div class="tab-pane fade show active py-2 ps-2" id="row-notif-{{ ++$i }}" role="tabpanel">
                   <div data-simplebar style="max-height: 300px;" class="pe-2">
                     <div class="text-reset notification-item d-block dropdown-item position-relative">
                       <div class="d-flex">
                         <div class="flex-grow-1">
                            <h6 class="mt-0 mb-1 fs-13 fw-semibold">{{$data->name}}</h6>
                           <div class="fs-13 text-muted">
                             <p class="mb-1">{{$data->email}} telah mengirm pesan ke anda</p>
                           </div>
                           <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                             <span><i class="mdi mdi-clock-outline"></i>{{ $data->created_at->diffForHumans() }}</span>
                           </p>
                         </div>
                         <div class="px-2 fs-15">
                           <div class="form-check notification-check">
                                <button class="btn btn-sm" onclick="deleteNotif({{ $i }}, {{ $data->id }});" style="font-size: 25px; position: absolute; top: 1px; right: 1px;"><i class="fi fi-sr-cross-small"></i></button>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
                 @empty
                 {{-- Ini jika tidak ada chatnya --}}
                 <div class="tab-pane fade show active p-4" id="all-noti-tab" role="tabpanel"
                   aria-labelledby="alerts-tab">
                 </div>
               @endforelse
                </div>
              </div>
            </div>
            <div class="dropdown ms-sm-3 header-item topbar-user">
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                  <img class="rounded-circle header-profile-user"
                    src="{{ asset('image/LOGO Hummasoft PP Circle.png') }}" alt="Header Avatar">
                  <span class="text-start ms-xl-2">
                    <span
                      class="d-none d-xl-inline-block ms-1 fw-semibold user-name-text">{{ Auth::user()->name }}</span>
                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Certificate App</span>
                  </span>
                </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end">

                <form id="logout-form" class="m-0" action="{{ route('admin.logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i
                      class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> Logout </button>
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
        <a href="{{ route('admin.home') }}" class="logo logo-dark">
          <span class="logo-sm">
            <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" height="50">
          </span>
          <span class="logo-lg">
            <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" class="me-2" height="50">
          </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admin.home') }}" class="logo logo-light">
          <span class="logo-sm">
            <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" class="bg-primary" height="50">
          </span>
          <span class="logo-lg">
            <img src="{{ asset('image/nav-admin-logo.png') }}" alt="" height="50">
          </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
          id="vertical-hover">
          <i class="ri-record-circle-line"></i>
        </button>
      </div>

      <div id="scrollbar">
        <div class="container-fluid">

          <div id="two-column-menu">
          </div>
          <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Admin</span></li>
            <li class="nav-item">
              <a class="nav-link menu-link {{ request()->routeIs('admin.home') ? 'active' : '' }}"
                href="{{ route('admin.home') }}">
                <img width="22" class="me-3" src="{{ asset('image/dashboard-icon.png') }}" alt="">
                <span data-key="t-dashboard">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link {{ request()->routeIs('certificate.index') ? 'active' : '' }}"
                href="{{ route('certificate.index') }}">
                <img width="22" class="me-3" src="{{ asset('image/sertifikat-icon.png') }}" alt="">
                <span data-key="t-list_sertificate">List Sertifikat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link menu-link {{ request()->routeIs('certificate.create') ? 'active' : '' }}"
                href="{{ route('certificate.create') }}">
                <img width="22" class="me-3" src="{{ asset('image/tambah-icon.png') }}" alt="">
                <span data-key="t-tambah_certificate">Tambah Sertifikat</span>
              </a>
            </li>
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

      <div class="page-content">
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- container-fluid -->
      </div>
      <!-- End Page-content -->

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>
                document.write(new Date().getFullYear())
              </script> © HummaCertify.
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
  <script>
    function deleteNotif(idElement, idNotif){
        $.ajax({
            type: "DELETE",
            url: "{{ route('delete_notif') }}",
            data: {
                id: idNotif
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (response) {
                console.log(response);
                $('#unread')[0].innerText--;
                $(`#row-notif-${idElement}`).remove();
                if($('#unread')[0].innerText < 1){
                    $('#unread').remove();
                    $('#notificationItemsTabContent').html(`<div class="tab-pane fade show active p-4" id="all-noti-tab" role="tabpanel" aria-labelledby="alerts-tab">
                 <div class="empty-notification-elem">							<div class="w-25 w-sm-50 pt-3 mx-auto">								<img src="assets/images/svg/bell.svg" class="img-fluid" alt="user-pic">							</div>							<div class="text-center pb-5 mt-2">								<h6 class="fs-18 fw-semibold lh-base">Hey! You have no any notifications </h6>							</div>						</div></div>`);
                }
            }
        });
    }
  </script>
  <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
  <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
  <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
  <script src="{{ asset('assets/js/plugins.js') }}"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}

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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.logout-button').forEach(function(link) {
        link.addEventListener('click', function(event) {
          event.preventDefault();

          Swal.fire({
            title: 'Anda yakin ingin logout?',
            text: 'Anda akan diarahkan ke tampilan landing page.',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Lanjutkan',
            cancelButtonText: 'Batalkan',
          }).then((result) => {
            if (result.isConfirmed) {
              document.getElementById('logout-form').submit();
            }
          });
        });
      });
    });
  </script>
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
