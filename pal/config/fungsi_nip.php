<?php 
	function ambilNip($var){
	echo "<select name=$var>";
		$ambil=mysqli_query($conn,"select * from pegawai");
		while($dt=mysqli_fetch_array($ambil)){
		echo "<option value='$dt[nip]'>$dt[nip]</option>";			
		}
	echo "</select>";
	}
?>