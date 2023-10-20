@extends('layouts.nav-admin')

@section('content')
  @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
  @endforeach
  <link rel="stylesheet" href="{{ asset('css/admin/AdminAdd.css') }}">
  <div class="tambah-container">
    <div class="tambah-container-body">
      <div class="card-body">
        <form action="{{ route('certificate.store_detail', ['id' => $certificate->id]) }}" method="post">
          @csrf
          <div class="repeater">
            <div data-repeater-list="category-group" class="row g-3">
              <div data-repeater-item>
                <div class="row">
                  <div class="col-xxl-6 mb-2">
                    <div>
                      <label for="unknown" class="form-label">Materi</label>
                      <input type="text" class="form-control" placeholder="materi" name="materi" value="" required>
                    </div>
                  </div>
                  <div class="col-xxl-5 mb-2">
                    <div>
                      <label for="unknown" class="form-label">Jam Pelajaran</label>
                      <input type="number" class="form-control" name="jam_pelajaran" id="jamPelajaran" placeholder="Jam Pelajaran" required>
                    </div>
                  </div>
                  <div class="col-xxl-1 mb-3" style="margin-top: 28px">
                    <input class="btn btn-danger" data-repeater-delete type="button" value="Delete" />
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-4">
                <label for="" class="form-label">Predikat</label>
                <select name="predikat" class="form-select" required>
                    <option disabled selected>--Pilih Predikat--</option>
                    <option value="Sangat Baik" {{ old('predikat') == "Sangat Baik" ? "selected" : '' }}>Sangat Baik</option>
                    <option value="Baik" {{ old('predikat') == "Baik" ? "selected" : '' }}>Baik</option>
                    <option value="Cukup" {{ old('predikat') == "Cukup" ? "selected" : '' }}>Cukup</option>
                    <option value="Kurang" {{ old('predikat') == "Kurang" ? "selected" : '' }}>Kurang</option>
                </select>
            </div>
            <div class="hstack gap-2 justify-content-end">
              <input class="btn btn-success" data-repeater-create type="button" value="+ Add" />
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
      </div>
    </div>
    <script src="{{ asset('assets/js/formRepeater.js') }}"></script>
  </div>
  </div>
@endsection
