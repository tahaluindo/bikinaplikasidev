<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            DATA BARANG
        </h3>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">DATA BARANG</a></li>
          <li class="active"><?php echo $barang->nama_barang ?></li>
        </ol>                           
    </div>
    <div id="page-inner">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">
                        <a href="<?php echo site_url('barang') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <table>
                                    <tr>
                                        <th width="150">Nama</th>
                                        <th width="10">:</th>
                                        <th><?php echo $barang->nama_barang ?></th>
                                    </tr>
                                    <tr>
                                        <th>Tipe barang</th>
                                        <th>:</th>
                                        <th><?php echo $barang->nmkategori ?></th>
                                    </tr>
                                    <tr>
                                        <th>Bahan</th>
                                        <th>:</th>
                                        <th><?php echo $barang->bahan ?></th>
                                    </tr>
                                    <tr>
                                        <th>Berat (satuan gram)</th>
                                        <th>:</th>
                                        <th><?php echo number_format($barang->berat,0,',','.') ?></th>
                                    </tr>
                                    <tr>
                                        <th>Spesifikasi</th>
                                        <th>:</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <?php echo $barang->keterangan ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><br></td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td colspan="5" align="center">Jumlah Stok Berdasarkan Ukuran</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Stok</td>
                                                    <td>S</td>
                                                    <td>M</td>
                                                    <td>L</td>
                                                    <td>XL</td>
                                                </tr>
                                                <?php 
                                                $s = $barang->ukurans;
                                                $m = $barang->ukuranm;
                                                $l = $barang->ukuranl;
                                                $xl = $barang->ukuranxl;
                                                $total = $s + $m + $l + $xl;
                                                ?>
                                                <tr>
                                                    <td><?php echo $total ?></td>
                                                    <td><?php echo $s ?></td>
                                                    <td><?php echo $m ?></td>
                                                    <td><?php echo $l ?></td>
                                                    <td><?php echo $xl ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Tambah</td>
                                                    
                                                    <td><a href="<?php echo site_url('barang/barangDetailTstok/'.$barang->id.'/s') ?>" class="btn btn-primary">Stok S</a></td>
                                                    <td><a href="<?php echo site_url('barang/barangDetailTstok/'.$barang->id.'/m') ?>" class="btn btn-primary">Stok M</a></td>
                                                    <td><a href="<?php echo site_url('barang/barangDetailTstok/'.$barang->id.'/l') ?>" class="btn btn-primary">Stok L</a></td>
                                                    <td><a href="<?php echo site_url('barang/barangDetailTstok/'.$barang->id.'/xl') ?>" class="btn btn-primary">Stok XL</a></td>
                                                    
                                                </tr>
                                            </table>
                                        </th>
                                    </tr>
                                </table>
                                
                            </div>
                            <div class="col-lg-6">
                                
                            </div>
                        </div>

                        <?php $this->load->view('element/flashadmin') ?>
                                                
                        <?php 
                        $q = "select * from gambarbarang where id_barang = ".$barang->id."";
                        $hasil = $this->db->query($q);
                        ?>

                        <?php if($hasil->num_rows()) { ?>
                        <hr>
                        <div class="row">       
                            <?php foreach($hasil->result() as $rsgbrtbh) { ?>
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo base_url('/images/barang/'.$rsgbrtbh->urlgambar) ?>" width="300" height="250">
                                    <br><br>
                                    <span>Ket. Gambar : <?php echo $rsgbrtbh->warna ?></span>
                                    <br><br>
                                   <!--  <a href="<?php //echo site_url('barang/hapusGambarTambahan/'.$barang->id.'/'.$rsgbrtbh->id) ?>" class="btn btn-sm btn-danger">Hapus</a> -->

                                    <a href="#" data-toggle="modal" 
                                    data-target="#modalHapus" 
                                    data-idbrg="<?php echo $barang->id ?>"
                                    data-idgbrtbh="<?php echo $rsgbrtbh->id ?>" class="btn btn-sm btn-danger">Hapus</a>
                                </div>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Gambar Barang</p>
                                <form method="post" action="<?php echo site_url('barang/uploadGambarBarangTambahan/'.$barang->id) ?>" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" name="userfile"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Ket. Gambar</label>
                                        <input type="text" name="warna" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        

    </div>
</div>

<!-- modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="prosesHapus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelX">Hapus Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus data ini ?</p>
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
    var idbrg = target.data('idbrg');
    var idgbrtbh = target.data('idgbrtbh');
    //alert(data);
    $('#hapusDataModal').attr('href',"<?php echo site_url('barang/hapusGambarTambahan/') ?>" + idbrg + '/' + idgbrtbh);
  })
});
</script> 