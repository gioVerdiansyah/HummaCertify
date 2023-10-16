@extends('layouts.nav-auth')

@section('content')
  <div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
      <div class="bg-overlay"></div>

      <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
          viewBox="0 0 1440 120">
          <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
        </svg>
      </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
      <div class="container">
        {{-- <div class="row">
          <div class="col-lg-12">
            <div class="text-center mt-sm-5 mb-4 text-white-50">
              <div>
                <a href="index.html" class="d-inline-block auth-logo">
                  <img src="assets/images/logo-light.png" alt="" height="20">
                </a>
              </div>
              <p class="mt-3 fs-15 fw-semibold">Premium Admin & Dashboard Template</p>
            </div>
          </div>
        </div> --}}
        <!-- end row -->

        <div class="row justify-content-center mt-5">
          <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

              <div class="card-body p-4">
                <div class="text-center mt-2">
                  <h5 class="text-primary">Selamat Datang</h5>
                  <p class="text-muted">Silahkan Sign In Terlebih Dahulu</p>
                </div>
                <div class="p-2 mt-4">
                  <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                      <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="password-input">Password</label>
                      <div class="position-relative auth-pass-inputgroup mb-3">
                        <input type="password" name="password"
                          class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                          placeholder="Password" id="password-input">
                        <button
                          class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                          type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                        @error('password')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="auth-remember-check" name="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label" for="auth-remember-check">Remember me</label>

                    <div class="mt-4">
                      <button type="submit" class="btn btn-primary w-100">Masuk</button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="text-center">
              <p class="mb-0 text-muted">&copy;
                <script>
                  document.write(new Date().getFullYear())
                </script> HummaCertify. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                HummaTech
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- end Footer -->
  </div>
@endsection
