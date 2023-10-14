@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
      <div class="card-body px-4 py-3">
        <div class="row align-items-center">
          <div class="col-9">
            <h4 class="fw-semibold mb-8">Profile</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item" aria-current="page">Profile</li>
              </ol>
            </nav>
          </div>
          <div class="col-3">
            <div class="text-center mb-n5">
              <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
        <li class="nav-item w-50" role="presentation">
          <button
            class="nav-link w-100 position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
            id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab"
            aria-controls="pills-account" aria-selected="true">
            <i class="ti ti-user-circle me-2 fs-6"></i>
            <span class="d-none d-md-block">Account</span>
          </button>
        </li>
        <li class="nav-item w-50" role="presentation">
          <button
            class="nav-link w-100 position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-4"
            id="pills-notifications-tab" data-bs-toggle="pill" data-bs-target="#pills-notifications" type="button"
            role="tab" aria-controls="pills-notifications" aria-selected="false">
            <i class="ti ti-certificate me-2 fs-6"></i>
            <span class="d-none d-md-block">Sertifikat</span>
          </button>
        </li>
      </ul>
      <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab"
            tabindex="0">
            <div class="row">
              <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Edit Profile</h5>
                    <p class="card-subtitle mb-4">Unggah gambar anda disini</p>
                    <div class="text-center">
                      <img src="../../dist/images/profile/user-1.jpg" alt="" class="img-fluid rounded-circle"
                        width="120" height="120">
                      <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                        <button class="btn btn-primary upload">Unggah</button>
                        <button class="btn btn-outline-danger">Batal</button>
                      </div>
                      <p class="mb-0">Diizinkan JPG, GIF atau PNG. Ukuran maksimal 1Mb</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title fw-semibold">Ubah Kata Sandi</h5>
                    <p class="card-subtitle mb-4">Untuk mengubah kata sandi Anda, silakan konfirmasi di sini</p>
                    {{-- Reset Password --}}
                    <form method="" action="">
                      <div class="mb-4">
                        <label for="old_pass" class="form-label fw-semibold">Kata sandi lama</label>
                        <input type="password" class="form-control" id="old_pass" placeholder="*********">
                      </div>
                      <div class="mb-4">
                        <label for="new_pass" class="form-label fw-semibold">Kata sandi baru</label>
                        <input type="password" class="form-control" id="new_pass" placeholder="*********">
                      </div>
                      <div class="">
                        <label for="confirm_new_pass" class="form-label fw-semibold">Konfirmasi kata sandi baru</label>
                        <input type="password" class="form-control" id="confirm_new_pass" placeholder="*********">
                      </div>
                    </form>
                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                      <button class="btn btn-primary">Simpan</button>
                      <button class="btn btn-light-danger text-danger">Batal</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
