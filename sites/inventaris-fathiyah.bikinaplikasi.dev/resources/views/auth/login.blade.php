<!DOCTYPE html>
<html lang="en-us">
<head>
    <!-- Web config-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- lib-->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="assets/stylesheets/ionicons.css">
    <link rel="stylesheet" href="assets/stylesheets/font-awesome.css">

    <!-- Theme-->
    <link id="mainstyle" rel="stylesheet" href="assets/stylesheets/skin.css">
    <link id="mainstyle" rel="stylesheet" href="assets/stylesheets/demo.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/html5shiv.js"></script>
    <script src="assets/scripts/respond.js"></script><![endif]-->
    <script src="assets/scripts/modernizr-custom.js"></script>
    <script src="assets/scripts/respond.js"></script>

    <style>
        .login .login-form {
            width: 90%;
            max-width: 550px;
            margin: 10% auto 0;
            background-color: #fff;
            padding: 24px;
            padding: 2rem;
            border-radius: 4px;
            -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        body {
            background-image: url("{{ url('image/background.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }
        
        .login.login-transparent .login-form .form-control, .login.login-transparent .login-form .bootstrap-tagsinput {
  color: black;
  border-color: rgba(204, 204, 204, 0.6);
}
    </style>
</head>

<body class="login login-transparent">
<form style="padding: 20px; background-color: white; color: black" class="login-form widget" id="userlogin" autocomplete="off" method="POST" action="{{ route('login_manual') }}">


    <div class="w-section"><a class="demo-logo dark m-b-2" href="index.html">{{ env('APP_NAME') }}
            - {{ env('APP_OBJECT_NAME') }}</a>
    </div>
    <div class="w-section">

        @if(session()->has("error"))
            <div class="alert alert-danger text-white" role="alert" style='text-align: center; color: red; weight: bolder; '>
                {{ session()->get("error") }}
            </div>
        @endif
        
        <div class="form-group">
            <label class="sr-only" for="formBasicEmail">Email</label>
            <input class="form-control form-control-border-b" id="formBasicEmail" type="email" name="email"
                   placeholder="Alamat Email" autocomplete="off" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label class="sr-only" for="formBasicPassword">Password</label>
            <input class="form-control form-control-border-b" id="formBasicPassword" type="password"
                   name="password" placeholder="Password" autocomplete="off" value="{{ old('password') }}">
        </div>

        <div class="form-group text-xs-right">
            <button class="btn btn-success" type="submit">Login</button>
        </div>
    </div>
</form>
</body>
</html>