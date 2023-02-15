<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="bg-primary"
      style="background-image: url({{ asset('image/background.jpg') }}); background-repeat: no-repeat; background-size: cover">

<div class="unix-login">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="login-content">
                    <div class="login-form">
                        <div class="h3 mb-1 text-center" style="margin-bottom: 50px;">
                            <a href="index.html" style="color: #333 !important;"><span>{{ env('APP_NAME') }}</span></a>
                        </div>
                        <form action="{{ url('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Username</label>
                                <input type="username" name="username" class="form-control" placeholder="Username"
                                       value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                       <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       value="{{ old('password') }}">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                   <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>

                            </div>
                            <button  type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>








