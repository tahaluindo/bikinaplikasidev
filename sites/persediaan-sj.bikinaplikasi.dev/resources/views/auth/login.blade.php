<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">

    <title>{{ env('APP_OBJECT_NAME') }} | {{ env('APP_OBJECT_DESCRIPTION') }}</title>

    <link rel="apple-touch-icon" href="{{ url('') }}/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="{{ url('') }}/assets/images/favicon.ico">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ url('') }}/global/css/bootstrap.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/css/bootstrap-extend.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/assets/css/site.min599c.css?v4.0.2">

    <!-- Skin tools (demo site only) -->
    <link rel="stylesheet" href="{{ url('') }}/global/css/skintools.min599c.css?v4.0.2">
    <script src="{{ url('') }}/assets/js/Plugin/skintools.min599c.js?v4.0.2"></script>

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ url('') }}/global/vendor/animsition/animsition.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/vendor/switchery/switchery.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/vendor/intro-js/introjs.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">

    <!-- Page -->
    <link rel="stylesheet" href="{{ url('') }}/assets/examples/css/pages/login.min599c.css?v4.0.2">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ url('') }}/global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
    <link rel="stylesheet" href="{{ url('') }}/global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">

<!--[if lt IE 9]>
    <script src="{{ url('') }}/global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
    <![endif]-->

<!--[if lt IE 10]>
    <script src="{{ url('') }}/global/vendor/media-match/media.match.min.js?v4.0.2"></script>
    <script src="{{ url('') }}/global/vendor/respond/respond.min.js?v4.0.2"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="{{ url('') }}/global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2"></script>
    <script>
        Breakpoints();
    </script>

    <style>
        body {
            background-color: #F3EBF6;
            font-family: 'Ubuntu', sans-serif;
            background-image: url("{{ url(env('APP_BACKGROUND_IMAGE')) }}");
            background-size: cover;
        }
    </style>
</head>
<body class="animsition page-login layout-full page-dark">

<!-- Page -->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle animation-slide-top animation-duration-1">
        <div class="brand">
            <img class="brand-img" src="{{ url('') }}/assets/images/logo.png" alt="...">
            <h2 class="brand-text">{{ env('APP_OBJECT_NAME') }}</h2>
        </div>
        <p>Login</p>
        <form method="POST" action="{{ route('login_manual') }}">
            @csrf
            <x-jet-input id="email" class="un block mt-1 w-full" type="email" name="email" :value="old('email')"
                         required autofocus placeholder="Email"/>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <x-jet-input id="password" class="pass block mt-1 w-full" type="password" name="password" required
                         autocomplete="current-password" placeholder="Password"/>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="flex items-center justify-end mt-4">
                <button style='background-color: #CB8D50 !important; color:  !important' class="submit ml-4">
                    {{ __('Login') }}
                </button>
            </div>

            @if(session()->has("error"))
                <div class="alert alert-danger text-danger" role="alert"
                     style='text-align: center; color: red; weight: bolder; margin-top: 20px;'>
                    {{ session()->get("error") }}
                </div>
            @endif
        </form>
    </div>
</div>
<!-- End Page -->


<!-- Core  -->
<script src="{{ url('') }}/global/vendor/babel-external-helpers/babel-external-helpers599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/jquery/jquery.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/popper-js/umd/popper.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/bootstrap/bootstrap.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/animsition/animsition.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/mousewheel/jquery.mousewheel599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/asscrollbar/jquery-asScrollbar.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/asscrollable/jquery-asScrollable.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/ashoverscroll/jquery-asHoverScroll.min599c.js?v4.0.2"></script>

<!-- Plugins -->
<script src="{{ url('') }}/global/vendor/switchery/switchery.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/intro-js/intro.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/screenfull/screenfull599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/vendor/slidepanel/jquery-slidePanel.min599c.js?v4.0.2"></script>

<!-- Plugins For This Page -->
<script src="{{ url('') }}/global/vendor/jquery-placeholder/jquery.placeholder599c.js?v4.0.2"></script>

<!-- Scripts -->
<script src="{{ url('') }}/global/js/Component.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Base.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Config.min599c.js?v4.0.2"></script>

<script src="{{ url('') }}/assets/js/Section/Menubar.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/assets/js/Section/Sidebar.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/assets/js/Section/PageAside.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/assets/js/Plugin/menu.min599c.js?v4.0.2"></script>

<!-- Config -->
<script src="{{ url('') }}/global/js/config/colors.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/assets/js/config/tour.min599c.js?v4.0.2"></script>
<script>
    Config.set('assets', '../assets');
</script>

<!-- Page -->
<script src="{{ url('') }}/assets/js/Site.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/asscrollable.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/slidepanel.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/switchery.min599c.js?v4.0.2"></script>
<script src="{{ url('') }}/global/js/Plugin/jquery-placeholder.min599c.js?v4.0.2"></script>


<script>
    (function (document, window, $) {
        'use strict';

        var Site = window.Site;
        $(document).ready(function () {
            Site.run();
        });
    })(document, window, jQuery);
</script>

</body>

</html>


