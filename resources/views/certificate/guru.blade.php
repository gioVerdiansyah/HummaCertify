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
  {{-- Depan --}}
  <div id="certificate-1">
    <style>
      @page {
        width: 210mm;
        height: 297mm;
      }

      .certificate-guru .content hr {
        border: 2px solid;
        background-color: black;
        opacity: 1;
        border-radius: 20px;
      }

      .image-certificate {
        position: absolute;
      }

      .image-certificate img {
        max-width: 100%;
        -webkit-print-color-adjust: exact;
      }

      img {
        height: 100%;
        max-width: 100%;
      }

      .certificate-guru {
        position: relative;
        width: 100%;
        justify-content: center;
        display: flex;
        top: 40px;
      }

      .certificate-guru .content {
        width: 730px;
      }

      .certificate-guru .content .top-text .logo {
        height: 110px;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .certificate-guru .content .top-text .logo img {
        width: 120px;
        height: 120px;
      }

      .certificate-guru .content .top-text .text {
        display: flex;
        flex-direction: column;
        justify-content: center;
      }

      .certificate-guru .content .top-text .pt-humma {
        font-family: "Poppins", sans-serif;
        font-weight: 700;
        letter-spacing: 3px;
        font-size: 26px;
        margin-bottom: 0;
      }

      .certificate-guru .content .top-text .alamat {
        font-family: "Poppins", sans-serif;
        font-weight: 400;
        font-size: 14px;
        margin-bottom: 0;
      }

      .certificate-guru .content .top-text {
        text-align: center;
      }

      .certificate-guru .content .text-kopetensi {
        display: flex;
        flex-direction: column;
        align-items: center;
        line-height: 15px;
      }

      .certificate-guru .content .text-kopetensi .sertifikat-kopetensi {
        font-size: 25px;
        font-family: "Merriweather", serif;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 5px;
      }

      .certificate-guru .content .text-kopetensi .number-certification {
        display: flex;
        font-family: "Merriweather", serif;
        font-size: 16px;
      }

      .certificate-guru .content .text-kopetensi .number-certification .no-sertifikat {
        font-family: "Poppins", sans-serif;
        font-size: 15px;
        letter-spacing: 5px;
      }

      .certificate-guru .content hr {
        margin-top: 0;
      }

      .certificate-guru .content .desc {
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 14px;
      }

      .certificate-guru .content .desc span {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
      }

      .certificate-guru .content .identitas {
        display: flex;
        align-items: center;
        height: 100px;
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 14px;
      }

      .certificate-guru .content .identitas span {
        font-weight: 700;
      }

      .certificate-guru .content .text-telah {
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 14px;
      }

      .certificate-guru .content .bidang {
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 14px;
      }

      .certificate-guru .content .bottom-finish .kiri p {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
      }

      .certificate-guru .content .bottom-finish .kanan {
        height: 210px;
        margin-top: -40px;
      }

      .certificate-guru .content .bottom-finish .kanan p {
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 12px;
        margin-bottom: 0;
      }

      .certificate-guru .content .bottom-finish .kanan .atas {
        height: 70%;
      }

      .certificate-guru .content .bottom-finish .kanan .bawah .nama-direktur {
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 0;
      }

      .certificate-guru .content .bottom-finish .kanan .bawah {
        letter-spacing: 1px;
      }

      .certificate-guru .content .text-penilaian p {
        margin-bottom: 0;
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
        font-size: 18px;
      }

      .image-certificate-belakang {
        position: absolute;
      }

      .image-certificate-belakang img {
        max-width: 100%;
        -webkit-print-color-adjust: exact;
      }

      .certificate-guru-belakang {
        position: absolute;
        width: 100%;
        justify-content: center;
        display: flex;
        top: 120%;
      }

      .certificate-guru-belakang .content-belakang {
        width: 730px;
        font-family: "Montserrat", sans-serif;
        font-weight: 500;
        font-size: 14px;
      }

      .certificate-guru-belakang .content-belakang .text-penilaian {
        font-weight: 700;
        font-size: 18px;
        line-height: 10px;
        margin-bottom: 30px;
      }

      .certificate-guru-belakang .content-belakang .instruktur {
        height: 200px;
      }

      .certificate-guru-belakang .content-belakang .instruktur p {
        margin-bottom: 0;
      }

      .certificate-guru-belakang .content-belakang .instruktur .atas {
        height: 50%;
      }

      .certificate-guru-belakang .content-belakang .instruktur .bawah hr {
        margin: 0;
      }

      .certificate-guru-belakang .content-belakang .instruktur .bawah .nama-instruktur {
        font-weight: 700;
        font-size: 14.5px;
      }

      .certificate-guru-belakang .content-belakang .table-penilayan table {
        border: 1px solid
      }
      .certificate-guru-belakang .content-belakang .table-penilayan table thead {
        border: 1px solid
      }

      th, td {
  border: 1px solid black;
}
    </style>
    <main>
      <div class="depan">
        <section id="depan">
          <div class="image-certificate">
            <img src="{{ asset('image/certificate-guru.png') }}" alt="">
          </div>
          <div class="certificate-guru">
            <div class="content" style="top: 20%;">
              <div class="top-text d-flex" style="display: flex">
                <div class="logo me-3">
                  <img src="{{ asset('image/logo-circle-humma.png') }}" alt="">
                </div>
                <div class="text" style="margin-top: -35px">
                  <p class="pt-humma" style=" font-family: 'Poppins', sans-serif;">
                    PT. Hummatech Digital Indonesia
                  </p>
                  <p class="alamat" style="margin-bottom: 5px; margin-top: -5px">
                    Perum Permata Regency 1 Blok 10/28 Karangploso, Kabupaten Malang
                  </p>
                  <div class="d-flex justify-content-center mt-1"
                    style="gap: 0px 40px; display: flex; font-family: 'Poppins', sans-serif; font-size: 13px">
                    <div class="icon"><i class="bi bi-globe me-2" style="margin-right: 10px"></i>www.hummasoft.com
                    </div>
                    <div class="icon"><i class="bi bi-envelope-fill me-2"
                        style="margin-right: 10px"></i>info@hummasoft.com</div>
                    <div class="icon"><i class="bi bi-telephone-fill me-2" style="margin-right: 10px"></i>082132560566
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-kopetensi mt-4">
                <p class="sertifikat-kopetensi" style="margin-bottom: 0">
                  Setifikat Kopetensi
                </p>
                <div class="number-certification mt-2"
                  style="display: flex; align-content: center; justify-content: center">
                  <p class="me-4">No.</p>
                  {{-- Bisa diganti (Nomer Sertifikat) --}}
                  <p class="no-sertifikat">Ser/0003/03/omb/2023</p>
                </div>
              </div>
              <div class="desc mt-1" style="font-size: 14px; line-height: 20px">
                Dengan ini menerangkan bahwa PT. Hummatech Digital Indonesia telah melaksanakan pelatihan dan uji
                kompetensi "<span>Upskilling & Reskilling Guru Kejuruan Berstandar Industri Pola SMK PK-Magang
                  Industri</span>" kepada:
              </div>
              <div class="identitas mt-3 row">
                {{-- Bisa Diganti --}}
                <div class="col-md-3 ms-3">
                  <ul class="list-unstyled"style="list-style: none">
                    <li>Nama</li>
                    <li>NIK</li>
                    <li>Tempat, Tanggal Lahir</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-unstyled"style="list-style: none">
                    {{-- Nama --}}
                    <li>: &nbsp;&nbsp; <span>Afri Mubarok, S.Kom</span></li>
                    {{-- NIK --}}
                    <li>: &nbsp;&nbsp; 3513050204920004</li>
                    {{-- Tempat, Tanggal Lahir --}}
                    <li>: &nbsp;&nbsp; Probolinggo, 02 April 1992</li>
                  </ul>
                </div>
              </div>
              <div class="text-telah">
                <p>Telah dinyatakan kompeten dalam:</p>
              </div>
              <div class="bidang row" style="display: flex">
                <div class="col-md-3 ms-3">
                  <ul class="list-unstyled" style="list-style: none">
                    <li class="fw-bold" style="font-weight: 700">Bidang</li>
                    <li class="fw-bold" style="font-weight: 700">Sub Bidang</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-unstyled" style="list-style: none">
                    {{-- Bidang --}}
                    <li>: &nbsp;&nbsp; Pemrograman Mobile App</li>
                    {{-- Sub Bidang --}}
                    <li>: &nbsp;&nbsp; Pemrograman Flutter</li>
                  </ul>
                </div>
              </div>
              <div class="bottom-finish row" style="display: flex; justify-content:space-between">
                <div class="col-md-6 ms-2 kiri">
                  <p style="margin-bottom: 0; font-size: 12px">DENGAN PREDIKAT</p>
                  <img style="width: auto;height: 130px" src="{{ asset('image/nilai-baik.png') }}" alt="">
                </div>
                <div class="col-md-5 kanan ms-5 ps-5" style="line-height: 5px">
                  <div class="atas">
                    <p>Ditetapkan di Malang</p>
                    {{-- Tanggal bisa dirubah --}}
                    <p>Pada tanggal 23 Agustus 2023</p>
                    <p>Oleh PT Hummatech Digital Indonesia</p>
                  </div>
                  <div class="bawah">
                    <p class="nama-direktur">
                      Afrizal Himawan, S.Kom
                    </p>
                    <p>DIREKTUR UTAMA</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <div class="belakang">
        <section id="belakang">
          <div class="image-certificate-belakang">
            <img src="{{ asset('image/certificate-guru.png') }}" alt="">
          </div>
          <div class="certificate-guru-belakang"
            style="position: absolute; width: 100%; justify-content: center; display: flex; top: 120%;">
            <div class="content-belakang">
              <div class="text-penilaian text-center" style="text-align: center">
                <p>PENILAIAN UJI KOMPETENSI</p>
                <p>UPSKILLING & RESKILLING PEMROGRAMAN MOBILE APP</p>
              </div>
              <div class="table-penilayan mb-4">
                <table style="border-collapse: collapse; width: 100%">
                  <thead>
                    <tr style="text-align: center">
                      <th colspan="1">No</th>
                      <th colspan="1">Materi</th>
                      <th colspan="1">Waktu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th style="text-align: center">1.</th>
                      <td>Pengenalan dan Instalasi Flutter</td>
                      <td style="text-align: center">8 JP</td>
                    </tr>
                    <tr>
                      <th style="text-align: center">2.</th>
                      <td>Struktur Project Stateless dan Statefull Widget Flutter</td>
                      <td style="text-align: center">8 JP</td>
                    </tr>
                    <tr>
                      <th style="text-align: center">3.</th>
                      <td>Navigator dan Route di Flutter</td>
                      <td style="text-align: center">8 JP</td>
                    </tr>
                    <tr>
                      <th style="text-align: center">4.</th>
                      <td>Design UI/UX dengan Figma</td>
                      <td style="text-align: center">8 JP</td>
                    </tr>
                    <tr>
                      <th style="text-align: center">5.</th>
                      <td>Pengenalan GetX di Flutter</td>
                      <td style="text-align: center">8 JP</td>
                    </tr>
                    <tr>
                      <th style="text-align: center">6.</th>
                      <td>CRUD (Create, Read, Update, Delete) GetX dengan Firebase di Flutter</td>
                      <td style="text-align: center">10 JP</td>
                    </tr>
                    <tr>
                      <th style="text-align: center">7.</th>
                      <td>Uji Kompetensi Pemrograman Mobile App dengan Flutter</td>
                      <td style="text-align: center">10 JP</td>
                    </tr>
                    <tr style="font-weight: 700">
                      <th style="text-align: center"></th>
                      <td style="text-align: center">Total</td>
                      <td style="text-align: center">60 JP</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="instruktur" style="display: flex; justify-content: end">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                  <div class="atas" style="text-align: center">
                    <p>Instruktur</p>
                  </div>
                  <div class="bawah text-center">
                    <p class="nama-instruktur" style="margin-bottom: 4px">Dito Cahya Pratama, S.Tr.Kom</p>
                    <hr>
                    <p style="text-align: center; margin-top: 0px">Senior Developer Hummatech</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
</body>

</html>
