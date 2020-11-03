<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];


if($module=='jabatan' AND $act=='input' ){
	mysqli_query($conn,"insert into jabatan set id_jab='$_POST[id]', n_jab='$_POST[nama]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='jabatan' AND $act=='edit' ){
	mysqli_query($conn,"update jabatan set n_jab='$_POST[nama]' where id_jab='$_POST[id]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='jabatan' AND $act=='hapus' ){
	mysqli_query($conn,"delete from jabatan where id_jab='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}


?>