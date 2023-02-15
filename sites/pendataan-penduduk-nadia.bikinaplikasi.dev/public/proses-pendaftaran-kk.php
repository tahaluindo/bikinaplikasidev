<?php 
	include_once "cek-login.php";
?>

<?php

include("config.php");
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('y-m-d');
$jam = date("H:i:s");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){

    // ambil data dari formulir
    $no_kk = $_POST['no_kk'];
    $kecamatan = $_POST['kec'];
	//$kecamatan ="select nama_kec from kecamatan where id_kec= $_POST['kec']";
    $kel = $_POST['desa'];
    $penerima = $_POST['penerima'];
	$operator = $_POST['operator'];
	// $jenis = $_POST['jenis'];
    $kepala_keluarga = $_POST['kepala_keluarga'];

    // buat query
    $sql = "INSERT INTO daftar_kk (tanggal,    no_kk,    kec,          kel,    penerima,    jam_terima, operator,   jam_dtrm_opr, jam_slsai_opr, status,               ket, kepala_keluarga) 
    						VALUE ('$tanggal','$no_kk', '$kecamatan', '$kel', '$penerima', '$jam',     '$operator', '$jam',        '-',          'diterima $operator', '-', '$kepala_keluarga')";
    $query = mysqli_query($db, $sql);

    // // apakah query simpan berhasil?
    // if( $query ) {
    //     // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    //     header('Location: index.php?status=sukses');
    // } else {
    //     // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    //     header('Location: index.php?status=gagal');
    // }

    if($query) {
        echo ('<script>alert("Berhasil menambah data"); location.href = "list-kk.php"; </script>');
    } else {
        echo ('<script>alert("Gagal menambah data"); window.history.back(); </script>');
    }


} else {
    die("Akses dilarang...");
}

?>