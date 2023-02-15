<?php date_default_timezone_set('Asia/Jakarta');?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title><?=$title;?></title>
    <base href="<?php echo base_url(); ?>" />
    <style>
    table {
        border-collapse: collapse;
    }

    thead>tr {
        background-color: #0070C0;
        color: #f1f1f1;
    }

    thead>tr>th {
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
        position: fixed;
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

<body onload="window.print()">

    <h1 align='center'>LAPORAN PENDUDUK BERDASARKAN AGAMA</h1>

    <img id='logo' src="<?php echo base_url('assets/img/brand/logo.jpeg'); ?>" alt="" widht=240 height=240>

    <h1 align='center'>KELURAHAN KOTA RAJA</h1>

    <div style="text-align: center;">
        <strong>Alamat Kantor: Jln. Poros Alang Alang, parit cacok, RT. 01 Dusun. III</strong> <p>
<!--         <strong>Telepon: 0751.7056737 Fax: 0751-7056737</strong> <p>
        <strong>Email: kopertis.ict@gmail.com</strong> <p> -->
    </div>

    <table>
        <tbody>
            <tr>
                <td>Kabupaten</td>
                <td>:</td>
                <td>Tanjung Jabung Barat</td>
            </tr>

            <tr>
                <td>Kecamatan</td>
                <td>:</td>
                <td>Betara</td>
            </tr>

            <tr>
                <td>Desa</td>
                <td>:</td>
                <td>Kota Raja</td>
            </tr>

            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo "$bulan $tahun"; ?></td>
            </tr>
        </tbody>
    </table>

    <table width="100%" border="1" style='margin-bottom: 250px;'>
        <thead>
            <tr>
                <th rowspan='3' width=3>No.</th>
                <th rowspan='3'>Dusun</th>
                <th rowspan='3'>Rt</th>
                <th colspan="<?php echo count($agamas) * 3; ?>">Agama</th>
                <th colspan=3 rowspan=2>Jumlah</th>
            </tr>

            <tr>
                <?php foreach($agamas as $agama): ?>
                <th colspan=3><?php echo $agama; ?></th>
                <?php endforeach; ?>
            </tr>

            <tr>
                <!-- peragama -->
                <?php foreach($agamas as $agama): ?>
                <th>Lk</th>
                <th>Pr</th>
                <th>Jmlh</th>
                <?php endforeach; ?>

                <th>Lk</th>
                <th>Pr</th>
                <th>Jmlh</th>
            </tr>

        </thead>
        <tbody>
            
            <?php 
                $dataTotal = [];
                foreach($agamas as $agama) {
                    $dataTotal[$agama]['Lk'] = 0;
                    $dataTotal[$agama]['Pr'] = 0;
                    $dataTotal[$agama]['Jumlah'] = 0;
                }

                $dataTotalLk = 0;
                $dataTotalPr = 0;
                $dataTotalJumlah = 0;
            ?>
            
            <!-- no dan nama dusun -->
            <?php foreach($DataPerkembanganPenduduk as $indexDataPerkembanganPenduduk => $DataPerkembanganPendudukItem): ?>
            <tr>
                <td rowspan=<?php echo count($DataPerkembanganPendudukItem['rt']) + 1; ?>><?php echo $indexDataPerkembanganPenduduk + 1; ?></td>
                <td rowspan=<?php echo count($DataPerkembanganPendudukItem['rt']) + 1; ?>><?php echo $DataPerkembanganPendudukItem['dusun']; ?></td>
            </tr>
            
            <!-- datanya -->
            <?php foreach($DataPerkembanganPendudukItem['rt'] as $DataPerkembanganPendudukItemRt): ?>
            <tr>
                <!-- nama rtnya -->
                <td><?php echo $DataPerkembanganPendudukItemRt['rt']; ?></td>

                <!-- data peragama -->
                <?php foreach($agamas as $agama): ?>
                <td><?php echo $DataPerkembanganPendudukItemRt[$agama]['Lk']; $dataTotal[$agama]['Lk'] += $DataPerkembanganPendudukItemRt[$agama]['Lk']; ?></td>
                <td><?php echo $DataPerkembanganPendudukItemRt[$agama]['Pr']; $dataTotal[$agama]['Pr'] += $DataPerkembanganPendudukItemRt[$agama]['Pr'];  ?></td>
                <td><?php echo $DataPerkembanganPendudukItemRt[$agama]['Jumlah'];  $dataTotal[$agama]['Jumlah'] += $DataPerkembanganPendudukItemRt[$agama]['Jumlah']; ?></td>
                <?php endforeach; ?>
                
                <!-- data  jumlah dikanan -->
                <td><?php echo $DataPerkembanganPendudukItemRt['Jumlah']['Lk']; ?></td>
                <td><?php echo $DataPerkembanganPendudukItemRt['Jumlah']['Pr']; ?></td>
                <td><?php echo $DataPerkembanganPendudukItemRt['Jumlah']['Jumlah']; ?></td>
            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>

           <tr>
                <td colspan=3 style='text-align: center;'>Total</td>
                <?php foreach($agamas as $agama): ?>
                <td><?php echo $dataTotal[$agama]['Lk']; $dataTotalLk += $dataTotal[$agama]['Lk']?></td>
                <td><?php echo $dataTotal[$agama]['Pr']; $dataTotalPr += $dataTotal[$agama]['Pr']?></td>
                <td><?php echo $dataTotal[$agama]['Jumlah']; $dataTotalJumlah += $dataTotal[$agama]['Jumlah']?></td>
                <?php endforeach; ?>

                <td><?php echo $dataTotalLk; ?></td>
                <td><?php echo $dataTotalPr; ?></td>
                <td><?php echo $dataTotalJumlah; ?></td>

           </tr>
        </tbody>
    </table>

    <div class='tanda-tangan'>
        <div class='tanda-tangan-kanan'>
            <div>Dikeluarkan di: Kota Raja</div>
            <div>Pada Tanggal <?php echo date('d-m-Y'); ?></div>
            <div>Kepala Desa Kota Raja</div>

            <div class='tanda-tangan-box'>

            </div>
            <div>Mulyadi</div>
        </div>
    </div>

</body>

</html>