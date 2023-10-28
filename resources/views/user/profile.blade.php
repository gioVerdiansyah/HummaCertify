@extends('layouts.nav-user')

@section('content')
  <div class="pembungkus-profile">
    <div class="bababoi">
      <div class="row" style="width: 100%; height: 92vh; padding: 0; margin: 0">
        <div class="col-md-8 p-0">
          <div class="card card-profile p-4" style="height: 100%; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
            <h3 class="profile-title mb-4">Profile</h3>
            <form action="" class="form-detail">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Marshall West" readonly>
              </div>
              <div class="input-group mb-5 flex-column">
                <label for="email" class="form-label">Email</label>
                <div class="d-flex mb-2">
                  <input type="" id="email" style="position: absolute;" class="form-control rounded-start py-2"
                    placeholder="Cari Sertifikat..." value="">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fi fi-rr-pencil"></i></button>
                </div>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" placeholder="9305812083531" readonly>
              </div>
              <div class="mb-3">
                <label for="institusi" class="form-label">Sekolah</label>
                <input type="text" class="form-control" id="institusi" placeholder="Univ Brawijaya" readonly>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 p-0">
          <div class="card card-sertifikat-user" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
            <div class="card-body d-flex align-items-center">
              <div class="d-flex position-relative align-items-center">
                <div class="content flex-shrink-0 me-3 avatar-xl rounded d-flex justify-content-center align-items-center" style="background-color: rgba(41, 186, 219, 23%);">
                  <img src="{{ asset('image/certificate-vector.png') }}" style="width: 60px; height: auto" alt="">
                </div>
                <div class="text">
                  <h5 class="text-atas" style="pointer-events: none">Sertifikat</h5>
                  <p class="angka" style="pointer-events: none">10</p>
                  <p class="text-bawah" style="pointer-events: none">Total Sertifikat</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card card-sertifikat-show p-4" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
            <div class="mb-3">
              <h3 class="profile-title">Terbaru</h3>
            </div>
            <div class="certificate" data-bs-toggle="modal" data-bs-target="#fullscreenModal">
              <div class="dark">
                <p>Klik untuk melihat ukuran penuh</p>
              </div>
              <img src="{{ asset('image/certificate-bg.png') }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="fullscreeexampleModalLabel">Setifikat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img style="width: 100%; height: auto;" src="{{ asset('image/certificate-bg.png') }}" alt="">
        </div>
      </div>
    </div>
  </div>
@endsection
