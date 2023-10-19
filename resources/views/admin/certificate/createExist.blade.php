@extends('layouts.nav-admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/AdminExist.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="tambah-container">
        <div class="tambah-container-body">
            <div class="card-body">
                <form action="{{ route('existCertificate') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12 d-flex">
                            <div class="col-6 header-label">
                                <p>Data Sertifikat</p>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="col-12 mb-4">
                                <label for="nama" class="form-label">Nama Peserta</label>
                                <select class="js-example-basic-single" name="user_id" id="search">
                                    <option disabled selected>--Pilih Peserta--</option>
                                    @foreach ($peserta as $row)
                                    <option value="{{ $row->id }}"
                                        {{ old('name') == $row->id ? 'selected' : '' }}>
                                        {{ $row->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-12">
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
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="col-12 mb-4">
                                <label for="division" class="form-label">Bidang/Division</label>
                                <input type="text" name="bidang" class="form-control"
                                    placeholder="Bidang yang diikuti peserta">
                            </div>
                            <div class="col-12">
                                <label for="division" class="form-label">Sub Bidang</label>
                                <input type="text" name="sub_bidang" class="form-control" placeholder="Sub bidang peserta">
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <label for="tanggal" class="form-label">Tanggal Acara</label>
                            <input type="date" name="tanggal" class="form-control">
                        </div>
                        <div class="col-8">
                            <div class="mt-2 d-flex href-link-gap">
                                <p>Peserta sudah ada? <a href=""> Tambah sertifikat dengan peserta yang ada</a></p>
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
