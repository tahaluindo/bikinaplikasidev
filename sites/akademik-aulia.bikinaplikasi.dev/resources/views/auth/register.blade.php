<html class="bg-black">

<head>
    <meta charset="UTF-8">
    <title>Pilih Project Untuk Registrasi</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
    <link href="{{ url('admin-lte/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('admin-lte/css/AdminLTE.css') }}" rel="stylesheet" type="text/css">
</head>

<body class="bg-black">

    <div class="form-box" id="login-box">

        <div class="header bg-green">Pilih Project Untuk Registrasi</div>

        <ul class="list-group">
            @foreach($projects as $project)
            <li class="list-group-item">
                <span class="badge">{{ $project->alternatifs->count() }}</span>
                <a href="{{ route('alternatif.register', ['project' => $project->id]) }}">{{ $project->nama }}</a>
            </li>
            @endforeach
          </ul>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="{{ url('admin-lte/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
