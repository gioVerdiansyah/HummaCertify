@extends('layouts.nav-admin')
<div class="loading-container" id="loading" style="">
    <div class="loading"></div>
    <div id="loading-text">Creating...</div>
</div>
@section('content')
@foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    <link rel="stylesheet" href="{{ asset('css/admin/AdminExist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="tambah-container">
        <div class="tambah-container-body">
            <div class="card-body">
                <form action="{{ route('certificate.store_exist') }}" method="post" onsubmit="document.getElementById('loading').style.display = 'flex'">
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
                                <select class="js-example-basic-single" name="user_id" id="search">
                                    <option disabled selected>--Pilih Peserta--</option>
                                    @foreach ($peserta as $row)
                                        <option value="{{ $row->id }}" {{ old('user_id') == $row->id ? 'selected' : '' }}>
                                            {{ $row->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="certificate_categori_id" class="form-label">Kategori Sertifikat</label>
                                <select name="certificate_categori_id" class="form-select">
                                    <option disabled selected>--Pilih Kategori--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('certificate_categori_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-4">
                                <label for="tanggal" class="form-label">Tanggal Acara</label>
                                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="col-12 mb-4">
                                <label for="division" class="form-label">Bidang/Division</label>
                                <input type="text" name="bidang" class="form-control"
                                    placeholder="Bidang yang diikuti peserta" value="{{ old('bidang') }}">
                            </div>
                            <div class="col-12 mb-4">
                                <label for="division" class="form-label">Sub Bidang</label>
                                <input type="text" name="sub_bidang" class="form-control"
                                    placeholder="Sub bidang peserta" value="{{ old('sub_bidang') }}">
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
                                <input type="text" class="form-control" name="instruktur" id="instruktur" value="{{ old('instruktur') }}">
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
                                                            <input type="number" class="form-control" name="jam_pelajaran"
                                                                id="jamPelajaran" placeholder="Jam Pelajaran">
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
                                    <p>Peserta sudah ada? <a href="{{ route('certificate.create') }}"> Tambah sertifikat dengan peserta yang ada</a>
                                    </p>
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
    <script>
        $(document).ready(function() {
            $('#search').select2();
        });
    </script>
@endsection
