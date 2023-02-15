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
                <h2>Selamat datang, di perpustakaan</h2>
            </a>
        </div>
        <p class="login-box-msg">Login</p>
        <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}">
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
<!-- jQuery 3 -->
<script src="dist/js/jquery.min.js"></script>
<script src="dist/bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/bizadmin.js"></script>
<script src="dist/js/demo.js"></script>
</body>

</html>
