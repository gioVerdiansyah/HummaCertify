@extends('layouts.nav-admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/AdminDataTable.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/loading.css') }}">
    <div class="tambah-container">
        <div class="tambah-container-body">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="mb-3 col-12 d-flex">
                        <div class="col-9 d-flex gap-3 py-2 px-1">
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
                                <select name="print" class="form-select" id="printSelect">
                                    <option value="nonPrint" {{ request('print') == 'nonPrint' ? 'selected' : '' }}>non print</option>
                                    <option value="hasPrint" {{ request('print') == 'hasPrint' ? 'selected' : '' }} >has print</option>
                                </select>
                            </div>
                            @if (request('ct') && !request('print'))
                                <div class="col-3">
                                    <a href="{{ route('printAllCertificate') }}?ct={{ request('ct') }}&page={{ $certificates->currentPage()}}" target="_blank" class="btn btn-primary print-all-certificate"><i
                                            class="bi bi-printer "></i> Print Semua</a>
                                </div>
                            @endif
                        </div>
                        <div class="col-3">
                            <form action="" method="GET" class="d-flex align-items-center gap-3"
                                onsubmit="document.getElementById('loading').style.display = 'flex';event.preventDefault();var currentUrl = window.location.href;if (currentUrl.includes('ct=')) {window.location.href = currentUrl + '&q=' + document.getElementsByName('q')[0].value;}else{this.submit();}">
                                <div class="input-group">
                                    <input type="text" style="border-right: 0px;" name="q" class="form-control rounded-start py-2" placeholder="Cari Sertifikat..." value="{{ request('q') }}" />
                                    <button type="submit" style="border-top: 1px solid #ced4da; border-right: 1px solid #ced4da; border-bottom: 1px solid #ced4da; " class="btn btn-lg">
                                        <i class="bi bi-search"></i>
                                    </button>
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
                            @forelse ($certificates as $i => $certificate)
                                <tr>
                                    <td class="text-center"><span class="fw-bold">{{ ++$i }}</span></td>
                                    <td>
                                        {{ $certificate->nomor }}
                                    </td>
                                    <td data-nama-sertifikat="{{ $certificate->user->name }}">{{ $certificate->user->name }}</td>
                                    <td>{{ $certificate->category->name }}</td>
                                    <td class="d-flex gap-2 justify-content-center align-items-center">
                                        @isset($certificate->user->email)
                                            <form action="{{ route('sendCertificate', $certificate->id) }}" method="POST"
                                                onsubmit="document.querySelector('#loading-text').innerText = 'Sending...';document.getElementById('loading').style.display = 'flex'"
                                                class="m-0">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" title="Kirim Email">
                                                    <i class="fi fi-rs-paper-plane"></i>
                                                </button>
                                            </form>
                                        @endisset
                                        <a href="{{ route('getCertificate', $certificate->id) }}" target="_blank" class="btn btn-info print-certificate" title="Print">
                                            <i class="fi fi-rr-print"></i>
                                        </a>
                                        </a>
                                        <a href="{{ route('certificate.edit', $certificate->id) }}" class="btn btn-warning" title="Edit">
                                            <i class="fi fi-rr-edit"></i>
                                        </a>

                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            Data sertifikat tidak ada...
                                        </td>
                                    </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="grid-pagination w-100">
                        {{ $certificates->onEachSide(1)->links('layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        document.getElementById('categorySelect').addEventListener('change', function() {
            document.getElementById('loading').style.display = 'flex';
            var selectedCategoryId = this.value;
            var currentUrl = window.location.href;
            var newUrl;
            if (selectedCategoryId === "Semua") {
                newUrl = currentUrl.replace(/ct=[^&]*/, '');
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

        document.getElementById('printSelect').addEventListener('change', function() {
            document.getElementById('loading').style.display = 'flex';
            var printCategoryId = this.value;
            var currentUrl = window.location.href;
            var newUrl;
            if (printCategoryId === "nonPrint") {
                newUrl = currentUrl.replace(/print=[^&]*/, '');
            } else {
                var ctParam = 'print=' + printCategoryId;
                if (currentUrl.includes('print=')) {
                    newUrl = currentUrl.replace(/print=[^&]*/, ctParam);
                } else {
                    newUrl = currentUrl + (currentUrl.includes('?') ? '&' : '?') + ctParam;
                }
            }
            window.location.href = newUrl;
        });
        @if (!request('print'))
        document.querySelectorAll('.print-certificate').forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var namaSertifikat = link.closest('tr').querySelector('td[data-nama-sertifikat]').dataset.namaSertifikat;
                Swal.fire({
                    title: `Anda yakin ingin mencetak sertifikat untuk ${namaSertifikat}?`,
                    text: 'Tindakan ini tidak dapat dibatalkan .',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Lanjutkan',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link.href;
                    }
                });
            });
        });
        @endif

    document.querySelectorAll('.print-all-certificate').forEach(function(link){
        link.addEventListener('click', function(event){
            event.preventDefault();
            Swal.fire({
                title: 'anda yakin mau memprint semua certificate?',
                text: 'tindakan anda tidak dapat di batalkan',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'lanjutkan',
                cancelButtonText: 'batal',
            }).then((result) => {
                if(result.isConfirmed) {
                    window.location.href = link.href;
                }
            });
        });
    });

    </script>
@endsection
