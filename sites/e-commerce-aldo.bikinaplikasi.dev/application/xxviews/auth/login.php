<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo namaapp() ?></title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/login/css/style.css">

        <!-- Favicon and touch icons -->
      <!--   <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png"> -->

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
          
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><?php echo namaapp() ?></h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <?php //$this->load->view('login/flashmessage') ?>
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login Administrator</h3>
                                    <p>Masukan username dan password untuk login:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" action="<?php echo site_url('auth/login') ?>" method="post" class="login-form" autocomplete="off">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username">Username</label>
                                        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url() ?>assets/login/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/login/js/jquery.backstretch.min.js"></script>
               
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

        <script type="text/javascript">
            
        jQuery(document).ready(function() {
            
           
            $.backstretch([
                            "<?php echo base_url() ?>assets/login/img/backgrounds/1.jpg"
                          , "<?php echo base_url() ?>assets/login/img/backgrounds/1@2x.jpg"
                         ], {duration: 3000, fade: 750});
            
            /*
                Form validation
            */
            $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
                $(this).removeClass('input-error');
            });
            
            $('.login-form').on('submit', function(e) {
                
                $(this).find('input[type="text"], input[type="password"], textarea').each(function(){
                    if( $(this).val() == "" ) {
                        e.preventDefault();
                        $(this).addClass('input-error');
                    }
                    else {
                        $(this).removeClass('input-error');
                    }
                });
                
            });
            
            
        });

        </script>
    </body>

</html>