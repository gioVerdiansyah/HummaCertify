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
                                <div class="col-xxl-12 mb-2">
                                    <div>
                                        <label for="unknown" class="form-label">Materi</label>
                                        <input type="text" class="form-control" placeholder="Materi" name="materi"
                                            value="">
                                    </div>
                                </div>
                                <div class="col-xxl-12 mb-2">
                                    <div>
                                        <label for="unknown" class="form-label">Jam Pelajaran</label>
                                        <input type="number" class="form-control" name="jam_pelajaran"
                                            id="jamPelajaran" placeholder="Jam Pelajaran">
                                    </div>
                                    <input data-repeater-delete type="button" value="Delete" />
                                </div>
                            </div>
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <input data-repeater-create type="button" value="Add" />
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                    </div>
				</div>
			<script src="{{ asset('assets/js/formRepeater.js') }}"></script>
        </div>
    </div>
@endsection
