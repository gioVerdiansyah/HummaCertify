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
  <link rel="shortcut icon" href="images/favicon.ico" />

  <!-- css -->
  <link href="{{ asset('logintemplate/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('logintemplate/css/style.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
  <section class="bg-account-pages vh-100 d-flex align-items-center bg-center position-relative" style="background-image: url('logintemplate/images/auth-bg.png');">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="form-bg shadow bg-white">
            <div class="p-4">
              <div class="text-center mt-3 brand-logo">
                <a href="index-1.html">
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
                    <input name="email" required placeholder="Contoh : Lily Winter / lilywinter@gmail.com" id="username" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" required placeholder="Password" id="userpassword" type="password" class="form-control @error('password') is-invalid @enderror" />
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

  <!-- App Js -->
  <script src="js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/qexal/layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Oct 2023 03:12:52 GMT -->

</html>
