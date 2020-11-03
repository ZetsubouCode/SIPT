<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Laporan Gaji Pegawai ::.</title>
<style type="text/css">
#logo {
 width: 300px;
 height: 200px;	
 float:left;
}
#judul {
 margin-left : 175px;
 width:900px;
 text-align:center;
}

</style>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/custom/general.js"></script>
<script type="text/javascript" src="js/custom/tables.js"></script>
<script type="text/javascript" src="js/custom/gallery.js"></script>
<script type="text/javascript" src="js/plugins/jquery.colorbox-min.js"></script>
</head>

<body>
<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
?>
<div id="judul">
<br />
<br />
  <font size="+3">APLIKASI PENGGAJIAN PEGAWAI </font><br /><br/>
PT WAN ARTHA NATA<br/>Jl. Jend.A.yani No.56 Dusun Jati Indah Rt001/009<br />
Ds.Cikampek kota, kec. Cikampek, Karawang<br />
</div>
<hr size="4" color="#000000" />    <br/>
   <center> <h2>LAPORAN GAJI PEGAWAI </h2>
	<h3><br/>
Berdasarkan: <?php echo $_POST['berdasar'] ?></h3><br/>
	<?php
if($_POST['berdasar'] == "Semua Data"){
	//modus delete Semua Data
	$sql = "select * from gaji";
}

	else if($_POST['berdasar'] == "Pencarian Kata"){
	//modus berdasarkan kata
	$field = $_POST['field'];
	$kata = $_POST['kata'];
	$sql = "select nip,
	               nama,
	               no_rek,
	               gaji_pokok,
	               jam_lembur,
	               uang_lembur,
	               total_gaji,
	               bulan_transfer,
	               tgl_transfer,
	               jam_transfer
				from gaji where $field like '%$kata%'";
  	
	}
$query = mysql_query($sql);
?></center>
<center>
<table cellpadding='0' cellspacing='0' border='0' class='stdtable'>
<colgroup>
			<col class='con0' />
			<col class='con1' />
			<col class='con0' />
			<col class='con1' />
			<col class='con0' />
		  </colgroup>
	<thead>
      <tr>
        <th class='head0'>No</th>
        <th class='head1'>NIP</th>
        <th class='head2'>Nama Pegawai</th>
        <th class='head3'> No. Rekening </th>
        <th class='head4'>Gaji Pokok</th>
        <th class='head5'>Jam Lembur</th>
        <th class='head6'>Uang Lembur</th>
        <th class='head7'>Total Gaji</th>
        <th class='head7'>Bulan </th>
        <th class='head8'>Tgl. Transfer</th>
      </tr>
      </thead>
      <?php
			   $i=1;
			   $gaji_pokok_total = 0;
			   $jam_lembur_total = 0;
			   $uang_lembur_total = 0;
			   $total_gaji_total = 0;
			while ($data = mysql_fetch_array($query)){
	           $gaji_pokok_angka       =  $data[gaji_pokok];
	           $gaji_pokok             =  number_format(($data[gaji_pokok]),0,",",".");
	           $uang_lembur_angka      =  $data[uang_lembur];
	           $uang_lembur            =  number_format(($data[uang_lembur]),0,",",".");
	           $total_gaji_angka       =  $data[total_gaji];
	           $total_gaji             =  number_format(($data[total_gaji]),0,",",".");
			echo "<tr class='gradeX'>
              <td align=center>$i</td>
              <td align=center >$data[nip]</td>
              <td align=center>$data[nama]</td>
              <td align=center>$data[no_rek]</td>
              <td align=center>Rp. $gaji_pokok</td>
			  <td align=center>$data[jam_lembur]</td>
			  <td align=center>Rp. $uang_lembur</td>
			  <td align=center>Rp. $total_gaji</td>
			  <td align=center>$data[bulan_transfer]</td>
			  <td align=center>$data[tgl_transfer] - $data[jam_transfer]
			  </td>
            </tr>";
			$i++;
			$gaji_pokok_total += $gaji_pokok_angka;
			$jam_lembur_total += $data[jam_lembur];
			$uang_lembur_total += $uang_lembur_angka;
			$total_gaji_total += $total_gaji_angka;
			}

           $gaji_pokok_total       =  number_format(($gaji_pokok_total),0,",",".");
           $uang_lembur_total      =  number_format(($uang_lembur_total),0,",",".");
           $total_gaji_total       =  number_format(($total_gaji_total),0,",",".");

			?>
		
			<tr class='gradeX'>
              <td align=center colspan= "4">TOTAL</td>
              <!-- <td align=center></td>
              <td align=center></td>
              <td align=center></td> -->
              <td align=center>Rp. <?php echo $gaji_pokok_total;?></td>
			  <td align=center><?php echo $jam_lembur_total;?></td>
			  <td align=center>Rp. <?php echo $uang_lembur_total;?></td>
			  <td align=center>Rp. <?php echo $total_gaji_total;?></td>
			  <td align=center></td>
			  <td align=center>
			  </td>
            </tr>
        
    </table></center>
    <center><br/>
    	<input type="submit" name="button" class='stdbtn' id="button" value="Kembali" onclick="self.history.back()" />
		<input type="submit" name="button" class='stdbtn' id="button" value="Print" onclick="print()" /><br/>
        <form method="get" action="config/laporan_excel.php">
          <input name="tipeLaporan" type="hidden" id="tipeLaporan" value="Gaji" />
          <input name="sql" type="hidden" id="sql" value="<?php echo $sql; ?>" />
         <input type="submit" name="button2" id="button2" value="Ekspor ke Ms. Excel" />
        </form>
	</center>
</body>
</html>

