<html class="bg-black">

<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <link href="{{ url('admin-lte/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="bg-black">

    <div class="form-box" id="login-box">
        @if (session('status'))
        <div class="header bg-green" role="alert" style='margin-bottom:10px;'>
            {{ session('status') }}
        </div>
        @endif
        <div class="header bg-green">Reset Password</div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="Email" value="{{ old('email') }}">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message ?? session()->get('error') }}</strong>
                    </span>
                    @enderror
                </div>

            </div>
            <div class="footer">
                <button type="submit" class="btn bg-green btn-block">Send Password Reset Link</button>
            </div>
        </form>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="{{ url('admin-lte/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
