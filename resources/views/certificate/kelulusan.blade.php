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
            href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Open+Sans:wght@700&family=Poppins:wght@400;500&display=swap"
            rel="stylesheet">

        {{-- Import CSS --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/certificate/certificate.css') }}"> --}}
        <style type="text/css">
            body {
                -webkit-print-color-adjust: exact;
            }
        </style>
    </head>

    <body>
        <main id="certificate-1">
            <style>
                .image-certificate {
                    max-width: 100%;
                    position: absolute;
                }

                .image-certificate img {
                    -webkit-print-color-adjust: exact;
                    max-width: 100%;
                }

                .content-text .top-text {
                    line-height: 50px;
                }

                .content-text .top-text .certificate-text {
                    font-family: "Merriweather", serif;
                    font-weight: 700;
                    font-size: 60px;
                    letter-spacing: 5px;
                    color: #02b1ef;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                .content-text .top-text .certificate-text p {
                    margin-bottom: 0;
                }

                .content-text .top-text .number-certification {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 19px;
                    letter-spacing: 2px;
                    font-family: "Merriweather", serif;
                    font-weight: 400;
                }

                .content-text .top-text .number-certification p {
                    margin-bottom: 0;
                }

                .content-text .top-text .number-certification .no-sertifikat {
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    font-size: 18px;
                    letter-spacing: 15px;
                }

                .text-humma {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    line-height: 33px;
                }

                .content-text .text-humma .hummatech {
                    font-family: "Merriweather", serif;
                    font-weight: 400;
                    font-size: 25px;
                    font-weight: 400;
                    letter-spacing: 2px;
                }

                .content-text .text-humma .hummatech p {
                    margin-bottom: 0;
                }

                .content-text .text-humma .official {
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    font-size: 20px;
                    letter-spacing: 10px;
                }

                .content-text .text-humma .official p {
                    margin-bottom: 0;
                }

                .content-text .nama-peserta p {
                    font-size: 72px;
                    font-family: "Great Vibes", cursive;
                    font-weight: 400;
                    color: #1c2143;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 0;
                }

                .content-text .identitas-murid-pendidikan {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    margin-bottom: 10px;
                }

                .content-text .identitas-murid-pendidikan .nisn-nis p {
                    margin-bottom: 0;
                    font-family: 'Open Sans', sans-serif;
                    font-weight: 700;
                    font-size: 18px;
                    letter-spacing: 2px;
                }

                .content-text .identitas-murid-pendidikan .asal-sekolah p {
                    margin-bottom: 0;
                    font-family: 'Open Sans', sans-serif;
                    font-weight: 700;
                    font-size: 18px;
                    letter-spacing: 2px;
                    text-transform: uppercase;
                }

                .content-text .gabungan {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .content-text .gabungan .text-pujian p {
                    margin-bottom: 0;
                    font-size: 17px;
                    font-family: "Poppins", sans-serif;
                    font-weight: 400;
                    letter-spacing: 1px;
                }

                .content-text .gabungan .text-devinisi p {
                    margin-bottom: 0;
                    font-size: 17px;
                    letter-spacing: 2px;
                    font-family: "Poppins", sans-serif;
                    font-weight: 700;
                }

                .guru {
                    height: 130px;
                    width: 650px;
                    align-items: end;
                    text-align: center;
                }

                .guru .guru-identitas {
                    line-height: 5px;
                }

                .guru .guru-identitas .nama-guru {
                    font-weight: 500;
                    font-family: 'Poppins', sans-serif;
                    font-size: 16px;
                }

                .guru .guru-identitas .title-guru {
                    font-weight: 400;
                    font-family: 'Poppins', sans-serif;
                    font-size: 13px;
                    letter-spacing: 4px;
                }

                .guru .qr-code {
                    transform: translate(-8px, 53px);
                }
            </style>
            <div class="image-certificate">
                <img src="{{ asset('image/certificate-bg.png') }}" alt="Background Certificate" />
            </div>
            <div class="content">
                <div class="content-text">
                    <div class="top-text">
                        <div class="certificate-text">
                            <p>CERTIFICATE</p>
                        </div>
                        <div class="number-certification">
                            {{-- Bisa diganti --}}
                            <p class="me-3">No.</p>
                            <p class="no-sertifikat">93626000153</p>
                        </div>
                    </div>
                    <div class="text-humma">
                        <div class="hummatech">
                            <p>Hummatech Apprentice program</p>
                        </div>
                        <div class="official">
                            <p>OFFICIAL CERTIFICATION</p>
                        </div>
                    </div>
                    <div class="nama-peserta">
                        {{-- Bisa diganti --}}
                        <p>Joe Boeden</p>
                    </div>
                    <div class="identitas-murid-pendidikan">
                        <div class="nisn-nis">
                            {{-- Bisa diganti --}}
                            <p>2141764060</p>
                        </div>
                        <div class="asal-sekolah">
                            {{-- Bisa diganti --}}
                            <p>Politeknik Negri Malang</p>
                        </div>
                    </div>
                    <div class="gabungan">
                        <div class="text-pujian">
                            <p>Who Has Successfully completed the</p>
                        </div>
                        <div class="text-devinisi">
                            {{-- Bisa diganti --}}
                            <p>Apprenticeship in Degisner Division</p>
                        </div>
                    </div>
                    <div class="guru row">
                        <div class="col-md-5">
                            <div class="guru-identitas">
                                <p class="nama-guru">
                                    Afrizal Himawan, S.Kom
                                </p>
                                <p class="title-guru">
                                    DIREKTUR
                                </p>
                            </div>
                        </div>
                        <div class="qr-code col-md-2">
                            {!! QrCode::size(100)->generate(route('login')) !!}
                        </div>
                        <div class="col-md-5">
                            <div class="guru-identitas">
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
            </div>
        </main>
    </body>

</html>
