@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Background Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/admin/admincategory.css') }}">
  <div class="mb-3">
    <a href="{{ route('category.create') }}" class="btn btn-primary ">Tambah Kategori <i class="ri-add-line align-items-center"></i></a>
  </div>
  <div class="row">
    @foreach ($categories as $category)
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="image-container">
              <img src="{{ asset($category->background_depan) }}" class="ukuran gmr" alt="Background {{ $category->name }}">
              <div class="image-hover fs-1" data-bs-toggle="modal" data-bs-target="#penuh{{ $category->id }}">
                <h5 class="hover-animate"><i class="ri-zoom-in-line"></i></h5>
              </div>
            </div>
            <div class="modal fade" id="penuh{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <button type="button" class="btn-close btn-close-white custom" data-bs-dismiss="modal" aria-label="Close"></button>
                  <div class="modal-body">
                    <img src="{{ asset($category->background_depan) }}" class="ukuran mb-5" alt="">
                    <img src="{{ asset($category->background_belakang) }}" class="ukuran" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mt-3">
              <span id="nameKategori{{ $category->id }}" class="ukuran">{{ $category->name }}</span>
              @if (!in_array($category->name, ['Kelulusan', 'Pelatihan', 'Kompetensi']))
                <div class="d-flex action">
                  @if (!in_array($category->id, $exist))
                    <a href="{{ route('category.edit', $category->id) }}"><i class="bx bx-edit d-flex align-items-center fs-5 text-info p-1"></i></a>
                  @endif
                  <form nameKategori = "{{ $category->name }}" action="{{ route('category.destroy', $category->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" id="delete-kategori"><i class="delete-icon las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                  </form>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div>
    {{ $categories->links('layouts.pagination') }}
  </div>
  <script>
    document.querySelectorAll('.delete-form').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var namekategori = form.getAttribute('nameKategori');
        Swal.fire({
          title: 'apakah anda yakin?',
          text: "Ingin menghapus kategori '" + namekategori + "'?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "ya, hapus!",
          cancelButtonText: "batal",
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
