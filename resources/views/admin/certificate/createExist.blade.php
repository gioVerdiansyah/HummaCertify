@extends('layouts.nav-admin')

@section('content')
  @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
  @endforeach
  <title>{{ config('app.name', 'Laravel') }} - Tambah Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/admin/AdminExist.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/loading.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <form action="{{ route('certificate.store_exist') }}" method="post" name="Exist" id="myform" onsubmit="document.getElementById('loading').style.display = 'flex'">
          @csrf
          <div class="row">
            <div class="col-12 d-flex">
              <div class="col-6 header-label">
                <p>Data Sertifikat</p>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="col-12 name-exist">
                <label for="nama" class="form-label">Nama Peserta</label>
                <select class="js-example-basic-single" name="user_id" id="search" required>
                  <option disabled selected>--Pilih Peserta--</option>
                  @foreach ($peserta as $row)
                    <option value="{{ $row->id }}" {{ old('user_id') == $row->id ? 'selected' : '' }}>
                      {{ $row->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-4">
                <label for="certificate_categori_id" class="form-label">Kategori Sertifikat</label>
                <select name="certificate_categori_id" id="certificate_categori_id" class="form-select" required>
                  <option disabled selected>--Pilih Kategori--</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('certificate_categori_id') == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-4">
                <label for="tanggal" class="form-label">Tanggal Acara</label>
                <input required type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="col-12 mb-4">
                <label for="division" class="form-label">Bidang/Division</label>
                <input required type="text" name="bidang" class="form-control" placeholder="Bidang yang diikuti peserta" value="{{ old('bidang') }}">
              </div>
              <div class="col-12 mb-4">
                <label for="division" class="form-label">Sub Bidang</label>
                <input required type="text" name="sub_bidang" class="form-control" placeholder="Sub bidang peserta" value="{{ old('sub_bidang') }}">
              </div>
              <div class="col-12 mb-4">
                <label for="predikat" class="form-label">Predikat</label>
                <select name="predikat" class="form-select" id="predikat">
                  <option disabled selected>--Pilih Predikat--</option>
                  <option value="Sangat Baik" {{ old('predikat') == 'Sangat Baik' ? 'selected' : '' }}>
                    Sangat Baik</option>
                  <option value="Baik" {{ old('predikat') == 'Baik' ? 'selected' : '' }}>
                    Baik
                  </option>
                  <option value="Cukup" {{ old('predikat') == 'Cukup' ? 'selected' : '' }}>
                    Cukup
                  </option>
                  <option value="Kurang" {{ old('predikat') == 'Kurang' ? 'selected' : '' }}>Kurang
                  </option>
                </select>
              </div>
            </div>
            <div class="col-12 header-label">
              <p>Detail Sertifikat</p>
            </div>
            <div class="d-flex flex-row">
              <div class="col-12 mb-4">
                <label for="instruktur">Instruktur Pemateri</label>
                <input required type="text" class="form-control" name="instruktur" id="instruktur" value="{{ old('instruktur') }}">
              </div>
            </div>
            <div>
              <link rel="stylesheet" href="{{ asset('css/admin/AdminAdd.css') }}">
              <div class="card-body">
                <div class="repeater">
                  <div data-repeater-list="category-group" class="row g-3">
                    <div data-repeater-item>
                      <div class="row">
                        <div class="d-flex flex-row">
                          <div class="col-6 mb-4 pe-3">
                            <label for="unknown" class="form-label">Materi</label>
                            <input type="text" class="form-control" placeholder="materi" name="materi" value="" required>
                          </div>
                          <div class="col-6 mb-4 ps-2">
                            <label for="unknown" class="form-label">Jam
                              Pelajaran</label>
                            <div class="d-flex flex-row">
                              <input type="number" class="form-control" name="jam_pelajaran" id="jamPelajaran" placeholder="Jam Pelajaran" required>
                              <input class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center" data-repeater-delete type="button" value="Hapus" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="hstack gap-2 justify-content-end">
                    <input class="btn btn-outline-success waves-effect waves-light" data-repeater-create type="button" value="+ Tambah" />
                  </div>
                </div>
              </div>
              <script src="{{ asset('assets/js/formRepeater.js') }}"></script>
              <div class="col-8">
                <div class="mt-2 d-flex href-link-gap">
                  <p>Peserta belum ada? <a href="{{ route('certificate.create') }}"> Tambah sertifikat beserta peserta</a>
                  </p>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Buat Sertifikat</button>
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
  <script>
    document.getElementById('exist').addEventListener('submit', function() {
      if (document.getElementById('search').value == "--Pilih Peserta--") {
        Swal.fire({
          icon: "warning",
          title: "Ada yang kosong!",
          text: "Nama Peserta belum di isi"
        })
        event.preventDefault();
      }
      if (document.getElementById('certificate_categori_id').value == "--Pilih Kategori--") {
        Swal.fire({
          icon: "warning",
          title: "Ada yang kosong!",
          text: "kategori Sertifikat belum di isi"
        })
        event.preventDefault();
      }
      if (document.getElementById('predikat').value == "--Pilih Predikat--") {
        Swal.fire({
          icon: "warning",
          title: "Ada yang kosong!",
          text: "Predikat belum di isi"
        })
        event.preventDefault();
      }
    })
  </script>
@endsection
