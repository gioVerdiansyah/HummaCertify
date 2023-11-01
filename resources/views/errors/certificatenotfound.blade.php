<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: #fff;
            font-family: 'Poppins', sans-serif !important;
        }

        .btn-biru {
            background: #0A7DB4;
            color: #fff;
            padding: 0.6rem 1.5rem;
            border-radius: 15px;
        }

        .btn-biru:hover {
            background: #daeaf7;
            color: #2c475d;
        }

        .jangka {
            padding-right: 10px;
        }

        .img {
            width: 35%;
        }

        .p {
            padding: 3rem;
        }
    </style>
</head>

<body>
    <div class="text-center p">
        <img src="{{ asset('landingpage/images/nocertificatefound.png') }}" class="img pb-5" alt="">
        <h1 class="pb-3">Sertifikat tidak ditemukan</h1>
        <button type="button" class="btn btn-biru"><i class="fas fa-arrow-left jangka"></i>Kembali</button>
    </div>
</body>

</html>
