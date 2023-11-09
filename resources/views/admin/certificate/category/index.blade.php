@extends('layouts.nav-admin')
@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Background Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/admin/admincategory.css') }}">
  <div class="mb-3 d-flex justify-content-between w-100">
    <div>
      <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Kategori <i class="ri-add-line"></i></a>
    </div>
    <div class="w-20">
      <select name="restore" class="form-select" id="restoreSelect">
        <option value="allCategory" {{ request('restore') == 'allCategory' ? 'selected' : '' }}>Semua</option>
        <option value="restoreCategory" {{ request('restore') == 'restoreCategory' ? 'selected' : '' }}>Restore</option>
      </select>
    </div>
  </div>
  <div class="row">
    @forelse ($categories as $category)
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="image-container">
              <img src="{{ asset($category->background_depan) }}" class="ukuran gmr"
                alt="Background {{ $category->name }}">
              <div class="image-hover fs-1" data-bs-toggle="modal" data-bs-target="#penuh{{ $category->id }}">
                <h5 class="hover-animate"><i class="ri-zoom-in-line"></i></h5>
              </div>
            </div>
            <div class="modal fade" id="penuh{{ $category->id }}" tabindex="-1" role="dialog"
              aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                  <button type="button" class="btn-close btn-close-white custom" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                  <div class="modal-body">
                    <img src="{{ asset($category->background_depan) }}" class="ukuran mb-5" alt="">
                    <img src="{{ asset($category->background_belakang) }}" class="ukuran" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mt-3">
              <span id="nameKategori{{ $category->id }}" class="ukuran">{{ $category->name }}</span>
              @if (!in_array($category->name, $exceptCategory))
                <div class="d-flex action">
                  @if (!in_array($category->id, $exceptCategory) && !isset($category->deleted_at))
                    <a href="{{ route('category.edit', $category->id) }}"><i
                        class="bx bx-edit d-flex align-items-center fs-5 text-info p-1"></i></a>
                  @endif
                  @if (!isset($category->deleted_at))
                  <form nameKategori = "{{ $category->name }}" action="{{ route('category.destroy', $category->id) }}"
                    method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i
                        class="delete-icon las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                  </form>
                  @else
                    <form nameKategori = "{{ $category->name }}" action="{{ route('category.restore', $category->id) }}"
                    method="POST" class="restore">
                      @csrf
                      @method('PATCH')
                      <button type="submit"><i class="fi fi-ss-time-past d-flex align-items-center fs-5 text-success"></i></button>
                    </form>

                    @if (!$category->certificates->isNotEmpty())
                    <form nameKategori = "{{ $category->name }}" action="{{ route('category.force_delete', $category->id) }}"
                    method="POST" class="force-delete-form">
                      @csrf
                      @method('DELETE')
                      <button type="submit"><i class="delete-icon las la-trash-alt d-flex align-items-center fs-4 text-danger"></i></button>
                    </form>
                    @endif
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="d-flex nr-tengah">
          <img src="{{ asset('image/norestore.png') }}" alt="">
          <h2 class="uk">Tidak Ada Data Untuk di Restore</h2>
      </div>
    @endforelse
  </div>
  <div>
    {{ $categories->links('layouts.pagination') }}
  </div>
  <script>
    document.getElementById('restoreSelect').addEventListener('change', function() {
    var restoreValue = this.value;
    var currentUrl = window.location.href;
    var newUrl;

    if (restoreValue === "allCategory") {
        newUrl = currentUrl.replace(/[\?&]restore=[^&]*/, '');
    } else {
        var restoreParam = 'restore=' + restoreValue;
        if (currentUrl.includes('restore=')) {
            newUrl = currentUrl.replace(/(restore=[^&]*)/, restoreParam);
        } else {
            if (currentUrl.includes('?')) {
                newUrl = currentUrl + '&' + restoreParam;
            } else {
                newUrl = currentUrl + '?' + restoreParam;
            }
        }
    }

    window.location.href = newUrl;
});

  if(document.querySelectorAll('.restore').length > 0){
    document.querySelectorAll('.restore').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var namekategori = form.getAttribute('nameKategori');
        Swal.fire({
          title: 'apakah anda yakin?',
          text: "Ingin mengembalikan kategori '" + namekategori + "'?",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "ya, kembalikan!",
          cancelButtonText: "batal",
          background: 'var(--bs-body-bg)',
        }).then((result) => {
          if (result.isConfirmed) {
            form.submit();
          }
        });
      });
    });
  }
  if(document.querySelectorAll('.force-delete-form').length > 0){
    document.querySelectorAll('.force-delete-form').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();
        var namekategori = form.getAttribute('nameKategori');
        Swal.fire({
          title: 'apakah anda yakin?',
          text: "Ingin menghapus kategori '" + namekategori + "' secara permanen?",
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
  }
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
