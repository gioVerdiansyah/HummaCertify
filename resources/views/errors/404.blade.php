<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background: #DAEAF7;
            font-family: 'Poppins', sans-serif !important;
            overflow: hidden;
        }

        .bg-image {
            background: url({{ asset('errorimage/blob.png') }});
            background-size: contain;
            background-repeat: no-repeat;
        }

        .konten {
            height: 100vh;
            align-items: center;
        }

        .costum {
            padding: 5rem;
        }

        .btn-biru {
            background: #204370;
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

        .title {
            color: #2C475D;
            margin-bottom: 3rem;
            font-size: calc(1.7rem + 1.125vw);
            font-weight: 600;
        }

        @media only screen and (max-width: 600px) {
            body {
                background: #DAEAF7;
                overflow: hidden;
            }

            .bg-image {
                background: none;
            }

            .konten {
                flex-flow: column-reverse;
                height: 70vh !important;
            }

            .illst {
                width: 100%;
            }

            .col-6 {
                width: 100%;
            }

            .costum {
                text-align: center;
                padding: 1rem 5rem;
            }

            .title {
                font-size: calc(0.9rem + 1.125vw) !important;
            }

            .btn-biru:hover {
                background: #edf7ff;
            }
        }

        @media only screen and (max-width: 900px) {
            body {
                background: #DAEAF7;
                overflow: hidden;
            }

            .bg-image {
                background: none;
            }

            .konten {
                flex-flow: column-reverse;
                height: 76vh;
            }

            .illst {
                width: 70%;
            }

            .col-6 {
                width: 100%;
            }

            .costum {
                text-align: center;
                padding: 1rem 5rem;
            }

            .title {
                font-size: calc(1.9rem + 1.125vw);
            }

            .btn-biru:hover {
                background: #edf7ff;
            }
        }
    </style>
</head>

<body>
    <div class="bg-image">
        <div class="row konten">
            <div class="col-6 costum">
                <p class="title">Halaman Tidak Ditemukan</p>
                <button type="button" class="btn btn-biru" onclick="window.location.href = '{{ route('home') }}'"><i
                        class="fas fa-arrow-left jangka"></i>Kembali</button>
            </div>
            <div class="col-6 costum">
                <img src="{{ asset('errorimage/404.png') }}" class="illst" alt="">
            </div>
        </div>
    </div>
</body>

</html>
