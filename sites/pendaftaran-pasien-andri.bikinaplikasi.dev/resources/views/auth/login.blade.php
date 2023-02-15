<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8"/>
    <title>Login | Skote - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('') }}/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{ url('') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ url('') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ url('') }}/assets/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Selamat Datang!</h5>
                                    <p>Ini adalah form khusus admin dan pegawai untuk login.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{ url('') }}/avatar/png/001-girl.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="index.html">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ url('') }}/assets/images/logo.svg" alt=""
                                                     class="rounded-circle"
                                                     height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            @if(session()->has("error"))
                                <div class="alert alert-danger text-white" role="alert"
                                     style='text-align: center; color: red; weight: bolder; '>
                                    {{ session()->get("error") }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login_manual') }}" name="login_form">
                                <h1 class="text-center">Sign In</h1>
                                <div class="text-muted text-center mb-4">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control form-control-lg fs-15px" name="email"
                                           placeholder="example@example.com"/>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex">
                                        <label>Password</label>
                                    </div>
                                    <input type="password" class="form-control form-control-lg fs-15px" name="password"
                                           placeholder="Enter your password"/>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="customCheck1"/>
                                        <label class="custom-control-label fw-500" for="customCheck1">Remember
                                            me</label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block fw-500 mb-3">Sign In
                                </button>
                                
                                <a href="{{ route('register') }}"
                                   class="btn btn-outline-primary btn-lg btn-block fw-500 mb-3">Register Pasien</a>

                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ url('') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ url('') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('') }}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ url('') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ url('') }}/assets/libs/node-waves/waves.min.js"></script>

<!-- App js -->
<script src="{{ url('') }}/assets/js/app.js"></script>
</body>

</html>