{{--<html>--}}

{{--<head>--}}
{{--    <link rel="stylesheet" href="css/style.css">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1" />--}}
{{--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">--}}
{{--    <title>Sign in</title>--}}

{{--    <style>--}}
{{--    body {--}}
{{--        background-color: #F3EBF6;--}}
{{--        font-family: 'Ubuntu', sans-serif;--}}
{{--        background-image: url("{{ url(env('APP_BACKGROUND_IMAGE')) }}");--}}
{{--        background-size: cover;--}}
{{--    }--}}

{{--    .main {--}}
{{--        background-color: #FFFFFF;--}}
{{--        width: 400px;--}}
{{--        height: 400px;--}}
{{--        margin: 7em auto;--}}
{{--        border-radius: 1.5em;--}}
{{--        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);--}}
{{--    }--}}

{{--    .sign {--}}
{{--        padding-top: 40px;--}}
{{--        color: #8C55AA;--}}
{{--        font-family: 'Ubuntu', sans-serif;--}}
{{--        font-weight: bold;--}}
{{--        font-size: 23px;--}}
{{--    }--}}

{{--    .un {--}}
{{--        width: 76%;--}}
{{--        color: rgb(38, 50, 56);--}}
{{--        font-weight: 700;--}}
{{--        font-size: 14px;--}}
{{--        letter-spacing: 1px;--}}
{{--        background: rgba(136, 126, 126, 0.04);--}}
{{--        padding: 10px 20px;--}}
{{--        border: none;--}}
{{--        border-radius: 20px;--}}
{{--        outline: none;--}}
{{--        box-sizing: border-box;--}}
{{--        border: 2px solid rgba(0, 0, 0, 0.02);--}}
{{--        margin-bottom: 50px;--}}
{{--        margin-left: 46px;--}}
{{--        text-align: center;--}}
{{--        margin-bottom: 27px;--}}
{{--        font-family: 'Ubuntu', sans-serif;--}}
{{--    }--}}

{{--    form.form1 {--}}
{{--        padding-top: 40px;--}}
{{--    }--}}

{{--    .pass {--}}
{{--        width: 76%;--}}
{{--        color: rgb(38, 50, 56);--}}
{{--        font-weight: 700;--}}
{{--        font-size: 14px;--}}
{{--        letter-spacing: 1px;--}}
{{--        background: rgba(136, 126, 126, 0.04);--}}
{{--        padding: 10px 20px;--}}
{{--        border: none;--}}
{{--        border-radius: 20px;--}}
{{--        outline: none;--}}
{{--        box-sizing: border-box;--}}
{{--        border: 2px solid rgba(0, 0, 0, 0.02);--}}
{{--        margin-bottom: 50px;--}}
{{--        margin-left: 46px;--}}
{{--        text-align: center;--}}
{{--        margin-bottom: 27px;--}}
{{--        font-family: 'Ubuntu', sans-serif;--}}
{{--    }--}}


{{--    .un:focus,--}}
{{--    .pass:focus {--}}
{{--        border: 2px solid rgba(0, 0, 0, 0.18) !important;--}}

{{--    }--}}

{{--    .submit {--}}
{{--        cursor: pointer;--}}
{{--        border-radius: 5em;--}}
{{--        color: #fff;--}}
{{--        --}}
{{--        border: 0;--}}
{{--        padding-left: 40px;--}}
{{--        padding-right: 40px;--}}
{{--        padding-bottom: 10px;--}}
{{--        padding-top: 10px;--}}
{{--        font-family: 'Ubuntu', sans-serif;--}}
{{--        margin-left: 35%;--}}
{{--        font-size: 13px;--}}
{{--        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);--}}
{{--    }--}}

{{--    .forgot {--}}
{{--        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);--}}
{{--        color: #E1BEE7;--}}
{{--        padding-top: 15px;--}}
{{--    }--}}

{{--    a {--}}
{{--        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);--}}
{{--        color: #E1BEE7;--}}
{{--        text-decoration: none--}}
{{--    }--}}

{{--    @media (max-width: 600px) {--}}
{{--        .main {--}}
{{--            border-radius: 0px;--}}
{{--        }--}}

{{--    }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--    <div class="main">--}}
{{--        --}}
{{--        <p class="sign" align="center" style="color: #CB8D50;">Login</p>--}}

{{--        <form method="POST" action="{{ route('login_manual') }}">--}}
{{--            @csrf--}}
{{--            <x-jet-input id="email" class="un block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus placeholder="Email"/>--}}
{{--            --}}
{{--            <x-jet-input id="password" class="pass block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="Password"/>--}}
{{--            --}}
{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <button style='background-color: #CB8D50 !important; color:  !important' class="submit ml-4">--}}
{{--                    {{ __('Login') }}--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            @if(session()->has("error"))--}}
{{--                <div class="alert alert-danger text-danger" role="alert" style='text-align: center; color: red; weight: bolder; margin-top: 20px;'>--}}
{{--                    {{ session()->get("error") }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </form>--}}
{{--    </div>--}}
{{--</body>--}}

{{--</html>--}}