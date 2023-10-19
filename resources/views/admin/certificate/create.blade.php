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
                                <input type="text" class="form-control" placeholder="Masukkan nama" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="nomor_induk" class="form-label">NIS/NIM/NIP Peserta</label>
                                <input type="text" class="form-control" placeholder="Masukkan NIS/NIM/NIP"
                                    name="nomor_induk" value="{{ old('nomor_induk') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="email" class="form-label">Email peserta (opsional)</label>
                                <input type="text" class="form-control" placeholder="Email peserta"
                                    name="email" value="{{ old('email') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="" class="form-label">Tempat tanggal lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat dan tanggal lahir peserta" name="ttl" value="{{ old('ttl') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="" class="form-label">institusi</label>
                                <input type="text" class="form-control" placeholder="Asal institusi" name="institusi" value="{{ old('institusi') }}">
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
                                <input type="text" class="form-control" placeholder="Bidang yang diikuti peserta" name="bidang" value="{{ old('bidang') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="" class="form-label">Sub Bidang</label>
                                <input type="text" class="form-control" placeholder="Sub bidang peserta" name="sub_bidang" value="{{ old('') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="" class="form-label">Tanggal Acara</label>
                                <input type="date" class="form-control" placeholder="dd/mm/yy" name="tanggal" value="{{ old('tanggal') }}">
                            </div>
                            <div class="mb-4">
                                <label for="" class="form-label">Predikat</label>
                                <select name="predikat" class="form-select">
                                    <option disabled selected>--Pilih Predikat--</option>
                                    <option value="Sangat Baik" {{ old('predikat') == "Sangat Baik" ? "selected" : '' }}>Sangat Baik</option>
                                    <option value="Baik" {{ old('predikat') == "Baik" ? "selected" : '' }}>Baik</option>
                                    <option value="Cukup" {{ old('predikat') == "Cukup" ? "selected" : '' }}>Cukup</option>
                                    <option value="Kurang" {{ old('predikat') == "Kurang" ? "selected" : '' }}>Kurang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                        </div>
                        <div class="col-8">
                            <div class="mt-2 d-flex href-link-gap">
                                <p>Peserta sudah ada?<a href=""> Tambah sertifikat dengan peserta yang ada</a></p>
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
