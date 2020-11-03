<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: PRINT SLIP GAJI ::.</title>
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
$tampil=mysqli_query($conn,"select * from gaji order by nip DESC");
	echo "<div class='contenttitle2'>
	  <h3>LAPORAN SLIP GAJI</h3>
	  </div>
	<table cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
	<thead>
  <tr>
	<td>No</td>
    <td>Nama</td>
	<td>Gaji Pokok</td>
	<td>Jam Lembur</td>
	<td>Uang Lembur</td>
	<td>Tgl. Transfer</td>
	<td>Action</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysqli_fetch_array($tampil)){
  $gaji_pokok       =  number_format(($dt[gaji_pokok]),0,",",".");
  $uang_lembur       =  number_format(($dt[uang_lembur]),0,",",".");
  echo "<tr>
    <td>$no</td>
    <td>$dt[nama]</td>
    <td>Rp. $gaji_pokok</td>
    <td>$dt[jam_lembur] jam</td>
    <td>Rp. $uang_lembur</td>
	<td>$dt[tgl_transfer] - $dt[jam_transfer]</td>
	<td>
	<a href='detail_slipgaji.php?id=$dt[nip]' class='btn btn_pencil'><span>Print Gaji</span></a></td>
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
