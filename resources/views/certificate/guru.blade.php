<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Laravel 7 PDF Example</title>
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
        width: 100%;
      }

      .certificate-guru {
        position: relative;
        width: 100%;
        justify-content: center;
        display: flex;
        top: 20px;
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
    </style>
    <main>
      <div class="depan">
        <section id="depan">
          <div class="image-certificate">
            <img src="{{ asset('image/certificate-guru.png') }}" alt="">
          </div>
          <div class="certificate-guru">
            <div class="content">
              <div class="top-text d-flex">
                <div class="logo me-3">
                  <img src="{{ asset('image/logo-circle-humma.png') }}" alt="">
                </div>
                <div class="text">
                  <p class="pt-humma">
                    PT. Hummatech Digital Indonesia
                  </p>
                  <p class="alamat">
                    Perum Permata Regency 1 Blok 10/28 Karangploso, Kabupaten Malang
                  </p>
                  <div class="d-flex justify-content-center mt-1" style="gap: 0px 40px">
                    <div class="icon"><i class="bi bi-globe me-2"></i>www.hummasoft.com</div>
                    <div class="icon"><i class="bi bi-envelope-fill me-2"></i>info@hummasoft.com</div>
                    <div class="icon"><i class="bi bi-telephone-fill me-2"></i>082132560566</div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="text-kopetensi mt-4">
                <p class="sertifikat-kopetensi">
                  Setifikat Kopetensi
                </p>
                <div class="number-certification mt-2">
                  <p class="me-4">No.</p>
                  {{-- Bisa diganti (Nomer Sertifikat) --}}
                  <p class="no-sertifikat">Ser/0003/03/omb/2023</p>
                </div>
              </div>
              <div class="desc mt-1">
                Dengan ini menerangkan bahwa PT. Hummatech Digital Indonesia telah melaksanakan pelatihan
                dan
                uji kompetensi
                "<span>Upskilling & Reskilling Guru Kejuruan Berstandar Industri Pola SMK PK-Magang
                  Industri</span>" kepada:
              </div>
              <div class="identitas mt-3 row">
                {{-- Bisa Diganti --}}
                <div class="col-md-3 ms-3">
                  <ul class="list-unstyled">
                    <li>Nama</li>
                    <li>NIK</li>
                    <li>Tempat, Tanggal Lahir</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-unstyled">
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
              <div class="bidang row">
                <div class="col-md-3 ms-3">
                  <ul class="list-unstyled">
                    <li class="fw-bold">Bidang</li>
                    <li class="fw-bold">Sub Bidang</li>
                  </ul>
                </div>
                <div class="col-md-4">
                  <ul class="list-unstyled">
                    {{-- Bidang --}}
                    <li>: &nbsp;&nbsp; Pemrograman Mobile App</li>
                    {{-- Sub Bidang --}}
                    <li>: &nbsp;&nbsp; Pemrograman Flutter</li>
                  </ul>
                </div>
              </div>
              <div class="bottom-finish row">
                <div class="col-md-6 ms-2 kiri">
                  <p style="margin-bottom: 0; font-size: 12px">DENGAN PREDIKAT</p>
                  <img style="width: auto;height: 130px" src="{{ asset('image/nilai-baik.png') }}" alt="">
                </div>
                <div class="col-md-5 kanan ms-5 ps-5">
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
          <div class="certificate-guru-belakang">
            <div class="content-belakang">
              <div class="text-penilaian text-center">
                <p>PENILAIAN UJI KOMPETENSI</p>
                <p>UPSKILLING & RESKILLING PEMROGRAMAN MOBILE APP</p>
              </div>
              <div class="table-penilayan mb-4">
                <table class=" table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th class="col-1">No</th>
                      <th class="col-8">Materi</th>
                      <th class="col-2">Waktu</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th class="text-center">1.</th>
                      <td>Pengenalan dan Instalasi Flutter</td>
                      <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                      <th class="text-center">2.</th>
                      <td>Struktur Project Stateless dan Statefull Widget Flutter</td>
                      <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                      <th class="text-center">3.</th>
                      <td>Navigator dan Route di Flutter</td>
                      <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                      <th class="text-center">4.</th>
                      <td>Design UI/UX dengan Figma</td>
                      <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                      <th class="text-center">5.</th>
                      <td>Pengenalan GetX di Flutter</td>
                      <td class="text-center">8 JP</td>
                    </tr>
                    <tr>
                      <th class="text-center">6.</th>
                      <td>CRUD (Create, Read, Update, Delete) GetX dengan Firebase di Flutter</td>
                      <td class="text-center">10 JP</td>
                    </tr>
                    <tr>
                      <th class="text-center">7.</th>
                      <td>Uji Kompetensi Pemrograman Mobile App dengan Flutter</td>
                      <td class="text-center">10 JP</td>
                    </tr>
                    <tr class="fw-bold">
                      <th class="text-center"></th>
                      <td class="text-center">Total</td>
                      <td class="text-center">60 JP</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="instruktur row">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                  <div class="atas text-center">
                    <p>Instruktur</p>
                  </div>
                  <div class="bawah text-center">
                    <p class="nama-instruktur">Dito Cahya Pratama, S.Tr.Kom</p>
                    <hr>
                    <p>Senior Developer Hummatech</p>
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
