<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">Edit User
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Edit User</a></li>
            <li class="active">Data</li>
        </ol>
    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <form method="post" action="update" enctype="multipart/form-data">

                        <div class="card-content">


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email" name="email"
                                    value="<?= $item->email ?? old('email') ?>">

                                <?php

                                    if ($validation->hasError('email')) {

                                        echo $validation->getError('email');
                                    }

                                    ?>
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username"
                                    name="username" value="<?= $item->username ?? old('username') ?>">

                                <?php

                                    if ($validation->hasError('username')) {

                                        echo $validation->getError('username');
                                    }

                                    ?>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password" value="<?= $item->password ?? old('password') ?>">

                                <?php

                                    if ($validation->hasError('password')) {

                                        echo $validation->getError('password');
                                    }

                                    ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>