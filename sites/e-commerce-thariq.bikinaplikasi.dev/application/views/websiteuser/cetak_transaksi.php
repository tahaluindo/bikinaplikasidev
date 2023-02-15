<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cetak Transaksi</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>templateadmin/css/bootstrap.css" rel="stylesheet">

</head>

<body onload="window.print()">

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
				<?php echo headerLaporan() ?>
                 <p class="lead">Order #<?php echo $order->id_pesan ?> Tanggal Pesan <strong><?php echo mdate('%d-%m-%Y %H:%i',strtotime($order->tgl_pesan)) ?></strong>.</p>
                 <p><?php echo norekening() ?></p>
                 <p>Expedisi Pengiriman : <?php echo $order->expedisi ?></p>
                 <h4>No Resi : <?php echo $order->noresi ?></h4>
                <hr>   
            </div>         
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit price</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $grandtotal = 0;
                        foreach($orderdetail->result() as $rsdet) { 
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
                            <td class="text-right">Rp. <?php echo number_format($subtotal,0,',','.') ?></td>
                        </tr>

                        <?php } ?>
                        
                    </tbody>
                    <tfoot>
                        
                        <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th class="text-right">Rp. <?php echo number_format($grandtotal,0,',','.') ?></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Ongkos Kirim</th>
                            <th class="text-right">Rp. <?php echo number_format($order->ongkos_kirim,0,',','.') ?></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-right">Total</th>
                            <th class="text-right">Rp. <?php echo number_format($order->ongkos_kirim + $grandtotal,0,',','.') ?></th>
                        </tr>
                    </tfoot>

                </table>
            </div> 
            <hr>       
        </div>
        <div class="row">
            
            <?php if($order->konfirmasi == 'Sudah') { ?>
                
                <div class="col-xs-6">
                    <h2>Data Konfirmasi Transaksi</h2>
                    <table>
                        <tr>
                            <th width="150">Bank Transfer</th>
                            <th width="10">:</th>
                            <th><?php echo $order->banktransfer ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal Transfer</th>
                            <th>:</th>
                            <th><?php echo $order->tgltransfer ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal Konfirmasi</th>
                            <th>:</th>
                            <th><?php echo mdate('%d-%m-%Y %H:%i',strtotime($order->tglkonfirmasi)) ?></th>
                        </tr>
                       
                        <tr>
                            <th>Jumlah Transfer</th>
                            <th>:</th>
                            <th>Rp. <?php echo number_format($order->jumlahtransfer,'0',',','.') ?></th>
                        </tr>
                        <tr>
                            <th>Tanggal Transfer</th>
                            <th>:</th>
                            <th><?php echo mdate('%d-%m-%Y %H:%i',strtotime($order->tgltransfer)) ?></th>
                        </tr>
                        <tr>
                            <th>No Rekening</th>
                            <th>:</th>
                            <th><?php echo $order->norekening ?></th>
                        </tr>
                        
                    </table>
                </div> 
                <div class="col-xs-6">
                    <h2>Bukti Konfirmasi Transaksi</h2>
                    <img src="<?php echo base_url('/images/buktitransfer/'.$order->buktikonfirmasi) ?>" width="300" height="250">
                    <hr>
                </div> 
            <?php } ?>
            
        </div>

    </div>
</body>

</html>
