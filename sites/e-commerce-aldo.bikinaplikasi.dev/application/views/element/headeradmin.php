<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo namaApp() ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>templateadmin/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>templateadmin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="<?php echo base_url() ?>templateadmin/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?php echo base_url() ?>templateadmin/css/custom-styles.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>templateadmin/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <link href="<?php echo base_url() ?>assets/dtpicker/bootstrap-datepicker.css" rel="stylesheet">
    
    <script src="<?php echo base_url() ?>templateadmin/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="<?php echo base_url() ?>templateadmin/js/bootstrap.min.js"></script>
     <!-- Metis Menu Js -->
    <script src="<?php echo base_url() ?>templateadmin/js/jquery.metisMenu.js"></script>
    
    <script src="<?php echo base_url() ?>assets/dtpicker/bootstrap-datepicker.js"></script>
    <script>
    $(document).ready(function(){ 
             
        $('.tanggal').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayBtn: true,
            todayHighlight: true,
            clearBtn: true,
            language: 'id'
        });
    });

    function alphaOnly(event) {
      var key = event.keyCode;
      return ((key >= 65 && key <= 90) || key == 8 || key == 46 || key == 37 || key == 39 || key == 32);
    };
    </script>
</head>

<body>

    <div id="wrapper">
        <?php $this->load->view('element/menuadmin') ?>
       
      