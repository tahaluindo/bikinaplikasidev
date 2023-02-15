<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            DATA BARANG
        </h3>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">DATA BARANG</a></li>
          <li class="active">Data</li>
        </ol>                           
    </div>
    <div id="page-inner">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">
                        <a href="<?php echo site_url('barang/barangTambah') ?>" class="btn btn-primary ">Tambah</a>
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('element/flashadmin') ?>
                        <div class="table-responsivex">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th width="10%">No.</th>
                                    <th>Nama</th>
                                    <th width="19%">Kategori</th>
                                    <th width="10%">Berat (Gram)</th>
                                    <th width="10%">Total Stok</th>
                                    <th width="10%">Lihat</th>
                                    <th width="10%">Edit</th>
                                    <th width="10%">Hapus</th>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($barang->result() as $rs) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $rs->nama_barang; ?></td>
                                        <td><?php echo $rs->nmkategori; ?></td>
                                        <td><?php echo $rs->berat ?></td>
                                        <td><?php echo ($rs->ukurans + $rs->ukuranm + $rs->ukuranl + $rs->ukuranxl)  ?></td>
                                        <td>
                                            <a href="<?php echo site_url('barang/barangDetail/'.$rs->id) ?>"><i class="fa fa-file fa-fw"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('barang/barangUbah/'.$rs->id) ?>"><i class="fa fa-edit fa-fw"></i></a>
                                        </td>
                                        

                                        <td><a href="#" data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $rs->id ?>"><i class="fa fa-trash fa-fw"></i></a></td>
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
    var data = target.data('id');
    //alert(data);
    $('#hapusDataModal').attr('href',"<?php echo site_url('barang/hapusBarang/') ?>" + data);
  })
});
</script> 