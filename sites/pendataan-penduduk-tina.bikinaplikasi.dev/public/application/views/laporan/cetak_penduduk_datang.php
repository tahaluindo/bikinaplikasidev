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

    <h1 align='center'>KELURAHAN KOTA RAJA</h1>

    <div style="text-align: center;">
        <strong>Alamat Kantor: Jln. Poros Alang Alang, parit cacok, RT. 01 Dusun. III</strong> <p>
<!--         <strong>Telepon: 0751.7056737 Fax: 0751-7056737</strong> <p>
        <strong>Email: kopertis.ict@gmail.com</strong> <p> -->
    </div>

    <img id='logo' src="<?php echo base_url('assets/img/brand/logo.jpeg'); ?>" alt="" widht=240 height=240>

		<h3 align="center">DATA PENDUDUK DATANG</h3>
		
                <table width="100%" border="1">
                    <thead>
											<tr>
                      <th width=3>No.</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Tanggal</th>
                                                    <th>Desa Asal</th>
                                                    <th>Kecamatan Asal</th>
                                                    <th>Alamat Asal</th>
                                                    <th>Rt Asal</th>
                                                    <th>Rw Asal</th>
                                                    <th>Kode Pos Asal</th>
                                                    <th>No Telepon Asal</th>
                                                    <th>Kabupaten Asal</th>
                                                    <th>Provinsi Asal</th>
                                                    <th>Alasan</th>
                                                    <th>Dusun</th>
                                                    <th>Rt</th>
                                                    <th>J. Kelamin</th>
	                      
	                    </tr>
                    </thead>
                    <tbody>
						<?php
	                    $no=1;
	                    foreach($DataPendudukDatang as $t){ ?>
	                    <tr>
                      <th><?php echo $no++; ?>.</th>
                                                    <td><?php echo $t['nik']; ?></td>
                                                    <td><?php echo $t['nama_lengkap']; ?></td>
                                                    <td><?php echo $t['tanggal']; ?></td>
                                                    <td><?php echo $t['desa_asal']; ?></td>
                                                    <td><?php echo $t['kecamatan_asal']; ?></td>
                                                    <td><?php echo $t['alamat_asal']; ?></td>
                                                    <td><?php echo $t['rt_asal']; ?></td>
                                                    <td><?php echo $t['rw_asal']; ?></td>
                                                    <td><?php echo $t['kode_pos_asal']; ?></td>
                                                    <td><?php echo $t['no_telepon_asal']; ?></td>
                                                    <td><?php echo $t['kabupaten_asal']; ?></td>
                                                    <td><?php echo $t['provinsi_asal']; ?></td>
                                                    <td><?php echo $t['alasan']; ?></td>
                                                    <td><?php echo $t['dusun']; ?></td>
                                                    <td><?php echo $t['rt']; ?></td>
                                                    <td><?php echo $t['jenis_kelamin']; ?></td>
	                    </tr>
	                    <?php } ?>
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
