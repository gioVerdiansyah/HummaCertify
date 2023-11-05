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

  <link rel="stylesheet" href="{{asset('css/certificate/kompetensi.css')}}">
</head>

<body>
  <main>
    {{-- Depan --}}
    <div class="depan" style='background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/guru-tamu.png");'>
        <div class="content">
          <div class="qr-code">
            <center>
              <img
                    src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate(route('search') . '?q=' . $certificate->nomor)) }}"
                    alt="QR Code">
            </center>
            <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
          </div>
          <div class="no-sertifikat">
            <p class="no">No.</p>
            <p class="nomer">{{ $certificate->nomor }}</p>
          </div>
          <div class="nama">
            <p>{{ $certificate->user->name }}</p>
          </div>
          <div class="sekolah">
            <p>{{ $certificate->user->institusi }}</p>
          </div>
          <div class="text">
            <p class="telah">Telah mengikut Pelatihan</p>
            <p class="pelatihan">{{ $certificate->bidang }}</p>
            <p class="tanggal">yang diselenggarakan pada tanggal {{ \Carbon\Carbon::createFromFormat('Y-m-d', $certificate->tanggal)->locale('id')->isoFormat('D') }} s.d {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $certificate->created_at)->locale('id')->isoFormat('D MMMM YYYY') }} Oleh</p>
            <p class="pt">PT Hummatech Digital Indonesia</p>
          </div>
          <div class="nilai">
            <p>{{ $certificate->predikat }}</p>
          </div>
        </div>
      </div>
      {{-- Belakang --}}
      <div class="belakang" style='background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/guru-tamu-belakang.png");'>
        <div class="content">
          <div>
            <p class="pelatihan">"{{ $certificate->bidang }}"</p>
          </div>
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
          <div>
            <p class="nama-instruktur">{{ $certificate->instruktur }}</p>
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
