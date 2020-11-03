<div class='contenttitle2'>
	      <h3>Laporan Gaji Pegawai</h3>
		  </div>
<form method="post" action="report_laporan_gaji.php">
  	<table border="0" class="laporan">
    <tr height="30">
      <td>
      	&nbsp;&nbsp;&nbsp;<label>
      	  <input name="berdasar" type="radio" value="Semua Data" /><strong>Semua Data</strong>
        </label>
      </td>
      </tr>
    
    <tr bgcolor="#CCCCCC" height="30">
      <td>
      	&nbsp;&nbsp;&nbsp;
        <label>
      	<input name="berdasar" type="radio" value="Pencarian Kata" /><strong>Pencarian Kata</strong>
        </label>
      </td>
      <td><select name="field" id="field">
        <option>Pilih Field</option>
          <option value="nip">Nip</option>
          <option value="nama">Nama Pegawai</option>
          <option value="bulan_transfer">Bulan</option>
      </select></td>
      <td><input name="kata" type="text" id="kata" class="textbox" /></td>
      </tr>
    <tr bgcolor="#CCCCCC" height="30">
      <td colspan="3">
        <input type="submit" name="Submit" id="btn_tampilkan" value="Tampilkan" />      </td>
      </tr>
  </table>
  	<p>&nbsp;</p>
  <p>&nbsp; </p>
  <p>&nbsp;</p>
</form>