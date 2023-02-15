<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('foto/logo.ico') }}">
    <title>Al Qosim Al Islamy</title>
    <link href="{{ url('matrix-admin') }}/dist/css/style.min.css" rel="stylesheet">

    <style>
        #background {
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: url({{ url('img/gambar1.jpeg') }});
        }

        #background::after {
            position: absolute;
            top: 0;
            bottom: 0;
            content: "";
            background-color: rgba(0, 0, 0, .5);
            width: 100%;
            height: 100%;
        }

        .auth-box.bg-dark.border-top.border-secondary {
            z-index: 1;
        }

    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader" style="display: none;">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id='background' class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            @yield('content')
        </div>
    </div>

    <script src="{{ url('matrix-admin') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('matrix-admin') }}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{ url('matrix-admin') }}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>
