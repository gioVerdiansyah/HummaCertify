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
  <link rel="stylesheet" href="{{ asset('css/certificate/certificate-guru-2.css') }}">
</head>

<body>
  <main>
    <style>
      @page {
        size: A4 landscape;
        margin: 0;
      }

      body {
        margin: 0;
        padding: 0;
      }

      /* Depan */
      .depan {
        width: 297mm;
        height: 210mm;
        background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/guru-tamu.png");
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
      }

      .depan .content {
        width: 100%;
        height: 100%;
        overflow: hidden;
      }

      .depan .content .qr-code {
        position: absolute;
        top: 25px;
        left: 50px;
      }

      .depan .content .no-sertifikat .no {
        position: absolute;
        top: 150px;
        left: 345px;
        font-size: 19px;
        letter-spacing: 2px;
        font-family: "Merriweather", serif;
      }

      .depan .content .no-sertifikat .nomer {
        position: absolute;
        top: 150px;
        left: 393px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 18px;
        letter-spacing: 7px;
      }

      .depan .content .nama {
        position: absolute;
        top: 200px;
        left: 110px;
        width: 900px;
      }

      .depan .content .nama p {
        font-size: 63px;
        font-family: "Great Vibes", cursive;
        font-weight: 400;
        color: #1c2143;
        text-align: center;
      }

      .depan .content .sekolah {
        position: absolute;
        top: 340px;
        left: 412px;
        width: 300px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 20px;
      }

      .depan .content .text .telah {
        position: absolute;
        top: 370px;
        left: 423px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 18px;
        letter-spacing: 2px;
      }

      .depan .content .text .pelatihan {
        position: absolute;
        top: 400px;
        left: 214px;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 18px;
        text-align: center;
        width: 700px;
        letter-spacing: 2.5px;
      }

      .depan .content .text .tanggal {
        position: absolute;
        top: 430px;
        left: 160px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 18px;
        text-align: center;
        width: 800px;
        letter-spacing: 2.5px;
      }

      .depan .content .text .pt {
        position: absolute;
        top: 462px;
        left: 400px;
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 18px;
        letter-spacing: 1px;
      }

      .depan .content .nilai {
        position: absolute;
        top: 580px;
        left: 510px;
        width: 100px;
        height: 70px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        color: white;
        font-size: 18px;
        text-transform: uppercase;
      }

      /* Belakang */
      .belakang {
        width: 297mm;
        height: 210mm;
        background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/guru-tamu-belakang.png");
        background-repeat: no-repeat;
        background-size: cover;
        overflow: hidden;
      }

      .belakang .content {
        position: relative;
      }

      .belakang .content .pelatihan {
        position: absolute;
        top: 120px;
        left: 210px;
        width: 700px;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        font-size: 20px;
      }

      .belakang .content .nama-instruktur {
        position: absolute;
        top: 682px;
        right: 95px;
        width: 250px;
        text-align: center;
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        font-size: 20px;
      }

      .belakang .content .table-materi {
        position: relative;
        top: 190px;
        left: 200px;
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
        padding: 8px 0px;
      }

      .belakang .content .table-materi table tbody tr {
        border: 1px solid;
        text-align: center;
      }

      .belakang .content .table-materi table tbody td {
        border: 1px solid;
        padding: 4px 0px;
      }
    </style>
    {{-- Depan --}}
    <div class="depan">
      <div class="content">
        <div class="qr-code">
          <center>
            <img width="100" height="100" src="{{ asset('image/qr.png') }}" alt="">
          </center>
          <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
        </div>
        <div class="no-sertifikat">
          <p class="no">No.</p>
          <p class="nomer">Ser/0004/0001/2810/2023</p>
        </div>
        <div class="nama">
          <p>Daniel Halim Kurniawan</p>
        </div>
        <div class="sekolah">
          <p>SMK PGRI 2 PONOROGO</p>
        </div>
        <div class="text">
          <p class="telah">Telah mengikut Pelatihan</p>
          {{-- Bisa Dirubah --}}
          <p class="pelatihan">Pemrograman Web dengan Laravel Level Berginner</p>
          {{-- Tanggal bisa dirubah --}}
          <p class="tanggal">yang diselenggarakan pada tanggal 18 s.d 23 September 2023 Oleh</p>
          <p class="pt">PT Hummatech Digital Indonesia</p>
        </div>
        <div class="nilai">
          <p>Sangat Baik</p>
        </div>
      </div>
    </div>
    {{-- Belakang --}}
    <div class="belakang">
      <div class="content">
        <div class="pelatihan">
          <p>"Pemrograman Web dengan LARAVEL Level Berginner"</p>
        </div>
        <div class="table-materi">
          <table>
            <thead>
              <tr>
                <th>No.</th>
                <th>Judul Materi</th>
                <th>Jam Pelajaran</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1.</th>
                <td style="text-align: start; padding: 2px 5px;">Pengenalan & Installasi Laravel</td>
                <td>4 JP</td>
              </tr>
              <tr>
                <th>1.</th>
                <td style="text-align: start; padding: 2px 5px;">Pengenalan & Installasi Laravel</td>
                <td>4 JP</td>
              </tr>
              <tr>
                <th>1.</th>
                <td style="text-align: start; padding: 2px 5px;">Pengenalan & Installasi Laravel</td>
                <td>4 JP</td>
              </tr>
              <tr>
                <th>1.</th>
                <td style="text-align: start; padding: 2px 5px;">Pengenalan & Installasi Laravel</td>
                <td>4 JP</td>
              </tr>
              <tr>
                <th></th>
                <td style="font-weight: 700;">Total</td>
                <td style="padding: 8px 0px; font-weight: 700;">10 JP</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="nama-instruktur">
          <p>Bababoiii Papope</p>
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
