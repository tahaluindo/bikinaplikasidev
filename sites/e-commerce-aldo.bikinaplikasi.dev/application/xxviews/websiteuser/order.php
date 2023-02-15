<div id="content">
     <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">
                <?php if($this->session->flashdata('berhasil') <> '') { ?>
                <p class="alert alert-info">
                    <strong><?php echo $this->session->flashdata('berhasil') ?></strong> 
                </p>
                <?php } ?>
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li><?php echo $user->nama ?></li>
                </ul>
                
                <?php if($this->session->flashdata('transaksi') <> '') { ?>
                <p class="alert alert-info">
                    <strong><?php echo $this->session->flashdata('transaksi') ?></strong> 
                </p>
                <?php } ?>

            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <?php $this->load->view('websiteuser/menuuser') ?>
                    </div>
                    <div class="col-md-9" id="customer-orders">
                        <div class="box">
                            <h1>Order History</h1>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Tanggal</th>
                                            <th>Batas Konfirmasi</th>
                                            <th>Total</th>
                                            <th>Status Konfirmasi</th>
                                            <th>Status Kirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach($order->result() as $rsorder) { 
                                            //echo time().'<br>';
                                            //echo strtotime($rsorder->bataskonfirmasi);
                                            $cekbatas = 'N';
                                            $warna = 'danger';
                                            if(time() < strtotime($rsorder->bataskonfirmasi) || $rsorder->konfirmasi == 'Sudah') {
                                                $cekbatas = 'Y';
                                                $warna = 'success';
                                            }

                                            if(time() > strtotime($rsorder->bataskonfirmasi) && $rsorder->konfirmasi == 'Belum') {
                                                $cekbatas = 'N';
                                                // $warna = '';
                                            }

                                          
                                            //echo $cekbatas;
                                        ?>
                                        <tr class="<?php echo $warna ?>">
                                            <th># <?php echo $rsorder->id_pesan ?></th>
                                            <td><?php echo mdate('%d-%M-%Y',strtotime($rsorder->tgl_pesan)) ?></td>
                                            <td><?php echo mdate('%d-%M-%Y %H:%i %A',strtotime($rsorder->bataskonfirmasi)) ?></td>
                                            <td>Rp. <?php echo number_format($rsorder->total + $rsorder->ongkos_kirim,0,',','.') ?></td>
                                            <td>
                                                <?php 
                                                if($cekbatas == 'Y') {
                                                    echo $rsorder->konfirmasi;
                                                } else if($cekbatas == 'N'){
                                                    echo 'Gagal';
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $rsorder->status_kirim ?></td>
                                            <td><a href="<?php echo site_url('webuser/orderdetail/'.$rsorder->id_pesan
                                            ) ?>" class="btn btn-primary btn-sm">Lihat</a>
                                            <!-- <a href="<?php //echo site_url('webuser/hapusOrder/'.$rsorder->id_pesan) ?>" class="btn btn-danger btn-sm">Hapus</a> -->
                                             <a data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $rsorder->id_pesan ?>" class="btn btn-danger btn-sm">Hapus</a>    

                                            </td>
                                        </tr>
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
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
        <h5 class="modal-title" id="exampleModalLabelX">Hapus Transaksi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus transaksi ini ?</p>
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
    $('#hapusDataModal').attr('href',"<?php echo site_url('webuser/hapusOrder/') ?>" + data);
  })
});
</script>