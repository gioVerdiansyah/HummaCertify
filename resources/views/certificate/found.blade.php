@extends('layouts.nav-user')

@section('content')
  <link rel="stylesheet" href="{{ asset('css/user/detail.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"
    integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <div class="content-container">
    <div class="content-top">
      <div class="left-side">
        <div class="image-container">
          <div id="load" class="image-item"></div>
          <canvas id="pdfCanvas" class="image-item"></canvas>
        </div>
      </div>
      <div class="right-side">
        <div class="right-content">
          <div>
            <p class="header">Detail Sertifikat</p>
          </div>
          <div class="main-detail">
            <div class="left-detail">
              <div class="mt-3">
                <h4 class="label-header">Nama :</h4>
                <p class="label-item">{{ $certificate->user->name }}</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Asal Sekolah :</h4>
                <p class="label-item">{{ $certificate->user->institusi }}</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Nomor Srtifikat :</h4>
                <p class="label-item">{{ $certificate->nomor }}</p>
              </div>
            </div>
            <div class="right-detail">
              <div class="mt-3">
                <h4 class="label-header">Di buat oleh :</h4>
                <p class="label-item">Hummatech</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Jenis Sertifikat :</h4>
                <p class="label-item">Sertifikat {{ $certificate->category->name }}</p>
              </div>
              <div class="mt-3">
                <h4 class="label-header">Di cetak pada :</h4>
                <p class="label-item">{{ \Carbon\Carbon::parse($certificate->created_at)->format('d-m-Y') }}</p>
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
              <th class="left-th text-center">No.</th>
              <th class="center-th">Materi </th>
              <th class="right-th text-center">Waktu</th>
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
                  <td></td>
                  <td class="text-center">Total</td>
                  <td class="text-center">{{ $totalJP }} JP</td>
                </tr>
              @endif
            @endisset
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"
    integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    var canvas = document.getElementById('pdfCanvas');
    var context = canvas.getContext('2d');

    var pdfUrl = "{{ asset('../storage/sertifikat/' . $certificate->id . '.pdf') }}";

    pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc) {
      return pdfDoc.getPage(1);
    }).then(function(page) {
      var scale = 1.5; // Ukuran tampilan gambar
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
        var loadingElement = document.getElementById('load');
        if (loadingElement) {
          loadingElement.remove();
        }
      });
    }).catch(function(error) {
      console.error('Gagal memproses PDF: ' + error);
    });
  </script>

@endsection
