<!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" style="background:green" data-animate="fadeInUp">
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-md-3 col-sm-6" style="color:white">

                        <h4><?php echo namaApp() ?></h4>
                        <p><?php echo infobutik() ?></p>
                        <p>No Telp Kami : 081271724517</p>
                        <hr class="hidden-md hidden-lg">
                    </div>
                    <!-- /.col-md-3 -->
                    <div class="col-md-3 col-sm-6" style="color:white">

                        <h4>Informasi</h4>

                        <ul>
                            <li class=""><a href="<?php echo site_url('aplikasi/statis/sts_carabeli') ?>">Cara Beli</a>
                            </li>
                            <li class=""><a href="<?php echo site_url('aplikasi/statis/sts_tentang') ?>">Tentang Kami</a>
                            </li>
                            <li class=""><a href="<?php echo site_url('aplikasi/statis/sts_faq') ?>">Faq</a>
                            </li>
                        </ul>
                        <hr class="hidden-md hidden-lg">

                    </div>
                    <div class="col-md-3 col-sm-6" style="color:white">
                        <h4>Pengguna</h4>
                        <ul>
                            <?php 
                            if($this->session->userdata('iduser') != '') {
                            ?>
                                 <li class="active">
                                    <a href="<?php echo site_url('webuser') ?>">Order</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('webuser/akunuser') ?>">Akun</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('webuser/logout') ?>">Logout</a>
                                </li>
                            <?php } else { ?>
                                <!-- <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                                </li> -->
                                <li><a href="<?php echo site_url('aplikasi/daftar') ?>">Login</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <hr class="hidden-md hidden-lg">

                    </div>
                    <div class="col-md-3 col-sm-6" style="color:white">

                        <h4>No Rekening Transfer</h4>
                        <p><?php echo norekening() ?></p>
                       
                        <hr class="hidden-md hidden-lg">
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <div id="copyright">
            <div class="container-fluid">
                <div class="col-md-6">
                    <p class="pull-left"><?php echo namaApp() ?> © <?php echo date('Y') ?> </p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right"><a href="<?php echo site_url('auth') ?>" target="_blank">Login Admin</a></p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->

    </div>
    <!-- /#all -->

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
   
    <script src="<?php echo base_url() ?>templateuser/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/modernizr.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url() ?>templateuser/js/front.js"></script>
    <script src="<?php echo base_url() ?>assets/dtpicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/timepicker/moment/min/moment.min.js"></script>
    <!-- <script src="<?php //echo base_url() ?>assets/timepicker/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    -->
    <script> 
    $(document).ready(function(){ 
             
        $('#tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            clearBtn: true,
            language: 'id'
        });

        $('#datetimepicker3').datetimepicker({
                        format: 'LT'
                    });


    });

    </script>

</body>

</html>
	