<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | <?php echo e(env('APP_OBJECT_NAME')); ?> - <?php echo e(env('APP_OBJECT_LOCATION')); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(url('')); ?>/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo e(url('')); ?>/js/vendor/modernizr-2.8.3.min.js"></script>
</head>


<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            <h3>LOGIN</h3>
            <p><?php echo e(env('APP_OBJECT_NAME')); ?> - <?php echo e(env('APP_OBJECT_LOCATION')); ?></p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="#" id="loginForm" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <input type="text" placeholder="example@gmail.com" title="Email" required="" value=""
                                   name="email" id="email" class="form-control">

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" title="Please enter your password" placeholder="******" required=""
                                   value="" name="password" id="password" class="form-control">

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <button class="btn btn-success btn-block loginbtn">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © <?php echo e(date("Y")); ?>. All rights reserved.</p>
        </div>
    </div>
</div>
<!-- jquery
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/jquery-price-slider.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/jquery.meanmenu.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/owl.carousel.min.js"></script>
<!-- sticky JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/jquery.sticky.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/jquery.scrollUp.min.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo e(url('')); ?>/js/scrollbar/mCustomScrollbar-active.js"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo e(url('')); ?>/js/metisMenu/metisMenu-active.js"></script>
<!-- tab JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/tab.js"></script>
<!-- icheck JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/icheck/icheck.min.js"></script>
<script src="<?php echo e(url('')); ?>/js/icheck/icheck-active.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/main.js"></script>
<!-- tawk chat JS
    ============================================ -->
<script src="<?php echo e(url('')); ?>/js/tawk-chat.js"></script>
</body>

</html>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\spk-blt-covid-muhammad-ridho.bikinaplikasi.dev\resources\views/auth/login.blade.php ENDPATH**/ ?>