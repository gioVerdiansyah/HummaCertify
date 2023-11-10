@extends('layouts.nav-user')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Profile</title>
  <link rel="stylesheet" href="{{ asset('css/user/load-image.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
  <div class="container-profile">
    {{-- Kiri --}}
    <div class="kiri">
      <div class="card">
        <h3 class="profile-title mb-4">Profile</h3>
        <div class="form-detail">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="input-height form-control" id="nama" value="{{ $user->name }}" placeholder="{{ $user->name }}" readonly>
          </div>
          <form action="{{ route('update.email') }}" method="POST" class="form-detail  emailForm">
            @csrf
            @method('PATCH')
            <div class="input-button">
              <div class="mb-3 button-width">
                <div class="input-email">
                  <label for="email" class="form-label">Email</label>
                  <div class="d-flex gap-3">
                    <input type="email" name="email" id="email" class="input-height form-control" placeholder="Anda belum mendaftarkan email." value="{{ $user->email }}">
                    <button tyJpe="submit" class="btn btn-sm btn-primary"><img src="{{ asset('image/pencil-regular-24.png') }}"></i></button>
                  </div>
                  @error('email')
                    <p class="invalid mt-2 text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>
          </form>
          <div class="mb-3">
            <label for="nik" class="form-label">Nisn/Nik/Nip</label>
            <input type="number" class="input-height form-control" id="nik" placeholder="{{ $user->nomor_induk }}" value="{{ $user->nomor_induk }}" readonly>
          </div>
          <div class="mb-3">
            <label for="institusi" class="form-label">Institusi</label>
            <input type="text" class="input-height form-control" id="institusi" placeholder="{{ $user->institusi }}" value="{{ $user->institusi }}" readonly>
          </div>
        </div>
        <div class="mb-3">
          <hr class="line-spacer">
        </div>
        <h3 class="profile-title mb-4">Ganti password</h3>
        <form action="{{ route('update.password') }}" method="POST" class="form-detail">
          @csrf
          @method('PATCH')
          <div class="mb-3">
            <label for="oldPassword" class="form-label flex-label">
              <p>Password Lama</p><p> default Nis, Nisn, Nik</p>
            </label>
            <input type="password" class="input-height form-control" id="passwordOne" name="oldPassword" placeholder="Password lama" required>
            <div style="display: none" id="eyeShow" class="eye">
              <div class="icon" id="icon">
                <i class="fa-regular fa-eye" id="show" style="display: block"></i>
                <i class="fa-regular fa-eye-slash" id="hide" style="display: none"></i>
              </div>
            </div>
            @error('oldPassword')
              <p class="invalid mt-2 text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">Password Baru</label>
            <input type="password" class="input-height form-control" id="passwordTwo" name="newPassword" placeholder="Password baru" required>
            <div style="display: none" id="eyeShow2" class="eye2">
              <div class="icon2" id="icon2">
                <i class="fa-regular fa-eye" id="show2" style="display: block"></i>
                <i class="fa-regular fa-eye-slash" id="hide2" style="display: none"></i>
              </div>
            </div>
            @error('newPassword')
              <p class="invalid mt-2 text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <label for="confirmPassword" class="form-label">Konfirmasi password</label>
            <input type="password" class="input-height form-control" id="passwordThree" name="confirmPassword" placeholder="Konfirmasi password" required>
            <div style="display: none" id="eyeShow3" class="eye3">
              <div class="icon3" id="icon3">
                <i class="fa-regular fa-eye" id="show3" style="display: block"></i>
                <i class="fa-regular fa-eye-slash" id="hide3" style="display: none"></i>
              </div>
            </div>
            @error('confirmPassword')
              <p class="invalid mt-2 text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-3">
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
            <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
            </div>
            @error('g-recaptcha-response')
              <p class="text-danger mt-2">reCAPTCHA wajib diisi!</p>
            @enderror
          </div>
          <div class="mb-3 d-flex flex-row align-items-center gap-3 bottom-button">
            <button type="submit" class="btn btn-primary">Ganti Password</button>
            <div class="lupa-password">
              <a href="{{ route('password.request') }}">Lupa password?</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    {{-- Kanan --}}
    <div class="kanan">
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
      <div class="card card-sertifikat-show">
        <div class="mb-3">
          <h3 class="profile-title">Terbaru</h3>
        </div>
        <div class="certificate">
          <div class="dark" id="hover" data-bs-toggle="modal" data-bs-target="#detailModal">
            <h1 style="text-align: center">Klik untuk melihat ukuran penuh</h1>
          </div>
          <div style="left: 35%; top: 30%;" id="load-detail" class="image-item"></div>
          <canvas id="pdfCanvas" class="image-item"></canvas>
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
  <script src="{{ asset('js/profile.js') }}"></script>
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
