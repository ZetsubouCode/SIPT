<?php
include "config/koneksi.php";
$id_gaji           = $_POST['id_gaji'];
$nip               = $_POST['nip'];
$nama              = $_POST['nama'];
$no_rek            = $_POST['no_rek'];
$jam_lembur 	   = $_POST['jam_lembur'];
$gaji_pokok 	   = $_POST['gaji_pokok'];
$uang_lembur 	   = $_POST['uang_lembur'];
$total_gaji 	   = $_POST['total_gaji'];
$bulan_transfer	   = $_POST['bulan_transfer'];
$tgl_transfer	   = $_POST['tgl_transfer'];
$jam_transfer	   = $_POST['jam_transfer'];

$query = mysqli_query($conn,"INSERT INTO gaji (id_gaji, 
                                        nip, 
                                        nama, 
                                        no_rek, 
										jam_lembur, 
										gaji_pokok, 
										uang_lembur, 
										total_gaji, 
										bulan_transfer, 
										tgl_transfer, 
										jam_transfer) 
								VALUES ('$id_gaji', 
								        '$nip', 
								        '$nama', 
								        '$no_rek', 
										'$jam_lembur', 
										'$gaji_pokok', 
										'$uang_lembur', 
										'$total_gaji', 
										'$bulan_transfer', 
										'$tgl_transfer', 
										'$jam_transfer')");
if ($query){
	echo "<script>alert('Data Gaji Karyawan Berhasil dimasukan!'); window.location = 'media.php?module=pegawai'</script>";	
} else {
	echo "<script>alert('Data Gaji Karyawan Gagal dimasukan!'); window.location = 'media.php?module=pegawai'</script>";	
}
?>