<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 7 PDF Example</title>

  {{-- bootstrap icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  {{-- font import --}}
  <link
    href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet">
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

      /* DEPAN */
      .depan {
        width: 297mm;
        height: 210mm;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }

      .depan .image-certificate img {
        width: 100%;
        height: 100%;
      }

      .depan .content {
        position: absolute;
      }

      .depan .content .kata-kata {
        position: relative;
        top: 260px;
        left: 155px;
        width: 820px;
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 14px;
      }

      .depan .content .kata-kata span {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 14px;
      }

      .depan .content .no {
        position: absolute;
        top: 217px;
        left: 365px;
        font-family: "Merriweather", serif;
        font-size: 18px;
      }

      .depan .content .nomer {
        position: absolute;
        top: 212px;
        left: 410px;
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 18px;
        letter-spacing: 4px;
      }

      .certificate-guru {
        position: relative;
        width: 100%;
        justify-content: center;
        display: flex;
        top: 40px;
      }

      .depan .content .nama {
        position: absolute;
        top: 336.5px;
        left: 385px;
        font-weight: 700;
        font-family: "Montserrat", sans-serif;
      }

      .depan .content .nik {
        position: absolute;
        top: 359px;
        left: 385px;
        font-weight: 500;
        font-family: "Montserrat", sans-serif;
      }

      .depan .content .ttl {
        position: absolute;
        top: 381px;
        left: 385px;
        letter-spacing: 0px;
        font-weight: 500;
        font-family: "Montserrat", sans-serif;
      }

      .depan .content .kompeten {
        position: absolute;
        top: 480px;
        left: 385px;
        line-height: 9px;
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 15px;
      }

      .depan .content .text-penilaian {
        position: absolute;
        top: 615px;
        left: 213px;
        width: 80px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        color: white;
        font-size: 16px;
        text-transform: uppercase;
      }

      .depan .content .keterangan {
        position: absolute;
        top: 530px;
        right: -135px;
        line-height: 10px;
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 13px;
      }

      .depan .content .qr-code {
        position: absolute;
        top: 600px;
        left: 350px;
      }

      /* BELAKANG */
      .belakang {
        width: 297mm;
        height: 210mm;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
      }

      .belakang .image-certificate-belakang {
        position: absolute;
        width: 297mm;
        height: 210mm;
        z-index: 1;
      }

      /* Remove the background image from this element */
      .belakang .image-certificate-belakang img {
        width: 100%;
        height: 100%;
      }

      .belakang .certificate-guru-belakang .table-penilayan {
        position: absolute;
        top: 16.5%;
        left: 20%;
        width: 60%;
      }

      .belakang .certificate-guru-belakang .table-penilayan table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
        font-family: "Montserrat", sans-serif;
        font-size: 15px;
        font-weight: 500;
      }

      .belakang .certificate-guru-belakang .table-penilayan th {
        border: 1px solid black;
        text-align: center;
        padding: 8px 0px;
      }

      .belakang .certificate-guru-belakang .table-penilayan td {
        border: 1px solid black;
        padding: 8px 0px;
      }

      .belakang .certificate-guru-belakang .table-penilayan td.ts {
        padding: 0px 5px;
      }

      .belakang .certificate-guru-belakang .tanda-tangan {
        font-family: "Montserrat", sans-serif;
      }

      .belakang .certificate-guru-belakang .tanda-tangan .nama-instruktur {
        position: absolute;
        top: 84%;
        right: 4.4%;
        font-family: "Montserrat", sans-serif;
        font-size: 18.9px;
        font-weight: 700;
        width: 350px;
        text-align: center;
      }

      .belakang .certificate-guru-belakang .tanda-tangan .skill {
        position: absolute;
        top: 88.3%;
        right: 8%;
        font-family: "Montserrat", sans-serif;
        font-size: 17.5px;
        font-weight: 400;
      }

      .belakang .certificate-guru-belakang .text-penilaian {
        position: absolute;
        top: 5.6%;
        left: 10.2%;
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 30px;
        line-height: 10px;
        width: 80%;
      }
    </style>
    <div class="depan"
      style='background-image: url("{{ $background->depan }}");'>
      <section id="depan">
        <div class="content">
          <div class="no">
            <p>No.</p>
          </div>
          {{-- Nomer Sertifikat --}}
          <div class="nomer">
            <p>{{ $certificate->nomor }}</p>
          </div>
          <div class="kata-kata">
            <p>Dengan ini menerangkan bahwa PT. Hummatech Digital Indonesia telah melaksanakan pelatihan
              dan uji
              kompetensi "<span>Upskilling & Reskilling Guru Kejuruan Berstandar Industri Pola SMK
                PK-Magang
                Industri</span>" kepada:</p>
          </div>
          {{-- Detail Peserta --}}
          <div class="peserta">
            <p class="nama">{{ $certificate->user->name }}</p>
            <p class="nik">{{ $certificate->user->nomor_induk }}</p>
            <p class="ttl">{{ $certificate->user->ttl }}</p>
          </div>
          {{-- Kompeten --}}
          <div class="kompeten">
            <p class="bidang">{{ $certificate->bidang }}</p>
            <p class="sub-bidang">{{ $certificate->sub_bidang ?? '-' }}</p>
          </div>
          {{-- Nilai Medal --}}
          @if ($certificate->predikat === 'Sangat Baik')
            <div class="text-penilaian" style="top: 610px; line-height: 15px">
              <p>{{ $certificate->predikat }}</p>
            </div>
          @else
            <div class="text-penilaian">
              <p>{{ $certificate->predikat }}</p>
            </div>
          @endif
          {{-- QR CODE --}}
          <div class="qr-code">
            <center>
              <img
                src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate(route('search') . '?q=' . $certificate->nomor)) }}"
                alt="QR Code">
            </center>
            <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
          </div>
          {{-- Keterangan --}}
          <div class="keterangan">
            <p>Ditetapkan di Malang</p>
            <P>Pada Tanggal
              {{ \Carbon\Carbon::createFromFormat('Y-m-d', $certificate->tanggal)->locale('id')->isoFormat('DD MMMM YYYY') }}
            </P>
            <p>Oleh PT Hummatech Digital Indonesia</p>
          </div>
        </div>
      </section>
    </div>

    @if (isset($certificate->detailCertificates[0]->materi) && isset($certificate->detailCertificates[0]->jp))
      <div class="belakang"
        style='background-image: url("{{ $background->belakang }}");'>
        <section id="belakang">
          <div class="certificate-guru-belakang">
            <div class="text-penilaian" style="text-align: center">
              <p>PENILAIAN UJI KOMPETENSI</p>
              <p>UPSKILLING & RESKILLING {{ strtoupper($certificate->bidang) }}</p>
            </div>
            <div class="table-penilayan mb-4">
              <table>
                <thead>
                  <tr style="text-align: center;">
                    <th width="10%" style="white-space: nowrap;text-align: center;">No</th>
                    <th width="70%">Materi</th>
                    <th width="20%" style="white-space: nowrap;text-align: center;">Waktu</th>
                  </tr>
                </thead>
                @php
                  $totalJP = 0;
                @endphp
                <tbody>
                  @foreach ($certificate->detailCertificates as $i => $cert)
                    <tr>
                      <th style="text-align: center;">{{ ++$i }}.</th>
                      <td style="text-align: start; padding: 2px 5px;">{{ $cert->materi }}</td>
                      <td style="text-align: center;">{{ $cert->jp }} JP</td>
                    </tr>
                    @php
                      $totalJP += $cert->jp;
                    @endphp
                  @endforeach
                  @if (count($certificate->detailCertificates) > 1)
                    <tr>
                      <td></td>
                      <th>Total</th>
                      <th style="text-align: center">{{ $totalJP }} JP</th>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <div class="tanda-tangan text-center">
              <p class="nama-instruktur">{{ $certificate->instruktur }}</p>
              <p class="skill">Senior Developer Hummatech</p>
            </div>
          </div>
      </div>
    @endif
    </section>
    </div>
  </main>
</body>

</html>
