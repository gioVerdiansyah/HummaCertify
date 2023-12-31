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
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Poppins:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      {{-- Import CSS --}}
      {{-- <link rel="stylesheet" href="{{ asset('css/certificate/certificate.css') }}"> --}}
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
          }

          .bg {
            width: 100%;
            height: 100%;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
          }

          .bg .content {
            position: absolute;
            width: 100%;
            height: 100%;
          }

          .bg .content .no-sertifikat .no {
            position: absolute;
            top: 179px;
            left: 330px;
            font-size: 19px;
            letter-spacing: 2px;
            font-family: "Merriweather", serif;
          }

          .bg .content .no-sertifikat .nomer {
            position: absolute;
            top: 156.5px;
            left: 375px;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            font-size: 18px;
            letter-spacing: 7px;
          }

          .bg .content .nama-peserta {
            position: absolute;
            top: 196px;
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
            top: 395px;
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
            top: 426px;
            left: 263px;
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
            top: 484px;
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
            left: 511px;
          }

          /* Belakang */
          .belakang {
            width: 297mm;
            height: 210mm;
            background-repeat: no-repeat;
            background-size: cover;
            overflow: hidden;
            position: relative;
          }

          .belakang .content .text-pengantar {
            position: relative;
            top: 90px;
            left: 214px;
            width: 700px;
            text-align: center;
            font-family: "Open Sans", sans-serif;
            font-weight: 700;
            font-size: 20px;
            letter-spacing: 1px;
            line-height: 17px;
          }

          .belakang .content .pelatihan {
            position: relative;
            top: 110px;
            left: 215px;
            width: 700px;
            text-align: center;
            font-family: 'Open Sans', sans-serif;
            font-weight: 700;
            font-size: 20px;
          }

          .belakang .content .nama-instruktur {
            position: absolute;
            top: 672px;
            right: 95px;
            width: 250px;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 20px;
          }

          .belakang .content .table-materi {
            position: relative;
            top: 106px;
            left: 200px;
            width: 100%;
          }

          .belakang .content .table-materi table {
            border-collapse: collapse;
            border: 1px solid;
            width: 65%;
            font-family: "Montserrat", sans-serif;
            font-weight: 400;

          }

          .belakang .content .table-materi table thead {
            border: 1px solid;
            background-color: #4a86e8;
            color: #ffffff;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
          }

          .belakang .content .table-materi table thead tr {
            border: 1px solid black;
          }

          .belakang .content .table-materi table thead th {
            border: 1px solid black;
            padding: 0px 0px 4px 0px;
          }

          .belakang .content .table-materi table tbody tr {
            border: 1px solid;
          }

          .belakang .content .table-materi table tbody tr th {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            padding: 0px 0px 4px 0px;
          }

          .belakang .content .table-materi table tbody tr td {
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
            margin: 0px;
            padding: 0px 5px 4px 5px;
          }

          .belakang .content .table-materi table tbody td {
            border: 1px solid;
            font-family: "Montserrat", sans-serif;
            font-weight: 700;
          }
        </style>
        <div class="bg" style='background-image: url("{{ $background->depan }}");'>
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
              <p>
                @php
                  $nameWords = explode(' ', $certificate->user->name);
                @endphp
                @if (count($nameWords) > config('hummacertify.per_kata'))
                  {{ implode(' ', array_slice($nameWords, 0, config('hummacertify.per_kata'))) .' ' .implode(' ',array_map(function ($word) {return $word[0] . '.';}, array_slice($nameWords, config('hummacertify.per_kata')))) }}
                @else
                  {{ $certificate->user->name }}
                @endif
              </p>
            </div>
            {{-- <div class="nama-peserta">
                <p>{{ $certificate->user->name }}</p>
            </div> --}}
            <div class="nik">
              {{ $certificate->user->nomor_induk }}
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
              <figcaption style="font-size: 10px; margin-top: 4px">QR authenticity certificate</figcaption>
            </div>
          </div>
        </div>
        <div class="belakang" style='background-image: url("{{ $background->belakang }}");'>
          <div class="content">
            <div class="text-pengantar">
              <p>Telah Lulus magang sebagai <span>{{ $certificate->bidang }}</span> beserta bukti kegiatan atau
                projek di bawah
              </p>
            </div>
            <div class="table-materi">
              <table>
                <thead>
                  <tr>
                    <th scope="col" width="10%">No</th>
                    <th scope="col" width="70%">Materi</th>
                    <th scope="col" width="20%">Waktu</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $totalJP = 0;
                  @endphp
                  @foreach ($certificate->detailCertificates as $i => $detailCertificate)
                    <tr>
                      <th>{{ ++$i }}.</th>
                      <td style="text-align: start; font-weight: 500; ">{{ $detailCertificate->materi }}</td>
                      <td style="text-align: center; font-weight: 500;">{{ $detailCertificate->jp }} JP
                      </td>
                    </tr>
                    @php
                      $totalJP += $detailCertificate->jp;
                    @endphp
                  @endforeach
                  @if (count($certificate->detailCertificates) > 1)
                    <tr>
                      <td colspan="2" style="text-align: center">Total</td>
                      <td style="text-align: center">{{ $totalJP }} JP</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </main>
    </body>

    </html>
