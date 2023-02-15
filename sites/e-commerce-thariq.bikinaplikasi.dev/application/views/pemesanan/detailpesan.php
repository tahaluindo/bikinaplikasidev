<?php 
$teks = '';
$link = '';
if($jenis == 'sudah') { 
    $teks = 'DETAIL PEMESANAN SUDAH KONFIRMASI';
    $link = 'pemesanan/sudahkonfirmasi';
} else { 
    $teks = 'DETAIL PEMESANAN BELUM KONFIRMASI';
    $link = 'pemesanan/belumkonfirmasi';
}

?>
<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            <?php echo $teks ?>
        </h3>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#"><?php echo $teks ?></a></li>
          <li class="active">Data</li>
        </ol>                           
    </div>
    <div id="page-inner">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">
                                <?php echo $teks ?>
                            </div>
                            <div class="col-md-4 text-right">
                                <a href="<?php echo site_url($link) ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Order #<?php echo $order->id_pesan ?></h3>

                                <p class="lead">
                                    Tanggal Pesan <strong><?php echo mdate('%d-%m-%Y %H:%i',strtotime($order->tgl_pesan)) ?></strong>
                                </p>
                                <?php 
                                $this->db->where('id',$order->id_user);
                                $user = $this->db->get('users')->row();
                                ?>
                                <table>
                                    <tr>
                                        <td width="120">Nama</td>
                                        <td width="10">:</td>
                                        <td><?php echo $user->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Notelp</td>
                                        <td>:</td>
                                        <td><?php echo $user->notelp ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat Penerima</td>
                                        <td>:</td>
                                        <td><?php echo $order->alamat_penerima ?></td>
                                    </tr>
                                    <tr>
                                        <td>Catatan</td>
                                        <td>:</td>
                                        <td><?php echo $order->catatan ?></td>
                                    </tr>
                                    <tr>
                                        <td>No Resi</td>
                                        <td>:</td>
                                        <td><?php echo $order->noresi ?></td>
                                    </tr>
                                </table>
                                <hr>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Barang</th>
                                            <th>Jumlah</th>
                                            <th>Ukuran</th>
                                            <th>Harga</th>
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
                                            <td><?php echo $rsdet->ukuran ?></td>
                                            <td class="text-right">Rp. <?php echo number_format($rsdet->harga_detail,0,',','.') ?></td>
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

                                <!--  -->
                                <div class="row addressesx">
                                <?php if($order->konfirmasi === 'Sudah' && $order->status_kirim == 'Belum' ) { ?>
                                    <div class="col-md-6">
                                        <h2>Data Konfirmasi Transaksi</h2>
                                        <table>
                                            <tr>
                                                <th width="150">Bank Transfer</th>
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
                                        <hr>

                                       <!--  <a href="<?php //echo site_url('pemesanan/prosesKirim/'.$order->id_pesan) ?>" class="btn btn-primary btn-block">Lakukan Proses Pengiriman</a> -->
                                        <form method="post" action="<?php echo site_url('pemesanan/prosesKirim') ?>">
                                            <input type="hidden" name="id_pesan" value="<?php echo $order->id_pesan ?>">
                                            <div class="form-group">
                                                <label>No Resi Pengiriman</label>
                                                <input type="text" name="noresi" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Lakukan Proses Pengiriman</button>
                                            </div>
                                        </form>
                                    </div> 
                                    <div class="col-md-6">
                                        <h2>Bukti Konfirmasi Transaksi</h2>
                                        <img src="<?php echo base_url('/images/buktitransfer/'.$order->buktikonfirmasi) ?>" width="300" height="250">
                                        <hr>
                                    </div>    
                                   
                                <!-- </div> -->
                                <?php } ?>

                                <?php if($order->konfirmasi === 'Sudah' && $order->status_kirim == 'Sudah' ) { ?>
                                    <div class="col-md-6">
                                        <h2>Data Konfirmasi Transaksi</h2>
                                        <table>
                                            <tr>
                                                <th width="150">Bank Transfer</th>
                                                <th width="10">:</th>
                                                <th><?php echo $order->banktransfer ?></th>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Konfirmasi</th>
                                                <th>:</th>
                                                <th><?php echo mdate('%d-%m-%Y %H:%i',strtotime($order->tglkonfirmasi)) ?></th>
                                            </tr>
                                           
                                        </table>
                                        <hr>
                                        
                                    </div> 
                                    <div class="col-md-6">
                                        <h2>Bukti Konfirmasi Transaksi</h2>
                                        <img src="<?php echo base_url('/images/buktitransfer/'.$order->buktikonfirmasi) ?>" width="300" height="250">
                                        <hr>
                                    </div>    
                                <?php } ?>
                                </div>
                                <!--  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
