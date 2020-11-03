<?php

$aksi = "modul/pegawai/aksi_pegawai.php";

switch ($_GET['act']) {
  default:
    $tampil = mysqli_query($conn, "select * from pegawai,jabatan where 
  pegawai.id_jab=jabatan.id_jab order by nip DESC");
    echo "<div class='contenttitle2'>
        <h3>Data Pegawai</h3>
      </div>
         
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
    <td class='head0'>No</td>
    <td>Nip</td>
    <td>Nama</td>
    <td>Jabatan</td>
    <td>Status Pegawai</td>
    <td>Umur</td>
    <td>Tanggal Masuk</td>
    <td>Selesai Kontrak</td>
    <td>Sisa Kontrak</td>
  </tr>
  </thead>";
    $no = 1;
    while ($dt = mysqli_fetch_array($tampil)) {
      $gaji_pokok =  number_format(($dt['gaji_pokok']), 0, ",", ".");
      if ($dt['sp'] == "Kontrak") {
        $temp = getSisaKontrak($dt['tgl_selesai']);
        $sisa_kontrak= $temp[2];
      } else {
        $sisa_kontrak = "-";
      }
      $umur = getUmur($dt['tgl_lahir']);
      if(($dt['sp']=="Kontrak"&&(($temp[0]<2&&$temp[1]==0)||($temp[0]<2)))||($dt['sp']=="Tetap"&&$umur>=54)){
      echo "<tr class='gradeX'>
    <td>$no</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
    <td>$dt[n_jab]</td>
    <td>$dt[sp]</td>
    <td>" . getUmur($dt['tgl_lahir']) . "</td>
  <td>" . tgl_indo($dt['tgl_masuk']) . "</td>
  <td>" . $dt['tgl_selesai'] . "</td>
  <td>" . $sisa_kontrak . "</td>
  </tr>";
      
      $no++;
     }
    }
    echo "  
</table>
  ";

    break;
}
