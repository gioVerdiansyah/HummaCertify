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
</head>

<body>
  <main id="certificate-1">
    <style>
      @page {
        size: A4 landscape;
        margin: 0;
      }

      body {
        margin: 0;
        padding: 0;
        overflow: hidden;
      }

      .bg {
        width: 297mm;
        height: 210mm;
        background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-bg.png");
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
      }

      .bg .content {
        width: 100%;
        height: 100%;
        overflow: hidden;
      }

      .bg .content .no-sertifikat .no {
        position: absolute;
        top: 180px;
        left: 350px;
        font-size: 19px;
        letter-spacing: 2px;
        font-family: "Merriweather", serif;
      }

      .bg .content .no-sertifikat .nomer {
        position: absolute;
        top: 160px;
        left: 400px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 18px;
        letter-spacing: 7px;
      }

      .bg .content .nama-peserta {
        position: absolute;
        top: 230px;
        left: 12%;
        width: 75%;
      }

      .bg .content .nama-peserta p {
        font-size: 74px;
        font-family: "Great Vibes", cursive;
        font-weight: 400;
        color: #1c2143;
        text-align: center;
      }

      .bg .content .nik {
        position: absolute;
        top: 400px;
        left: 435px;
        width: 250px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 20px;
        letter-spacing: 2px;
        text-transform: uppercase;
      }

      .bg .content .sekolah {
        position: absolute;
        top: 435px;
        left: 262px;
        width: 600px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 24px;
        letter-spacing: 2px;
        text-transform: uppercase;
      }

      .bg .content .apresiasi {
        position: absolute;
        top: 490px;
        left: 210px;
        width: 700px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 19px;
        letter-spacing: 2px;
      }

      .bg .content .qr-code {
        position: absolute;
        top: 650px;
        left: 505px;
      }
    </style>
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
</body>
<script>
  window.addEventListener('load', function() {
    window.print();
    window.onafterprint = function() {
      window.close();
      window.history.back();
    };
  });
</script>

</html>
