<?php

// Bagian Home
if ($_GET['module']=='home'){
  if ($_SESSION['leveluser']=='siswa'){
  echo "<br><b class='judul'>Hai $_SESSION[namalengkap]</b><br><p class='garisbawah'></p>
        Selamat datang di <b>E-Learning SMP N 5</b>.<br>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
        <table>
          <tr>
              <th>No.</th>
              <th>Mata Pelajaran</th>
              <th>Guru</th>
              <th>Kelas</th>
              <th>Hari</th>
              <th>Jam</th>
          </tr>";
    ?>
      <?php
      include "configurasi/koneksi.php";
        $no = 1;
        
        $query = mysql_query("SELECT * FROM jadwal_pelajaran");

        // var_dump($query);
          $result = array();
          while($data = mysql_fetch_array($query)){
            echo"
            <tr>
                <td>$no</td>
                <td>$data[nama_mapel]</td>
                <td>$data[nama_guru]</td>
                <td>$data[kelas]</td>
                <td>$data[hari]</td>
                <td>$data[jam_mulai] - $data[jam_selesai]</td>"
                ;
                echo"
            </tr>";
            $no++;
          }
          echo"</table>";
          ?>
      
      <?php
      echo"
         

  <p class='garisbawah'></p><p align='right'><b class='judul'>Login : $hari_ini, 
  <span id='date'></span>, <span id='clock'></span></p>";
  
}
}
// Bagian kelas
elseif ($_GET['module']=='kelas'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_kelas/kelas.php";
  }
}

// Bagian siswa
elseif ($_GET['module']=='siswa'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_siswa/siswa.php";
  }
}

// Bagian admin
elseif ($_GET['module']=='admin'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_admin/admin.php";
  }
}

// Bagian mapel
elseif ($_GET['module']=='matapelajaran'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_matapelajaran/matapelajaran.php";
  }
}

// Bagian materi
elseif ($_GET['module']=='materi'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_materi/materi.php";
  }
}

// Bagian materi
elseif ($_GET['module']=='quiz'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_quiz/quiz.php";
  }
}

elseif ($_GET['module']=='tugas'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_tugas/tugas.php";
  }
}

// Bagian materi
elseif ($_GET['module']=='kerjakan_quiz'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_quiz/soal_tugas.php";
  }
}

elseif ($_GET['module']=='kerjakan_tugas'){
  if ($_SESSION['leveluser']=='siswa'){
      include "administrator/modul/mod_tugas/soal_tugas.php";
  }
}

// Bagian materi
elseif ($_GET['module']=='nilai_quiz'){
  if ($_SESSION['leveluser']=='siswa'){
      include "daftarnilai_quiz.php";
  }
}

elseif ($_GET['module']=='nilai_tugas'){
  if ($_SESSION['leveluser']=='siswa'){
      include "daftarnilai_tugas.php";
  }
}
?>
