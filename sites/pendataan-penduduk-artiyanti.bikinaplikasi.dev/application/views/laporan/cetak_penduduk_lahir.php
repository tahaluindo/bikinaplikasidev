<?php date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $title; ?></title>
    <base href="<?php echo base_url();?>"/>
    <style>
    table {
        border-collapse: collapse;
    }
    thead > tr{
      background-color: #0070C0;
      color:#f1f1f1;
    }
    thead > tr > th{
      background-color: #0070C0;
      color:#fff;
      padding: 10px;
      border-color: #fff;
    }
    th, td {
      padding: 2px;
      font-size: 12px;
    }

    th {
        color: #222;
    }
    body{
      font-family:Calibri;
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

    <h1 align='center'>KELURAHAN LUBUK TERENTANG</h1>

    <img id='logo' src="<?php echo base_url('assets/img/brand/logo.jpeg'); ?>" alt="" widht=240 height=240>

		<h3 align="center">DATA PENDUDUK LAHIR</h3>
		
                <table width="100%" border="1">
                    <thead>
											<tr>
                      <th width=3>No.</th>
                                                    <th>No KK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Tgl Lahir</th>
                                                    <th>Nama Ibu</th>
                                                    <th>Nama Ayah</th>
                                                    <th>Nama Saksi</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Tempat Kelahiran</th>
                                                    <th>Hari Kelahiran</th>
                                                    <th>Tanggal Kelahiran</th>
                                                    <th>Jam Kelahiran</th>
                                                    <th>Jenis Kelahiran</th>
                                                    <th>Berat Bayi</th>
                                                    <th>Panjang Bayi</th>
                                                    <th>Dusun</th>
                                                    <th>Rt</th>
	                      
	                    </tr>
                    </thead>
                    <tbody>
						<?php
	                    $no=1;
	                    foreach($DataPendudukLahir as $t){ ?>
	                    <tr>
                      <th><?php echo $no++; ?>.</th>
                                                    <td><?php echo $t['no_kk']; ?></td>
                                                    <td><?php echo $t['nama_lengkap']; ?></td>
                                                    <td><?php echo $t['tanggal_kelahiran']; ?></td>
                                                    <td><?php echo $t['nama_ibu']; ?></td>
                                                    <td><?php echo $t['nama_ayah']; ?></td>
                                                    <td><?php echo $t['nama_saksi']; ?></td>
                                                    <td><?php echo $t['jenis_kelamin']; ?></td>
                                                    <td><?php echo $t['tempat_kelahiran']; ?></td>
                                                    <td><?php echo $t['hari_kelahiran']; ?></td>
                                                    <td><?php echo $t['tanggal_kelahiran']; ?></td>
                                                    <td><?php echo $t['jam_kelahiran']; ?></td>
                                                    <td><?php echo $t['jenis_kelahiran']; ?></td>
                                                    <td><?php echo $t['berat_bayi']; ?></td>
                                                    <td><?php echo $t['panjang_bayi']; ?></td>
                                                    <td><?php echo $t['dusun']; ?></td>
                                                    <td><?php echo $t['rt']; ?></td>
	                    </tr>
	                    <?php } ?>
                    </tbody>
                </table>

                <div class='tanda-tangan'>
        <div class='tanda-tangan-kanan'>
            <div>Dikeluarkan di: Lubuk Terentang</div>
            <div>Pada Tanggal <?php echo date('d-m-Y'); ?></div>
            <div>Kepala Desa Lubuk Terentang</div>
            
            <div class='tanda-tangan-box'>
            
            </div>
            <div>Mulyadi</div>
        </div>
    </div>

	</body>
</html>
