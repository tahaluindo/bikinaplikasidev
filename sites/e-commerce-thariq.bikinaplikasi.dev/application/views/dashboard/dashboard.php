<?php 
$qp = "select * from pemesanan where konfirmasi = 'Sudah'";
$rp = $this->db->query($qp)->num_rows(); 


$qb = "select * from barang";
$rb = $this->db->query($qb)->num_rows();

$qu = "select * from users";
$ru = $this->db->query($qu)->num_rows();

?>

    <div id="page-wrapper">
        <br>
        <div class="header"> 
                    
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active">Data</li>
            </ol> 
                                
        </div>
        <div id="page-inner">

            <!-- /. ROW  -->

            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3><?php echo $rp ?></h3>
                                    <small>Pemesanan</small>
                                </h3> 
                            </div>
                            <div class="icon">
                                <i class="fa fa-shopping-cart fa-5x blue"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3><?php echo $rb ?></h3>
                                    <small>Produk</small>
                                </h3> 
                            </div>
                            <div class="icon">
                                <i class="fa fa-list fa-5x green"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="board">
                        <div class="panel panel-primary">
                            <div class="number">
                                <h3>
                                    <h3><?php echo $ru ?></h3>
                                    <small>Pelanggan</small>
                                </h3> 
                            </div>
                            <div class="icon">
                                <i class="fa fa-user fa-5x yellow"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                 
  
           
            <div class="row">
                <div class="col-md-12">
            
                </div>      
            </div>  
            <!-- /. ROW  -->

   
            
            
            
            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-xs-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pembelian
                        </div> 
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No Order</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Nama User</th>
                                        <th>Kembalikan Stok</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach($gagal->result() as $rsgagal) { ?>
                                        <tr>
                                            <td>#<?php echo $rsgagal->id_pesan ?></td>
                                            <td><?php echo $rsgagal->tgl_pesan ?></td>
                                            <td><?php echo $rsgagal->nama ?></td>
                                            <td>
                                                <?php if($rsgagal->konfirmasi == 'Belum') { ?>
                                                <a href="<?php echo site_url('dashboard/kembalikanstok/'.$rsgagal->id_pesan) ?>" title="Kembalikan Stok">
                                                    <i class="fa fa-reply"></i>
                                                </a>
                                                <?php } ?>
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
            <!-- /. ROW  -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>

<!-- <div id="page-wrapper">
<div class="row">
    <br>
    <?php// $this->load->view('element/flashadmin') ?>
</div>


