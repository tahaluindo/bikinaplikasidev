<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/minible/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 04:18:27 GMT -->
<head>

    <meta charset="utf-8"/>
    <title>Log In | Minible - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesbrand" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css"/>

</head>

<body class="authentication-bg">

<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">
                            <h5 class="text-primary">Selama Datang !</h5>
                            <p class="text-muted">Sign in untuk masuk ke halaman admin.</p>
                        </div>
                        <div class="p-2 mt-4">
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

                            </form>
                        </div>

                    </div>
                </div>

                <div class="mt-5 text-center">
                    <p>© {{ date('Y') }} {{ env('APP_NAME') }}.
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<!-- JAVASCRIPT -->
<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

<script src="assets/js/app.js"></script>

</body>

<!-- Mirrored from themesbrand.com/minible/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Dec 2020 04:18:27 GMT -->
</html>