<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificate Not Found</title>
  <link href="{{ asset('landingpage/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('landingpage/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('landingpage/css/style.min.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <style>
    body {
      background: var(--bs-bg-light);
      font-family: 'Poppins', sans-serif !important;
    }

    .btn-biru {
      background: #0A7DB4;
      color: #fff;
      padding: 0.6rem 1.5rem;
      border-radius: 15px;
    }

    .btn-biru:active {
      color: #0A7DB4 !important;
      border-color: #0A7DB4 !important;
      background: transparent !important;
    }

    .btn-biru:hover {
      background: #eeeeee;    
      color: #0A7DB4;
    }

    .jangka {
      padding-right: 10px;
    }

    .img {
      width: 35%;
      margin-bottom: 1rem;
    }

    .p {
      padding: 3rem;
      height: 100vh;
      justify-content: center;
      display: flex;
      flex-flow: column;
      align-items: center;
      gap: 1rem;
    }

    @media (max-width: 500px) {
      .img {
        width: 60%;
      }

      .t {
        font-size: 1.4rem;
      }
    }
  </style>
</head>

<body>
  <div class="text-center p">
    <img src="{{ asset('landingpage/images/nocertificatefound.png') }}" class="img" alt="">
    <h1 class="pb-3 t">Sertifikat tidak ditemukan</h1>
    <button type="button" class="btn btn-biru" onclick="window.location.href = '{{ route('home') }}'"><i class="fas fa-arrow-left jangka"></i>Kembali</button>
  </div>
  <script src="{{ asset('js/themeLoader.js') }}"></script>
</body>

</html>
