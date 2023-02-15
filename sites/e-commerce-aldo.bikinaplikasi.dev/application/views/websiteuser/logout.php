<div id="content">
            <div class="container-fluid">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li>Logout</li>
                    </ul>

                </div>
                <div class="col-md-offset-3 col-md-6">
                    <div class="box">
                        <h1>Logout</h1>

                        <p class="lead">Anda yakin ingin Logout ?</p>
                       
                        <hr>
                        
                        <div class="text-center">
                            <a href="<?php echo site_url('webuser/logout') ?>" class="btn btn-primary">
                               Logout
                            </a>
                            <a href="<?php echo base_url() ?>" class="btn btn-primary">
                               Batal
                            </a>
                            
                        </div>
                        
                    </div>
                </div>
                

            </div>
            <!-- /.container -->
        </div>