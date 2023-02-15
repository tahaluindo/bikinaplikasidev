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
            <p class="text-center">LAPORAN TRANSAKSI TAHUN : <?php echo $tahun ?></p>
            <br>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <th width="5%">No.</th>
                            <th width="30%">Bulan</th>
                            <th width="20%">Total</th>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $total = 0;
                            foreach($tahundata->result() as $rstahun) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $rstahun->bulan ?></td>
                                <td><?php echo number_format($rstahun->total,0,',','.') ?></td>
                            </tr>
                            <?php 
                                $total = $total + $rstahun->total; 
                            } 
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">Total</td>
                                <td><?php echo number_format($total,0,',','.') ?></td>
                            </tr>
                        </tfoot>
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