@extends('layouts.nav-user')

@section('content')
  <title>{{ config('app.name', 'Laravel') }} - Sertifikat</title>
  <link rel="stylesheet" href="{{ asset('css/user/sertifikat.css') }}">
  <link rel="stylesheet" href="{{ asset('css/user/load-image.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js" integrity="sha512-Z8CqofpIcnJN80feS2uccz+pXWgZzeKxDsDNMD/dJ6997/LSRY+W4NmEt9acwR+Gt9OHN0kkI1CTianCwoqcjQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function generateCertificate(id, canvasId = null) {
      let idCert = id;
      if (canvasId) {
        idCert = canvasId;
      }
      var canvas = document.getElementById(idCert);
      var context = canvas.getContext('2d');

      var pdfUrl = "/storage/sertifikat/" + id + '.pdf';

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
          var loadingElement = document.getElementById('load-' + idCert);
          var imageHoverElement = document.querySelectorAll('.image-hover-' + idCert);
          if (loadingElement) {
            loadingElement.remove();
            imageHoverElement.forEach(function(loadingElement) {
              loadingElement.style.visibility = 'visible';
            });
          }
        });
      }).catch(function(error) {
        document.getElementById('load-' + idCert).remove();
        canvas.classList.add('pdf-error');
        console.error('Gagal memproses PDF: ' + error);

        // Ganti elemen canvas menjadi elemen <p>
        var pElement = document.createElement('p');
        pElement.textContent = 'File PDF tidak ditemukan.';
        canvas.parentNode.replaceChild(pElement, canvas);
      });
    }

    function openModal(certificateId) {
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            window.location.href = "/storage/sertifikat/" + certificateId + '.pdf';
        }
      var iframe = document.getElementById('ifram');
      iframe.src = "/certificate/" + certificateId + "/view";

      var modalCert = new bootstrap.Modal(document.getElementById('detailModal'));
      modalCert.show();
    }
  </script>
  <div class="content-container">
    <div class="content-background">
      <div class="content-main">
        <div class="content-item">
          <div class="tabs">

            <input type="radio" id="tab1" name="tab-control" checked>
            <input type="radio" id="tab2" name="tab-control">
            <input type="radio" id="tab3" name="tab-control">
            <input type="radio" id="tab4" name="tab-control">

            <ul>
              <li title="Semua Sertifikat">
                <label for="tab1" role="button">
                  <i class="bx bx-category fs-4 global-icon icon-style-1"></i>
                  <br>
                  <span>Semua</span>
                </label>
              </li>
              <li title="Sertifikat Kelulusan Magang">
                <label for="tab2" role="button">
                  <i class="fas fa-graduation-cap global-icon icon-style-2"></i>
                  <br>
                  <span>Kelulusan</span>
                </label>
              </li>
              <li title="Sertifikat Kompetensi">
                <label for="tab3" role="button">
                  <i class="fa-solid fa-book-bookmark global-icon icon-style-3"></i>
                  <br>
                  <span>Kompetensi</span>
                </label>
              </li>
              <li title="Sertifikat Pelatihan">
                <label for="tab4" role="button">
                  <i class="fa-solid fa-chalkboard-user global-icon icon-style-4"></i>
                  <br>
                  <span>Pelatihan</span>
                </label>
              </li>
            </ul>

            <div class="slider">
              <div class="indicator"></div>
            </div>
            <div class="content">
              <section>
                <h2 class="mb-5">Semua</h2>
                <div class="row">
                  @forelse ($certificates as $certificate)
                    <div class="col-md-4 mb-4">
                      <a href="javascript: void(0);" class="image-container" id="certificate-container">
                        <div id="load-{{ $certificate->id }}" class="image-load"></div>
                        <canvas id="{{ $certificate->id }}" class="image-item"></canvas>
                        <div class="image-hover-{{ $certificate->id }}" onclick="openModal('{{ $certificate->id }}')">
                          <h1 class="hover-animate">Klik untuk melihat ukuran penuh</h1>
                        </div>
                      </a>
                    </div>
                    <script>
                      generateCertificate("{{ $certificate->id }}");
                    </script>
                  @empty
                    <h6 class="text-center empty">Anda tidak memiliki sertifikat</h6>
                  @endforelse
                </div>
              </section>
              <section>
                <h2 class="mb-5">Kelulusan</h2>
                @php
                  $tidakMemiliki = true;
                @endphp
                <div class="row">
                  @foreach ($certificates as $certificate)
                    @if ($certificate->certificate_categori_id == 1 || $certificate->category->tata_letak === "Kelulusan")
                      <div class="col-md-4 mb-4">
                        <a href="javascript: void(0);" class="image-container" id="certificate-container">
                          <div id="load-kelulusan-{{ $certificate->id }}" class="image-item"></div>
                          <canvas id="kelulusan-{{ $certificate->id }}" class="image-item"></canvas>
                          <div class="image-hover-kelulusan-{{ $certificate->id }}" onclick="openModal('{{ $certificate->id }}')">
                            <h1 class="hover-animate">Klik untuk melihat ukuran penuh</h1>
                          </div>
                        </a>
                      </div>
                      <script>
                        generateCertificate("{{ $certificate->id }}", "kelulusan-{{ $certificate->id }}");
                      </script>
                      @php
                      	$tidakMemiliki = false;
                      @endphp
                    @endif
                  @endforeach

                  @if ($tidakMemiliki)
                    <h6 class="text-center empty">Anda tidak memiliki sertifikat kelulusan...</h6>
                  @endif
                </div>
              </section>
              <section>
                <h2 class="mb-5">Kompetensi</h2>
                @php
                    $tidakMemiliki = true;
                @endphp
                <div class="row">
                  @foreach ($certificates as $certificate)
                    @if ($certificate->certificate_categori_id == 3 || $certificate->category->tata_letak === "Kompetensi")
                      <div class="col-md-4 mb-4">
                        <a href="javascript: void(0);" class="image-container" id="certificate-container">
                          <div id="load-kompetensi-{{ $certificate->id }}" class="image-item"></div>
                          <canvas id="kompetensi-{{ $certificate->id }}" class="image-item"></canvas>
                          <div class="image-hover-kompetensi-{{ $certificate->id }}" onclick="openModal('{{ $certificate->id }}')">
                            <h1 class="hover-animate">Klik untuk melihat ukuran penuh</h1>
                          </div>
                        </a>
                      </div>
                      <script>
                        generateCertificate("{{ $certificate->id }}", "kompetensi-{{ $certificate->id }}");
                      </script>
                      @php
                          $tidakMemiliki = false;
                      @endphp
                    @endif
                  @endforeach

                  @if ($tidakMemiliki)
                    <h6 class="text-center empty">Anda tidak memiliki sertifikat Kompetensi...</h6>
                  @endif
                </div>
              </section>
              <section>
                <h2 class="mb-5">Pelatihan</h2>
                @php
                  $tidakMemiliki = true;
                @endphp
                <div class="row">
                  @foreach ($certificates as $certificate)
                    @if ($certificate->certificate_categori_id == 2 || $certificate->category->tata_letak === "Pelatihan")
                      <div class="col-md-4 mb-4">
                        <a href="javascript: void(0);" class="image-container" id="certificate-container">
                          <div id="load-pelatihan-{{ $certificate->id }}" class="image-item load"></div>
                          <canvas id="pelatihan-{{ $certificate->id }}" class="image-item"></canvas>
                          <div class="image-hover-pelatihan-{{ $certificate->id }}" onclick="openModal('{{ $certificate->id }}')">
                            <h1 class="hover-animate">Klik untuk melihat ukuran penuh</h1>
                          </div>
                        </a>
                      </div>
                      <script>
                        generateCertificate("{{ $certificate->id }}", "pelatihan-{{ $certificate->id }}");
                      </script>
                      @php
                          $tidakMemiliki = false;
                      @endphp
                    @endif
                  @endforeach

                  @if ($tidakMemiliki)
                    <h6 class="text-center empty">Anda tidak memiliki sertifikat Pelatihan...</h6>
                  @endif
                </div>
              </section>
            </div>
          </div>
        </div>
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
@endsection
