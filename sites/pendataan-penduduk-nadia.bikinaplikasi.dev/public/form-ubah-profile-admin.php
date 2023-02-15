<?php 
	include_once "cek-login.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title> Pendaftaran Kartu Keluarga | Dukcapil Muaro Jambi</title>
</head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<body>
    <?php
        #koneksi ke database
        include("config.php");
    ?>

    <header>

    </header>

    <form action="proses-ubah-profile-admin.php" method="POST">
        <div class="container">
            <div class="panel bg-primary text-white">
                <div class="panel panel-success">
                    <H3>Ubah Profile</h3>
                </div>
            </div>

            <table class="table  table-sm">
                <tr>
                    <th width="200px">Nama:</th>
                    <th><input type="text" required maxlength="16" value='<?php echo $_COOKIE['nama']; ?>'
                            class="form-control form-control-sm" name="nama" placeholder="Nama"></th>
                </tr>

                <tr>
                    <th width="200px">Username:</th>
                    <th><input type="text" required maxlength="16" value='<?php echo $_COOKIE['username']; ?>'
                            class="form-control form-control-sm" name="username" placeholder="Username" readonly></th>
                </tr>

                <tr>
                    <th width="200px">Password:</th>
                    <th><input type="password" maxlength="16" class="form-control form-control-sm" name="password"
                            placeholder="Password"></th>
                </tr>

            </table>

            <input type="submit" value="Simpan" name="daftar" class="btn btn-success btn-md" />

    </form>
    </div>

</body>

</html>