<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li><?php echo $user->nama ?></li>
                </ul>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <?php $this->load->view('websiteuser/menuuser') ?>
                    </div>
                    <div class="col-md-9" id="customer-order">
                        <div class="box">
                            <h1>Order #<?php echo $order->id_pesan ?></h1>

                            <p class="lead">Tanggal Pesan : <strong><?php echo mdate('%d-%M-%Y %H:%i %A',strtotime($order->tgl_pesan)) ?></strong><br>Akhir Konfirmasi : <strong><?php echo mdate('%d-%M-%Y %H:%i %A',strtotime($order->bataskonfirmasi)) ?></strong></p>
                            <p><?php echo norekening() ?></p>
                            <p>Expedisi Pengiriman : <?php echo $order->expedisi ?></p>
                            <h4>No Resi : <?php echo $order->noresi ?></h4>
                            <hr>

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Warna</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th class="text-right">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $grandtotal = 0;
                                        foreach($orderdetail->result() as $rsdet) { 
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsdet->id_barang) ?>">
                                                    <img src="<?php //echo base_url('images/barang/'.$rsdet->urlgambar) ?>">
                                                </a>
                                            </td>
                                            <td><a href="<?php echo site_url('aplikasi/detailbarang/'.$rsdet->id_barang) ?>"><?php echo $rsdet->nama_barang ?></a>
                                            </td>
                                            <td><?php echo $rsdet->warna ?></td>
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
                                            <th colspan="5" class="text-right">Total</th>
                                            <th class="text-right">Rp. <?php echo number_format($grandtotal,0,',','.') ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" class="text-right">Ongkos Kirim</th>
                                            <th class="text-right">Rp. <?php echo number_format($order->ongkos_kirim,0,',','.') ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" class="text-right">Total</th>
                                            <th class="text-right">Rp. <?php echo number_format($order->ongkos_kirim + $grandtotal,0,',','.') ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="row addressesx">
                                <?php 
                                if(time() > strtotime($order->bataskonfirmasi) && ($order->konfirmasi == 'Belum' || $order->konfirmasi == 'Gagal')) {
                                ?>
                                    <div class="col-md-12">
                                        <h2>Waktu Konfirmasi Transaksi telah berakhir</h2>
                                    </div>
                                <?php } else { ?>
                                    <?php $this->load->view('element/flashadmin') ?>

                                    <?php if($order->konfirmasi == 'Belum') { ?>
                                    <div class="col-md-12">
                                        <h2>Konfirmasi Transaksi</h2>
                                        
                                        <form action="<?php echo site_url('webuser/uploadBuktiTransfer/'.$order->id_pesan) ?>" method="post" enctype="multipart/form-data" autocomplete="off">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">No Order</label>
                                                        <input type="text" value="<?php echo $order->id_pesan ?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Jumlah Transfer</label>
                                                        <?php 
                                                        $jmltrf = $order->ongkos_kirim + $grandtotal;
                                                        ?>
                                                        <input type="number" name="jumlahtransfer" class="form-control" value="<?php echo $jmltrf ?>" placeholder="<?php echo $jmltrf ?>" required readonly>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="">Tanggal</label>
                                                        <input type="text" class="form-control" name="tgltransfer" id="tanggal" required>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">No Rekening</label>
                                                        <input type="text" name="norekening" class="form-control" required>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="bank">Nama Bank Transfer</label>
                                                        <input type="text" class="form-control" name="bank" id="bank" required>
                                                    </div>
                                                   
                                                   
                                                     <div class="form-group">
                                                        <label for="bukti">Bukti Konfirmasi</label>
                                                        <input type="file" name="userfile"/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Konfirmasi</button>
                                            </div>
                                        </form>
                                    </div>
                                    <?php } else { ?>
                                    <div class="col-md-6">
                                        <h2>Data Konfirmasi Transaksi</h2>
                                        <table>
                                            <tr>
                                                <th width="150">Nama Bank Transfer</th>
                                                <th width="10">:</th>
                                                <th><?php echo $order->banktransfer ?></th>
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
                                    <div class="col-md-6">
                                        <h2>Bukti Konfirmasi Transaksi</h2>
                                        <img src="<?php echo base_url('/images/buktitransfer/'.$order->buktikonfirmasi) ?>" width="300" height="250">
                                        <hr>
                                    </div> 
                            
                                     
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <hr>
                                        <a href="<?php echo site_url('webuser/cetaktransaksi/'.$order->id_pesan) ?>" class="btn btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak Transaksi</a>
                                    </div>
                                <?php } ?>  
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>