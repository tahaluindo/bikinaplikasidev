<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | {{ env('APP_OBJECT_NAME') }} - {{ env('APP_OBJECT_LOCATION') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('') }}/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ url('') }}/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ url('') }}/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ url('') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        body {
            background-image: url("{{ url('image/background1.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>


<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>LOGIN</h3>
            <p>{{ env('APP_OBJECT_NAME') }} - {{ env('APP_OBJECT_LOCATION') }}</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="#" id="loginForm" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" placeholder="example@gmail.com" title="Email" required="" value=""
                                   name="email" id="email" class="form-control">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required=""
                                   value="" name="password" id="password" class="form-control">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-success loginbtn">Login</button>
                        <a href="{{ url('register') }}" class="btn btn-outline-success px-3" style="padding-left: 10px; padding-right: 10px;">Register</a>
{{--                        <a href="{{ url('hasil-survey') }}" class="btn btn-outline-success px-3" style="padding-left: 10px; padding-right: 10px;">HASIL SURVEY</a>--}}
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © {{ date("Y") }}. All rights reserved.</p>
        </div>
    </div>
</div>
<!-- jquery
    ============================================ -->
<script src="{{ url('') }}/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ url('') }}/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="{{ url('') }}/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{ url('') }}/js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{ url('') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ url('') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{ url('') }}/js/metisMenu/metisMenu.min.js"></script>
<script src="{{ url('') }}/js/metisMenu/metisMenu-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="{{ url('') }}/js/tab.js"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ url('') }}/js/icheck/icheck.min.js"></script>
<script src="{{ url('') }}/js/icheck/icheck-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ url('') }}/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="{{ url('') }}/js/main.js"></script>
<!-- tawk chat JS
    ============================================ -->
<script src="{{ url('') }}/js/tawk-chat.js"></script>
</body>

</html>
