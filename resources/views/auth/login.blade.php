<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>HummaCertify - Sign In</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
  <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
  <meta content="Themesbrand" name="author" />
  <!-- favicon -->
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

  <!-- css -->
  <link href="{{ asset('logintemplate/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/style.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/auth/auth.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <section class="bg-account-pages vh-100 d-flex align-items-center bg-center position-relative" style="background-image: url('logintemplate/images/auth-bg.png');">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="form-bg shadow bg-white">
            <div class="p-4">
              <div class="text-center mt-3 brand-logo">
                <a href="#">
                  <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-dark" height="35" />
                  <img src="{{ asset('landingpage/images/logocertify.PNG') }}" alt="" class="logo-light" height="35" />
                </a>
                <p class="text-muted mt-2">Masuk untuk meng-akses ke akun anda</p>
              </div>
              <div class="p-3">
                <form action="/login" method="POST" class="av-invalid">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email / Nama</label>
                    <input name="email" required placeholder="Email atau nama" id="username" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" required placeholder="Password  (Nisn/Nik/Nip)" id="userpassword" type="password" class="form-control backG @error('password') is-invalid @enderror" />
                    <div style="display: none" id="eyeShow" class="eye">
                      <div class="icon">
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
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-Check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember-Check">
                      Ingat saya
                    </label>
                  </div>
                  <div class="d-grid mt-3"><button type="submit" class="btn btn-biru btn-none">Masuk</button></div>
                  <div class="mt-5"></div>
                </form>
                <!-- end form -->
              </div>
            </div>
          </div>
          <div class="text-center mt-4 bottom-text">
            <p>Berubah Pikiran? <a href="/" class="font-weight-semibold text-biru"> Kembali ke beranda </a> </p>
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
  <script src="{{ asset('logintemplate/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('logintemplate/js/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>

  <script src="https://unpkg.com/feather-icons"></script>
  <script>
    const eye = document.getElementById('eyeShow');
    const input = document.getElementById('userpassword');
    var count = 0;

    eye.addEventListener('click', function() {
      var input = document.getElementById('userpassword');
      var hide = document.getElementById('hide');
      var show = document.getElementById('show');

      if (count === 0) {
        count = 1;
        show.style.display = 'none';
        hide.style.display = 'block';
        input.setAttribute('type', 'text');
      } else if (count === 1) {
        count = 0;
        show.style.display = 'block';
        hide.style.display = 'none';
        input.setAttribute('type', 'password');
      }
    });

    input.addEventListener('keyup', function() {
      var input = document.getElementById('userpassword');
      var eye = document.getElementById('eyeShow');

      if (!input.value) {
        eye.style.display = 'none';
      } else {
        eye.style.display = 'block';
      }
    });
  </script>

  <!-- App Js -->
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>
</body>

<!-- Mirrored from themesbrand.com/qexal/layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Oct 2023 03:12:52 GMT -->

</html>
