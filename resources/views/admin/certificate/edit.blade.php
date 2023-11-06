@extends('layouts.nav-admin')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Edit Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/admin/AdminAdd.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/loading.css') }}">
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <form action="{{ route('certificate.update', $certificate->id) }}" method="POST" onsubmit="document.getElementById('loading').style.display = 'flex'">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="col-12 header-label">
                <p>Identitas Peserta</p>
              </div>
              <div class="col-12 mb-4">
                <label for="name" class="form-label ">Nama Peserta</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama" name="name" id="name" value="{{ old('name', $certificate->user->name) }}" required>
                @error('name')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="nomorInduk" class="form-label">NIS/NIM/NIP Peserta</label>
                <input type="text" class="form-control @error('nomor_induk') is-invalid  @enderror" placeholder="Masukkan NIS/NIM/NIP" name="nomor_induk" id="nomorInduk" value="{{ old('nomor_induk', $certificate->user->password) }}" required>
                @error('nomor_induk')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="email" class="form-label">Email peserta</label>
                <input type="text" class="form-control @error('email') is-invalid
                                @enderror" placeholder="Email peserta" name="email" id="email" value="{{ old('email', $certificate->user->email) }}">
                @error('email')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="ttl" class="form-label">Tempat tanggal lahir</label>
                <input type="text" class="form-control @error('ttl') is-invalid
                                @enderror" placeholder="Tempat dan tanggal lahir peserta" name="ttl" id="ttl" value="{{ old('ttl', $certificate->user->ttl) }}"
                  required>
                @error('ttl')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="institusi" class="form-label">institusi</label>
                <input type="text" class="form-control @error('institusi') is-invalid
                                @enderror" placeholder="Asal institusi" name="institusi" id="institusi" value="{{ old('institusi', $certificate->user->institusi) }}"
                  required>
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
                <select name="certificate_categori_id" class="form-select @error('certificate_categori_id') is-invalid
                                @enderror" required>
                  <option disabled selected>--Pilih Kategori--</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('certificate_categori_id', $certificate->certificate_categori_id) == $category->id ? 'selected' : '' }}>
                      {{ $category->name }}</option>
                    @error('certificate_categori_id')
                      <div class="invalid-feedback">
                        <p>{{ $message }}</p>
                      </div>
                    @enderror
                  @endforeach
                </select>
              </div>
              <div class="col-12 mb-4">
                <label for="bidang" class="form-label">Bidang/Division</label>
                <input type="text" class="form-control @error('bidang')
                                @enderror" placeholder="Bidang yang diikuti peserta" id="bidang" name="bidang" value="{{ old('bidang', $certificate->bidang) }}" required>
                @error('bidang')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="subBidang" class="form-label">Sub Bidang</label>
                <input type="text" class="form-control @error('sub_bidang') is-invalid
                                @enderror" placeholder="Sub bidang peserta" id="subBidang" name="sub_bidang" value="{{ old('sub_bidang', $certificate->sub_bidang) }}"
                  required>
                @error('sub_bidang')
                  <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                  </div>
                @enderror
              </div>
              <div class="col-12 mb-4">
                <label for="tanggal" class="form-label">Tanggal Acara</label>
                <input type="date" class="form-control" placeholder="dd/mm/yy" name="tanggal" id="tanggal" value="{{ old('tanggal', $certificate->tanggal) }}" required>
              </div>
              <div class="col-12 mb-4">
                <label for="predikat" class="form-label">Predikat</label>
                <select name="predikat" class="form-select @error('predikat') is-invalid
                                @enderror" id="predikat" required>
                  @error('predikat')
                    <div class="invalid-feedback">
                      <p>{{ $message }}</p>
                    </div>
                  @enderror
                  <option disabled selected>--Pilih Predikat--</option>
                  <option value="Sangat Baik" {{ old('predikat', $certificate->predikat) == 'Sangat Baik' ? 'selected' : '' }}>
                    Sangat Baik</option>
                  <option value="Baik" {{ old('predikat', $certificate->predikat) == 'Baik' ? 'selected' : '' }}>
                    Baik
                  </option>
                  <option value="Cukup" {{ old('predikat', $certificate->predikat) == 'Cukup' ? 'selected' : '' }}>
                    Cukup
                  </option>
                  <option value="Kurang" {{ old('predikat', $certificate->predikat) == 'Kurang' ? 'selected' : '' }}>
                    Kurang
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
                <input type="text" class="form-control @error('instruktur') is-invalid
                                @enderror" name="instruktur" id="instruktur" value="{{ old('instruktur', $certificate->instruktur) }}" required>
                @error('instruktur', $certificate->instruktur)
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
                    @foreach ($details as $detail)
                      <div data-repeater-item>
                        <input type="hidden" name="detail_id" value="{{ $detail->id }}">
                        <div class="row">
                          <div class="d-flex flex-row">
                            <div class="col-6 mb-4 pe-3">
                              <label for="unknown" class="form-label">Materi</label>
                              <input type="text" class="form-control @error('materi') is-invalid
                                                        @enderror" placeholder="materi" name="materi" value="{{ $detail->materi }}" required>
                              @error('materi')
                                <div class="invalid-feedback">
                                  <p>{{ $message }}</p>
                                </div>
                              @enderror
                            </div>
                            <div class="col-6 mb-4 ps-2">
                              <label for="unknown" class="form-label">Jam
                                Pelajaran</label>
                              <div class="d-flex flex-row">
                                <input type="number" class="form-control @error('jam_pelajaran') is-invalid
                                                            @enderror"name="jam_pelajaran" id="jamPelajaran" placeholder="Jam Pelajaran"
                                  value="{{ $detail->jp }}" required>
                                @error('jam_pelajaran')
                                  <div class="invalid-feedback">
                                    <p>{{ $message }}</p>
                                  </div>
                                @enderror
                                <input class="btn btn-danger ms-2" data-repeater-delete type="button" value="Hapus" />
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </div>
                  <div class="hstack gap-2 justify-content-end">
                    <input class="btn btn-success" data-repeater-create type="button" value="+ Tambah" />
                  </div>
                </div>
              </div>
              <script src="{{ asset('assets/js/formRepeater.js') }}"></script>
              <div class="col-4">
                <button type="submit" class="btn btn-primary">Edit Sertifikat</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
