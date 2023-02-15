<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= getenv('APP.NAME') ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="<?= base_url() ?>/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    

    <style>
        form.user .btn-user {
            border-radius: 7.5px;
        }

        .bg-gradient-primary {
            background-color: #6CA4DB !important;
            background-image: linear-gradient(180deg,#4e73df 10%,#6CA4DB 100%)  !important;
        }

        form.user .form-control-user {
            border-radius: 7.5px;
        }

        .logo {
            width: 150px;
            margin-bottom: 10px;
        }

        .btn-primary, .btn-primary:hover {
            background-color: #6CA4DB;
            border: none;
        }
    </style>

    

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="text-gray-900"> Login</h1>
                                    <img src="<?= base_url(); ?>/assets/img/logo.png" alt="" class="logo">
                                </div>

                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form class="user" action="<?= route_to('login') ?>" method="post">
                                    <?php if ($config->validFields === ['email']): ?>
                                        <div class="form-group">
                                            <label for="">
                                                <i class="bi-alarm"></i>
                                            </label>

                                            <input type="email"
                                                   class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                   id="email" name="login"
                                                   placeholder="<?= lang('Auth.email') ?>">

                                            <div class="invalid-feedback">
                                                <?= session('errors.login') ?>
                                            </div>
                                        </div>
                                    <?php else: ?>

                                        <div class="form-group">

                                            <div class='row'>
                                                <div class='col-md-1'>
                                                    <i class="bi-person-fill"  style="font-size: 35px;"></i>
                                                </div>
                                                <div class='col-md-11'>
                                                    <input type="text"
                                                           class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                           id="email" name="login"
                                                           placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>

                                    <?php endif ?>

                                    <div class="form-group">
                                        <div class='row'>
                                            <div class='col-md-1'>
                                                        <i class="bi-lock-fill"  style="font-size: 35px;"></i>
                                                    </div>
    
                                                    <div class='col-md-11'>
                                                <input type="password"
                                                    class="form-control form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                                    id="password" name="password" placeholder="<?= lang('Auth.password') ?>">
                                                   </div>

                                        </div>

                                        <div class="invalid-feedback">
                                            <?= session('errors.password') ?>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block ">
                                        Login
                                    </button>

                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>

</body>

</html>

