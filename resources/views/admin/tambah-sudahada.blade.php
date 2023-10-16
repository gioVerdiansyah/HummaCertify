@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/admin-exist.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <form action="javascript:void(0);">
          <div class="row">
            <div class="col-12 d-flex">
              <div class="col-6 header-label">
                <p>Data Sertifikat</p>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-4">
                <label for="firstNameinput" class="form-label">Nama Peserta</label>
                <select class="js-example-basic-single" name="nama" id="search">
                  <option value="Alabama">Alabama</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-4">
                <label for="lastNameinput" class="form-label">Kategori Sertifikat</label><br>
                <select name="category" class="form-select">
                    <option disabled selected>Pilih Kategori...</option>
                    <option value="H1">H1</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-4">
                <label for="lastNameinput" class="form-label">Tanggal Acara</label>
                <input type="date" class="form-control" placeholder="dd/mm/yy" name="tanggal">
              </div>
            </div>
            <div class="col-6">
            </div>
            <div class="col-8">
              <div class="mt-2 d-flex href-link-gap">
                <p>Peserta sudah ada?</p><a href=""> Tambah sertifikat dengan peserta yang ada</a>
              </div>
            </div>
            <div class="col-4">
              <div class="text-end">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#search').select2();
    });
  </script>
@endsection
