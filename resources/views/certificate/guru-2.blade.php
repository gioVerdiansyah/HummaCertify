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
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet">

  {{-- Import CSS --}}
  <link rel="stylesheet" href="{{ asset('css/certificate/certificate-guru-2.css') }}">
</head>

<body>
  <main>
    <style>
      @page {
        width: 210mm;
        height: 297mm;
      }

      .bg-certificate {
        position: absolute;
        width: 100%;
        height: 785px;
      }

      .bg-certificate img {
        height: 100%;
        max-width: 100%;
      }

      .content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 0;
        top: 6%;
        width: 100%;
        height: 730px;
        overflow: hidden;
        position: absolute;
        z-index: 2;
      }

      .content .sertifikat {
        line-height: 25px;
      }

      .content .sertifikat .text-sertifikat {
        font-size: 58px;
        font-family: 'Merriweather', serif;
        font-weight: 700;
        margin-bottom: 0;
        color: #1f2837;
      }

      .content .sertifikat .number {
        display: flex;
      }

      .content .sertifikat .number .no {
        margin-right: 20px;
        margin-bottom: 0;
      }

      .content .sertifikat .number .nomer-sertifikat {
        margin-bottom: 0;
      }

      .content .bawah {
        display: flex;
      }
    </style>
    <div class="bg-certificate">
      <img src="{{ asset('image/certificate-guru-2.png') }}" width="1115" alt="certificate-guru">
    </div>
    <div class="content">
      <div class="sertifikat">
        <p class="text-sertifikat">SERTIFIKAT</p>
        <div class="number">
          <p class="no">No.</p>
          <p class="nomer-sertifikat">Ser/0003/03/omb/2023</p>
        </div>
        <p class="text-kompeten">SERTIFIKAT KOMPETENSI</p>
      </div>
      <div class="nama-peserta">
        <p>Daniel Halim Kurniawan</p>
      </div>
      <div class="detail">
        <p class="sekolah">Di SMK PGRI 2 PONOROGO</p>
        <p class="text-pelatihan">Telah mengikuti pelatihan</p>
        <p class="program-belajar">Pemrograman Web dengan LARAVEL Level Berginner</p>
        <p class="text-tanggal">yang diselegnyang diselenggarakan pada tanggal 18 s.d 23 September 2023 Oleh</p>
        <p class="pt-humma">PT Hummatech Digital Indonesia</p>
      </div>
      <div class="predikat">
        <p>DENGAN PREDIKAT</p>
      </div>
      <div class="bawah">
        <div class="guru-humma">
          <p class="nama-guru">Afrizal Himawan, S.Kom</p>
          <p class="jabatan">DIREKTUR</p>
        </div>
        <div class="medal">
          <img src="{{ asset('image/medal.png') }}" alt="medal">
          <p class="nilai">Sangat Baik</p>
        </div>
        <div class="guru-humma">
          <p class="nama-guru">Andika Wahyu P, S.Kom</p>
          <p class="jabatan">Ketua Pelaksana</p>
        </div>
      </div>
    </div>
  </main>
</body>

</html>
