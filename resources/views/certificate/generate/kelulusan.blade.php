<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        {{-- FONT SIZE --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Open+Sans:wght@700&family=Poppins:wght@400;500&display=swap"
            rel="stylesheet">

        {{-- Import CSS --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/certificate/certificate.css') }}"> --}}
    </head>

    <body>
        <main id="certificate-1">
            <style>
                /* Define the page size and orientation */
                @page {
                    size: A4 landscape;
                    margin: 0;
                }

                /* Styles for the main container */
                .image-certificate {
                    position: absolute;
                    width: 100%;
                    height: 100%;
                }

                /* Styles for the image inside the container */
                .image-certificate img {
                    width: 100%;
                    height: auto;
                }

                /* Styles for the content container */
                .content {
                    position: absolute;
                    top: 8%;
                    width: 100%;
                    height: 100%;
                    overflow: hidden;
                    display: flex;
                    flex-direction: column;
                    /* align-items: center; */
                    text-align: center;
                    color: #1c2143;
                }

                /* Styles for the top text */
                .content .content-text .top-text {
                    line-height: 30px;
                }

                .content .content-text .top-text .certificate-text {
                    font-family: "Merriweather", serif;
                    font-weight: 700;
                    font-size: 60px;
                    letter-spacing: 5px;
                    color: #02b1ef;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .content .content-text .top-text .certificate-text p {
                    margin-bottom: 0;
                }

                .content .content-text .top-text .number-certification {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 19px;
                    letter-spacing: 2px;
                    font-family: "Merriweather", serif;
                    font-weight: 400;
                }

                .content .content-text .top-text .number-certification p {
                    margin-top: -30px;
                    margin-bottom: 0;
                }

                .content .content-text .top-text .number-certification p span.no-sertifikat {
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    font-size: 18px;
                    letter-spacing: 8px;
                }

                /* Styles for the text-humma */
                .content .content-text .text-humma {
                    margin-top: -10px;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    line-height: 20px;
                }

                .content .content-text .text-humma .hummatech {
                    margin-top: -10px;
                    font-family: "Merriweather", serif;
                    font-weight: 400;
                    font-size: 25px;
                    letter-spacing: 2px;
                }

                .content .content-text .text-humma .hummatech p {
                    margin-bottom: 0;
                }

                .content .content-text .text-humma .official {
                    margin-top: -10px;
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    font-size: 20px;
                    letter-spacing: 10px;
                }

                .content .content-text .text-humma .official p {
                    margin-bottom: 0;
                }

                /* Styles for the nama-peserta */
                .content .content-text .nama-peserta {
                    margin-top: -65px;
                }

                .content .content-text .nama-peserta p {
                    font-size: 72px;
                    font-family: "Great Vibes", cursive;
                    font-weight: 400;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 0;
                }

                /* Styles for identitas-murid-pendidikan */
                .content .content-text .identitas-murid-pendidikan {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 10px;
                }

                .content .content-text .identitas-murid-pendidikan .nisn-nis p {
                    margin-bottom: 5px;
                    font-family: 'Open Sans', sans-serif;
                    font-weight: 700;
                    font-size: 18px;
                    letter-spacing: 2px;
                }

                .content .content-text .identitas-murid-pendidikan .asal-sekolah p {
                    margin-top: 0px;
                    margin-bottom: 0;
                    font-family: 'Open Sans', sans-serif;
                    font-weight: 700;
                    font-size: 18px;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }

                /* Styles for gabungan */
                .content .content-text .gabungan {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .content .content-text .gabungan .text-pujian p {
                    margin-top: 0px;
                    margin-bottom: 0;
                    font-size: 17px;
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    letter-spacing: 1px;
                }

                .content .content-text .gabungan .text-devinisi p {
                    margin-top: 0px;
                    margin-bottom: 0;
                    font-size: 17px;
                    letter-spacing: 2px;
                    font-family: "Poppins", sans-serif;
                    font-weight: 700;
                }

                /* Styles for guru */
                .content .content-text .guru {
                    position: relative;
                    display: flex;
                    flex-direction: row !important;
                    align-items: flex-end;
                    text-align: center;
                    justify-content: space-between;
                }

                .content .content-text .guru .guru-identitas {
                    line-height: 5px;
                }

                .content .content-text .guru .guru-identitas .nama-guru {
                    font-weight: 500;
                    font-family: 'Poppins', sans-serif;
                    font-size: 16px;
                }

                .content .content-text .guru .guru-identitas .title-guru {
                    font-weight: 400;
                    font-family: 'Poppins', sans-serif;
                    font-size: 13px;
                    letter-spacing: 4px;
                }
                .content .content-text .guru .qr-code{
                    transform: translateY(15px);
                }
            </style>
            <div class="image-certificate">
                <img src="https://raw.githubusercontent.com/gioVerdiansyah/Upload-Image/main/certificate-bg.png"
                    alt="Background Certificate" />
            </div>
            <div class="content">
                <div class="content-text">
                    <div class="top-text" style="justify-content: center">
                        <div class="certificate-text" style="margin-bottom: 8px">
                            <p>CERTIFICATE</p>
                        </div>
                        <div class="number-certification">
                            {{-- Bisa diganti --}}
                            <p class="me-3" style="margin-right: 20px">No. <span
                                    class="no-sertifikat">{{ $certificate->nomor }}</span></p>
                        </div>
                    </div>
                    <div class="text-humma" style="justify-content: center">
                        <div class="hummatech">
                            <p>Hummatech Apprentice program</p>
                        </div>
                        <div class="official">
                            <p>OFFICIAL CERTIFICATION</p>
                        </div>
                    </div>
                    <div class="nama-peserta" style="justify-content: center">
                        <p>{{ $certificate->user->name }}</p>
                    </div>
                    <div class="identitas-murid-pendidikan" style="justify-content: center">
                        <div class="nisn-nis">
                            <p>{{ $certificate->user->password }}</p>
                        </div>
                        <div class="asal-sekolah">
                            <p>{{ $certificate->user->institusi }}</p>
                        </div>
                    </div>
                    <div class="gabungan" style="justify-content: center">
                        <div class="text-pujian">
                            <p>Who Has Successfully completed the</p>
                        </div>
                        <div class="text-devinisi">
                            <p>Apprenticeship in {{ $certificate->bidang }} Division</p>
                        </div>
                    </div>
                    <div class="guru">
                        <div class="guru-identitas" style="position: absolute; top: 10px; left: 25%">
                            <p class="nama-guru">
                                Afrizal Himawan, S.Kom
                            </p>
                            <p class="title-guru">
                                DIREKTUR
                            </p>
                        </div>
                        <div class="qr-code">
                            <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(100)->generate('https://poe.com/')) }}" alt="QR Code">
                        </div>
                        <div class="guru-identitas" style="position: absolute; top: 10px; right: 25%;">
                            <p class="nama-guru">
                                Andika Wahyu P, S.Kom
                            </p>
                            <p class="title-guru">
                                PEMBIMBING
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>

</html>
