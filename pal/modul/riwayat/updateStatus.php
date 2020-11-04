<?php
include "../../config/koneksi.php";
$nip=$_GET['nip'];
$status=$_GET['status'];
$cek_data=mysqli_query($conn,"SELECT * FROM pegawai WHERE nip='$nip'");
$ketemu=mysqli_num_rows($cek_data);
if ($ketemu > 0){
mysqli_query($conn,"UPDATE pegawai SET `status`= '$status' WHERE nip='$nip'");
header('location:../../media.php?module=riwayat');
}
?>