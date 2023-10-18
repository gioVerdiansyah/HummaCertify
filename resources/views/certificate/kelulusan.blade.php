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
      .image-certificate {
        position: absolute;
        width: 100%;
      }

      .image-certificate img {
        height: 100%;
        max-width: 100%;
      }

      .content {
        margin: 0;
        padding: 0;
        top: 8%;
        width: 100%;
        height: 690px;
        position: absolute;
        z-index: 2;
        display: flex;
        justify-content: center;
      }

      .content-text .top-text {
        line-height: 30px;
      }

      .content-text .top-text .certificate-text {
        font-family: "Merriweather", serif;
        font-weight: 700;
        font-size: 60px;
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
        font-size: 19px;
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
        font-size: 18px;
        letter-spacing: 8px;
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
        font-size: 25px;
        font-weight: 400;
        letter-spacing: 2px;
      }

      .content-text .text-humma .hummatech p {
        margin-bottom: 0;
      }

      .content-text .text-humma .official {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 20px;
        letter-spacing: 10px;
      }

      .content-text .text-humma .official p {
        margin-bottom: 0;
      }

      .content-text .nama-peserta {
        margin-top: -50px
      }

      .content-text .nama-peserta p {
        font-size: 72px;
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
        font-size: 18px;
        letter-spacing: 2px;
      }

      .content-text .identitas-murid-pendidikan .asal-sekolah p {
        margin-top: 0px;
        margin-bottom: 0;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 18px;
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
        font-size: 17px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        letter-spacing: 1px;
      }

      .content-text .gabungan .text-devinisi p {
        margin-top: 0px;
        margin-bottom: 0;
        font-size: 17px;
        letter-spacing: 2px;
        font-family: "Poppins", sans-serif;
        font-weight: 700;
      }

      .guru {
        height: 160px;
        width: 650px;
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
        font-size: 16px;
      }

      .guru .guru-identitas .title-guru {
        font-weight: 400;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
        letter-spacing: 4px;
      }

      .guru .qr-code {
        transform: translate(0, 53px);
      }
    </style>
    <div class="image-certificate">
      <img src="{{ asset('image/certificate-bg.png') }}" alt="Background Certificate" />
    </div>
    <div class="content">
      <div class="content-text">
        <div class="top-text">
          <div class="certificate-text">
            <p>CERTIFICATE</p>
          </div>
          <div class="number-certification">
            {{-- Bisa diganti --}}
            <p class="me-3" style="margin-right: 20px">No.</p>
            <p class="no-sertifikat">{{ $certificate->nomor }}</p>
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
          <p>{{ $certificate->user->name }}</p>
        </div>
        <div class="identitas-murid-pendidikan">
          <div class="nisn-nis">
            {{-- Bisa diganti --}}
            <p>{{ $certificate->user->password }}</p>
          </div>
          <div class="asal-sekolah">
            {{-- Bisa diganti --}}
            <p>{{ $certificate->user->institusi }}</p>
          </div>
        </div>
        <div class="gabungan">
          <div class="text-pujian">
            <p>Who Has Successfully completed the</p>
          </div>
          <div class="text-devinisi">
            {{-- Bisa diganti --}}
            <p>Apprenticeship in {{ $certificate->bidang }} Division</p>
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
            {!! QrCode::size(100)->generate($certificate->nomor) !!}
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
window.addEventListener('load', function () {
    window.print();
    window.onafterprint = function () {
        window.close();
        window.history.back();
    };
});
</script>
</html>
