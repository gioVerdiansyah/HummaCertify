@extends('layouts.nav-user')

@section('content')
  <title>Detail Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/user/detail.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user/load-image.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"
    integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <div class="content-container">
    <div class="content-top">
      <div class="left-side">
        <a href="javascript: void(0);" class="image-container" id="certificate-container">
          <div class="load-container">
            <div id="loaddetailfound" class="image-item"></div>
          </div>
          <canvas id="pdfCanvas" class="image-item"></canvas>
          <div class="image-hover" onclick="openModal()">
            <h1 class="hover-animate">Klik untuk melihat ukuran penuh</h1>
          </div>
        </a>
      </div>
      <div class="right-side">
        <div class="right-content">
          <div>
            <h4 class="header">Detail Sertifikat</h4>
          </div>
          <div class="main-detail">
            <div class="left-detail">
              <div class="mt-3">
                <h4 class="label-header">Nama :</h4>
                <h4 class="label-item">{{ $certificate->user->name }}</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Asal Sekolah :</h4>
                <h4 class="label-item">{{ $certificate->user->institusi }}</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Nomor Sertifikat :</h4>
                <h4 class="label-item">{{ $certificate->nomor }}</h4>
              </div>
            </div>
            <div class="right-detail">
              <div class="mt-3">
                <h4 class="label-header">Di buat oleh :</h4>
                <h4 class="label-item">Hummatech</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Jenis Sertifikat :</h4>
                <h4 class="label-item">Sertifikat {{ $certificate->category->name }}</h4>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Di cetak pada :</h4>
                <h4 class="label-item">{{ \Carbon\Carbon::parse($certificate->created_at)->locale('id')->isoFormat('D MMMM Y') }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-bottom">
      <div class="table-background">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="table-header-color left-th text-center">No.</th>
              <th class="table-header-color text-center">Materi </th>
              <th class="table-header-color right-th text-center">Waktu</th>
            </tr>
          </thead>
          @php
            $totalJP = 0;
          @endphp
          <tbody>
            @forelse ($certificate->detailCertificates as $i => $detail)
              <tr>
                <td class="text-center">{{ ++$i }}.</td>
                <td>{{ $detail->materi }}</td>
                <td class="text-center">{{ $detail->jp }} JP</td>
                @php
                  $totalJP += $detail->jp;
                @endphp
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">
                  Data sertifikat tidak ada...
                </td>
              </tr>
            @endforelse
            @isset($certificate->detailCertificates)
              @if (count($certificate->detailCertificates) > 1)
                <tr>
                  <td colspan="2" class="table-header-color text-center">Total</td>
                  <td class="table-header-color text-center">{{ $totalJP }} JP</td>
                </tr>
              @endif
              <tr>
                <td colspan="3" class="text-left">Nama Instruktur : {{ $certificate->instruktur }}</td>
              </tr>
            @endisset
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Modal --}}
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
  {{-- End Modal --}}
  @if (session('message'))
    <script>
      Swal.fire({
        icon: "{{ session('message')['icon'] ?? 'success' }}",
        title: "{{ session('message')['title'] ?? 'Oops' }}",
        text: "{{ session('message')['text'] ?? 'Success' }}",
      })
    </script>
  @endif
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"
    integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var canvas = document.getElementById('pdfCanvas');
    var context = canvas.getContext('2d');
    var imageHover = document.querySelector('.image-hover');

    var pdfUrl = "/storage/sertifikat/{{ $certificate->id . '.pdf' }}";

    function openModal(){
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            window.location.href = pdfUrl;
        }

      var modalCert = new bootstrap.Modal(document.getElementById('detailModal'));
      modalCert.show();
    }

    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc) {
      return pdfDoc.getPage(1);
    }).then(function(page) {
      var scale = 1.5;
      var viewport = page.getViewport({
        scale: scale
      });

      canvas.height = viewport.height;
      canvas.width = viewport.width;

      var renderContext = {
        canvasContext: context,
        viewport: viewport
      };

      return page.render(renderContext).promise.then(function() {
        var loadingElement = document.getElementById('loaddetailfound');
        if (loadingElement) {
          loadingElement.remove();
        }

        imageHover.style.visibility = 'visible';
        imageHover.style.cursor = 'pointer';
      });
    }).catch(function(error) {
      Swal.fire({
        icon: 'error',
        title: 'Tidak ditemukan!',
        text: 'File Sertifikat tidak ditemukan, hubungi developer untuk informasi lebih lanjut.',
        background: 'var(--bs-body-bg)',
      });
      var certificateContainer = document.getElementById('certificate-container');

      var newParagraph = document.createElement('p');
      newParagraph.textContent = 'File PDF tidak ditemukan.';

      certificateContainer.innerHTML = '';
      certificateContainer.appendChild(newParagraph);
      console.error('Gagal memproses PDF: ' + error);
    });
  </script>

@endsection
