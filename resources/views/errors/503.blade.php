<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Server Maintenance</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/errors/inti.css') }}">
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;700&family=Open+Sans:wght@700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .illst {
            width: 450px;
        }
    </style>
</head>

<body>
    <div class="bg-image">
        <div class="row konten">
            <div class="col-6 costum">
                <p class="title">Maaf Server sedang dalam Perbaikan</p>
            </div>
            <div class="col-6 costum arah" id="gambar">
                <img src="{{ asset('errorimage/maintenance.png') }}" class="illst" alt="">
            </div>
        </div>
    </div>
</body>

</html>
