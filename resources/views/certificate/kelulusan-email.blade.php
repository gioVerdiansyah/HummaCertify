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
  {{-- <link rel="stylesheet" href="{{ asset('css/certificate/certificate.css') }}"> --}}
</head>

<body>
  <main id="certificate-1">
    <style>
      @page {
        width: 210mm;
        height: 297mm;
      }

      main {
        transform: rotate(90deg) translateX(70%);
      }

      .image-certificate {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 1200px;
        width: 1700px;
        overflow: hidden;
        display: flex;
        justify-content: center;
      }

      .image-certificate img {
        width: 100%;
        height: 100%;
      }

      .content {
        width: 100%;
        height: 297mm;
      }

      .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -70%);
        width: 100%;
        height: 730px;
        display: flex;
        justify-content: center;
      }

      .content-text .top-text {
        line-height: 50px;
      }

      .content-text .top-text .certificate-text {
        font-family: "Merriweather", serif;
        font-weight: 700;
        font-size: 90px;
        letter-spacing: 5px;
        color: #02b1ef;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .content-text .top-text .certificate-text p {
        margin-bottom: 0;
      }

      .content-text .top-text .number-certification {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
        letter-spacing: 2px;
        font-family: "Merriweather", serif;
        font-weight: 400;
      }

      .content-text .top-text .number-certification p {
        margin-bottom: 0;
      }

      .content-text .top-text .number-certification .no-sertifikat {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 28px;
        letter-spacing: 2px;
      }

      .text-humma {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        line-height: 20px;
      }

      .content-text .text-humma .hummatech {
        margin-top: -10px;
        font-family: "Merriweather", serif;
        font-weight: 400;
        font-size: 30px;
        font-weight: 400;
        letter-spacing: 2px;
      }

      .content-text .text-humma .hummatech p {
        margin-bottom: 0;
      }

      .content-text .text-humma .official {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 25px;
        letter-spacing: 10px;
      }

      .content-text .text-humma .official p {
        margin-bottom: 0;
      }

      .content-text .nama-peserta {
        margin-top: -90px
      }

      .content-text .nama-peserta p {
        font-size: 122px;
        font-family: "Great Vibes", cursive;
        font-weight: 400;
        color: #1c2143;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0;
      }

      .content-text .identitas-murid-pendidikan {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin-bottom: 10px;
      }

      .content-text .identitas-murid-pendidikan .nisn-nis p {
        margin-bottom: 5px;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 28px;
        letter-spacing: 2px;
      }

      .content-text .identitas-murid-pendidikan .asal-sekolah p {
        margin-top: 0px;
        margin-bottom: 0;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 28px;
        letter-spacing: 2px;
        text-transform: uppercase;
      }

      .content-text .gabungan {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }

      .content-text .gabungan .text-pujian p {
        margin-top: 0px;
        margin-bottom: 0;
        font-size: 27px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        letter-spacing: 1px;
      }

      .content-text .gabungan .text-devinisi p {
        margin-top: 0px;
        margin-bottom: 0;
        font-size: 27px;
        letter-spacing: 2px;
        font-family: "Poppins", sans-serif;
        font-weight: 700;
      }

      .guru {
        height: 300px;
        width: 100%;
        align-items: end;
        text-align: center;
        display: flex;
        justify-content: space-between;
      }

      .guru .guru-identitas {
        line-height: 5px;
      }

      .guru .guru-identitas .nama-guru {
        font-weight: 500;
        font-family: 'Poppins', sans-serif;
        font-size: 19px;
      }

      .guru .guru-identitas .title-guru {
        font-weight: 400;
        font-family: 'Poppins', sans-serif;
        font-size: 18px;
        letter-spacing: 4px;
      }

      .guru .qr-code {
        transform: translate(0, 53px);
      }
    </style>
    <div class="image-certificate">
      <img src="https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-bg.png"
        alt="Background Certificate" />
    </div>
    <div class="content">
      <div class="content-text">
        <div class="top-text">
          <div class="certificate-text" style="margin-bottom: 8px">
            <p>CERTIFICATE</p>
          </div>
          <div class="number-certification">
            {{-- Bisa diganti --}}
            <p class="me-3" style="margin-right: 20px">No.</p>
            {{-- <p class="no-sertifikat">{{ $certificate->nomor }}</p> --}}
            <p class="no-sertifikat">S e r / 0 0 0 1 / 0 0 0 3 / 2 0 1 0 / 2 0 2 3</p>
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
          <p>HummaCertify</p>
          {{-- <p>{{ $certificate->user->name }}</p> --}}
          {{-- <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(100)->generate($certificate->nomor)) }}" alt="QR Code"> --}}
        </div>
        <div class="identitas-murid-pendidikan">
          <div class="nisn-nis">
            {{-- Bisa diganti --}}
            <p>1380282082038</p>
            {{-- <p>{{ $certificate->user->password }}</p> --}}
          </div>
          <div class="asal-sekolah">
            {{-- Bisa diganti --}}
            <p>HummaTech</p>
            {{-- <p>{{ $certificate->user->institusi }}</p> --}}
          </div>
        </div>
        <div class="gabungan">
          <div class="text-pujian">
            <p>Who Has Successfully completed the</p>
          </div>
          <div class="text-devinisi">
            {{-- Bisa diganti --}}
            <p>Apprenticeship in Website Developer Division</p>
            {{-- <p>Apprenticeship in {{ $certificate->bidang }} Division</p> --}}
          </div>
        </div>
        <div class="guru">
          <div>
            <div class="guru-identitas">
              <p class="nama-guru">
                Afrizal Himawan, S.Kom
              </p>
              <p class="title-guru">
                DIREKTUR
              </p>
            </div>
          </div>
          <div class="qr-code">
            {{-- <img src="{{ QrCode::format('png')->size(100)->generate('https://contoh-link-sertifikat.com') }}" alt="QR Code"> --}}
            <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(100)->generate('https://poe.com/')) }}" alt="QR Code">
            {{-- {!! QrCode::size(100)->generate($certificate->nomor) !!} --}}
          </div>
          <div>
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
