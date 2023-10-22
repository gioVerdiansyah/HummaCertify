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
                    size: A4 landscape;
                    margin: 0;
                }

                body {
                    margin: 0;
                }

                /* .image-certificate {
                    position: absolute;
                    top: 0;
                } */

                /* .image-certificate-belakang {
                    position: absolute;
                    top: 1px;
                } */

                .image-certificate img,
                .image-certificate-belakang img {
                    max-width: 100%;
                    -webkit-print-color-adjust: exact;
                }

                .certificate-guru .no-sertifikat {
                    position: absolute;
                    display: flex;
                    top: 173px;
                    display: flex;
                    font-family: "Merriweather", serif;
                    font-size: 18px;
                }

                .certificate-guru .no-sertifikat .no {
                    margin-right: 20px;
                }

                .certificate-guru .no-sertifikat .nomer {
                    font-family: "Poppins", sans-serif;
                    font-size: 17px;
                    letter-spacing: 5px;
                }

                .certificate-guru {
                    position: absolute;
                    width: 100%;
                    justify-content: center;
                    display: flex;
                    top: 40px;
                }

                .certificate-guru .peserta {
                    position: absolute;
                    top: 307px;
                    left: 385px;
                    line-height: 9px;
                    font-family: "Montserrat", sans-serif;
                    font-weight: 500;
                    font-size: 14px;
                    letter-spacing: 1px;
                }

                .certificate-guru .peserta .nama {
                    font-weight: 700;
                }

                .certificate-guru .peserta .ttl {
                    letter-spacing: 0px;
                }

                .certificate-guru .kompeten {
                    position: absolute;
                    top: 438px;
                    left: 385px;
                    line-height: 12px;
                    font-family: "Montserrat", sans-serif;
                    font-weight: 700;
                    font-size: 15px;
                }

                .certificate-guru .keterangan {
                    position: absolute;
                    top: 475px;
                    right: 185px;
                    line-height: 10px;
                    font-family: "Montserrat", sans-serif;
                    font-weight: 500;
                    font-size: 13px;
                }

                .certificate-guru .text-penilaian {
                    position: absolute;
                    top: 575px;
                    left: 213px;
                    width: 80px;
                    height: 60px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    font-family: "Montserrat", sans-serif;
                    font-weight: 700;
                    color: white;
                    font-size: 16px;
                    text-transform: uppercase
                }

                .depan{
                    position: relative;
                    z-index: 1;
                }
                .belakang,.image-certificate-belakang,#belakang{
                    position: relative;
                    /* transform: translateY(100%); */
                }
                .certificate-guru-belakang {
                    position: absolute;
                    width: 100%;
                    justify-content: center;
                    display: flex;
                    top: 10%;
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
                    position: absolute;
                    top: 450px;
                    right: 100px;
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

                th,
                td {
                    border: 1px solid black;
                }
            </style>
            <main>
                <div class="depan">
                    <section id="depan">
                        <div class="image-certificate">
                            <img src="https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-guru-depan.png" alt="">
                        </div>
                        <div class="certificate-guru">
                            {{-- No Sertifikat --}}
                            <div class="no-sertifikat">
                                <p class="no">No.</p>
                                <p class="nomer">{{ $certificate->nomor }}</p>
                            </div>
                            {{-- Detail Peserta --}}
                            <div class="peserta">
                                <p class="nama">{{ $certificate->user->name }}</p>
                                <p class="nik">{{ $certificate->user->password }}</p>
                                <p class="ttl">{{ $certificate->user->ttl }}</p>
                            </div>
                            {{-- Kompeten --}}
                            <div class="kompeten">
                                <p class="bidang">{{ $certificate->bidang }}</p>
                                <p class="sub-bidang">{{ $certificate->sub_bidang }}</p>
                            </div>
                            {{-- Nilai Medal --}}
                            <div class="text-penilaian">
                                <p>Baik</p>
                            </div>
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

                <div class="belakang">
                    <section id="belakang">
                        <div class="image-certificate-belakang">
                            <img src="https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-guru.png"
                                alt="">
                        </div>
                        <div class="certificate-guru-belakang">
                            <div class="content-belakang">
                                <div class="text-penilaian text-center" style="text-align: center">
                                    <p>PENILAIAN UJI KOMPETENSI</p>
                                    <p>UPSKILLING & RESKILLING {{ strtoupper($certificate->bidang) }}</p>
                                </div>
                                <div class="table-penilayan mb-4">
                                    <table style="border-collapse: collapse; width: 100%">
                                        <thead>
                                            <tr style="text-align: center">
                                                <th width="10%">No</th>
                                                <th width="75%">Materi</th>
                                                <th width="40%">Waktu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($certificate->detailCertificates as $i => $cert)
                                                <tr>
                                                    <th style="text-align: center">{{ ++$i }}.</th>
                                                    <td style="padding:0px 5px;">{{ $cert->materi }}</td>
                                                    <td style="text-align: center">{{ $cert->jp }} JP</td>
                                                </tr>
                                            @endforeach
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
                                            <p class="nama-instruktur" style="margin-bottom: 4px">Dito Cahya Pratama,
                                                S.Tr.Kom</p>
                                            <hr>
                                            <p style="text-align: center; margin-top: 0px">Senior Developer Hummatech
                                            </p>
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
