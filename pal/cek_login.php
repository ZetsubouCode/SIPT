<?php
include "config/koneksi.php";

$username = $_POST['username'];
$pass     = $_POST['password'];

// pastikan username dan password adalah berupa huruf atau angka.

$login=mysqli_query($conn,"SELECT * FROM user WHERE userid='$username' AND passid='$pass'");
$ketemu=mysqli_num_rows($login);
$r=mysqli_fetch_array($login);
// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION[namauser]     = $r[userid];
  $_SESSION[passuser]     = $r[passid];
  $_SESSION[leveluser]    = $r[level_user]; 
echo "<script>window.location='media.php?module=home'</script>";	  
 
}
else{
  echo "<script>
	  alert('Login Gagal');
	  window.location = 'index.php';
	  </script>
    ";
}
?>
