@extends('layouts.nav-admin')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/admincategory.css') }}">
    <div class="col-12 mb-4">
        <button class="btn btn-primary m-0 d-flex gap-1">Tambah Kategori <i class="ri-add-line d-flex align-items-center"></i></button>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('image/certificate-bg.png') }}" class="ukuran" alt="">

                    <div class="d-flex mt-3">
                        <span class="ukuran">jskh</span>
                        <div class="d-flex">
                            <button ><i class="bx bx-edit d-flex align-items-center fs-5 text-info"></i></button>
                            <button ><i class="las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- contoh saja --}}
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('image/certificate-bg.png') }}" class="ukuran" alt="">

                    <div class="d-flex mt-3">
                        <span class="ukuran">jskh</span>
                        <div class="d-flex">
                            <button ><i class="bx bx-edit d-flex align-items-center fs-5 text-info"></i></button>
                            <button ><i class="las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('image/certificate-bg.png') }}" class="ukuran" alt="">

                    <div class="d-flex mt-3">
                        <span class="ukuran">jskh</span>
                        <div class="d-flex">
                            <button ><i class="bx bx-edit d-flex align-items-center fs-5 text-info"></i></button>
                            <button ><i class="las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('image/certificate-bg.png') }}" class="ukuran" alt="">

                    <div class="d-flex mt-3">
                        <span class="ukuran">jskh</span>
                        <div class="d-flex">
                            <button ><i class="bx bx-edit d-flex align-items-center fs-5 text-info"></i></button>
                            <button ><i class="las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('image/certificate-bg.png') }}" class="ukuran" alt="">

                    <div class="d-flex mt-3">
                        <span class="ukuran">jskh</span>
                        <div class="d-flex">
                            <button ><i class="bx bx-edit d-flex align-items-center fs-5 text-info"></i></button>
                            <button ><i class="las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
