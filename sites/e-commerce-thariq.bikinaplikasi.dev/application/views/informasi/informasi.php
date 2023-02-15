<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            INFORMASI
        </h3>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url(); ?>">Home</a></li>
          <li><a href="#">INFORMASI</a></li>
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
                                    <th>Nama</th>
                                    <th width="5%">Edit</th>
                                    
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                foreach($informasi->result() as $dtinfo) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $dtinfo->judul; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('informasi/ubah/'.$dtinfo->idinfo) ?>"><i class="fa fa-edit fa-fw"></i></a>
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