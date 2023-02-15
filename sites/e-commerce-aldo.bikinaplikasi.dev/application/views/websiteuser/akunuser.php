<div id="content">
    <div class="container-fluid">     
        <div class="row">
            
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li>My account</li>
                </ul>

            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                   
                        <?php $this->load->view('websiteuser/menuuser') ?>

                    </div>
                    <div class="col-md-9">
                        <div class="box">
                            <h1><?php echo $user->nama ?></h1>
                            
                            <h3>Ganti password</h3>

                            <form method="post" action="<?php echo site_url('webuser/gantipassword') ?>">
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password_old">Password Lama</label>
                                            <input type="password" name="password_old" class="form-control" id="password_old">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="password_new">Password Baru</label>
                                            <input type="password" name="password_new" class="form-control" id="password_new">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan password</button>
                                </div>
                            </form>

                            <hr>

                            <h3>Profil Saya</h3>
                            <form method="post" action="<?php echo site_url('webuser/gantiprofil') ?>">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" class="form-control" value="<?php echo $user->nama ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Notelp</label>
                                            <input type="text" name="notelp" class="form-control" value="<?php echo $user->notelp ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    
                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Profil</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>