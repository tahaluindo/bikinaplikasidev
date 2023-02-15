<div id="content">
    <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li><?php echo $sts->judul ?></li>
                </ul>
            </div>
        </div>

         <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box" id="text-page">
                            <h1><?php echo $sts->judul ?></h1>
                            <?php echo $sts->deskripsi ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>