<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li>Keranjang Belanja</li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php $this->load->view('websitetamu/flashtamu') ?>
                <div class="row">
                    
                    <div class="col-md-12" id="basket">

                        <div class="box">

                            <form method="post" action="">

                                <h1>Keranjang Belanja</h1>
                                <p class="text-muted">Anda Mempunyai <?php echo $this->cart->total_items()?> item(s) didalam keranjang belanja.</p>
                                <div class="table-responsive">
                                    <table class="table" border="0">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Berat (Kg)</th>
                                                <th>Ukuran</th>
                                                <th valign="right">Harga</th>
                                                <th valign="right">Total</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $totalberat = 0; 
                                        ?>
                                        <tbody>
                                        	<?php foreach ($this->cart->contents() as $items): ?>
                                            <tr>
                                                <!-- <td><a href="<?php //echo site_url('aplikasi/hapuscart/'.$items['rowid']) ?>"><i class="fa fa-trash-o fa-fw"></i></a>
                                                </td> -->
                                                <td><a data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $items['rowid'] ?>"><i class="fa fa-trash-o fa-fw"></i></a>
                                                </td>
                                                <td><a href="<?php echo site_url('aplikasi/detailbarang/'.$items['id']) ?>"><?php echo $items['name'] ?></a>

                                                </td>
                                                <td width="200">
                                                    <!-- <input type="number" value="<?php //echo $items['qty'] ?>" class="form-control" disabled> -->
                                                    <a href="<?php echo site_url('aplikasi/kurangi/'.$items['qty'].'/'.$items['rowid']) ?>" class="btn btn-default">-</a>
                                                    <label style="padding: 10px"><?php echo $items['qty'] ?></label>

                                                    <a href="<?php echo site_url('aplikasi/tambah/'.$items['qty'].'/'.$items['rowid'].'/'.$items['id'].'/'.$items['options']['Size']) ?>" class="btn btn-default">+</a>
                                                </td>
                                                
                                                <td>
                                                    <?php 
                                                    $brttemp = ($items['options']['Berat']/1000);

                                                    $brttemphsl = $brttemp * $items['qty'];

                                                    $totalberat += $brttemphsl = $brttemp * $items['qty'];

                                                    echo $brttemphsl;
                                                    ?>
                                                </td>
                                                
                                                <td>
                                                    <?php echo $items['options']['Size'] ?>
                                                </td>
                                                <td align="right">Rp. <?php echo number_format($items['price'],0,',','.') ?></td>
                                                <?php 
                                                $sub = $items['qty'] * $items['price']
                                                ?>
                                                <td align="right">Rp. <?php echo number_format($sub,0,',','.') ?></td>
                                                
                                            </tr>

                                        	<?php endforeach ?>
                                            <tr>
                                                <td colspan="3"><b>Total</b></td>
                                                <td><b><?php echo $totalberat ?></b></td>
                                                <td colspan="2"></td>
                                                <td align="right"><b>Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?></b></td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo base_url() ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i> Lanjutkan Belanja</a>
                                    </div>
                                    <div class="pull-right">
                                        
                                        <?php 
                                        if($this->session->userdata('iduser') != '') {
                                        ?>
                                             <a href="<?php echo site_url('webuser/checkout') ?>" class="btn btn-primary">Proses Pembelian <i class="fa fa-chevron-right"></i>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?php echo site_url('aplikasi/daftar') ?>" class="btn btn-primary">Login <i class="fa fa-chevron-right"></i></a>
                                        <?php } ?>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.box -->

                    </div>
                    <!-- /.col-md-9 -->

                    <!-- <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Order subtotal</td>
                                            <th>Rp. <?php //echo number_format($this->cart->total(),0,',','.'); ?></th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>Rp. <?php //echo number_format($this->cart->total(),0,',','.'); ?></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div> -->
                    <!-- /.col-md-3 -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>

<!-- modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="prosesHapus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelX">Hapus Barang</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus barang ini ?</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" id="hapusDataModal" href="">Ya</a>
      </div>
    </div>
  </div>
</div>
<!-- modal -->

<script>
$(document).ready(function(){ 
  $('#modalHapus').on('show.bs.modal',function(e){
    var target = $(e.relatedTarget);
    var data = target.data('id');
    // alert(data);
    $('#hapusDataModal').attr('href',"<?php echo site_url('aplikasi/hapuscart/') ?>" + data);
  })
});
</script> 