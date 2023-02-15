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
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
            background-image: url({{ url('foto/background.jpg') }});
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .error-page-int {
            max-width: 720px !important;
        }

        .form-control {
            height: 50px !important;
        }

        .btn {
            padding: 10px 20px !important;
        }
    </style>
</head>

<body>

<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>LOGIN</h3>
            <p>{{ env('APP_OBJECT_NAME') }} - {{ env('APP_OBJECT_LOCATION') }}</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    @if(session()->get('error'))
                        <div style="color: red; margin-bottom: 16px; text-align: center; font-weight: bold">{{ session()->get('error') }}</div>
                    @endif

                    <form id="loginForm" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" placeholder="example@gmail.com" title="Email" required="" value=""
                                   name="username" id="username" class="form-control">

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

                        <button class="btn btn-success btn-block loginbtn">Login</button>

                        <a href="{{ url(route('password.request')) }}" class="btn btn-success btn-block">Lupa
                            Password</a> <br>
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


{{--<head>--}}
{{--    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}

{{--    <style>--}}
{{--        body {--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--            background-color: #17a2b8;--}}
{{--            height: 100vh;--}}
{{--            background-image: url({{ url('foto/background.jpg') }});--}}
{{--            background-repeat: no-repeat;--}}
{{--            background-position: center;--}}
{{--            background-size: cover;--}}
{{--        }--}}

{{--        #login .container #login-row #login-column #login-box {--}}
{{--            margin-top: 120px;--}}
{{--            min-height: 300px;--}}
{{--            border: 1px solid #9C9C9C;--}}
{{--            background-color: #EAEAEA;--}}
{{--            height: 355px;--}}
{{--        }--}}

{{--        #login .container #login-row #login-column #login-box #login-form {--}}
{{--            padding: 20px;--}}
{{--        }--}}

{{--        #login .container #login-row #login-column #login-box #login-form #register-link {--}}
{{--            margin-top: -85px;--}}
{{--        }--}}

{{--        .btn-info {--}}
{{--            color: #fff;--}}
{{--            background-color: #1e3d59 !important;--}}
{{--            border-color: #1e3d59 !important;--}}
{{--        }--}}

{{--        a {--}}
{{--            color: #1e3d59 !important;--}}
{{--        }--}}

{{--        .text-info {--}}
{{--            color: #1e3d59 !important;--}}
{{--        }--}}
{{--    </style>--}}

{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}

{{--    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--</head>--}}

{{--<body>--}}
{{--    <div id="login">--}}
{{--        <div class="container">--}}


{{--            <div id="login-row" class="row justify-content-center align-items-center">--}}
{{--                <div id="login-column" class="col-md-6">--}}
{{--                    <div id="login-box" class="col-md-12">--}}

{{--                        <form id="login-form" class="form" method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}
{{--                            <h3 class="text-center text-info">Login</h3>--}}
{{--                            <div class="form-group">--}}
{{--                                @if(session()->has("error"))--}}
{{--                                <div class="alert alert-danger" role="alert">--}}
{{--                                    {{ session()->get("error") }}--}}
{{--                                </div>--}}
{{--                                @elseif(session()->has("success"))--}}
{{--                                <div class="alert alert-success" role="alert">--}}
{{--                                    {{ session()->get("success") }}--}}
{{--                                </div>--}}
{{--                                @elseif(session()->has("warning"))--}}
{{--                                <div class="alert alert-warning" role="alert">--}}
{{--                                    {{ session()->get("warning") }}--}}
{{--                                </div>--}}
{{--                                @endif--}}

{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="username" class="text-info">Email:</label><br>--}}
{{--                                <input type="email" name="username" id="username"--}}
{{--                                    class="form-control  @error('username') is-invalid @enderror">--}}

{{--                                @error('username')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}

{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <label for="password" class="text-info">Password:</label><br>--}}
{{--                                <input type="password" name="password" id="password"--}}
{{--                                    class="form-control @error('password') is-invalid @enderror">--}}
{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">--}}
{{--                            </div>--}}

{{--                            <div id="register-link" class="text-right">--}}
{{--                                <br>--}}
{{--                                <a href="{{ url(route('password.request')) }}" class="text-info">Lupa Password</a> <br>--}}
{{--                                --}}{{-- <a href="{{ url(route('register')) }}" class="text-info">Registrasi</a> --}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</body>--}}