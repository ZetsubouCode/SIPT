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

$ambil=mysqli_query($conn,"select * from gaji where nip='$_GET[id]'");
	$t=mysqli_fetch_array($ambil);
    $gaji_pokok       =  number_format(($t[gaji_pokok]),0,",",".");
    $uang_lembur       =  number_format(($t[uang_lembur]),0,",",".");
    $total_gaji       =  number_format(($t[total_gaji]),0,",",".");
	echo "<div id='contentwrapper' class='contentwrapper'>
	<div class='contenttitle2'>
	<h2 class='head'>Data Slip Gaji $t[nama]</h2>
	</div>
	<div class='detailpegawai' >
	<table class='tabelform tabpad'>";
     echo "<tr>
                    <td>Nip</td>
                    <td>:</td>
                    <td>$t[nip]</td>
                    </tr>
                    <tr>
                    <td>Nama Pegawai</td>
                    <td>:</td>
                    <td>$t[nama]</a></td>
                    </tr>
                    <tr>
                    <td>Nomor Rekening</td>
                    <td>:</td>
                    <td>$t[no_rek]</td>
                    </tr>
                    <tr>
                    <td>Jam Lembur</td>
                    <td>:</td>
                    <td>$t[jam_lembur] Jam</td>
                    </tr>
                    <tr>
                    <td>Gaji Pokok</td>
                    <td>:</td>
                    <td>Rp.  $gaji_pokok </td>
                    </tr>
                    <tr>
                    <td>Uang Lembur</td>
                    <td>:</td>
                    <td>Rp. $uang_lembur</td>
                    </tr>
                    <tr>
                    <td>Total Gaji</td>
                    <td>:</td>
                    <td>Rp. $total_gaji</td>
                    </tr>
                    <tr>
                    <td>Tanggal Transfer</td>
                    <td>:</td>
                    <td>$t[tgl_transfer]</td>
                    </tr>
                    <tr>
                    <td>Jam Transfer</td>
                    <td>:</td>
                    <td>$t[jam_transfer]</td>
                    </tr>
                 
                   </tbody>
                   </table>
	<div style='clear:both'></div>
	 <div class='text-Left'>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diterima Oleh,&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <br />
                  <br />
                  <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t[nama] 
             
               
                </div>
                <div class='text-right'><br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a href='#' onClick='window.print();return false' class='stdbtn' ><span>PRINT SLIP GAJI</span></a>
              
                </div>
	</div>";	
	?>

	
		<div style='clear:both'></div>
</div>
</body>
</html>
