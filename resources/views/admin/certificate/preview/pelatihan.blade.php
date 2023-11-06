<link rel="stylesheet" href="{{ asset('css/certificate/pelatihan.css') }} ">
  <main>
    <div class="depan"
      style='background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-guru-depan.png");'>
      <section id="depan">
        <div class="content">
          <div class="no">
            <p>No.</p>
          </div>
          {{-- Nomer Sertifikat --}}
          <div class="nomer">
            <p>Ser/0001/0002/01/3111/2023</p>
          </div>
          <div class="kata-kata">
            <p>Dengan ini menerangkan bahwa PT. Hummatech Digital Indonesia telah melaksanakan pelatihan dan uji
              kompetensi "<span>Upskilling & Reskilling Guru Kejuruan Berstandar Industri Pola SMK PK-Magang
                Industri</span>" kepada:</p>
          </div>
          {{-- Detail Peserta --}}
          <div class="peserta">
            <p class="nama">Wilsoooooon</p>
            <p class="nik">00798373387262</p>
            <p class="ttl">Lumajang, 24-08-1997</p>
          </div>
          {{-- Kompeten --}}
          <div class="kompeten">
            <p class="bidang">Workshop Pelatihan Laravel Intermediate<</p>
            <p class="sub-bidang">Pembelajaran Laravel dalam Database & Faker</p>
          </div>
          {{-- Nilai Medal --}}
            <div class="text-penilaian">
              <p>Baik</p>
            </div>
          {{-- QR CODE --}}
          <div class="qr-code">
            <center>
              <img
                src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate(route('search') . '?q=' . 'Ser/0001/0002/01/3111/2023')) }}"
                alt="QR Code">
            </center>
            <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
          </div>
          {{-- Keterangan --}}
          <div class="keterangan">
            <p>Ditetapkan di Malang</p>
            <P>Pada Tanggal
              17 November 2023
            </P>
            <p>Oleh PT Hummatech Digital Indonesia</p>
          </div>
        </div>
      </section>
    </div>

    <div class="belakang"
      style='background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-guru-belakang.png");'>
      <section id="belakang">
        <div class="certificate-guru-belakang">
          <div class="text-penilaian text-center" style="text-align: center">
            <p>PENILAIAN UJI KOMPETENSI</p>
            <p>UPSKILLING & RESKILLING {{ strtoupper("Workshop Pelatihan Laravel Intermediate") }}</p>
          </div>
          <div class="table-penilayan mb-4">
            <table>
              <thead>
                <tr style="text-align: center;">
                  <th width="10%">No</th>
                  <th width="70%">Materi</th>
                  <th width="20%">Waktu</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1.</th>
                  <td style="text-align: start; padding: 2px 5px;">Pembelajaran Laravel</td>
                  <td>70 JP</td>
                </tr>
                <tr>
                    <th>2.</th>
                    <td style="text-align: start; padding: 2px 5px;">Pembelajaran Laravel</td>
                    <td>70 JP</td>
                  </tr>
                  <tr>
                    <th>3.</th>
                    <td style="text-align: start; padding: 2px 5px;">Pembelajaran Laravel</td>
                    <td>70 JP</td>
                  </tr>
                  <tr>
                    <th>4.</th>
                    <td style="text-align: start; padding: 2px 5px;">Pembelajaran Laravel</td>
                    <td>70 JP</td>
                  </tr>
                  <tr>
                    <th>5.</th>
                    <td style="text-align: start; padding: 2px 5px;">Pembelajaran Laravel</td>
                    <td>70 JP</td>
                  </tr>
                <tr>
                  <td></td>
                  <th>Total</th>
                  <th>450 JP</th>
                </tr>
            </tbody>
            </table>
          </div>
          <div class="tanda-tangan text-center">
            <p class="nama-instruktur">Afrizal S.Kom</p>
            <p class="skill">Senior Developer Hummatech</p>
          </div>
        </div>
  </main>
