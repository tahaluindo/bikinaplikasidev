<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Kartu Keluarga | Dukcapil Muaro Jambi</title>
</head>

<body>
    <header>
        <h3>Warga yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No KK</th>
      
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM data_keluarga_201802";
        $query = mysqli_query($db, $sql);

                  echo "<tr>";

            echo "<td>"'no_kk'"</td>";
            echo "<td>"'nama_kep'"</td>";
            echo "<td>"'no_kk'"</td>";
           
           

      

            echo "</tr>";
       
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </body>
</html>