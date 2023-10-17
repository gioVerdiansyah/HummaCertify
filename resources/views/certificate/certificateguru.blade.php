<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

  {{-- FONT SIZE --}}
  <link
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet">

  {{-- Import CSS --}}
  <link rel="stylesheet" href="{{ asset('css/certificate/certificate-guru.css') }}">

  {{-- Bootstrap icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- Depan --}}
  <main>
    <div class="image-certificate">
      <img src="{{ asset('image/certificate-guru.png') }}" alt="">
    </div>
    <div class="certificate-guru">
      <div class="content">
        <div class="top-text d-flex">
          <div class="logo me-3">
            <img src="{{ asset('image/logo-circle-humma.png') }}" alt="">
          </div>
          <div class="text">
            <p class="pt-humma">
              PT. Hummatech Digital Indonesia
            </p>
            <p class="alamat">
              Perum Permata Regency 1 Blok 10/28 Karangploso, Kabupaten Malang
            </p>
            <div class="d-flex justify-content-center mt-1" style="gap: 0px 40px">
              <div class="icon"><i class="bi bi-globe me-2"></i>www.hummasoft.com</div>
              <div class="icon"><i class="bi bi-envelope-fill me-2"></i>info@hummasoft.com</div>
              <div class="icon"><i class="bi bi-telephone-fill me-2"></i>082132560566</div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-kopetensi mt-4">
          <p class="sertifikat-kopetensi">
            Setifikat Kopetensi
          </p>
          <div class="number-certification mt-2">
            <p class="me-4">No.</p>
            {{-- Bisa diganti (Nomer Sertifikat) --}}
            <p class="no-sertifikat">Ser/0003/03/omb/2023</p>
          </div>
        </div>
        <div class="desc mt-1">
          Dengan ini menerangkan bahwa PT. Hummatech Digital Indonesia telah melaksanakan pelatihan dan uji kompetensi
          "<span>Upskilling & Reskilling Guru Kejuruan Berstandar Industri Pola SMK PK-Magang Industri</span>" kepada:
        </div>
        <div class="identitas mt-3 row">
          {{-- Bisa Diganti --}}
          <div class="col-md-3 ms-3">
            <ul class="list-unstyled">
              <li>Nama</li>
              <li>NIK</li>
              <li>Tempat, Tanggal Lahir</li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled">
              {{-- Nama --}}
              <li>: &nbsp;&nbsp; <span>Afri Mubarok, S.Kom</span></li>
              {{-- NIK --}}
              <li>: &nbsp;&nbsp; 3513050204920004</li>
              {{-- Tempat, Tanggal Lahir --}}
              <li>: &nbsp;&nbsp; Probolinggo, 02 April 1992</li>
            </ul>
          </div>
        </div>
        <div class="text-telah">
          <p>Telah dinyatakan kompeten dalam:</p>
        </div>
        <div class="bidang row">
          <div class="col-md-3 ms-3">
            <ul class="list-unstyled">
              <li class="fw-bold">Bidang</li>
              <li class="fw-bold">Sub Bidang</li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-unstyled">
              {{-- Bidang --}}
              <li>: &nbsp;&nbsp; Pemrograman Mobile App</li>
              {{-- Sub Bidang --}}
              <li>: &nbsp;&nbsp; Pemrograman Flutter</li>
            </ul>
          </div>
        </div>
        <div class="bottom-finish row">
          <div class="col-md-6 ms-2 kiri">
            <p style="margin-bottom: 0; font-size: 12px">DENGAN PREDIKAT</p>
            <img style="width: auto;height: 130px" src="{{ asset('image/nilai-baik.png') }}" alt="">
          </div>
          <div class="col-md-5 kanan ms-5 ps-5">
            <div class="atas">
              <p>Ditetapkan di Malang</p>
              {{-- Tanggal bisa dirubah --}}
              <p>Pada tanggal 23 Agustus 2023</p>
              <p>Oleh PT Hummatech Digital Indonesia</p>
            </div>
            <div class="bawah">
              <p class="nama-direktur">
                Afrizal Himawan, S.Kom
              </p>
              <p>DIREKTUR UTAMA</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- Belakang --}}
  <main>
    <div class="image-certificate-belakang">
      <img src="{{ asset('image/certificate-guru.png') }}" alt="">
    </div>
    <div class="certificate-guru-belakang">
      <div class="content-belakang">
        <div class="text-penilaian text-center">
          <p>PENILAIAN UJI KOMPETENSI</p>
          <p>UPSKILLING & RESKILLING PEMROGRAMAN MOBILE APP</p>
        </div>
        <div class="table-penilayan mb-4">
            <table class=" table-bordered">
                <thead>
                    <tr class="text-center">
                        <th class="col-1">No</th>
                        <th class="col-8">Materi</th>
                        <th class="col-2">Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="text-center">1.</th>
                        <td>Pengenalan dan Instalasi Flutter</td>
                        <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                        <th class="text-center">2.</th>
                        <td>Struktur Project Stateless dan Statefull Widget Flutter</td>
                        <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                        <th class="text-center">3.</th>
                        <td>Navigator dan Route di Flutter</td>
                        <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                        <th class="text-center">4.</th>
                        <td>Design UI/UX dengan Figma</td>
                        <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                        <th class="text-center">5.</th>
                        <td>Pengenalan GetX di Flutter</td>
                        <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                        <th class="text-center">6.</th>
                        <td>CRUD (Create, Read, Update, Delete) GetX dengan Firebase di Flutter</td>
                        <td class="text-center">10 JP</td>
                    </tr>
                    <tr>
                        <th class="text-center">7.</th>
                        <td>Uji Kompetensi Pemrograman Mobile App dengan Flutter</td>
                        <td class="text-center">10 JP</td>
                    </tr>
                    <tr class="fw-bold">
                        <th class="text-center"></th>
                        <td class="text-center">Total</td>
                        <td class="text-center">60 JP</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="instruktur row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                <div class="atas text-center">
                    <p>Instruktur</p>
                </div>
                <div class="bawah text-center">
                    <p class="nama-instruktur">Dito Cahya Pratama, S.Tr.Kom</p>
                    <hr>
                    <p>Senior Developer Hummatech</p>
                </div>
            </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
