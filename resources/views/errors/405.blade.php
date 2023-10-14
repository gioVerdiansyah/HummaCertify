<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:100,200,300,400" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/errors/405.css') }}">

<body class="loading">
    <h1>405</h1>
    <h2>METHOD NOT ALLOWED!!!</h2>
    <h3>{{ $exception->getMessage() }}</h3>
    <div class="gears">
        <div class="gear one">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="gear two">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <div class="gear three">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
        $(function() {
            setTimeout(function() {
                $('body').removeClass('loading');
            }, 1000);
        });
    </script>
</body>
