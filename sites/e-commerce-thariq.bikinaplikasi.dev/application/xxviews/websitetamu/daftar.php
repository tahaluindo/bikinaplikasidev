<div id="content">
     <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">

                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li>Login / Daftar</li>
                </ul>
                
               <!--  <p class="alert alert-danger">Gagal Login</p> -->
                <?php if($this->session->flashdata('gagal') <> '') { ?>
                <p class="alert alert-danger">
                    <strong><?php echo $this->session->flashdata('gagal') ?></strong> 
                </p>
                <?php } ?>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h1>Login</h1>

                            <p class="lead">Sudah Terdaftar ?</p>
                           
                            <hr>

                            <form action="<?php echo site_url('aplikasi/login') ?>" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box">
                            <h1>Buat Akun Baru</h1>

                            <p class="lead">Anda Belum Terdaftar ?</p>
                           
                            <hr>

                            <form action="<?php echo site_url('aplikasi/simpandaftar') ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="name" <?php echo hanyaHuruf() ?> required placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="notelp">No Telp</label>
                                    <input type="number" class="form-control" name="notelp" id="notelp" <?php echo maxLengthAngka(13) ?> required placeholder="No Telp">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" required placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required placeholder="Password">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            