<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>HummaCertify - Lupa Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
  <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
  <meta content="Themesbrand" name="author" />
  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('image/Hummatech logo.png') }}" type="image/x-icon">

  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- css -->
  <link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap.min.css') }}">
  <link href="{{ asset('logintemplate/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/style.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <script src="{{ asset('js/themeLoader.js') }}"></script>
  <section id="background-login" class="bg-account-pages vh-100 d-flex align-items-center bg-center position-relative" style="background-image: url('{{ asset('logintemplate/images/auth-bg.png') }}');">
    <div class="container">
      @if (!session('status'))
        <div class="row justify-content-center second-container">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="form-bg shadow bg-white">
              <div class="p-4 mobile-background">
                <div class="text-center mt-3 brand-logo j">
                  <a href="{{ route('home') }}">
                    <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-dark" height="35" />
                    <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-light" height="35" />
                  </a>
                  <div class="d-flex justify-content-center">
                    <p class="mt-4 mb-1 px-1" style="width: 350px">Konfirmasi email anda untuk melanjutkan proses
                      Lupa Password</p>
                  </div>
                </div>
                <div class="p-3">
                  <form action="{{ route('password.email') }}" method="POST" class="av-invalid" id="kirim-email">
                    @csrf
                    <div class="mb-3" id="email-container">
                      <label for="email" class="form-label">Email</label>
                      <input name="email" required placeholder="Email" id="username" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
                <div class="d-grid mt-3 px-3">
                  @if (!session('status'))
                    <button type="submit" id="submit-button" name="send" class="btn btn-biru px-2">
                      <span class="d-flex align-items-center justify-content-center">
                        <span class="loading-text me-2">
                          Kirim Email Lupa Password
                        </span>
                        <span class="spinner-border flex-shrink-0 d-none" role="status">
                          <span class="visually-hidden">Mengirim Email...</span>
                        </span>
                      </span>
                    </button>
                  @else
                    <button type="button" class="btn btn-success btn-none">Email berhasil terkirim</button>
                  @endif
                  </form>
                </div>
                <!-- end form -->
              </div>
            </div>
            <div class="text-center mt-4 bottom-text">
              <p>Berubah Pikiran? <a href="/login" class="font-weight-semibold text-biru"> Kembali
                </a> </p>
            </div>
          </div>
        </div>
      @else
        <div class="row justify-content-center second-container">
          <div class="col-md-8 col-lg-6 col-xl-5 pb-4">
            <div class="form-bg shadow bg-white">
              <div class="p-4 mobile-background">
                <div class="text-center mt-3 brand-logo j">
                  <a href="{{ route('home') }}">
                    <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-dark" height="35" />
                    <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-light" height="35" />
                  </a>

                  <p class="mt-4">Kami telah mengirim email konfirmasi ke email :</p>
                  <p class="mt-4 mb-4 fw-bold">{{ session('email') }}</p>

                  <p>Jika ada salah ketik email silahkan klik kembali dan ketik ulang email Anda.
                  </p>
                </div>
                <div class="p-3">
                  @error('email')
                    <p class="text-danger text-center">{{ $message }}</p>
                  @enderror
                  <div class="d-grid mt-3">
                    <button type="button" id="submit-button" name="send" class="btn btn-biru px-2" onclick="location.reload();">
                      Kembali
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
      @endif
      <!-- end col -->
    </div>
    <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- end section -->

  <!-- javascript -->
  <script>
    @if (session('status'))
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        background: 'var(--bs-bg-light)',
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Berhasil mengirim ke email {{ session('email') }}"
      });
    @endif
    document.getElementById('kirim-email').addEventListener('submit', function(event) {
      var usernameInput = document.getElementById('username');
      var emailContainer = document.getElementById('email-container');
      var submitButton = document.getElementById('submit-button');

      var previousError = emailContainer.querySelector('.text-danger');
      if (previousError) {
        previousError.remove();
      }

      if (usernameInput.value.trim() === '') {
        event.preventDefault();

        var errorMessage = document.createElement('span');
        errorMessage.className = 'text-danger';
        errorMessage.innerHTML = '<p>Email tidak boleh kosong!</p>';
        emailContainer.appendChild(errorMessage);
      } else {
        submitButton.setAttribute('type', 'button');
        submitButton.querySelector('.loading-text').textContent = 'Mengirim Email...';
        submitButton.querySelector('.spinner-border').classList.remove('d-none');

        setTimeout(function() {
          submitButton.querySelector('.flex-grow-1').textContent = 'Submit';
          submitButton.querySelector('.spinner-border').classList.add('d-none');
        }, 3000);
      }
    });
  </script>

  <script src="{{ asset('logintemplate/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('logintemplate/js/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>

  <script src="https://unpkg.com/feather-icons"></script>

  <!-- App Js -->
  <script>
    let bgLoader = localStorage.getItem("theme");

    if (bgLoader == 'dark') {
      var bgImage = document.getElementById('background-login');
      bgImage.style = 'background-image: none !important';
      icon.style = 'color: white';
    }
  </script>
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>
</body>

</html>
