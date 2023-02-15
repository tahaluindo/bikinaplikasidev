<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

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

        #login .container #login-row #login-column #login-box {
            margin-top: 120px;
            min-height: 300px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            height: 355px;
        }

        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }

        .btn-info {
            color: #fff;
            background-color: #218838 !important;
            border-color: #218838 !important;
        }

        a {
            color: #218838 !important;
        }

        .text-info {
            color: #218838 !important;
        }
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div id="login">
        <div class="container">


            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">

                        <form id="login-form" class="form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                @if(session()->has("error"))
                                <div class="alert alert-danger" role="alert">
                                    {{ session()->get("error") }}
                                </div>
                                @elseif(session()->has("success"))
                                <div class="alert alert-success" role="alert">
                                    {{ session()->get("success") }}
                                </div>
                                @elseif(session()->has("warning"))
                                <div class="alert alert-warning" role="alert">
                                    {{ session()->get("warning") }}
                                </div>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="username" class="text-info">Email:</label><br>
                                <input type="email" name="username" id="username"
                                    class="form-control  @error('username') is-invalid @enderror">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Login">
                            </div>

                            <div id="register-link" class="text-right">
                                <br>
                                <a href="{{ url(route('password.request')) }}" class="text-info">Lupa Password</a> <br>
                                {{-- <a href="{{ url(route('register')) }}" class="text-info">Registrasi</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>