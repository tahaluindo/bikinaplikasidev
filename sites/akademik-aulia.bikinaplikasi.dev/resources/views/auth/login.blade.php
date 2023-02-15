<html class="bg-black">

<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <link href="{{ url('admin-lte/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css">

    <style>
        .logo-gambar {
            border: 0;
            width: 100px;
            text-align: center;
        }


        a {
            color: #17A2B8;
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-black" style='background-image: url({{ url(env('APP_BACKGROUND_IMAGE')) }}); background-repeat: no-repeat; background-size: cover; width: 100%; height: 100%'>

    <div class="form-box" id="login-box">

        <div class="header text-center" style='background-color: #17A2B8'>
            <img src="{{ url('foto/logo.png') }}" class='logo-gambar'> <br>
            Sign In
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email') }}">

                    {{-- kalo login salah --}}
                    @if(session()->has('error'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                    </span>
                    @endif

                    {{-- kalo terjadi error login --}}
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message ?? session()->get('error') }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" value="{{ old('password') }}">
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn btn-block"  style='background-color: #17A2B8; color: white;'>Sign in</button>
                <p>
                    {{-- <a href="{{ route('password.request') }}">Lupa Password?</a> Atau
                    <a href="{{ route('register') }}">Register</a> --}}
            </div>
        </form>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="{{ url('admin-lte/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
