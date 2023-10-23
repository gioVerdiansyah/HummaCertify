@extends('layouts.nav-admin')

@section('content')
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    <link rel="stylesheet" href="{{ asset('css/admin/AdminAdd.css') }}">
    <div class="tambah-container">
        <div class="tambah-container-body">
            <div class="card-body">
                <form action="{{ route('certificate.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-12 header-label">
                                <p>Identitas Peserta</p>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="name" class="form-label">Nama Peserta</label>
                                <input type="text" class="form-control" placeholder="Masukkan nama" name="name"
                                    id="name" value="{{ old('name') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="nomorInduk" class="form-label">NIS/NIM/NIP Peserta</label>
                                <input type="text" class="form-control" placeholder="Masukkan NIS/NIM/NIP"
                                    name="nomor_induk" id="nomorInduk" value="{{ old('nomor_induk') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email" class="form-label">Email peserta (opsional)</label>
                                <input type="text" class="form-control" placeholder="Email peserta" name="email"
                                    id="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="ttl" class="form-label">Tempat tanggal lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat dan tanggal lahir peserta"
                                    name="ttl" id="ttl" value="{{ old('ttl') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="institusi" class="form-label">institusi</label>
                                <input type="text" class="form-control" placeholder="Asal institusi" name="institusi"
                                    id="institusi" value="{{ old('institusi') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="margin-left: -1px" class="col-12 header-label-2">
                                Data Sertifikat
                            </div>
                            <div class="col-12 mb-4 mt-3">
                                <label for="certificate_categori_id" class="form-label">Kategori Sertifikat</label>
                                <select name="certificate_categori_id" class="form-select">
                                    <option disabled selected>--Pilih Kategori--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('certificate_categori_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="bidang" class="form-label">Bidang/Division</label>
                                <input type="text" class="form-control" placeholder="Bidang yang diikuti peserta"
                                    id="bidang" name="bidang"
                                    value="{{ old('bidang') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="subBidang" class="form-label">Sub Bidang</label>
                                <input type="text" class="form-control" placeholder="Sub bidang peserta" id="subBidang"
                                    name="sub_bidang"
                                    value="{{ old('sub_bidang') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="tanggal" class="form-label">Tanggal Acara</label>
                                <input type="date" class="form-control" placeholder="dd/mm/yy" name="tanggal"
                                    id="tanggal" value="{{ old('tanggal') }}">
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
                                <input type="text" class="form-control" name="instruktur" id="instruktur">
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
                                                        <input type="text" class="form-control" placeholder="materi"
                                                            name="materi" value="">
                                                    </div>
                                                    <div class="col-6 mb-4 ps-2">
                                                        <label for="unknown" class="form-label">Jam
                                                            Pelajaran</label>
                                                        <div class="d-flex flex-row">
                                                            <input type="number" class="form-control"
                                                                name="jam_pelajaran" id="jamPelajaran"
                                                                placeholder="Jam Pelajaran">
                                                            <input class="btn btn-danger ms-2" data-repeater-delete
                                                                type="button" value="Hapus" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hstack gap-2 justify-content-end">
                                        <input class="btn btn-success" data-repeater-create type="button"
                                            value="+ Tambah" />
                                    </div>
                                </div>
                            </div>
                            <script src="{{ asset('assets/js/formRepeater.js') }}"></script>
                            <div class="col-8">
                                <div class="mt-2 d-flex href-link-gap">
                                    <p>Peserta sudah ada?<a href="{{ route('certificate.create_exist') }}"> Tambah
                                            sertifikat
                                            dengan peserta yang ada</a></p>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Buat Sertifikat</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
