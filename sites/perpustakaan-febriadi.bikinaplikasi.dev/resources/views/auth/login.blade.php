<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Modernize Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design"/>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta Tags -->

    <!-- Style-sheets -->
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Bootstrap Css -->
    <!-- Common Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!--// Common Css -->
    <!-- Fontawesome Css -->
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <!--// Fontawesome Css -->
    <!--// Style-sheets -->

    <!--web-fonts-->
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--//web-fonts-->
</head>

<body>
<div class="bg-page py-5">
    <div class="container">
        <div class="row">
            <div class="col-6" style="background-color: white !important;">
                <h2 class="text-center">Misi</h2>
                <ol>
                    <li>Mewujudkan pendidikan untuk menghasilkan prestasi dan lulusa berkwalitas tinggi yang peduli dengan lingkungan hidup</li>
                    <li>Mewujudkan sumber daya manusia yang beriman, produktif, kreatif, inofatif dan efektif</li>
                    <li>Mewujudkan pengembangan inovasi pembelajaran sesuai tuntutan</li>
                    <li>Mewujudkan sumber daya manusia yang peduli dalam mencegahan pencemaran, mencegahan kerusakan lingkungan dan melestarikan lingkungan hidup</li>
                    <li>Mewujudkan sarana prasarana reprensentatif dan up to date</li>
                    <li>Mewujudkan pengelolaan pendidikan yang professional</li>
                    <li>Mewujudkan sistim penilaian yang berafiliasi</li>
                    <li>Mewujudkan budaya yang berkualifikasi</li>
                    <li>Mewujudkan Sekolah yang bersih,hijau dan meminimalis hasil sampah yang tidak bermanfaat</li>
                    <li>Mewujudkan manusia Indonesia yang mampu berkontribusi pada kehidupan bermasyarakat, berbangsa, bernegara dalam peradaban dunia</li>
                    <li>Mewujudkan generasi emas, sehat tanpa narkoba</li>
                </ol>

                <h2 class="text-center">Visi</h2>

                <ol>
                    <li>Tercapainya pendidikan untuk menghasilkan prestasi dan lulusa berkwalitas tinggi yang peduli dengan lingkungan hidup</li>
                    <li>Tercapainya sumber daya manusia yang beriman, produktif, kreatif, inofatif dan efektif</li>
                    <li>Tercapainya pengembangan inovasi pembelajaran sesuai tuntutan</li>
                    <li>Tercapainya sumber daya manusia yang peduli dalam mencegahan pencemaran, mencegahan kerusakan lingkungan dan melestarikan lingkungan hidup</li>
                    <li>Tercapainya sarana prasarana reprensentatif dan up to date</li>
                    <li>Tercapainya pengelolaan pendidikan yang professional</li>
                    <li>Tercapainya sistim penilaian yang berafiliasi</li>
                    <li>Tercapainya budaya yang berkualifikasi</li>
                    <li>Tercapainya Sekolah yang bersih,hijau dan meminimalis hasil sampah yang tidak bermanfaat</li>
                    <li>Tercapainya manusia Indonesia yang mampu berkontribusi pada kehidupan bermasyarakat, berbangsa, bernegara dalam peradaban dunia</li>
                    <li>Tercapainya generasi emas, sehat tanpa narkoba</li>
                </ol>
            </div>


            <div class="col-6">
                <!-- main-heading -->
                <h2 class="main-title-w3layouts mb-2 text-center text-white">Login</h2>
                <!--// main-heading -->
                <div class="form-body-w3-agile text-center w-lg-50 w-sm-75 w-100 mx-auto mt-5">
                    <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i
                                            class="ti-user"></i></span>
                                    </div>
                                    <input type="email" name='email'
                                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                                           placeholder="Email" aria-label="Email" aria-describedby="basic-addon1"
                                           required=""
                                           value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i
                                            class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name='password'
                                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                                           placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                                           required="" autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Copyright -->
        <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
            <p>©{{ date("Y") }} {{ env('APP_OBJECT_NAME') }} . All Rights Reserved</p>
        </div>
        <!--// Copyright -->
    </div>
</div>


<!-- Required common Js -->
<script src='js/jquery-2.2.3.min.js'></script>
<!-- //Required common Js -->

<!-- Js for bootstrap working-->
<script src="js/bootstrap.min.js"></script>
<!-- //Js for bootstrap working -->

</body>

</html>

