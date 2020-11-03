<?php

switch($_GET[act]){
	default:
	$tampil=mysqli_query($conn,"select * from gaji order by nip DESC");
	echo "<div class='contenttitle2'>
	<h3>DATA GAJI PEGAWAI</h3>
	</div>
	<br/>
	<a href='print-slipgaji.php' target='_BLANK' class='btn btn_user'><span>Print Slip Gaji</span></a>
	<br/>
	<table cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
	<colgroup>
			<col class='con0' />
			<col class='con1' />
			<col class='con0' />
			<col class='con1' />
			<col class='con0' />
		  </colgroup>
	<thead>
  <tr>
    <td>No</td>
    <td>Nama</td>
	<td>Gaji Pokok</td>
	<td>Jam Lembur</td>
	<td>Uang Lembur</td>
	<td>Tgl. Transfer</td>
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
  </tr>";
  $no++;
  }
echo "  
</table>
	";
	
	break;
	
	}


?>