<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            ONGKOS KIRIM
        </h3>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">ONGKOS KIRIM</a></li>
          <li class="active">Data</li>
        </ol>                           
    </div>
    <div id="page-inner">  
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-right">
                        <a href="<?php echo site_url('ongkoskirim/tambah') ?>" class="btn btn-primary ">Tambah</a>
                    </div>
                    <div class="panel-body">
                        <?php $this->load->view('element/flashadmin') ?>
                        <div class="table-responsivex">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <th width="5%">No.</th>
                                    <th>Kode</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Biaya</th>
                                    <th width="5%">Edit</th>
                                    <th width="5%">Hapus</th>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($ongkir->result() as $dtongkir) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $dtongkir->kode; ?></td>
                                        <td><?php echo $dtongkir->provinsi; ?></td>
                                        <td><?php echo $dtongkir->kabupaten; ?></td>
                                        <td><?php echo $dtongkir->biaya; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('ongkoskirim/ubah/'.$dtongkir->id) ?>"><i class="fa fa-edit fa-fw"></i></a>
                                        </td>
                                        
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modalHapus" data-id="<?php echo $dtongkir->id ?>"><i class="fa fa-trash fa-fw"></i></a>
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
    $('#hapusDataModal').attr('href',"<?php echo site_url('ongkoskirim/hapus/') ?>" + data);
  })
});
</script>  