<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $judul ?>
    </title>
    <link href="<?php echo base_url() ?>templateadmin/css/bootstrap.css" rel="stylesheet">

   
    <style>
        body {
            padding-top: 20px;
        }
    </style>

</head>

<body onload="window.print();" layout="potrait">

   
    <div class="container">

        <div class="col-xs-12" style="min-height:500px">

            <div class="row">
                
                <div class="col-xs-11">
                    <?php echo headerLaporan() ?>
                </div>
            </div>

            <hr style="border:1px solid black">
            <p class="text-center">LAPORAN DATA PELANGGAN</p>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                        <th width="5%">No.</th>
                    <th>Nama</th>
                    <th width="19%">Alamat</th>
                    <th width="15%">No Telp</th>
                    <th width="10%">Username</th>                    
                    <th width="10%">Status</th>                    
                    <th width="10%">Tgl Daftar</th>                   
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach($pelanggan->result() as $dtpelanggan): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $dtpelanggan->nama; ?></td>
                        <td><?php echo $dtpelanggan->alamat; ?></td>
                        <td><?php echo $dtpelanggan->notelp; ?></td>
                        <td><?php echo ($dtpelanggan->username)  ?></td>
                        <td><?php echo ($dtpelanggan->status)  ?></td>
                        <td><?php echo ($dtpelanggan->tgl_daftar)  ?></td>
                    </tr>
                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-xs-8">
                    &nbsp;
                </div>
                <div class="col-xs-4">
                    <p>
                        Jambi, <?php echo date('d-m-Y') ?>
                        <br>
                        Pimpinan
                    </p>
                    
                    <br><br><br>
                    <p><?php echo pimpinan() ?></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>