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
              <li title="Semua Sertifikat"><label for="tab1" role="button"><svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(131, 131, 131, 1);transform: ;msFilter:;">
                    <path
                      d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11-6h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm-1 6h-4V5h4v4zm-9 4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6H5v-4h4v4zm8-6c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z">
                    </path>
                  </svg><br><span>Semua</span></label></li>
              <li title="Sertifikat Kelulusan Magang"><label for="tab2" role="button"><svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(131, 131, 131, 1);transform: ;msFilter:;">
                    <path d="M2 7v1l11 4 9-4V7L11 4z"></path>
                    <path d="M4 11v4.267c0 1.621 4.001 3.893 9 3.734 4-.126 6.586-1.972 7-3.467.024-.089.037-.178.037-.268V11L13 14l-5-1.667v3.213l-1-.364V12l-3-1z">
                    </path>
                  </svg><br><span>Kelulusan</span></label></li>
              <li title="Sertifikat Kompetensi"><label for="tab3" role="button"><svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor"
                    style="fill: rgba(131, 131, 131, 1);transform: ;msFilter:; class="bi bi-person-gear" viewBox="0 0 16 16">
                    <path
                      d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                  </svg><br><span>Kompetensi</span></label></li>
              <li title="Sertifikat Pelatihan"><label for="tab4" role="button"><svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(131, 131, 131, 1);transform: ;msFilter:;">
                    <path d="M20 3H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h4l-1.8 2.4 1.6 1.2 2.7-3.6h3l2.7 3.6 1.6-1.2L16 18h4c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 16V5h16l.001 11H4z">
                    </path>
                    <path d="M6 12h4v2H6z"></path>
                  </svg><br><span>Pelatihan</span></label></li>
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
                <div class="row">
                  @foreach ($certificates as $certificate)
                    @if ($certificate->certificate_categori_id === 1)
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
                    @endif
                  @endforeach

                  @if ($certificates->where('certificate_categori_id', 1)->isEmpty())
                    <h6 class="text-center empty">Anda tidak memiliki sertifikat kelulusan...</h6>
                  @endif
                </div>
              </section>
              <section>
                <h2 class="mb-5">Kompetensi</h2>
                <div class="row">
                  @foreach ($certificates as $certificate)
                    @if ($certificate->certificate_categori_id === 2)
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
                    @endif
                  @endforeach

                  @if ($certificates->where('certificate_categori_id', 2)->isEmpty())
                    <h6 class="text-center empty">Anda tidak memiliki sertifikat Kompetensi...</h6>
                  @endif
                </div>
              </section>
              <section>
                <h2 class="mb-5">Pelatihan</h2>
                <div class="row">
                  @foreach ($certificates as $certificate)
                    @if ($certificate->certificate_categori_id === 3)
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
                    @endif
                  @endforeach

                  @if ($certificates->where('certificate_categori_id', 3)->isEmpty())
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
