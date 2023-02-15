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

		<h3 align="center">DATA PENDUDUK</h3>
		
                <table width="100%" border="1" style='margin-bottom: 250px;'>
                    <thead>
											<tr>
	                      <th width=3>No.</th>
	                      <th>NIK</th>
	                      <th>No KK</th>
	                      <th>Nama Lengkap</th>
	                      <th>Alamat</th>
	                      <th>RT</th>
	                      <th>RW</th>
	                      <th>Jenis Kelamin</th>
	                      <th>Tempat Tanggal Lahir</th>
	                      <th>No Telp</th>
	                      <th>Agama</th>
	                      <th>Pendidikan</th>
	                      <th>Pekerjaan</th>
	                      <th>Status</th>
	                      <th>Hubungan Keluarga</th>
	                      <!-- <th>Keterangan</th> -->
	                      <th>Dusun</th>
	                      <th>Lurah</th>
	                      <th>Kecamatan</th>
	                      <th>Kabupaten</th>
	                      <th>Provinsi</th>
	                      <th>Negara</th>
	                      <th>G. Darah</th>
	                      <th>Desa</th>
	                    </tr>
                    </thead>
                    <tbody>
											<?php
	                    $no=1;
	                    foreach($DataPenduduk as $t){ ?>
	                    <tr>
	                        <th><?php echo $no++; ?>.</th>
	                        <td><?php echo $t['nik']; ?></td>
	                        <td><?php echo $t['no_kk']; ?></td>
	                        <td><?php echo $t['nama_lengkap']; ?></td>
	                        <td><?php echo $t['alamat']; ?></td>
	                        <td><?php echo $t['rt']; ?></td>
	                        <td><?php echo $t['rw']; ?></td>
	                        <td><?php echo $t['jenis_kelamin']; ?></td>
	                        <td><?php echo $t['tempat_lahir']; ?>, <?php echo $t['tanggal_lahir']; ?></td>
	                        <td><?php echo $t['no_telp']; ?></td>
	                        <td><?php echo $t['agama']; ?></td>
	                        <td><?php echo $t['pendidikan']; ?></td>
	                        <td><?php echo $t['pekerjaan']; ?></td>
	                        <td><?php echo $t['status']; ?></td>
	                        <td><?php echo $t['hubungan_keluarga']; ?></td>
	                        <!-- <td><?php echo $t['ket']; ?></td> -->
	                        <td><?php echo $t['dusun']; ?></td>
	                        <td><?php echo $t['lurah']; ?></td>
	                        <td><?php echo $t['kecamatan']; ?></td>
	                        <td><?php echo $t['kabupaten']; ?></td>
	                        <td><?php echo $t['provinsi']; ?></td>
	                        <td><?php echo $t['negara']; ?></td>
	                        <td><?php echo $t['golongan_darah']; ?></td>
	                        <td><?php echo $t['desa']; ?></td>
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
