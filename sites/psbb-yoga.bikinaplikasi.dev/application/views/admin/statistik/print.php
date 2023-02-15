<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $judul_web; ?></title>
    <base href="<?php echo base_url(); ?>"/>
    <link rel="icon" type="image/png" href="assets/images/favicon.png"/>
    <style>
        <
        style >
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

        th, td {
            padding: 2px;
        }

        th {
            color: #222;
        }

        body {
            font-family: Calibri;
        }
    </style>
</head>
<body onload="window.print();">
<?php $this->load->view('kop_lap'); ?>
<p>
<h4 align="center" style="margin-top:0px; color: green;"><u>STATISTIK PENDAFTARAN LULUS</u></h4>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
    <tr>
        <th width=3>No.</th>
        <th>No. Pendaftaran</th>
        <th>NIS</th>
        <th>NISN</th>
        <th>Nama Lengkap</th>
        <th>Jurusan</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($siswa_lulus as $key => $item): ?>
    <tr>
        <th><?= $key + 1 ?></th>
        <td><?= $item->no_pendaftaran ?></td>
        <td><?= $item->nis ?></td>
        <td><?= $item->nisn ?></td>
        <td><?= $item->nama_lengkap ?></td>
        <td><?= $item->jurusan ?></td>

    </tr>
    <?php endforeach; ?>

    </tbody>
</table>

<p>
<h4 align="center" style="margin-top:0px; color: reed;"><u>STATISTIK PENDAFTARAN TIDAK LULUS</u></h4>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
    <tr>
        <th width=3>No.</th>
        <th>No. Pendaftaran</th>
        <th>NIS</th>
        <th>NISN</th>
        <th>Nama Lengkap</th>
        <th>Jurusan</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($siswa_tidak_lulus as $key => $item): ?>
    <tr>
        <th><?= $key + 1 ?></th>
        <td><?= $item->no_pendaftaran ?></td>
        <td><?= $item->nis ?></td>
        <td><?= $item->nisn ?></td>
        <td><?= $item->nama_lengkap ?></td>
        <td><?= $item->jurusan ?></td>

    </tr>
    <?php endforeach; ?>

    </tbody>
</table>
</body>

</html>