@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/AdminList.css') }}">
  <div class="card">
    <div class="col-md-12 card-header">
      <div class="col-6">
        <p class="card-header-p">Sertifikat yang di peroleh oleh anda</p>
      </div>
      <div class="col-6 d-flex justify-content-end gap-3">
        <div class="col-4">
          <form action="" method="POST">
            @csrf
            <input type="text" name="search" class="form-control" placeholder="Cari Sertifikat">
            <button style="display: none" type="submit"></button>
          </form>
        </div>
        <div class="col-2">
          <select name="category" class="form-select">
            <option value="Semua">Semua</option>
            <option value="Semua1">Semua1</option>
            <option value="Semua2">Semua2</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-12 mt-1 d-flex gap-3">
      <div class="row">
        <div class="col-4 img-list">
          <img width="100%" class="image-view" src="{{ asset('image/certificate-bg.png') }}">
        </div>
      </div>
    </div>
  </div>
@endsection
