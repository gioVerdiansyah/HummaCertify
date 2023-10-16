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
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Open+Sans:wght@700&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">

  {{-- Import CSS --}}
  <link rel="stylesheet" href="{{ asset('css/certificate/certificate.css') }}">

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div class="image-certificate">
    <img src="{{ asset('image/certificate-bg.png') }}" alt="">
  </div>
  <div class="content">
    <div class="content-text">
      <div class="top-text">
        <div class="certificate-text">
          <p>CERTIFICATE</p>
        </div>
        <div class="number-certification">
          {{-- Bisa diganti --}}
          <p class="me-3">No.</p>
          <p class="no-sertifikat">93626000153</p>
        </div>
      </div>
      <div class="text-humma">
        <div class="hummatech">
          <p>Hummatech Apprentice program</p>
        </div>
        <div class="official">
          <p>OFFICIAL CERTIFICATION</p>
        </div>
      </div>
      <div class="nama-peserta">
        {{-- Bisa diganti --}}
        <p>Joe Boeden</p>
      </div>
      <div class="identitas-murid-pendidikan">
        <div class="nisn-nis">
          {{-- Bisa diganti --}}
          <p>2141764060</p>
        </div>
        <div class="asal-sekolah">
          {{-- Bisa diganti --}}
          <p>Politeknik Negri Malang</p>
        </div>
      </div>
      <div class="gabungan">
        <div class="text-pujian">
          <p>Who Has Successfully completed the</p>
        </div>
        <div class="text-devinisi">
          {{-- Bisa diganti --}}
          <p>Apprenticeship in Degisner Division</p>
        </div>
      </div>
      <div class="guru row">
        <div class="col-md-5">
          <div class="guru-identitas">
            <p class="nama-guru">
              Afrizal Himawan, S.Kom
            </p>
            <p class="title-guru">
              DIREKTUR
            </p>
          </div>
        </div>
        <div class="qr-code col-md-2">
          <img src="{{ asset('image/qr.png') }}" alt="">
        </div>
        <div class="col-md-5">
          <div class="guru-identitas">
            <p class="nama-guru">
              Andika Wahyu P, S.Kom
            </p>
            <p class="title-guru">
              PEMBIMBING
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
