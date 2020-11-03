<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: LAPORAN DATA PEGAWAI ::.</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
</head>
<style>
@media print {
input.noPrint { display: none; }
}
</style>
<body class="body">
<div id="wrapper">
<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
$tampil=mysqli_query($conn,"select * from pegawai,jabatan where pegawai.id_jab=jabatan.id_jab");
  echo "<div class='contenttitle2'>
    <h3>LAPORAN DATA PEGAWAI</h3>
    </div>
  <table cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
  <thead>
  <tr>
  <td>No</td>
    <td>Nip</td>
  <td>Nama Pegawai</td>
  <td>Tgl Lahir</td>
    <td>Tgl Masuk</td>
    <td>Selesai Kontrak</td>
    <td>Umur Pegawai</td>
    <td>Status Pegawai</td>
  
 
  <td>Action</td>
  </tr>
  </thead>";
  $no=1;
  function jk($var){
  if($var=="P"){
    echo "Perempuan";
  }else {
    echo "Laki-Laki";
  }
  }



    function hitung_umur($tanggal_lahir){
      $birthDate = new DateTime($tanggal_lahir);
      $today = new DateTime("today");
      if ($birthDate > $today) { 
          exit("0 tahun 0 bulan 0 hari");
      }
      $y = $today->diff($birthDate)->y;
      $m = $today->diff($birthDate)->m;
      $d = $today->diff($birthDate)->d;
      return $y." tahun ".$m." bulan ".$d." hari";
    }

  while($dt=mysqli_fetch_array($tampil)){

   


  echo "<tr>
  <td>$no</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
    <td>"; echo tgl_indo($dt['tgl_lahir']);echo "</td>
    <td>"; echo tgl_indo($dt['tgl_masuk']);echo "</td>
     "; if ($dt['tgl_selesai']!='0000-00-00'){ echo"
    <td>"; echo tgl_indo($dt['tgl_selesai']);echo "</td>
    "; }else{ 
      echo "<td>-</td>";
    }
    echo "
    <td>"; echo hitung_umur($dt['tgl_lahir']);echo "</td>
    <td>$dt[sp]</td>


  
 
  <td>
  <a href='detail_laporan.php?id=$dt[nip]' class='btn btn_pencil'><span>Detail Pegawai</span></a></td>
  </tr>";
  $no++;
  }
echo "  
</table>

  ";
  ?>
  <div style="text-align:center;padding:20px;">
  <input type="button" value="Cetak Halaman" class='stdbtn' onclick="window.print()">
  </div>
</div>
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/gallery.js"></script>
<script type="text/javascript" src="js/plugins/jquery.colorbox-min.js"></script>
</body>
</html>
