<html>

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/argon.css?v=1.2.0" type="text/css">

    <style>
    .thumbnail img {
        width: 100%;
        height: 430px;
    }

    .navbar-horizontal .navbar-brand img {
        height: 55px;
    }

    .thumbnail .deskripsi-album {
        background-color: rgba(0, 0, 0, .5);
        position: absolute;
        margin: auto;
        height: 100%;
        text-align: center;
        width: 100%;
        line-height: 50%;
        top: 0;
        bottom: 0;
        padding-top: 185px;
    }

    .main-content {
        background-image: url(<?php echo base_url('assets/img/brand/kantor.jpg');
        ?>);
        background-size: cover;
        background-repeat: no-repeat;
    }

    .deskripsi-album {
    position: relative;
    text-align: center;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.3);
}

.deskripsi-album * {
    margin: 0;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* .deskripsi-album.berita, .deskripsi-album.berita * {
    all: initial;
}

.deskripsi-album.berita a {
    color: blue;
} */
    </style>
</head>

<body class="bg-default g-sidenav-show g-sidenav-pinned" style="min-height: 100vh;">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-main navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="dashboard.html">
                Desa Kota Raja
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="dashboard.html">
                                <img src="../assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth/profil"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Profil</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth/profil?struktur_desa=1"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Pemerintahan Desa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth/informasi_penduduk"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Informasi Penduduk</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth/panduan_layanan"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Panduan Layanan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth/galeri"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Galeri</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("Auth/berita"); ?>" class="nav-link">
                            <span class="nav-link-inner--text">Berita</span>
                        </a>
                    </!>
                </ul>
                <hr class="d-lg-none">
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item d-none d-lg-block ml-lg-4">
                        <?php if($this->session->userdata('username') == ""): ?>
                        <a href="<?php echo base_url("Auth/login_admin"); ?>" class="btn btn-danger btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-lock mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text">Login Aplikasi</span>
                        </a>
                        <?php else: ?>
                        <a href="<?php echo base_url("Home"); ?>" class="btn btn-danger btn-icon">
                            <span class="btn-inner--icon">
                                <i class="fas fa-home mr-2"></i>
                            </span>
                            <span class="nav-link-inner--text">Home</span>
                        </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="main-content" style='width: 100%; height: 88.5%;'>
        <!-- Header -->

        <!-- <div class="header bg-gradient-primary py-7 py-lg-7 pt-lg-7">
        </div> -->
        <div class="deskripsi-album">
                                            <h1 class='text-white'>Selamat Datang Di Website</h1>
                                            <h3 class='text-white mt-5'>Kantor Desa Kota Raja</h3>
                                        </div>


    </div>

    <div class="row ">
                <div class="col-lg-12 col-md-12">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5 text-center">
                            <h1>BERITA</h1>

                            <div class="row mb-5">
                            <?php foreach($DataBerita as $t): ?>
                                <div class="col-md-6">
                                <a href="<?php echo base_url("Auth/berita/$t[id]") ?>">
                                        <div class="thumbnail">
                                            <img src="<?php echo base_url("assets/uploads/$t[foto]"); ?>"
                                                class="img-responsive">
                                        </div>
                                    </a>

                                    <div class=" berita">
                                        <a href="<?php echo base_url("Auth/berita/$t[id]") ?>">
                                            <h2><?php echo substr($t['judul'], 0, 150); ?></h2>
                                            <span><?php echo substr($t['keterangan'], 0, 150); ?>...</span>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <script src="<?php echo base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/argon.js?v=1.2.0"></script>
    <div class="backdrop d-xl-none" data-action="sidenav-unpin" data-target="undefined"></div>

</body>

</html>