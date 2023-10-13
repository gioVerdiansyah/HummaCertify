@extends('layouts.app')

@section('content')
  <div class="container login-register">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="wrapper">
            <div class="logo">
              <img src="{{ asset('image/icon-bg-removed.png') }}" alt="">
            </div>
            <div class="text-center mt-4 name mb-3">
              HummaCertify
            </div>
            <form class="p-3 mt-3">
              <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" class="@error('email') is-invalid @enderror" id="userEmail" placeholder="Email" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" class="@error('password') is-invalid @enderror" id="userPassword" placeholder="Password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <button type="submit" class="btn mt-3 mb-3">{{ __('Login') }}</button>
            </form>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
@endsection
