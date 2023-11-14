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
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Open+Sans:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

  {{-- css certificate --}}
  <link rel="stylesheet" href="{{asset('css/certificate/kelulusan.css')}}">
</head>

<body>
  <main id="certificate-1">
    <div class="bg" style='background-image: url("{{ asset($background->depan) }}");'>
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
                <div class="nama-peserta">
                <p>
                    @php
                        $nameWords = explode(' ', $certificate->user->name);
                    @endphp
                    @if (count($nameWords) > config('hummacertify.per_kata'))
                        {{ implode(' ', array_slice($nameWords, 0, config('hummacertify.per_kata'))) . ' ' . implode(' ', array_map(function($word) { return ($word[0]).'.'; }, array_slice($nameWords, config('hummacertify.per_kata')))) }}
                    @else
                        {{ $certificate->user->name }}
                    @endif
                </p>
            </div>
        {{-- Nama Peserta --}}
        {{-- <div class="nama-peserta">
          <p>{{ $certificate->user->name }}</p>
        </div> --}}
        <div class="nik">
          {{ $certificate->user->nomor_induk}}
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
              src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate(route('search') . '?q=' . $certificate->nomor)) }}"
              alt="QR Code">
          </center>
          <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
        </div>
      </div>
    </div>
    <div class="belakang" style='background-image: url("{{ asset($background->belakang) }}");'>
      <div class="content">
        <div class="table-materi">
          <table>
            <thead>
              <tr>
                <th width="10%">No</th>
                <th width="70%">Materi</th>
                <th width="20%">Waktu</th>
              </tr>
            </thead>
            @php
                $totalJP = 0;
            @endphp
            <tbody>
              @foreach ($certificate->detailCertificates as $i => $detailCertificate)
                <tr>
                  <th>{{ ++$i }}.</th>
                  <td style="text-align: start; padding: 2px 5px;">{{ $detailCertificate->materi }}</td>
                  <td>{{ $detailCertificate->jp }} JP</td>
                </tr>
                @php
                    $totalJP += $detailCertificate->jp;
                @endphp
              @endforeach
              @if (count($certificate->detailCertificates) > 1)
                <tr>
                  <td></td>
                  <th>Total</th>
                  <th>{{ $totalJP }} JP</th>
                </tr>
              @endif
            </tbody>
          </table>
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
