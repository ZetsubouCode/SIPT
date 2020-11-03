<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN DATA PEGAWAI</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
</head>
<style>
@media print {
input.noPrint { display: none; }
}
</style>
<body class="body">
<div id="wrapper2">
<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";

$ambil=mysqli_query($conn,"select * from pegawai where nip='$_GET[id]'");
	$t=mysqli_fetch_array($ambil);
	echo "<div id='contentwrapper' class='contentwrapper'>
	<div class='contenttitle2'>
	<h2 class='head'>Data Pegawai $t[nama]</h2>
	</div>
	<div class='detailpegawai'>
	<div class='foto'>";
	if($t[foto]==""){
		echo "<img src='image_peg/no.jpg' width='200' />";
	} else {
	echo "<img src='image_peg/small_$t[foto]' width='200' />";
	}
	echo "</div>
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td>$t[nip]</td>
	</tr>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td>$t[nama]</td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td>$t[tmpt_lahir]</td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>"; 
	echo "".tgl_indo($t['tgl_lahir'])."";
	echo "</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td>";
	if($t['jenis_kelamin']=='L'){
	echo "Pria";
	} else {
	echo "Wanita";
	}	
	echo "</td></tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td>$t[alamat]</td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>";
	echo "".tgl_indo($t['tgl_masuk'])."";
	echo "
	</td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td>";
	$jab=mysqli_query($conn,"select * from jabatan where id_jab='$t[id_jab]'");
	$j=mysqli_fetch_array($jab);
	echo "$j[n_jab]";
	echo "</td>
	</tr>
	</div>
	";	
	?>
	<td colspan='3'>
	<input type="button" value="Cetak Halaman" onclick="window.print()" class='stdbtn' >
	<?php echo "<input class='stdbtn' type=button value=Batal onclick=self.history.back()>";?></td>
	</tr>

	
	</table>
		<div style='clear:both'></div><tr>
</div>
</body>
</html>
