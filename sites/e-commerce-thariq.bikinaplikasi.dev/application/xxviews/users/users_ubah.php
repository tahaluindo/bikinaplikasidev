<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            UBAH DATA USER
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">USER</a></li>
            <li class="active">UBAH DATA USER</li>
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
                                    <div class="title">UBAH DATA USER</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo site_url('users') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>  
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('users/editUser/'.$user->id) ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?php echo $user->nama ?>" class="form-control input-sm" placeholder="Nama" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>No. Telp</label>
                                <input type="number" name="notelp" value="<?php echo $user->notelp ?>" class="form-control input-sm" placeholder="Notelp" required <?php echo maxLengthAngka(12) ?>/>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea rows="2" name="alamat" class="form-control" placeholder="Alamat"><?php echo $user->alamat ?></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control input-sm" placeholder="Username" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Password (Kosongkan Jika tidak diganti)</label>
                                <input type="password" name="password" class="form-control input-sm" placeholder="Password"/>
                            </div>
                            
                           
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control input-sm" name="status" required>
                                    <option value="">- Pilih Status -</option>
                                    <option value="Aktif" <?php echo $user->status == 'Aktif' ? "selected" : '' ?>>Aktif</option>
                                    <option value="Tidak" <?php echo $user->status == 'Tidak' ? "selected" : '' ?>>Tidak</option>
                                </select>
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