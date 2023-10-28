@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/user/detail.css') }}">
  <div class="content-container">
    <div class="content-top">
      <div class="left-side">
        <div class="image-container">
          <img class="image-item" src="{{ asset('image/certificate-bg.png') }}" alt="">
        </div>
      </div>
      <div class="right-side">
        <div class="right-content">
          <div>
            <h4 class="header">Detail Sertifikat</h4>
          </div>
          <div class="main-detail">
            <div class="left-detail">
              <div class="mt-3">
                <h4 class="label-header">Nama :</h4>
                <h4 class="label-item">Ilyas</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Asal Sekolah :</h4>
                <h4 class="label-item">Smkn 1 Gending</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Nomor Srtifikat :</h4>
                <h4 class="label-item">Ser/0011/01/2510/2023</h4>
              </div>
            </div>
            <div class="right-detail">
              <div class="mt-3">
                <h4 class="label-header">Di buat oleh :</h4>
                <h4 class="label-item">Hummatech</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Jenis Sertifikat :</h4>
                <h4 class="label-item">Sertifikat Kelulusan</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Di berikan pada :</h4>
                <h4 class="label-item">24 - 10 - 2023</h4>
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
              <th class="left-th text-center">No.</th>
              <th class="center-th">Materi </th>
              <th class="right-th text-center">Waktu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-center">1</td>
              <td>Php Native</td>
              <td class="text-center">168 J</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
