<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            BELUM KONFIRMASI
        </h3>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">BELUM KONFIRMASI</a></li>
          <li class="active">Data</li>
        </ol>                           
    </div>
    <div id="page-inner">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">
                        
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('element/flashadmin') ?>
                        <div class="table-responsivex">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th width="5%">No.</th>
                                    <th width="10%">Kode</th>
                                    <th>Nama</th>
                                    <th width="20%">Tgl Pesan</th>
                                    <th width="20%">Batas Konfirmasi</th>
                                    <th width="15%">Total</th>
                                    <th width="15%">Lihat Pesanan</th>
                                </thead>
                                <tbody>
                                <?php $no = 1; foreach ($orderbelum->result() as $rsorder) { ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td>#<?php echo $rsorder->id_pesan ?></td>
                                        <td><?php echo $rsorder->nama ?></td>
                                        <td><?php echo mdate('%d-%m-%Y %H:%i',strtotime($rsorder->tgl_pesan)) ?></td>
                                        <td><?php echo mdate('%d-%m-%Y %H:%i',strtotime($rsorder->bataskonfirmasi)) ?></td>
                                        <td>Rp. <?php echo number_format($rsorder->total + $rsorder->ongkos_kirim,0,',','.') ?></td>
                                        <td>
                                            <a href="<?php echo site_url('pemesanan/detailpesan/'.$rsorder->id_pesan.'/belum') ?>" class="btn btn-xs btn-primary">Lihat</a>
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
