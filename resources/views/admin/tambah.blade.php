@extends('layouts.nav-admin')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/admin-add.css') }}">
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <form action="javascript:void(0);">
          <div class="row">
            <div class="col-12 d-flex">
                <div class="col-6 header-label">
                    <p>Identitas Peserta</p>
                </div>
                <div class="col-6 header-label-2">
                    Data Sertifikat
                </div>
            </div>
            <div class="col-6">
              <div class="mb-4">
                <label for="firstNameinput" class="form-label">Nama Peserta</label>
                <input type="text" class="form-control" placeholder="Masukkan nama" name="nama">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-4">
                <label for="lastNameinput" class="form-label">Kategori Sertifikat</label>
                <select name="kategory" class="form-select">
                  <option disabled selected>Pilih Kategori...</option>
                  <option value="P1">P1</option>
                  <option value="P2">P2</option>
                  <option value="P3">P3</option>
                </select>
              </div>
            </div>
            <div class="col-6">
              <div class="mb-4">
                <label for="firstNameinput" class="form-label">NIS/NIM/NIP Peserta</label>
                <input type="text" class="form-control" placeholder="Masukkan NIS/NIM/NIP" name="password">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-4">
                <label for="firstNameinput" class="form-label">Division</label>
                <input type="text" class="form-control" placeholder="Jurusan Peserta" name="division">
              </div>
            </div>
            <div class="col-6">
              <div class="mb-3">
                <label for="firstNameinput" class="form-label">Email peserta (opsional)</label>
                <input type="text" class="form-control" placeholder="Enter your firstname" name="email">
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
@endsection
