<?php
include "config.php";
include_once "cek-login.php";

if (isset($_POST['kecamatan'])) {
    $kecamatan = $_POST["kecamatan"];

    $sql = "select * from desa where id_kec_fk=$kecamatan";
    $hasil = mysqli_query($db, $sql);
    while ($data = mysqli_fetch_array($hasil)) {
        ?>
        <option><?php echo $data['nama_desa']; ?></option>
        <?php
    }
}

?>