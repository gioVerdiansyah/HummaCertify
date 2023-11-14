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


  <link rel="stylesheet" href="{{ asset('css/certificate/pelatihan.css') }} ">
</head>

<body>
  <main>
    @foreach ($certificates as $certificate)
      <div class="depan"
        style='background-image: url("{{ asset($background->depan) }}");'>
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
              <p>Dengan ini menerangkan bahwa PT. Hummatech Digital Indonesia telah melaksanakan pelatihan dan uji
                kompetensi "<span>Upskilling & Reskilling Guru Kejuruan Berstandar Industri Pola SMK PK-Magang
                  Industri</span>" kepada:</p>
            </div>
            {{-- Detail Peserta --}}
            <div class="peserta">
                <p class="nama">
                    @php
                        $nameWords = explode(' ', $certificate->user->name);
                    @endphp
                    @if (count($nameWords) > 2)
                        {{ implode(' ', array_slice($nameWords, 0, 2)) . ' ' . implode(' ', array_map(function($word) { return ($word[0]).'.'; }, array_slice($nameWords, 2))) }}
                    @else
                        {{ $certificate->user->name }}
                    @endif
                </p>
              {{-- <p class="nama">{{ $certificate->user->name }}</p> --}}
              <p class="nik">{{ $certificate->user->nomor_induk }}</p>
              <p class="ttl">{{ $certificate->user->ttl }}</p>
            </div>
            {{-- Kompeten --}}
            <div class="kompeten">
              <p class="bidang">{{ $certificate->bidang }}</p>
              <p class="sub-bidang">{{ $certificate->sub_bidang }}</p>
            </div>
            {{-- Nilai Medal --}}
            @if ($certificate->predikat === 'Sangat Baik')
              <div class="text-penilaian" style="top: 618px; line-height: 20px">
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

      <div class="belakang"
        style='background-image: url("{{ asset($background->belakang) }}");'>
        <section id="belakang">
          <div class="certificate-guru-belakang">
            <div class="text-penilaian text-center" style="text-align: center">
              <p>PENILAIAN UJI KOMPETENSI</p>
              <p>UPSKILLING & RESKILLING {{ strtoupper($certificate->bidang) }}</p>
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
                @php
                  $totalJP = 0;
                @endphp
                <tbody>
                  @foreach ($certificate->detailCertificates as $i => $detailCertificate)
                    <tr>
                      <th>{{ ++$i }}.</th>
                      <td style="padding: 0px 5px;">{{ $detailCertificate->materi }}</td>
                      <td>{{ $detailCertificate->jp }} JP</td>
                    </tr>
                    @php
                      $totalJP += $detailCertificate->jp;
                    @endphp
                  @endforeach
                  <tr>
                    <td></td>
                    <td>Total</td>
                    <td>{{ $totalJP }} JP</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tanda-tangan text-center">
              <p class="nama-instruktur">{{ $certificate->instruktur }}</p>
              <p class="skill">Senior Developer Hummatech</p>
            </div>
          </div>
      </div>
    @endforeach
    </section>
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
