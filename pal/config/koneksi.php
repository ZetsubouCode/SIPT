<?php
// panggil fungsi validasi xss dan injection
require_once('fungsi_validasi.php');

// definisikan koneksi ke database
$server = "localhost";
$username = "admin";
$password = "admin";
$database = "pal";

// Koneksi dan memilih database di server
$conn = mysqli_connect($server,$username,$password,$database);
// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Lokovalidasi;
?>
