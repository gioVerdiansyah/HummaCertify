<link rel="stylesheet" href="{{ asset('css/certificate/kompetensi.css') }}">
<main>
    {{-- Depan --}}
    <div class="depan"
        style='background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/guru-tamu.png");'>
        <div class="content">
            <div class="qr-code">
                <center>
                    <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->merge('https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/logo-bg-blue.png', 0.3, true)->size(100)->generate(route('search') . '?q=' . 'Ser/0001/0002/01/3111/2023')) }}"
                        alt="QR Code">
                </center>
                <figcaption style="font-size: 10px">QR authenticity certificate</figcaption>
            </div>
            <div class="no-sertifikat">
                <p class="no">No.</p>
                <p class="nomer">Ser/0001/0002/01/3111/2023</p>
            </div>
            <div class="nama">
                <p>Wilsoooooon</p>
            </div>
            <div class="sekolah">
                <p>SMKN 1 Konoha</p>
            </div>
            <div class="text">
                <p class="telah">Telah mengikut </p>
                <p class="pelatihan">Sertifikasi Flutter Beginner</p>
                <p class="tanggal">yang diselenggarakan pada tanggal 22 s.d 28 Oktober 2023 Oleh</p>
                <p class="pt">PT Hummatech Digital Indonesia</p>
            </div>
            <div class="nilai">
                <p>Baik</p>
            </div>
        </div>
    </div>
    {{-- Belakang --}}
    <div class="belakang"
        style='background-image: url("https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/guru-tamu-belakang.png");'>
        <div class="content">
            <div>
                <p class="pelatihan">"Sertifikasi Flutter Beginner"</p>
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
            <div>
                <p class="nama-instruktur">Pak Afrizal S.Kom</p>
            </div>
        </div>
    </div>
</main>
