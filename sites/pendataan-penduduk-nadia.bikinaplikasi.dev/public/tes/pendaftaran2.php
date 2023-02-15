<?php
	session_start();
    error_reporting(0);
    $judul_halaman = 'DROPDOWN BERANTAI';

    #koneksi ke database
    include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="aset/favicon.ico">

        <title>DEMO PHP - <?= $judul_halaman ?></title>

        <!-- Bootstrap core CSS -->
        <link href="aset/css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="aset/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="aset/css/navbar-fixed-top.css" rel="stylesheet">
        <script src="aset/js/jquery.min.js"></script>
        <script src="aset/js/ie-emulation-modes-warning.js"></script>
    </head>

    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://harviacode.com">HARVIACODE</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="https://demo-php.harviacode.com">DEMO PHP</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href=""><?= $judul_halaman ?> <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading"><b><?= $judul_halaman ?></b></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="alert alert-info"><b>Mohon maaf karena keterbatasan sumber daya, kami membatasi jumlah data yang dimunculkan untuk masing-masing dropdown Kabupaten/ Kota dan Kecamatan.</b></div>

                                <form class="form-horizontal" method="post">

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <!--Kecamatan-->
                                            <select id="kecamatan" class="form-control" name="kecamatan">
                                                <option value="">Please Select</option>
                                                <?php
                                                    $query = mysqli_query($db, "SELECT * FROM data_keluarga ORDER BY no_kec");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                    <option value="<?php echo $row['no_kk']; ?>">
                                                        <?php echo $row['no_kk']; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-3">
                                      
                                            <!--desa-->
                                            <select id="desa" class="form-control" name="desa">
                                                <option value="">Please Select</option>
                                                <?php
                                                    $query = mysqli_query($db, "SELECT * FROM desa INNER JOIN kecamatan ON desa.id_kec_fk = kecamatan.id_kec ORDER BY nama_desa");
                                                    while ($row = mysqli_fetch_array($query)) { ?>

                                                    <option id="desa" class="<?php echo $row['id_kec']; ?>" value="<?php echo $row['id_desa']; ?>">
                                                        <?php echo $row['nama_desa']; ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            
                                            </select>
                                        </div>
                                    </div>   
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer"><small>© <?= date('Y') ?> <a href="https://harviacode.com" target="_blank">Harviacode</a></small></div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <script src="aset/js/bootstrap.min.js"></script>
        <script src="aset/js/jquery-chained.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="aset/js/ie10-viewport-bug-workaround.js"></script>
        <script>
            $(document).ready(function() {
                $("#kota").chained("#provinsi");
                $("#kecamatan").chained("#kota");
            });
        </script>
    </body>
</html>