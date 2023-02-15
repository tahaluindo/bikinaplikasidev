<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        <?php echo namaApp() ?>
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="<?php echo base_url() ?>templateuser/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>templateuser/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>templateuser/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>templateuser/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>templateuser/css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?php echo base_url() ?>templateuser/css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo base_url() ?>templateuser/css/custom.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/dtpicker/bootstrap-datepicker.css" rel="stylesheet">

   <!--  <link href="<?php //echo base_url() ?>assets/timepicker/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet"> -->
    <script src="<?php echo base_url() ?>templateuser/js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/respond.min.js"></script>
     <script src="<?php echo base_url() ?>templateuser/js/bootstrap-suggest.js"></script>
    <link rel="shortcut icon" href="favicon.png">
    <style>
        /*body {
            background: url('<?php //echo base_url() ?>images/backlogin/bghome.jpg');
            background-repeat:no-repeat;
            background-size:cover;
        }*/

        
    </style>

    <script>
    function alphaOnly(event) {
      var key = event.keyCode;
      return ((key >= 65 && key <= 90) || key == 8 || key == 46 || key == 37 || key == 39 || key == 32);
    };
    </script>
</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top" style="background: green">
        <div class="container-fluid">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="<?php echo base_url() ?>"><?php echo namaApp() ?> <?php echo infobutik() ?></a>

            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li class=""><a href="<?php echo site_url('aplikasi/lacakpesanan') ?>">Lacak Pesanan</a>
                    </li>
                    <li class=""><a href="<?php echo site_url('aplikasi/statis/sts_carabeli') ?>">Cara Beli</a>
                    </li>
                    <li class=""><a href="<?php echo site_url('aplikasi/statis/sts_tentang') ?>">Tentang Kami</a>
                    </li>
                    <li class=""><a href="<?php echo site_url('aplikasi/statis/sts_faq') ?>">Faq</a>
                    </li>

                    <?php 
                    if($this->session->userdata('iduser') != '') {
                    ?>
                        <li><a href="<?php echo site_url('webuser') ?>"><?php echo $this->session->userdata('namauser') ?></a>
                        </li>
                        <li><a href="<?php echo site_url('webuser/logoutconfirm') ?>">Logout</a>
                        </li>
                    <?php } else { ?>
                        
                        <li class=""><a href="<?php echo site_url('aplikasi/daftar') ?>">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container-fluid">
           
            <div class="navbar-header">
               
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                   
                    <li class="<?php echo ($this->uri->segment(1) == null) ? 'active' : '' ?>"><a href="<?php echo site_url() ?>">Home</a>
                    </li>

                    <?php $kategori = $this->db->query("select * from kategori"); if($kategori->num_rows()): ?>
                        <?php foreach($kategori->result() as $rskategori): ?>
                        <li>
                            <a href="<?php echo site_url('aplikasi/barang/'.$rskategori->id) ?>"><?php echo $rskategori->nmkategori ?></a>
                        </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="<?php echo site_url('aplikasi/transaksi') ?>" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $this->cart->total_items()?> </span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <!-- <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button> -->
                    <form action="<?php echo site_url('aplikasi/search') ?>" method="get" class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="q" placeholder="Pencarian..." required>
                            <span class="input-group-btn">

                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

                </span>
                        </div>
                    </form>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form action="<?php echo site_url('aplikasi/search') ?>" method="get" class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Search" required>
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->


    <div id="all">

        
        <!-- /#content -->

        