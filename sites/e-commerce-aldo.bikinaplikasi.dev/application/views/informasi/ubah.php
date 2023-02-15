<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            UBAH DATA INFORMASI
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">INFORMASI</a></li>
            <li class="active">UBAH DATA INFORMASI</li>
        </ol>                         
    </div>

    <div id="page-inner"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">
                                    <div class="title">UBAH DATA INFORMASI</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo site_url('informasi') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('informasi/edit/'.$informasi->idinfo) ?>">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" value="<?php echo $informasi->judul ?>" class="form-control input-sm" placeholder="Judul" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="deskripsi" class="form-control" rows="8" name="deskripsi"><?php echo $informasi->deskripsi ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url() ?>templateadmin/tinymce/tinymce.min.js"></script>

<script type="text/javascript">
    $(function() {
        tinyMCE.init ({
            selector: '#deskripsi',
            plugins: [
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste code'
              ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        })
    });
</script>