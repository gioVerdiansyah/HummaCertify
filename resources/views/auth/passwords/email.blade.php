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
</head>

<body>
  <section id="background-login" class="bg-account-pages vh-100 d-flex align-items-center bg-center position-relative" style="background-image: url('logintemplate/images/auth-bg.png');">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="form-bg shadow bg-white">
            <div class="p-4">
              <div class="p-3">
                <form action="{{ route('password.email') }}" method="POST" class="av-invalid">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" required placeholder="Email" id="username" type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <script src="https://www.google.com/recaptcha/api.js"
                            async defer></script>
                    <div class="g-recaptcha d-flex justify-content-center" id="feedback-recaptcha"
                         data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                    </div>
                    @error('g-recaptcha-response')
                      <p class="text-danger">reCAPTCHA wajib diisi!</p>
                    @enderror
                  </div>
                  <div class="d-grid mt-3">
                    @if(!session('status'))
                      <button type="submit" class="btn btn-biru btn-none">Kirim email lupa password</button>
                    @else
					  <button type="button" class="btn btn-success btn-none">Email berhasil terkirim</button>
                    @endif
                  </div>
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
    let bgLoader = localStorage.getItem("theme");

    if (bgLoader == 'dark') {
        var eyeBackground = document.getElementById('eyeShow');
        var bgImage = document.getElementById('background-login');
        var icon = document.getElementById('icon');
        bgImage.style = 'background-image: none !important';
        icon.style = 'color: white';
    }
  </script>

  <!-- App Js -->
  <script src="{{ asset('js/themeLoader.js') }}"></script>
  <script src="{{ asset('logintemplate/js/app.js') }}"></script>
</body>

<!-- Mirrored from themesbrand.com/qexal/layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Oct 2023 03:12:52 GMT -->

</html>
