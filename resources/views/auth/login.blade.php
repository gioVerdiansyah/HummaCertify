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
                src="{{asset('image/logo-text.png')}}"
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
                <h2 class="mb-3 fs-7 fw-bolder">HummaCertify - Sign In</h2>
                <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label @error('email') is-invalid @enderror">Email</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="mb-4">
                    <label for="password" class="form-label @error('email') is-invalid @enderror">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked">
                      <label class="form-check-label text-dark" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-medium" href="{{route('password.request')}}">Forgot Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-medium">Don't have any account?</p>
                    <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an account</a>
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
