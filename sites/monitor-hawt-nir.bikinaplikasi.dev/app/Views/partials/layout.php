<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Horizontal Axial Wind Turbine (HAWT)</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/materialize/css/materialize.min.css"
        media="screen,projection">
    <!-- Bootstrap Styles-->
    <link href="<?= base_url() ?>/assets/css/bootstrap.css" rel="stylesheet">
    <!-- FontAwesome Styles-->
    <link href="<?= base_url() ?>/assets/css/font-awesome.css" rel="stylesheet">
    <!-- Morris Chart Styles-->
    <link href="<?= base_url() ?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet">
    <!-- Custom Styles-->
    <link href="<?= base_url() ?>/assets/css/custom-styles.css" rel="stylesheet">
    <!-- Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/js/Lightweight-Chart/cssCharts.css">
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse"
                    data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="<?= base_url() ?>">
                    <img src="<?= base_url() ?>/assets/img/logo.png" alt="" class="logo">
                    <strong>HAWT</strong>
                </a>

                <div id="sideNav" href="<?= base_url() ?>/"><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right">


                <li><a class="dropdown-button waves-effect waves-dark" href="<?= base_url() ?>/#!"
                        data-activates="dropdown1"><i class="fa fa-user fa-fw"></i>
                        <b><?= user()->username ?></b> </a>
                    <ul id="dropdown1" class="dropdown-content"
                        style="display: none; width: 130px; position: absolute; top: 0px; left: -35px; opacity: 1;">

                        <li><a href="<?= base_url() ?>/user/1/edit"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li><a href="<?= base_url() ?>/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>



                </li>
            </ul>
        </nav>
        <!-- Dropdown Structure -->

        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="<?= in_array(current_url(), [base_url() . '/dashboard']) ? 'active-menu' : '' ?> waves-effect waves-dark" href="<?= base_url() ?>/"><i></i>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/kecepatan-angin" class="<?= in_array(current_url(), [base_url() . '/kecepatan-angin']) ? 'active-menu' : '' ?> waves-effect waves-dark"><i></i>Kecepatan
                            Angin</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/arus-wind-turbine" class="waves-effect waves-dark <?= in_array(current_url(), [base_url() . '/arus-wind-turbine']) ? 'active-menu' : '' ?> "><i></i>Arus Wind Turbine</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/arus-ats" class="waves-effect waves-dark <?= in_array(current_url(), [base_url() . '/arus-ats']) ? 'active-menu' : '' ?> "><i></i>Arus ATS</a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>/tegangan-wind-turbine" class="waves-effect waves-dark <?= in_array(current_url(), [base_url() . '/tegangan-wind-turbine']) ? 'active-menu' : '' ?> "><i></i>Tegangan Wind Turbine</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/tegangan-ats" class="waves-effect waves-dark <?= in_array(current_url(), [base_url() . '/tegangan-ats']) ? 'active-menu' : '' ?> "><i></i>Tegangan ATS</a>
                    </li>
                    <li>
                        <a href="<?= base_url() ?>/daya-wind-turbine" class="waves-effect waves-dark <?= in_array(current_url(), [base_url() . '/daya-wind-turbine']) ? 'active-menu' : '' ?> "><i></i>Daya Wind Turbine</a>
                    </li>

                    <li>
                        <a href="<?= base_url() ?>/pusat-informasi" class="waves-effect waves-dark <?= in_array(current_url(), [base_url() . '/pusat-informasi']) ? 'active-menu' : '' ?> "><i></i>Pusat
                            Informasi</a>
                    </li>
                </ul>

            </div>

        </nav>
        <?= $this->renderSection('content') ?>

    </div>
    <script src="<?= base_url() ?>/assets/js/jquery-1.10.2.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/materialize/js/materialize.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.metisMenu.js"></script>
    <script src="<?= base_url() ?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/morris/morris.js"></script>
    <script src="<?= base_url() ?>/assets/js/Lightweight-Chart/jquery.chart.js"></script>
    <script src="<?= base_url() ?>/assets/js/custom-scripts.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>
    <?= $this->renderSection('chart') ?>
    
    <div class="hiddendiv common"></div><i title="Raphaël Colour Picker" style="display: none; color: gray;"></i>
</body>

</html>
