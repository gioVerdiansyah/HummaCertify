@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/user/detail.css') }}">
  <div class="content-container">
    <div class="content-top">
      <div class="left-side">
        <div class="image-container">
          <img class="image-item" src="{{ asset('image/certificate-no-border-radius.png') }}" alt="">
        </div>
      </div>
      <div class="right-side">
        <div class="right-content">
          <div>
            <p class="header">Detail Sertifikat</p>
          </div>
          <div class="main-detail">
            <div class="left-detail">
              <div class="mt-3">
                <h4 class="label-header">Nama :</h4>
                <p class="label-item">Ilyas</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Asal Sekolah :</h4>
                <p class="label-item">Smkn 1 Gending</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Nomor Srtifikat :</h4>
                <p class="label-item">Ser/0011/01/2510/2023</p>
              </div>
            </div>
            <div class="right-detail">
              <div class="mt-3">
                <h4 class="label-header">Di buat oleh :</h4>
                <p class="label-item">Hummatech</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Jenis Sertifikat :</h4>
                <p class="label-item">Sertifikat Kelulusan</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Di berikan pada :</h4>
                <p class="label-item">24 - 10 - 2023</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-bottom">
      <div class="table-background">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No.</th>
              <th>Materi </th>
              <th>Waktu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Php Native</td>
              <td>168 J</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
