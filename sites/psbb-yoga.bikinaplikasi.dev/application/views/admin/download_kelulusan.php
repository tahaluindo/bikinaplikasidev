<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Kelulusan</title>
    <base href="<?php echo base_url(); ?>"/>
    <link rel="icon" type="image/png" href="assets/images/favicon.png"/>
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
<body>
<?php $this->load->view('kop_lap'); ?>

<h4 align="center" style="margin-top:0px; font-size: 24px;"><u>SURAT PENGUMUMAN</u></h4>
<div style="text-align: center; margin-top: -24px;">No : 420/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/PPDB.SMAN1BLT/<?= $thn_ppdb ?></div>

<p>

<div>Kepala SMK 9 Muaro Jambi Kabupaten Muaro Jambi dengan ini menyatakan bahwa :</div>

<table width="100%" border="0">

    <tr>
        <td width="200">NO. PENDAFTARAN</td>
        <td width="1">:</td>
        <td><b><i><?php echo $user->no_pendaftaran; ?></i></b></td>
    </tr>
    <tr>
        <td>TANGGAL PENDAFTARAN</td>
        <td>:</td>
        <td><?php echo $this->Model_data->tgl_id(date('d-m-Y', strtotime($user->tgl_siswa))); ?></td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td><?php echo $user->nis; ?></td>
    </tr>
    <tr>
        <td>NISN</td>
        <td>:</td>
        <td><?php echo $user->nisn; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $user->nik; ?></td>
    </tr>
    <tr>
        <td>NAMA LENGKAP</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_lengkap); ?></td>
    </tr>
    <tr>
        <td>JENIS KELAMIN</td>
        <td>:</td>
        <td><?php echo $user->jk; ?></td>
    </tr>
    <tr>
        <td>TEMPAT, TANGGAL LAHIR</td>
        <td>:</td>
        <td><?php echo "$user->tempat_lahir, " . $this->Model_data->tgl_id($user->tgl_lahir); ?></td>
    </tr>
    <tr>
        <td>AGAMA</td>
        <td>:</td>
        <td><?php echo $user->agama; ?></td>
    </tr>
    <tr>
        <td>NAMA ORANG TUA /WALI</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td style="padding-left:55px;">AYAH</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_ayah); ?></td>
    </tr>
    <tr>
        <td style="padding-left:55px;">IBU</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_ibu); ?></td>
    </tr>
    <tr>
        <td style="padding-left:55px;">WALI</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_wali); ?></td>
    </tr>
    <tr>
        <td>NO. HANDPHONE (HP)</td>
        <td>:</td>
        <td><?php echo $user->no_hp_siswa; ?></td>
    </tr>
    <tr>
        <td>ASAL SEKOLAH</td>
        <td>:</td>
        <td><?php echo ucwords($user->nama_sekolah); ?></td>
    </tr>

</table>

<div style="margin-top: 10px;"></div>
<?php if($user->status_pendaftaran == 'lulus'): ?>
<div style="
    padding: 10px 200px !important;
    border: 1px solid grey !important;
    width: fit-content !important;
    color: green !important;
    margin: auto;
    font-weight: bold;
">
    LULUS
</div>
<?php endif ?>

<?php if($user->status_pendaftaran == 'tidak lulus'): ?>
<div style="
    padding: 10px 200px !important;
    border: 1px solid grey !important;
    width: fit-content !important;
    color: red !important;
    margin: auto;
    font-weight: bold;
">
    Tidak LULUS
</div>
<?php endif ?>


<p>

    Seleksi Sebagai Calon Peserta Didik SMK 9 Muaro Jambi tahun ajaran <?php echo $thn_ppdb; ?>/<?php echo $thn_ppdb+1; ?>.
    Demikian pengumuman ini disampaikan untuk dapat digunakan sebagai mestinya

<div>
    <div style="position: relative;">
        <div style="right: 20px; width: fit-content; position: absolute;">
            Muaro Jambi, <?= date('Y-m-d') ?><br>
            Kepala Sekolah,<br>
            <div style="margin-top: 50px;">

            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dto<br>
            <u><b>Ir. INGGIT GUNARSIH S.pd</b></u><br>
            NIP. 196507262005012001<br>
        </div>
    </div>
</div>
<p>

<div style="margin-top: 160px; margin-right: 20px !important; width: fit-content !important;">
    <strong>Keterangan : </strong><br>
    1. Registrasi daftar ulang dilaksanakan pada tanggal 8 – 11 Juli <?php echo $thn_ppdb; ?> pukul 08.00 – 14.00<br>
    2. Mencetak dan membawa Surat Pengumuman ini sebagai bukti lulus seleksi<br>
    3. Membawa materi Rp. 6000,- sebanyak 2 lembar<br>
</div>

<script>
    window.print();
</script>

</body>
</html>