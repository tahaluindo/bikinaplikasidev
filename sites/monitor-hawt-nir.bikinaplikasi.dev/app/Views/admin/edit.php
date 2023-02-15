<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit</h3>
                        </div>
                        <form method="post" action="update" enctype="multipart/form-data">

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username"
                                           placeholder="Username" name="username" value="<?= $item->username ?? old('username') ?>">

                                    <?php

                                    if ($validation->hasError('username')) {

                                        echo $validation->getError('username');
                                    }

                                    ?>
                                </div>


                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama"
                                           placeholder="Nama" name="nama" value="<?=  $item->nama ?? old('nama') ?>">

                                    <?php

                                    if ($validation->hasError('nama')) {

                                        echo $validation->getError('nama');
                                    }

                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password"
                                           placeholder="Passowrd" name="password" value="<?=  $item->password ?? old('password') ?>">

                                    <?php

                                    if ($validation->hasError('password')) {

                                        echo $validation->getError('password');
                                    }

                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="avatar">Avatar</label>
                                    
                                    <img src="<?= base_url("uploads/avatars/$item->avatar") ?>" width="50" height="50">
                                    
                                    <input type="file" name="avatar" id="avatar" class="form-control" name="avatar">

                                    <?php

                                    if ($validation->hasError('avatar')) {

                                        echo $validation->getError('avatar');
                                    }

                                    ?>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>