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

  <link rel="stylesheet" href="{{ asset('css/global/global.css') }}">

  {{-- CDN ICON --}}
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css'>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="20">

  <!--Navbar Start-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top navdar-custom" id="navbar">
    <div class="container">
      <!-- LOGO -->
      <a class="navbar-brand logo" href="#">
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
        @guest
          <a href="{{ route('login') }}" class="btn btn-sm rounded-pill nav-btn ms-lg-3">Masuk</a>
        @endguest
        @auth
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm rounded-pill nav-btn ms-lg-3">Logout</button>
          </form>
        @endauth
        <div class="switcher-hover" id="style-switcher">
          <div class="bottom">
            <a href="javascript: void(0);" id="mode" class="mode-btn text-white">
              <i class="bi bi-brightness-high-fill mode-light"></i>
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
  <script>
    $(document).ready(function() {
      $("#searching").submit(function(event) {
        var searchInput = $(".searchInput");
        var errorMessage = $("#pencarian .text-danger");

        if (searchInput.val().trim() === "") {
          event.preventDefault();

          if (errorMessage.length === 0) {
            errorMessage = $("<p></p>");
            errorMessage.text("Input tidak boleh kosong!");
            errorMessage.addClass("text-danger");

            $("#pencarian").append(errorMessage);
          }
        } else {
          errorMessage.remove();
        }
      });

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

                $("#error-msg").html("<div class='alert alert-danger'>Terjadi kesalahan:</div>" +
                  errorList);

                $("#submit-button .flex-grow-1").text("Kirim");
                $("#submit-button .spinner-border").addClass("d-none");
              } else {
                $("#error-msg").empty();

                $("#simple-msg").html("<div class='alert alert-success'>" + response.success + "</div>");

                $("#send-notif-form")[0].reset();

                sendCount++;
                localStorage.setItem('sendCount', sendCount);

                $("#submit-button .flex-grow-1").text("Kirim");
                $("#submit-button .spinner-border").addClass("d-none");
              }
              $("#submit-button").attr('type', 'submit');
            },
            error: function(xhr, status, error) {
              $("#simple-msg").empty();
              $("#error-msg").html("<div class='alert alert-danger'>Terjadi kesalahan: " + error +
                "</div>");

              $("#submit-button .flex-grow-1").text("Kirim");
              $("#submit-button .spinner-border").addClass("d-none");
            }
          });
        } else {
          $("#simple-msg").empty();
          $("#error-msg").html(
            "<div class='alert alert-danger'>Anda telah mencapai batas pengiriman pesan (3 kali).</div>");
        }
      });
    });
  </script>

  <script>
    const galleryContainer = document.querySelector('.gallery-container');
    const galleryControlsContainer = document.querySelector('.gallery-controls');
    const galleryControls = ['p', 'n'];
    const galleryItems = document.querySelectorAll('.gallery-item');

    class Carousel {
      constructor(container, items, controls) {
        this.carouselContainer = container;
        this.carouselControls = controls;
        this.carouselArray = [...items];
      }

      updateGallery() {
        this.carouselArray.forEach(el => {
          el.classList.remove("gallery-item-1");
          el.classList.remove("gallery-item-2");
          el.classList.remove("gallery-item-3");
        });

        this.carouselArray.slice(0, 5).forEach((el, i) => {
          el.classList.add(`gallery-item-${i + 1}`);
        });
      }

      setCurrentState(direction) {
        if (direction.className == "gallery-controls-previous") {
          this.carouselArray.unshift(this.carouselArray.pop());
        } else {
          this.carouselArray.push(this.carouselArray.shift());
        }
        this.updateGallery();
      }

      setControls() {
        this.carouselControls.forEach((control) => {
          galleryControlsContainer.appendChild(document.createElement("button")).className =
            `gallery-controls-${control}`;
          document.querySelector(`.gallery-controls-${control}`).innerText = control;
        });
      }

      useControls() {
        const triggers = [...galleryControlsContainer.childNodes];
        triggers.forEach(control => {
          control.addEventListener('click', (e) => {
            e.preventDefault();
            this.setCurrentState(control);
          });
        });
      }
    }

    const exampleCarousel = new Carousel(galleryContainer, galleryItems, galleryControls);

    exampleCarousel.setControls();
    exampleCarousel.useControls();
  </script>

  <!-- javascript -->
  <script src="{{ asset('landingpage/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('landingpage/js/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('landingpage/js/app.js') }}"></script>

  <script src="https://unpkg.com/feather-icons"></script>
  </script>

  <!-- App Js -->
  {{-- <script src="js/app.js"></script> --}}
</body>

<!-- Mirrored from themesbrand.com/qexal/layout/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Oct 2023 07:16:52 GMT -->

</html>
