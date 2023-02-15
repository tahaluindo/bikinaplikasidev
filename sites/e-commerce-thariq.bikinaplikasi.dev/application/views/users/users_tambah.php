<div id="page-wrapper">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-6">
            <p style="font-size: 24px">TAMBAH DATA USER</p>
        </div>
        <div class="col-lg-6">
            <a href="<?php echo site_url('users') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
        </div>
        
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <form method="post" action="<?php echo site_url('users/simpanUser') ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control input-sm" placeholder="Nama" required />
                </div>
                <div class="form-group">
                    <label>No. Telp</label>
                    <input type="text" name="notelp" class="form-control input-sm" placeholder="Notelp" required />
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea rows="2" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                </div>
                
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control input-sm" placeholder="Username" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control input-sm" placeholder="Password" required />
                </div>
                
               
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control input-sm" name="status" required>
                        <option value="">- Pilih Status -</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>
              

                 <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>

            </form>
            
        </div>
        
    </div>
    
</div>
<!-- /#page-wrapper -->   