{{--<html>--}}

{{--<head>--}}
{{--    <link rel="stylesheet" href="css/style.css">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1"/>--}}
{{--    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">--}}
{{--    <title>Sign in</title>--}}

{{--    <style>--}}
{{--        body {--}}
{{--            background-color: #F3EBF6;--}}
{{--            font-family: 'Ubuntu', sans-serif;--}}
{{--            background-image: url("{{ url(env('APP_BACKGROUND_IMAGE')) }}");--}}
{{--            background-size: cover;--}}
{{--        }--}}

{{--        .main {--}}
{{--            background-color: #FFFFFF;--}}
{{--            width: 400px;--}}
{{--            height: 400px;--}}
{{--            margin: 7em auto;--}}
{{--            border-radius: 1.5em;--}}
{{--            box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);--}}
{{--        }--}}

{{--        .sign {--}}
{{--            padding-top: 40px;--}}
{{--            color: #8C55AA;--}}
{{--            font-family: 'Ubuntu', sans-serif;--}}
{{--            font-weight: bold;--}}
{{--            font-size: 23px;--}}
{{--        }--}}

{{--        .un {--}}
{{--            width: 76%;--}}
{{--            color: rgb(38, 50, 56);--}}
{{--            font-weight: 700;--}}
{{--            font-size: 14px;--}}
{{--            letter-spacing: 1px;--}}
{{--            background: rgba(136, 126, 126, 0.04);--}}
{{--            padding: 10px 20px;--}}
{{--            border: none;--}}
{{--            border-radius: 20px;--}}
{{--            outline: none;--}}
{{--            box-sizing: border-box;--}}
{{--            border: 2px solid rgba(0, 0, 0, 0.02);--}}
{{--            margin-bottom: 50px;--}}
{{--            margin-left: 46px;--}}
{{--            text-align: center;--}}
{{--            margin-bottom: 27px;--}}
{{--            font-family: 'Ubuntu', sans-serif;--}}
{{--        }--}}

{{--        form.form1 {--}}
{{--            padding-top: 40px;--}}
{{--        }--}}

{{--        .pass {--}}
{{--            width: 76%;--}}
{{--            color: rgb(38, 50, 56);--}}
{{--            font-weight: 700;--}}
{{--            font-size: 14px;--}}
{{--            letter-spacing: 1px;--}}
{{--            background: rgba(136, 126, 126, 0.04);--}}
{{--            padding: 10px 20px;--}}
{{--            border: none;--}}
{{--            border-radius: 20px;--}}
{{--            outline: none;--}}
{{--            box-sizing: border-box;--}}
{{--            border: 2px solid rgba(0, 0, 0, 0.02);--}}
{{--            margin-bottom: 50px;--}}
{{--            margin-left: 46px;--}}
{{--            text-align: center;--}}
{{--            margin-bottom: 27px;--}}
{{--            font-family: 'Ubuntu', sans-serif;--}}
{{--        }--}}


{{--        .un:focus,--}}
{{--        .pass:focus {--}}
{{--            border: 2px solid rgba(0, 0, 0, 0.18) !important;--}}

{{--        }--}}

{{--        .submit {--}}
{{--            cursor: pointer;--}}
{{--            border-radius: 5em;--}}
{{--            color: #fff;--}}

{{--            border: 0;--}}
{{--            padding-left: 40px;--}}
{{--            padding-right: 40px;--}}
{{--            padding-bottom: 10px;--}}
{{--            padding-top: 10px;--}}
{{--            font-family: 'Ubuntu', sans-serif;--}}
{{--            margin-left: 35%;--}}
{{--            font-size: 13px;--}}
{{--            box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);--}}
{{--        }--}}

{{--        .forgot {--}}
{{--            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);--}}
{{--            color: #E1BEE7;--}}
{{--            padding-top: 15px;--}}
{{--        }--}}

{{--        a {--}}
{{--            text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);--}}
{{--            color: #E1BEE7;--}}
{{--            text-decoration: none--}}
{{--        }--}}

{{--        @media (max-width: 600px) {--}}
{{--            .main {--}}
{{--                border-radius: 0px;--}}
{{--            }--}}

{{--        }--}}
{{--    </style>--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="main">--}}

{{--    <p class="sign" align="center" style="color: #CB8D50;">Login</p>--}}

{{--    <form method="POST" action="{{ route('login_manual') }}">--}}
{{--        @csrf--}}
{{--        <x-jet-input id="email" class="un block mt-1 w-full" type="email" name="email" :value="old('email')" required--}}
{{--                     autofocus placeholder="Email"/>--}}

{{--        <x-jet-input id="password" class="pass block mt-1 w-full" type="password" name="password" required--}}
{{--                     autocomplete="current-password" placeholder="Password"/>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <button style='background-color: #CB8D50 !important; color:  !important' class="submit ml-4">--}}
{{--                {{ __('Login') }}--}}
{{--            </button>--}}
{{--        </div>--}}

{{--        @if(session()->has("error"))--}}
{{--            <div class="alert alert-danger text-danger" role="alert"--}}
{{--                 style='text-align: center; color: red; weight: bolder; margin-top: 20px;'>--}}
{{--                {{ session()->get("error") }}--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </form>--}}
{{--</div>--}}
{{--</body>--}}

{{--</html>--}}



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from uxliner.com/bizadmin/demo/main/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 25 Jan 2019 07:48:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }}</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Biz Admin is a Multipurpose bootstrap 4 Based Dashboard & Admin Site Responsive Template by uxliner."/>
    <meta name="keywords"
          content="admin, admin dashboard, admin template, cms, crm, Biz Admin, Biz Adminadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application"/>
    <meta name="author" content="uxliner"/>
    <!-- v4.1.3 -->
    <link rel="stylesheet" href="dist/bootstrap/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/favicon-16x16.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="dist/css/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="dist/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="dist/css/simple-lineicon/simple-line-icons.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .bg-success {
            background: linear-gradient(-45deg, #3d74f1, #9986ee);
        }

        .bg-warning {
            background: linear-gradient(-45deg, #fe413b, #fc7572);
        }

        .login-page, .register-page {
            background: url({{ url(env('APP_BACKGROUND_IMAGE')) }}) no-repeat center top;
            background-size: cover;
        }

        .login-page.sty1, .register-page.sty1 {
            background: url({{ url(env('APP_BACKGROUND_IMAGE')) }}) no-repeat center top;
            background-size: cover;
        }
    </style>

</head>
<body class="login-page sty1">
<div class="login-box sty1">
    <div class="login-box-body sty1">
        <div class="login-logo">
            <a href="index.html">
                <h2>Selamat datang, di toko bangunan {{ env('APP_OBJECT_NAME') }}</h2>
            </a>
        </div>
        
        @if(session()->has("error"))
            <div class="alert alert-danger text-white" role="alert"
                    style='text-align: center; color: red; weight: bolder; display: inline-block'>
                {{ session()->get("error") }}
            </div>
        @endif

        <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login_manual') }}">
            @csrf
            <div class="row p-b-30">
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i
                                            class="ti-user"></i></span>
                        </div>
                        <input type="email" name='email'
                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                               placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required=""
                               value="{{ old('email') }}" autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                            class="ti-pencil"></i></span>
                        </div>
                        <input type="password" name='password'
                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                               placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                               required="" autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


</body>

</html>
