@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Tambah Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/admin/AdminAdd.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/loading.css') }}">
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <form action="{{ route('certificate.store') }}" method="POST" name="myform" id="myform">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="col-12 header-label">
                <p>Identitas Peserta</p>
              </div>
              <div class="col-12 mb-4">
                <label for="name" class="form-label ">Nama Peserta</label>
                <input required type="text" class="form-control @error('name') is-invalid @enderror"
                  placeholder="Masukkan nama" name="name" id="name" value="{{ old('name') }}" required>
                @error('name')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="nomorInduk" class="form-label">NIS/NIM/NIP Peserta</label>
                <input required type="text" class="form-control @error('nomor_induk') is-invalid  @enderror"
                  placeholder="Masukkan NIS/NIM/NIP" name="nomor_induk" id="nomorInduk" value="{{ old('nomor_induk') }}"
                  required>
                @error('nomor_induk')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email peserta (opsional)</label>
                <input type="text"
                  class="form-control @error('email') is-invalid
                                @enderror"
                  placeholder="Email peserta" name="email" id="email" value="{{ old('email') }}">
                @if (!old('email') && !$errors->has('email'))
                  <p class="text-warning" style="margin-bottom: 3px;"><i class="bi bi-exclamation-circle"></i> Jika tidak
                    diisi, fitur pengiriman sertifikat ke penerima tidak ada.</p>
                @endif
                @error('email')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="ttl" class="form-label">Tempat tanggal lahir</label>
                <input required type="text"
                  class="form-control @error('ttl') is-invalid
                                @enderror"
                  placeholder="Tempat dan tanggal lahir peserta" name="ttl" id="ttl" value="{{ old('ttl') }}"
                  required>
                @error('ttl')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="institusi" class="form-label">institusi</label>
                <input required type="text"
                  class="form-control @error('institusi') is-invalid
                                @enderror"
                  placeholder="Asal institusi" name="institusi" id="institusi" value="{{ old('institusi') }}" required>
                @error('institusi')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-md-6">
              <div style="margin-left: -1px" class="col-12 header-label-2">
                Data Sertifikat
              </div>
              <div class="col-12 mb-4 mt-3">
                <label for="certificate_categori_id" class="form-label">Kategori Sertifikat</label>
                <select name="certificate_categori_id" id="certificate_categori_id"
                  class="form-select @error('certificate_categori_id') is-invalid @enderror" required>
                  <option disabled selected>--Pilih Kategori--</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                      {{ old('certificate_categori_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                  @endforeach
                </select>

                @error('certificate_categori_id')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="bidang" class="form-label">Bidang/Division</label>
                <input required type="text"
                  class="form-control @error('bidang') is-invalid
                                @enderror"
                  placeholder="Bidang yang diikuti peserta" id="bidang" name="bidang" value="{{ old('bidang') }}"
                  required>
                @error('bidang')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="subBidang" class="form-label">Sub Bidang (opsional)</label>
                <input type="text"
                  class="form-control @error('sub_bidang') is-invalid
                                @enderror"
                  placeholder="Sub bidang peserta" id="subBidang" name="sub_bidang" value="{{ old('sub_bidang') }}">
                @error('sub_bidang')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="tanggal" class="form-label">Tanggal Acara</label>
                <input required type="date"
                  class="form-control @error('tanggal') is-invalid
                                @enderror"
                  placeholder="dd/mm/yy" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @error('tanggal')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>

              <div class="col-12 mb-4">
                <label for="predikat" class="form-label">Predikat</label>
                <select name="predikat"
                  class="form-select @error('predikat') is-invalid
                                @enderror"
                  id="predikat" required>
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
                @error('predikat')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
            </div>
            <div class="col-12 header-label">
              <p>Detail Sertifikat</p>
            </div>
            <div class="d-flex flex-row">
              <div class="col-12 mb-4">
                <label for="instruktur">Instruktur Pemateri</label>
                <input required type="text"
                  class="form-control @error('instruktur') is-invalid
                                @enderror"
                  name="instruktur" id="instruktur" required>
                @error('instruktur')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
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
                            <input required type="text" class="form-control @error('category-group.*.materi') is-invalid @enderror"  placeholder="materi" name="materi" value="" required>
                            @error('category-group.*.materi')
                              <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                              </div>
                            @enderror
                          </div>
                          <div class="col-6 mb-4 ps-2">
                            <label for="unknown" class="form-label">Jam
                              Pelajaran</label>
                            <div class="d-flex flex-row">
                              <input required type="number" name="jam_pelajaran"
                                class="form-control @error('jam_pelajaran') is-invalid
                                                            @enderror"
                                id="jamPelajaran" placeholder="Jam Pelajaran" required>
                              @error('category-group.*.jam_pelajaran')
                                <div class="invalid-feedback">
                                  <p>{{ $message }}</p>
                                </div>
                              @enderror
                              <input required
                                class="btn btn-outline-danger waves-effect waves-light ms-3 d-flex justify-content-center align-items-center"
                                data-repeater-delete type="button" value="Hapus" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="hstack gap-2 justify-content-end">
                    <input required class="btn btn-outline-success waves-effect waves-light" data-repeater-create
                      type="button" value="+ Tambah" />
                  </div>
                </div>
              </div>
              <script src="{{ asset('assets/js/formRepeater.js') }}"></script>
              <div class="col-8">
                <div class="mt-2 d-flex href-link-gap">
                  <p>Peserta sudah ada?<a href="{{ route('certificate.create_exist') }}"> Tambah sertifikat dengan
                      peserta yang sudah terdaftar</a></p>
                </div>
              </div>
              <div class="col-4">
                <button type="submit" class="btn btn-primary waves-effect waves-light">Buat Sertifikat</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    document.getElementById('myform').addEventListener('submit', function() {
        document.getElementById('loading').style.display = 'flex';
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
