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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- css -->
  <link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap.min.css') }}">
  <link href="{{ asset('logintemplate/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/style.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ asset('css/auth/resetPassword.css') }}">
</head>

<body>
  <script src="{{ asset('js/themeLoader.js') }}"></script>
  <section id="background-login" class="bg-account-pages vh-100 d-flex align-items-center bg-center position-relative" style="background-image: url('{{ asset('logintemplate/images/auth-bg.png') }}');">
    <script src="{{ asset('js/loginLoader.js') }}"></script>

    <div class="container">
      <div class="row justify-content-center second-container">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="form-bg shadow bg-white">
            <div class="p-4 mobile-background">
              <div class="text-center mt-3 mb-1 brand-logo j">
                <a href="{{ route('home') }}">
                  <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-dark"
                    height="35" />
                  <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-light"
                    height="35" />
                </a>
                <div class="d-flex justify-content-center">
                  <p class="mt-4 mb-1" style="width: 350px">Konfirmasi password baru anda dibawah ini.</p>
                </div>
              </div>
              <div class="p-3">
                <form action="{{ route('password.update') }}" method="POST" class="av-invalid">
                  @csrf
                  <input type="hidden" name="email" value="{{ $email }}" readonly>
                  <input type="hidden" name="token" value="{{ $token }}" readonly>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password baru</label>
                    <input name="password" required placeholder="Password baru" id="passwordOne" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" />
                    <div style="display: none" id="eyeShow" class="eye">
                      <div class="icon" id="icon">
                        <i class="fa-regular fa-eye" id="show" style="display: block"></i>
                        <i class="fa-regular fa-eye-slash" id="hide" style="display: none"></i>
                      </div>
                    </div>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                    <input name="password_confirmation" required placeholder="Konfirmasi Password" id="passwordTwo" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}" />
                    <div style="display: none" id="eyeShow2" class="eye2">
                      <div class="icon2" id="icon2">
                        <i class="fa-regular fa-eye" id="show2" style="display: block"></i>
                        <i class="fa-regular fa-eye-slash" id="hide2" style="display: none"></i>
                      </div>
                    </div>
                    @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="d-grid mt-3">
                    <button type="submit" class="btn btn-biru btn-none">Reset Password</button>
                    @error('email')
                        <p class="text-danger text-center">{{ $message }}</p>
                    @enderror
                </div>
                </form>
                <!-- end form -->
              </div>
            </div>
          </div>
          <div class="text-center mt-4 bottom-text">
            <p>Berubah Pikiran? <a href="/login" class="font-weight-semibold text-biru"> Kembali ke login </a> </p>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- end container -->
  </section>
  <!-- end section -->

  <!-- javascript -->
  <script src="{{ asset('js/resetPassword.js') }}"></script>
  <script src="{{ asset('logintemplate/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('logintemplate/js/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>

  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    let bgLoader = localStorage.getItem("theme");

    if (bgLoader == 'dark') {
      var icon = document.getElementById('icon');
      var icon = document.getElementById('icon2');
      var eyeBackground = document.getElementById('eyeShow');
      var eyeBackground = document.getElementById('eyeShow2');
      var bgImage = document.getElementById('background-login');
      bgImage.style = 'background-image: none !important';
      icon.style = 'color: white';
    }
  </script>

  <!-- App Js -->
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>
</body>

</html>
