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
            <p class="text-center">LAPORAN TRANSAKSI NO ORDER : <?php echo $info->id_pesan ?></p>
            <br>
            <div class="row">
               
                <div class="col-xs-12">
                    <table>
                        <tr>
                            <td>Order</td>
                            <td>:</td>
                            <td>#<?php echo $info->id_pesan ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?php echo $info->nama ?></td>
                        </tr>
                         <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?php echo mdate('%d-%m-%y %H:%i',strtotime($info->tgl_pesan)) ?></td>
                        </tr>
                    </table>            
                </div>
                <div class="col-xs-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            $grandtotal = 0;
                            foreach($transaksi->result() as $rsdet) { 
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $rsdet->nama_barang ?></td>
                                <td><?php echo $rsdet->jumlah_detail ?></td>
                                <td>Rp. <?php echo number_format($rsdet->harga_detail,0,',','.') ?></td>
                               
                                <?php 
                                $subtotal = $rsdet->jumlah_detail * $rsdet->harga_detail;
                                $grandtotal += $subtotal;
                                ?>
                                <td>Rp. <?php echo number_format($subtotal,0,',','.') ?></td>
                            </tr>

                            <?php } ?>
                            
                        </tbody>
                        <tfoot>
                            
                            <tr>
                                <th colspan="4" class="text-right">Total</th>
                                <th>Rp. <?php echo number_format($grandtotal,0,',','.') ?></th>
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