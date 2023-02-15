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

    <h1 align='center'>LAPORAN PENDUDUK</h1>

    <img id='logo' src="<?php echo base_url('assets/img/brand/logo.jpeg'); ?>" alt="" widht=240 height=240>


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
                <th width=3>No.</th>
                <th>Dusun</th>
                <th width=3>Rt</th>
                <th colspan=3>Penduduk Awal</th>
                <th colspan=3>Lahir</th>
                <th colspan=3>Meninggal</th>
                <th colspan=3>Datang</th>
                <th colspan=3>Pindah</th>
                <th colspan=3>Penduduk Akhir</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($DataPerkembanganPenduduk as $key => $t): ?>
            <!-- data perdesa disini -->
            <?php if($key == 0): ?>
            <tr>
                <td rowspan=<?php echo count($t['rt']) + 2; ?>><?php echo $key + 1; ?></td>
                <td rowspan=<?php echo count($t['rt']) + 2; ?>><?php echo $t['dusun']; ?></td>
            </tr>
            <?php else: ?>
            <tr>
                <td rowspan=<?php echo count($t['rt']) + 1; ?>><?php echo $key + 1; ?></td>
                <td rowspan=<?php echo count($t['rt']) + 1; ?>><?php echo $t['dusun']; ?></td>
            </tr>

            <?php endif; ?>

            <?php if($key == 0): ?>
            <tr>
                <td></td>

                <!-- awal -->
                <td>Lk</td>
                <td>Pr</td>
                <td>Jumlah</td>

                <!-- lahir -->
                <td>Lk</td>
                <td>Pr</td>
                <td>Jumlah</td>

                <!-- meninggal -->
                <td>Lk</td>
                <td>Pr</td>
                <td>Jumlah</td>

                <!-- datang -->
                <td>Lk</td>
                <td>Pr</td>
                <td>Jumlah</td>

                <!-- pindah -->
                <td>Lk</td>
                <td>Pr</td>
                <td>Jumlah</td>

                <!-- Penduduk Akhir -->
                <td>Lk</td>
                <td>Pr</td>
                <td>Jumlah</td>
            </tr>
            <?php endif; ?>

            <!-- data setiap rtnya disini -->
            <?php foreach($t['rt'] as $indexRt => $rt): ?>
            <tr>
                <td><?php echo $rt['rt']; ?></td>
                <?php foreach($rt['penduduk_awal'] as $indexPendudukAwal => $pendudukAwal): ?>
                <td><?php echo $pendudukAwal; ?></td>
                <?php endforeach; ?>

                <?php foreach($rt['penduduk_lahir'] as $indexPendudukLahir => $pendudukLahir): ?>
                <td><?php echo $pendudukLahir; ?></td>
                <?php endforeach; ?>

                <?php foreach($rt['penduduk_meninggal'] as $indexPendudukMeninggal => $pendudukMeninggal): ?>
                <td><?php echo $pendudukMeninggal; ?></td>
                <?php endforeach; ?>

                <?php foreach($rt['penduduk_datang'] as $indexPendudukDatang => $pendudukDatang): ?>
                <td><?php echo $pendudukDatang; ?></td>
                <?php endforeach; ?>

                <?php foreach($rt['penduduk_pindah'] as $indexPendudukPindah => $pendudukPindah): ?>
                <td><?php echo $pendudukPindah; ?></td>
                <?php endforeach; ?>

                <?php foreach($rt['penduduk_akhir'] as $indexPendudukAkhir => $pendudukAkhir): ?>
                <td><?php echo $pendudukAkhir; ?></td>
                <?php endforeach; ?>

            </tr>
            <?php endforeach; ?>
            <?php endforeach; ?>
            
            <!-- total -->
            <tr>
                <td colspan=3>Total</td>
                <td><?php echo $total_penduduk_awal_lk; ?></td>
                <td><?php echo $total_penduduk_awal_pr; ?></td>
                <td><?php echo $total_penduduk_awal; ?></td>

                <td><?php echo $total_penduduk_lahir_lk; ?></td>
                <td><?php echo $total_penduduk_lahir_pr; ?></td>
                <td><?php echo $total_penduduk_lahir; ?></td>

                <td><?php echo $total_penduduk_meninggal_lk; ?></td>
                <td><?php echo $total_penduduk_meninggal_pr; ?></td>
                <td><?php echo $total_penduduk_meninggal; ?></td>

                <td><?php echo $total_penduduk_datang_lk; ?></td>
                <td><?php echo $total_penduduk_datang_pr; ?></td>
                <td><?php echo $total_penduduk_datang; ?></td>

                <td><?php echo $total_penduduk_pindah_lk; ?></td>
                <td><?php echo $total_penduduk_pindah_pr; ?></td>
                <td><?php echo $total_penduduk_pindah; ?></td>

                <td><?php echo $total_penduduk_akhir_lk; ?></td>
                <td><?php echo $total_penduduk_akhir_pr; ?></td>
                <td><?php echo $total_penduduk_akhir; ?></td>
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