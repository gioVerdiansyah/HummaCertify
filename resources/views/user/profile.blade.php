@extends('layouts.nav-user')

@section('content')
<title>{{ config('app.name', 'Laravel') }} - Profile</title>
  <link rel="stylesheet" href="{{ asset('css/user/load-image.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
  <div class="pembungkus-profile">
    <div class="bababoi">
      <div class="row papope" style="width: 100%; height: 92vh; margin: 0">
        <div class="col-md-12 col-lg-8 p-0">
          <div class="card card-profile" style="height: 100%; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
            <h3 class="profile-title mb-4">Profile</h3>
            <form action="{{ route('update.email') }}" method="POST" class="form-detail  emailForm">
              @csrf
              @method('PATCH')
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="input-height form-control" id="nama" placeholder="{{ $user->name }}" readonly>
              </div>
              <div class="input-button">
                <div class="mb-3 button-width">
                  <div class="input-email">
                    <label for="email" class="form-label">Email</label>
                    <div class="d-flex gap-3">
                      <input type="email" name="email" id="email" class="input-height form-control" placeholder="{{ $user->email }}" value="{{ $user->email }}">
                      <button tyJpe="submit" class="btn btn-primary"><i class="fi fi-rr-pencil pencil-icon"></i></button>
                    </div>
                    @error('email')
                      <p class="invalid mt-2 text-danger">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">Nisn/Nik/Nip</label>
                <input type="number" class="input-height form-control" id="nik" placeholder="{{ $user->nomor_induk }}" readonly>
              </div>
              <div class="mb-3">
                <label for="institusi" class="form-label">Institusi</label>
                <input type="text" class="input-height form-control" id="institusi" placeholder="{{ $user->institusi }}" readonly>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-12 col-lg-4 p-0 total-sertificate">
          <div class="card card-sertifikat-user" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
            <div class="card-body d-flex align-items-center">
              <div class="d-flex position-relative align-items-center">
                <div class="content flex-shrink-0 me-3 avatar-xl rounded d-flex justify-content-center align-items-center" style="background-color: rgba(41, 186, 219, 23%);">
                  <img src="{{ asset('image/certificate-vector.png') }}" style="width: 60px; height: auto" alt="">
                </div>
                <div class="text">
                  <h5 class="text-atas" style="pointer-events: none">Sertifikat</h5>
                  <p class="angka" style="pointer-events: none">{{ count($user->certificates) }}</p>
                  <p class="text-bawah" style="pointer-events: none">Total Sertifikat</p>
                </div>
              </div>
            </div>
          </div>
          <div class="line-breaker"></div>
          <div class="card card-sertifikat-show p-4" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px; margin: 2px 2px">
            <div class="mb-3">
              <h3 class="profile-title">Terbaru</h3>
            </div>
            <div class="certificate">
              <div class="dark" id="hover" data-bs-toggle="modal" data-bs-target="#detailModal">
                <h1>Klik untuk melihat ukuran penuh</h1>
              </div>
              <div style="left: 35%; top: 30%;" id="load-detail" class="image-item"></div>
              <canvas id="pdfCanvas" class="image-item"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <button type="button" class="btn-close x-button" data-bs-dismiss="modal" aria-label="Close">
          <box-icon name='x' class="x-button-icon" size="lg"></box-icon>
        </button>
        <div class="modal-body">
          <iframe id="ifram" src="{{ route('downloadCertificate', $certificate->id) }}" frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </div>
  @if (session('message'))
    <script>
      Swal.fire({
        icon: "{{ session('message')['icon'] ?? 'success' }}",
        title: "{{ session('message')['title'] ?? 'Oops' }}",
        text: "{{ session('message')['text'] ?? 'Success' }}",
        background: 'var(--bs-body-bg)',
      })
    </script>
  @endif
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var canvas = document.getElementById('pdfCanvas');
    var context = canvas.getContext('2d');
    var hover = document.getElementById('hover');
    var imageHover = document.querySelector('.image-hover');

    var pdfUrl = "/storage/sertifikat/{{ $certificate->id . '.pdf' }}";

    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc) {
      return pdfDoc.getPage(1);
    }).then(function(page) {
      var viewport = page.getViewport({
        scale: 1
      });

      var newWidth = 405;
      var newHeight = (viewport.height / viewport.width) * newWidth;

      canvas.width = newWidth;
      canvas.height = newHeight;

      var renderContext = {
        canvasContext: context,
        viewport: page.getViewport({
          scale: newWidth / viewport.width
        })
      };

      return page.render(renderContext).promise.then(function() {
        var loadingElement = document.getElementById('load-detail');
        if (loadingElement) {
          loadingElement.remove();

        }

        hover.style.display = 'flex';
      });
    }).catch(function(error) {
      console.error('Gagal memproses PDF: ' + error);
    });
  </script>

  <script>
    document.querySelectorAll('.emailForm').forEach(function(form) {
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Ingin mengubah email anda? pastikan email baru milik anda dan juga adalah email asli",
          icon: "question",
          showCancelButton: true,
          confirmButtonText: "lanjutkan",
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
