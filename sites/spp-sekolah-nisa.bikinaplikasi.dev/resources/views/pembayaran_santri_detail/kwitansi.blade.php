<!DOCTYPE html>
<html>

<head>
  <title>Kwitansi Pembayaran SPP dan Uang Makan</title>

  <style>
    @page {
      size: auto;
      margin: 5mm;
    }
  </style>
</head>

<body>
  <?php

  if ($nominal !== false)
  {
      $uang = number_format($nominal, 0, ',','.') ."</br>";
      $terbilang = ucwords(''.Terbilang($nominal).'')." Rupiah";
  }
 ?>

  <div style='text-align: center;'>
    <img src="{{ url('img/logo.png') }}" alt="logo" width="85" height="75" style='position: absolute;
    left: 0; top: -4px'>

    <h5 style='margin: 2px 0;'>YAYASAN AL-QOSIM AL-ISLAMY</h5>
    <h4 style='margin: 2px 0;'>PONDOK PESANTREN SALAFIYAH AL QOSIM JAMBI</h4>
    <span style='margin: 2px 0; font-size: 11.5px;'>Alamat: Jl. Sungai Beluru, RT.01 Talang Belido, Sungai Gelam Ma. Jambi, 3668</span>
  </div>

  <h3 style='text-align:center; margin: 10px 0 2px;'>KWITANSI</h3>

  <table width="800" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">
    <tr>
      <td rowspan="8" width="120" style="border-right:1px solid #000;"> </td>
      <td width="150" valign="top"> Nomor </td>
      <td valign="top"> : {{ $no }} </td>
    </tr>
    <tr>
      <td valign="top"> Telah terima dari </td>
      <td valign="top"> : {{ ucwords($nama) }} </td>
    </tr>
    <tr>
      <td valign="top"> Uang Sejumlah </td>
      <td valign="top"> : {{ $terbilang }}</td>
    </tr>
    <tr>
      <td valign="top"> Potongan </td>
      <td valign="top"> : {{ $potongan }}%</td>
    </tr>
    <tr>
      <td valign="top"> Untuk pembayaran </td>
      <td valign="top"> : {{ $pembayaran }}</td>
    </tr>
    <tr>
      <td valign="top">  </td>
      <td valign="top"> : SPP = {{ toIdr($spp) }}, Uang makan = {{ toIdr($uang_makan) }}</td>
    </tr>
    <tr>
        <td valign="top"> Catatan </td>
        <td valign="top"> : {{ $catatan }}</td>
      </tr>
    <tr>
      <td valign="bottom">
        <h3>Rp {!! $uang !!} </h3>
      </td>
      <td valign="top" align="right" height="100"> 
          {!! $kota . ", " . $tanggal !!} <br>

          <div style="margin-top: 5px; margin-right: 25px;">
           Yang menerima, 
          </div>
          
        </td>
    </tr>
  </table>
  <style>
    a {
      text-decoration: none;
      color: #0903E8;
      font-family: verdana;
    }

    a:hover {
      color: #FA3C3C;
    }
  </style>
  <!-- <a href="index.php">Kembali</a>   -->
</body>

</html>
<?php

 function Terbilang($x)
 {
  $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
   return " " . $bilangan[$x];
  elseif ($x < 20)
   return Terbilang($x - 10) . "belas";
  elseif ($x < 100)
   return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
  elseif ($x < 200)
   return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
   return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
  elseif ($x < 2000)
   return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
   return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
  elseif ($x < 1000000000)
   return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
 }
 ?>

 <script>
   window.print();
 </script>
