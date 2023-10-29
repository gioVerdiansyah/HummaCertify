@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/user/load-image.css') }}">
  <div class="pembungkus-profile">
    <div class="bababoi">
      <div class="row" style="width: 100%; height: 92vh; padding: 0; margin: 0">
        <div class="col-md-8 p-0">
          <div class="card card-profile p-4"
            style="height: 100%; border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
            <h3 class="profile-title mb-4">Profile</h3>
            <form action="" class="form-detail">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="{{ $user->name }}" readonly>
              </div>
              <div class="input-group mb-5 flex-column">
                <label for="email" class="form-label">Email</label>
                <div class="d-flex mb-2">
                  <input type="" id="email" style="position: absolute;" class="form-control rounded-start py-2"
                    placeholder="{{ $user->email }}" value="">
                  <button type="submit" class="btn btn-primary btn-sm"><i class="fi fi-rr-pencil"></i></button>
                </div>
              </div>
              <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="number" class="form-control" id="nik" placeholder="{{ $user->password }}" readonly>
              </div>
              <div class="mb-3">
                <label for="institusi" class="form-label">Institusi</label>
                <input type="text" class="form-control" id="institusi" placeholder="{{ $user->institusi }}" readonly>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-4 p-0">
          <div class="card card-sertifikat-user" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
            <div class="card-body d-flex align-items-center">
              <div class="d-flex position-relative align-items-center">
                <div class="content flex-shrink-0 me-3 avatar-xl rounded d-flex justify-content-center align-items-center"
                  style="background-color: rgba(41, 186, 219, 23%);">
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
          <div class="card card-sertifikat-show p-4"
            style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
            <div class="mb-3">
              <h3 class="profile-title">Terbaru</h3>
            </div>
            <div class="certificate" data-bs-toggle="modal" data-bs-target="#fullscreenModal" style="height: 286px">
              <div class="dark">
                <p>Klik untuk melihat ukuran penuh</p>
              </div>
              <div id="load" style="top: 35%;left: 35%;"></div>
              <canvas id="pdfCanvas"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="fullscreeexampleModalLabel">Setifikat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <iframe id="ifram" src="{{ route('downloadCertificate', $certificate->id) }}" frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"
    integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var canvas = document.getElementById('pdfCanvas');
    var context = canvas.getContext('2d');
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
        var loadingElement = document.getElementById('load');
        if (loadingElement) {
          loadingElement.remove();
        }

        imageHover.style.visibility = 'visible';
      });
    }).catch(function(error) {
      console.error('Gagal memproses PDF: ' + error);
    });
  </script>
@endsection
