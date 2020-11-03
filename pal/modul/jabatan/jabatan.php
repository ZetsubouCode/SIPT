<?php

$aksi="modul/jabatan/aksi_jabatan.php";

switch($_GET[act]){
	default:
	$tampil=mysqli_query($conn,"select * from jabatan order by id_jab DESC");
	echo "<div class='contenttitle2'>
	<h3>DATA JABATAN PEGAWAI</h3>
	</div>
    <ul class='buttonlist'>
	<li><input type=button value='Tambah Data' onclick=\"window.location.href='?module=jabatan&act=input';\" class='stdbtn'></li>
	</ul>
	<table  cellpadding='0' cellspacing='0' border='0' class='stdtable' id='dyntable2'>
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
    <td>Id Jabatan</td>
    <td>Jabatan</td>
	<td>Aksi</td>
  </tr>
  </thead>";
  $no=1;
  while($dt=mysqli_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[id_jab]</td>
    <td>$dt[n_jab]</td>
	<td><a href='?module=jabatan&act=edit&id=$dt[id_jab]' class='btn btn_pencil'><span>Edit</span></a>
	<a href=\"$aksi?module=jabatan&act=hapus&id=$dt[id_jab]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn_trash'><span>Hapus</span></a></td>
  </tr>";
  $no++;
  }
echo "  
</table>
	";
	
	break;
	
	case "input":
	echo "<div class='contenttitle2'>
	<h3>Tambah Data Jabatan</h3>
	</div>
	<form action='$aksi?module=jabatan&act=input' method='post' class='stdform stdform2' >
	
	<p>
    <label>ID Jabatan</label>
    <span class='field'><input class='input' name='id' type='text' value=".kdauto(jabatan,J).">
	</p>
	
	
	<p>
    <label>Jabatan</label>
    <span class='field'><input class='input' name='nama' type='text'>
	</p>
	
	<p>
    <label></label>
    <span class='field'><input type=submit value=Simpan>
	<input type=button  class='stdbtn' value=Batal onclick=self.history.back()>
	</p>
	</form>
	";
	break;
	
	case "edit":
	$edit=mysqli_query($conn,"select * from jabatan where id_jab='$_GET[id]'");
	$data=mysqli_fetch_array($edit);
	echo "<div class='contenttitle2'>
	<h3>Edit Data Jabatan</h3>
	</div>
	<form action='$aksi?module=jabatan&act=edit' method='post' class='stdform stdform2' >
	
	
	<p>
    <label>ID Bagian</label>
    <span class='field'><input class='input' name='id' type='text' value='$data[id_jab]'>
	</p>
	
	<p>
    <label>Nama Bagian</label>
    <span class='field'><input class='input' name='nama' type='text' value='$data[n_jab]'>
	</p>
	
	<p>
    <label></label>
    <span class='field'><input type=submit value=Update>
	<input type=button  class='stdbtn'  value=Batal onclick=self.history.back()>
	</p>
	
	</form>";
	break;
	
}


?>