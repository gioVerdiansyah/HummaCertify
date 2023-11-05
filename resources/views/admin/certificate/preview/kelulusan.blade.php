<link rel="stylesheet" href="{{asset('css/certificate/kelulusan.css')}}">
  <main id="certificate-1">
    <div class="bg" style="background-image: url({{ $bgDepan }})">
      <div class="content">
        {{-- Nomer Sertifikat --}}
        <div class="no-sertifikat">
          <div class="no">
            No.
          </div>
          <div class="nomer">
            <p>Ser/0001/0002/01/3111/2023</p>
          </div>
        </div>
        {{-- Nama Peserta --}}
        <div class="nama-peserta">
          <p>Wilsoooooon</p>
        </div>
        <div class="nik">
          00798373387262
        </div>
        <div class="sekolah">
          SMKN 1 Konoha
        </div>
        <div class="apresiasi">
          <p>Apprenticeship in Programmer Division</p>
        </div>
        <div class="qr-code">
          <center>
            <img
              src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate(route('search') . '?q=' . 'Ser/0001/0002/01/3111/2023')) }}"
              alt="QR Code">
          </center>
          <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
        </div>
      </div>
    </div>
    <div class="belakang" style="background-image: url({{ $bgBelakang }})">
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
      </div>
    </div>
  </main>
