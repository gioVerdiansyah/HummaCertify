@extends('layouts.nav-admin')
@section('content')
  <link rel="stylesheet" href="{{ asset('css/admin/admincategory.css') }}">
  <div class="col-2 mb-4">
    <a href="{{ route('category.create') }}" class="btn btn-primary m-0 d-flex gap-1">Tambah Kategori <i class="ri-add-line d-flex align-items-center"></i></a>
  </div>
  <div class="row">
    @foreach ($categories as $category)
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <a href="javascript: void(0);" class="image-container">
              <img src="{{ asset($category->background_depan) }}" class="ukuran gmr" alt="Background {{ $category->name }}">
              <div class="image-hover fs-1" data-bs-toggle="modal" data-bs-target="#penuh{{ $category->id }}">
                <h5 class="hover-animate"><i class="ri-zoom-in-line"></i></h5>
              </div>
            </a>
            <div class="modal fade" id="penuh{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <button type="button" class="btn-close btn-close-white custom" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body">
                    <img src="{{ asset($category->background_depan) }}" class="ukuran" alt="">
                    <img src="{{ asset($category->background_belakang) }}" class="ukuran" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mt-3">
              <span class="ukuran">{{ $category->name }}</span>
              @if(!in_array($category->name, ["Kelulusan", "Pelatihan", "Kompetensi"]))
              <div class="d-flex action">
                <a href="{{ route('category.edit', $category->id) }}"><i class="bx bx-edit d-flex align-items-center fs-5 text-info"></i></a>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button"><i class="las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                </form>
            	</div>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <script>
    document.querySelectorAll('.delete-form').forEach(function(form) {
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Tindakan ini tidak dapat dibatalkan",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Lanjutkan",
            cancelButtonText: "Batal",
            background: 'var(--bs-body-bg)',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
  });
  </script>
@endsection
