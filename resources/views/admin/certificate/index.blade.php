@extends('layouts.nav-admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/AdminDataTable.css') }}">
    <div class="tambah-container">
        <div class="tambah-container-body">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3 col-12 d-flex">
                        <div class="col-9 d-flex gap-3">
                            <div class="col-3">
                                <select name="category" class="form-select" id="categorySelect">
                                    <option selected>Semua</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ request('ct') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary">Print Semua</button>
                            </div>
                        </div>
                        <div class="col-3">
                            <form action="" method="GET">
                                <div class="text-end">
                                    <input type="search" style="padding-left: 40px" class="form-control" name="q" placeholder="Cari Data..."><i style="position: absolute; margin-left: -310px; margin-top: -30px" class="bi bi-search"></i>
                                    <button class="d-none" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nomor Sertifikat </th>
                                <th>Nama Peserta</th>
                                <th>Kategori Sertifikat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificates as $i => $certificate)
                                <tr>
                                    <td><span class="fw-bold">{{ ++$i }}</span></td>
                                    <td>{{ $certificate->nomor }}</td>
                                    <td>{{ $certificate->user->name }}</td>
                                    <td>{{ $certificate->category->name }}</td>
                                    <td class="d-flex gap-2 justify-content-center align-items-center">
                                        <button class="btn btn-primary">Kirim</button>
                                        <a href="{{ route('getCertificate', $certificate->id) }}" target="_blank"
                                            class="btn btn-info">Show</a>
                                        <a href="{{ route('certificate.create_detail', $certificate->id) }}"
                                            class="btn btn-success">+Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="grid-summary">
                        Showing <b>1</b> to <b>1</b> of <b>1</b> results
                    </div>
                    <div class="grid-pagination">
                        <button disabled class="btn btn-link" aria-label="Previous" title="Previous">Previous</button>
                        <button class="btn btn-link" aria-label="Page 1" title="Page 1">1</button>
                        <button class="btn btn-link" aria-label="Next" title="Next">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('categorySelect').addEventListener('change', function() {
            var selectedCategoryId = this.value;
            var currentUrl = window.location.href;
            var newUrl;
            if (selectedCategoryId === "Semua") {
                newUrl = currentUrl.replace(/[\?&]ct=[^&]*/, '');
            } else {
                var ctParam = 'ct=' + selectedCategoryId;
                if (currentUrl.includes('ct=')) {
                    newUrl = currentUrl.replace(/ct=[^&]*/, ctParam);
                } else {
                    newUrl = currentUrl + (currentUrl.includes('?') ? '&' : '?') + ctParam;
                }
            }
            window.location.href = newUrl;
        });
    </script>
@endsection
