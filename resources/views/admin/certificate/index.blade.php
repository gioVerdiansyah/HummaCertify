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
                    <option value="{{ $category->id }}" {{ request('ct') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                    </option>
                  @endforeach
                </select>
              </div>
              @if (request('ct'))
                <div class="col-2">
                  <a href="{{ route('printAllCertificate', request('ct')) }}" class="btn btn-primary"><i class="bi bi-printer"></i> Print Semua</a>
                </div>
              @endif
            </div>
            <div class="col-3">
              <form action="" method="GET" class="d-flex align-items-center gap-3"
                onsubmit="event.preventDefault();var currentUrl = window.location.href;if (currentUrl.includes('ct=')) {window.location.href = currentUrl + '&q=' + document.getElementsByName('q')[0].value;}else{this.submit();}">
                <div class="input-group">
                  <input type="search" name="q" class="form-control rounded-start py-2" placeholder="Cari Sertifikat..." value="{{ request('q') }}" />
                </div>
                <button type="submit" class="btn btn-outline-info">
                  <i class="bi bi-search"></i>
                </button>
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
                  <td>
                    <a href="" class="nomor-link">
                      {{ $certificate->nomor }}
                    </a>
                  </td>
                  <td>{{ $certificate->user->name }}</td>
                  <td>{{ $certificate->category->name }}</td>
                  <td class="d-flex gap-2 justify-content-center align-items-center">
                    <form action="{{ route('sendCertificate', $certificate->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send"></i> Kirim
                        </button>
                    </form>
                    <a href="{{ route('getCertificate', $certificate->id) }}" target="_blank" class="btn btn-info"><i class="bi bi-printer"></i> Print</a>
                    <a href="{{ route('certificate.create_detail', $certificate->id) }}" class="btn btn-success"><i class="bi bi-plus"></i> Detail</a>
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
