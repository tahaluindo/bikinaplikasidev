<?php date_default_timezone_set('Asia/Jakarta'); ?>
        <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Laporan</title>
    <style>
        table {
            border-collapse: collapse;
        }

        thead > tr {
            background-color: #0070C0;
            color: #f1f1f1;
        }

        thead > tr > th {
            background-color: #0070C0;
            color: #fff;
            padding: 10px;
            border-color: #fff;
        }

        th,
        td {
            padding: 2px;
            font-size: 12px;
        }

        th {
            color: #222;
        }

        body {
            font-family: Calibri;
        }

        #logo {
            position: absolute;
            right: 0;
            top: 0;
            width: 100px;
            height: 100px;
            margin-right: 20px;
            margin-top: 15px;
        }

        .tanda-tangan {
            margin-top: 500px;
            margin-bottom: 20px;
            position: relative;
            bottom: 0;
            right: 0;
            margin-top: 30px;
        }

        .tanda-tangan div {
            width: 300px;
            text-align: center;
            float: right;
        }

        .tanda-tangan-box {
            height: 80px;
        }

        * {
            color-adjust: exact !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    </style>
</head>

<body>

<h1 align='center'><?php echo e(env('APP_OBJECT_NAME')); ?></h1>

<img id='logo' src="<?php echo e(url('image/logo.png')); ?>" alt="" widht=240 height=240>

<?php echo $__env->yieldContent('content'); ?>

<div class='tanda-tangan'>
    <div class='tanda-tangan-kanan'>
        <div><?php echo e(env('APP_OBJECT_LOCATION')); ?></div>
        <div><?php echo e(date('d-M-Y')); ?></div>

        <div class='tanda-tangan-box'>

        </div>

        <div><?php echo e(env('APP_OBJECT_SIGNATURE')); ?></div>
    </div>
</div>
</body>

<script>
    <?php if(!request()->preview): ?>
    setTimeout(() => {
        window.print()
    }, 2000);
    <?php endif; ?>
</script>

</html>
<?php /**PATH D:\bikinaplikasi\project\setup_server_default\sites\reservasi-dan-travel-zaky.bikinaplikasi.dev\resources\views/layouts/print.blade.php ENDPATH**/ ?>