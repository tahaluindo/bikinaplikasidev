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

		<h3 align="center">DATA DOMISILI</h3>

                <table width="100%" border="1">
                    <thead>
											<tr>
                        <th width=3>No.</th>
									      <th>Nama Penduduk</th>
									      <th>NIK</th>
									      <th>Jenis Kelamin</th>
									      <th>Tempat Tanggal Lahir</th>
									      <th>Agama</th>
									      <th>Kependuduknegaraan</th>
									      <th>Status</th>
									      <th>Pekerjaan</th>
									      <th>Pendidikan</th>
									      <th>Alamat Asal</th>
									      <th>Pindah Ke-</th>
									      <th>Alasan Pindah</th>
									      <th>Pengikut</th>
									      <th>Tanggal Surat Dibuat</th>
									      <th>Tanggal Surat Masuk</th>
									      <th>Keterangan</th>
									      <th>Scan</th>
	                    </tr>
                    </thead>
                    <tbody>
											<?php
	                    $no=1;
	                    foreach($domisili as $t){ ?>
	                    <tr>
                        <th><?php echo $no++; ?>.</th>
                          <td><?php echo $t['nama_penduduk']; ?></td>
                          <td><?php echo $t['nik']; ?></td>
                          <td><?php echo $t['jenis_kelamin']; ?></td>
                          <td><?php echo $t['tempat_lahir']; ?>, <?php echo $t['tanggal_lahir']; ?></td>
                          <td><?php echo $t['agama']; ?></td>
                          <td><?php echo $t['kependuduknegaraan']; ?></td>
                          <td><?php echo $t['status']; ?></td>
                          <td><?php echo $t['pekerjaan']; ?></td>
                          <td><?php echo $t['pendidikan']; ?></td>
                          <td><?php echo $t['alamat_asal']; ?></td>
                          <td><?php echo $t['pindah_ke']; ?></td>
                          <td><?php echo $t['alasan_pindah']; ?></td>
                          <td><?php echo $t['pengikut']; ?></td>
                          <td><?php echo $t['tgl_surat_dibuat']; ?></td>
                          <td><?php echo $t['tgl_surat_masuk']; ?></td>
                          <td><?php echo $t['keterangan']; ?></td>
                          <td><?php echo $t['scan']; ?></td>
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
