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
    <main id="certificate-{{ ++$i }}" style="height: 785px;">
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
