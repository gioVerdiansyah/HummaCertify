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
</head>

<body>
  @foreach ($certificates as $i => $certificate)
  <main id="certificate-{{ ++$i }}">
    <div class="bg">
      <div class="content">
        {{-- Nomer Sertifikat --}}
        <div class="no-sertifikat">
          <div class="no">
            No.
          </div>
          <div class="nomer">
            <p>{{ $certificate->nomor }}</p>
          </div>
        </div>
        {{-- Nama Peserta --}}
        <div class="nama-peserta">
          <p>{{ $certificate->user->name }}</p>
        </div>
        <div class="nik">
          {{ $certificate->user->password }}
        </div>
        <div class="sekolah">
          {{ $certificate->user->institusi }}
        </div>
        <div class="apresiasi">
          <p>Apprenticeship in {{ $certificate->bidang }} Division</p>
        </div>
        <div class="qr-code">
          <center>
            <img
              src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate('https://poe.com/')) }}"
              alt="QR Code">
          </center>
          <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
        </div>
      </div>
    </div>
  </main>
    @if ($i < count($certificates) - 1)
      <div style="page-break-after: always;"></div>
    @endif
  @endforeach
  <script>
    window.addEventListener('load', function() {
      window.print();
      window.onafterprint = function() {
        window.close();
        window.history.back();
      };
    });
  </script>
</body>

</html>
