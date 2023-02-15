<!DOCTYPE html>
<html lang="zxx">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>

    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>{{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }}</title>
    <link rel="icon" href="{{ url('') }}/img/logo.png" type="image/png">

    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap1.min.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/themefy_icon/themify-icons.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/swiper_slider/css/swiper.min.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/select2/css/select2.min.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/niceselect/css/nice-select.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/owl_carousel/css/owl.carousel.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/gijgo/gijgo.min.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/font_awesome/css/all.min.css"/>
    <link rel="stylesheet" href="{{ url('') }}/vendors/tagsinput/tagsinput.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/datatable/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" href="{{ url('') }}/vendors/datatable/css/responsive.dataTables.min.css"/>
    <link rel="stylesheet" href="{{ url('') }}/vendors/datatable/css/buttons.dataTables.min.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/text_editor/summernote-bs4.css"/>

    <link rel="stylesheet" href="{{ url('') }}/vendors/morris/morris.css">

    <link rel="stylesheet" href="{{ url('') }}/vendors/material_icon/material-icons.css"/>

    <link rel="stylesheet" href="{{ url('') }}/css/metisMenu.css">

    <link rel="stylesheet" href="{{ url('') }}/css/style1.css"/>
    <link rel="stylesheet" href="{{ url('') }}/css/colors/default.css" id="colorSkinCSS">

    <style>
        .bg-success {
            background: linear-gradient(-45deg, #3d74f1, #9986ee);
        }

        .bg-warning {
            background: linear-gradient(-45deg, #fe413b, #fc7572);
        }

        body {
            background: url({{ url(env('APP_BACKGROUND_IMAGE')) }}) no-repeat center top;
            background-size: cover;
        }
    </style>
</head>
<body class="crm_body_bg">

<section class="main_content dashboard_part">
    <div class="main_content_iner ">
        <div class="container-fluid plr_30 pt_30">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="white_box mb_30">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">

                                <div class="modal-content cs_modal">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Log in</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class="form-horizontal m-t-20" id="loginform" method="POST"
                                              action="{{ route('login') }}">
                                            @csrf
                                            <div class="row p-b-30">
                                                <div class="col-12">
                                                    <div class="input-group mb-3">
                                                        <input type="email" name='email'
                                                               class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                               placeholder="Email" aria-label="Email"
                                                               aria-describedby="basic-addon1" required=""
                                                               value="{{ old('email') }}" autocomplete="email"
                                                               autofocus>

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <input type="password" name='password'
                                                               class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                               placeholder="Password" aria-label="Password"
                                                               aria-describedby="basic-addon1"
                                                               required="" autocomplete="current-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>

                                                    <div class="input-group mb-3">
                                                        <button type="submit"
                                                                class="btn btn-primary btn-block btn-flat">Login
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_part">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="footer_iner text-center">
                            <p>{{ date("Y") }} © {{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<script src="{{ url('') }}/js/jquery1-3.4.1.min.js"></script>

<script src="{{ url('') }}/js/popper1.min.js"></script>

<script src="{{ url('') }}/js/bootstrap1.min.js"></script>

<script src="{{ url('') }}/js/metisMenu.js"></script>

<script src="{{ url('') }}/vendors/count_up/jquery.waypoints.min.js"></script>

<script src="{{ url('') }}/vendors/chartlist/Chart.min.js"></script>

<script src="{{ url('') }}/vendors/count_up/jquery.counterup.min.js"></script>

<script src="{{ url('') }}/vendors/swiper_slider/js/swiper.min.js"></script>

<script src="{{ url('') }}/vendors/niceselect/js/jquery.nice-select.min.js"></script>

<script src="{{ url('') }}/vendors/owl_carousel/js/owl.carousel.min.js"></script>

<script src="{{ url('') }}/vendors/gijgo/gijgo.min.js"></script>

<script src="{{ url('') }}/vendors/datatable/js/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/dataTables.responsive.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/dataTables.buttons.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/buttons.flash.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/jszip.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/pdfmake.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/vfs_fonts.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/buttons.html5.min.js"></script>
<script src="{{ url('') }}/vendors/datatable/js/buttons.print.min.js"></script>
<script src="{{ url('') }}/js/chart.min.js"></script>

<script src="{{ url('') }}/vendors/progressbar/jquery.barfiller.js"></script>

<script src="{{ url('') }}/vendors/tagsinput/tagsinput.js"></script>

<script src="{{ url('') }}/vendors/text_editor/summernote-bs4.js"></script>
<script src="{{ url('') }}/vendors/apex_chart/apexcharts.js"></script>

<script src="{{ url('') }}/js/custom.js"></script>


<script src="{{ url('') }}/js/active_chart.js"></script>
<script src="{{ url('') }}/vendors/apex_chart/radial_active.js"></script>
<script src="{{ url('') }}/vendors/apex_chart/stackbar.js"></script>
<script src="{{ url('') }}/vendors/apex_chart/area_chart.js"></script>
<script src="{{ url('') }}/vendors/apex_chart/bar_active_1.js"></script>
<script src="{{ url('') }}/vendors/chartjs/chartjs_active.js"></script>

</body>

</html>
