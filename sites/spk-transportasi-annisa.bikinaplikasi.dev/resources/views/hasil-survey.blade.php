<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | {{ env('APP_OBJECT_NAME') }} - {{ env('APP_OBJECT_LOCATION') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('') }}/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('') }}/css/owl.theme.css">
    <link rel="stylesheet" href="{{ url('') }}/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{ url('') }}/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ url('') }}/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ url('') }}/js/vendor/modernizr-2.8.3.min.js"></script>

    <style>
        body {
            background-image: url("{{ url('image/background1.jpg') }}");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .error-page-int {
            max-width: 50%;
            padding: 20px 0;
            width: 80%;
            position: relative;
            margin: 0 auto;
        }
    </style>
</head>


<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>HASIL PERHITUNGAN</h3>
            <p>{{ env('APP_OBJECT_NAME') }} - {{ env('APP_OBJECT_LOCATION') }}</p>
        </div>
        <div class="content-error">
            <div class="row">
                <div class="col-md-6">
                    <div class="hpanel">
                        <div class="panel-body">
                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>#</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($perhitungan as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="hpanel">
                        <div class="panel-body">

                            <table class="table" id='dataTable'>
                                <thead>
                                <tr>
                                    <th width=2>Ranking</th>
                                    <th>Nama</th>
                                    <th>Total Keseluruhan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($alternatif->sortByDesc('nilai_kriteria_total_keseluruhan')->values() as $item)
                                    <tr data-id='{{ $item->id }}'>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>

                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nilai_kriteria_total_keseluruhan }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="text-center login-footer">
        <p>Copyright ?? {{ date("Y") }}. All rights reserved.</p>
    </div>
</div>
</div>
<!-- jquery
    ============================================ -->
<script src="{{ url('') }}/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ url('') }}/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="{{ url('') }}/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{ url('') }}/js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{ url('') }}/js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{ url('') }}/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="{{ url('') }}/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{ url('') }}/js/metisMenu/metisMenu.min.js"></script>
<script src="{{ url('') }}/js/metisMenu/metisMenu-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="{{ url('') }}/js/tab.js"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ url('') }}/js/icheck/icheck.min.js"></script>
<script src="{{ url('') }}/js/icheck/icheck-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ url('') }}/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="{{ url('') }}/js/main.js"></script>
<!-- tawk chat JS
    ============================================ -->
<script src="{{ url('') }}/js/tawk-chat.js"></script>
</body>

</html>
