@extends('layouts.app')

@section('content')

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed"
    data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-xl-7 col-xxl-8">
            {{-- <a href="index-2.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img
                src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/dark-logo.svg"
                width="180" alt="">
            </a> --}}
            <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
              <img
                src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                alt="" class="img-fluid" width="500">
            </div>
          </div>
          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="col-sm-8 col-md-6 col-xl-9">
                <h2 class="mb-3 fs-7 fw-bolder">HummaCertify - Register</h2>
                <form action="{{ route('register') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                      id="name" aria-describedby="textHelp">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror"
                      id="email" aria-describedby="emailHelp">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password"
                      class="form-control  @error('password') is-invalid @enderror" id="password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="password-comfirmatin" class="form-label">Confirmation Password</label>
                    <input type="password" name="password_confirmation"
                      class="form-control  @error('confirmation_password') is-invalid @enderror"
                      id="password-comfirmatin">
                    @error('password_confirmation')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign Up</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Already have an Account?</p>
                    <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Sign In</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
