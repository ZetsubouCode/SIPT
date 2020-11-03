<?php

$aksi = "modul/pegawai/aksi_pegawai.php";

switch ($_GET[act]) {
  default:
    $tampil = mysqli_query($conn, "select * from pegawai,jabatan where 
  pegawai.id_jab=jabatan.id_jab order by nip DESC");
    echo "<div class='contenttitle2'>
        <h3>Data Pegawai</h3>
      </div>
          <ul class='buttonlist'>
          <li><a href='media.php?module=pegawai&act=input' class='stdbtn'>Tambah Pegawai</a></li>
      </ul>
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
    <td>No. Rekening</td>
    <td>Jabatan</td>
 
  <td>Tgl Masuk</td>
  <td>Aksi</td>
  </tr>
  </thead>";
    $no = 1;
    while ($dt = mysqli_fetch_array($tampil)) {
      $gaji_pokok       =  number_format(($dt[gaji_pokok]), 0, ",", ".");
      echo "<tr class='gradeX'>
    <td>$no</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
    <td>$dt[no_rek]</td>
    <td>$dt[n_jab]</td>
   
  <td>" . tgl_indo($dt['tgl_masuk']) . "</td>
  <td>
  <a href='?module=pegawai&act=detail&id=$dt[nip]' class='btn btn_pencil'><span>Detail</span></a>
  <a href=\"$aksi?module=pegawai&act=hapus&id=$dt[nip]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn_trash'><span>Hapus</span></a></td>
  </tr>";
      $no++;
    }
    echo "  
</table>
  ";

    break;

  case "input":
    echo "<div id='contentwrapper' class='contentwrapper'>
  <div class='contenttitle2'>
  <h2 class='head'>Data Pegawai</h2>
  </div>
  <form action='$aksi?module=pegawai&act=input' method='post' enctype='multipart/form-data' class='stdform stdform2' >
  
  <p>
    <label>NIP</label>
    <span class='field'><input name='nip' type='text'>
  </p>
  
  <p>
    <label>Nama Pegawai</label>
    <span class='field'><input class='input' name='nama' type='text'>
  </p>
  
  <p>
    <label>Tempat Lahir</label>
    <span class='field'><input class='input' name='tls' type='text'></td>
  </p>
  
  <p>
    <label>Tanggal Lahir</label>
    <span class='field'>
  <select name='hari'>
  <option value='none' selected='selected'>Tanggal</option>";
    for ($h = 1; $h <= 31; $h++) {
      echo "<option value=", $h, ">", $h, "</option>";
    }
    echo "</select>
  <select name='bulan'>
  <option value='none' selected='selected'>Bulan</option>
  <option value='1'>Januari</option>
  <option value='2'>Februari</option>
  <option value='3'>Maret</option>
  <option value='4'>April</option>
  <option value='5'>Mei</option>
  <option value='6'>Juni</option>
  <option value='7'>Juli</option>
  <option value='8'>Agustus</option>
  <option value='9'>September</option>
  <option value='10'>Oktober</option>
  <option value='11'>November</option>
  <option value='12'>Desember</option>
  </select>
 </p>
  <p>  
    <span class='field'><input name='tahun' type='text' placeholder='Tahun'/>
  </p>
  
  <p>
    <label>Jenis Kelamin</label>
    <span class='field'><input name='jk' type='radio' value='L' />Pria <input name='jk' type='radio' value='P' />Wanita
  </p>
  
  <p>
    <label>Alamat</label>
    <span class='field'><textarea name='almt' ></textarea>
  </p>
  
  <p>
    <label>Tanggal Masuk</label>
    <span class='field'>
  <select name='hm'>
                <option value='none' selected='selected'>Tanggal</option>";
    for ($h = 1; $h <= 31; $h++) {
      echo "<option value=", $h, ">", $h, "</option>";
    }
    echo "</select>
  <select name='bm'>
              <option value='none' selected='selected'>Bulan</option>
        <option value='1'>Januari</option>
        <option value='2'>Februari</option>
        <option value='3'>Maret</option>
        <option value='4'>April</option>
        <option value='5'>Mei</option>
        <option value='6'>Juni</option>
        <option value='7'>Juli</option>
        <option value='8'>Agustus</option>
        <option value='9'>September</option>
        <option value='10'>Oktober</option>
        <option value='11'>November</option>
        <option value='12'>Desember</option>
      </select>
  
  </p>
  <p>  
    <span class='field'><input name='tm' type='text' placeholder='Tahun'/>
  </p>
  
  
  
  <p>
    <label>Jabatan</label>
    <span class='field'><select name='jabatan'> 
  ";
    $jab = mysqli_query($conn, "select * from jabatan order by id_jab DESC");
    while ($j = mysqli_fetch_array($jab)) {
      echo "<option value='$j[id_jab]'  >$j[n_jab]</option>";
    }
    echo "</select>
  </p>
  
  <p>
    <label>Pendidikan</label>
    <span class='field'><input class='input' name='pdk' type='text'>
  </p>
  
  <p>
    <label>Upload Foto</label>
    <span class='field'><input name='fupload' type='file' />
  </p>
  
  <p>
    <label>Status Pegawai</label>
    <span class='field'><select name='sp'>
  <option value='' selected >Pilih Status</option>
  <option value='Tetap' >Tetap</option>
  <option value='Kontrak' >Kontrak</option>
  </select>
  </p>
  
  <p>
    <label></label>
    <span class='field'><input type=submit value=Simpan>
  <input type=button value=Batal class='stdbtn' onclick=self.history.back()>
  </p>
  
  </form>
  ";
    break;

  case "edit":
    $ambil = mysqli_query($conn, "select * from pegawai where nip='$_GET[id]'");
    $t = mysqli_fetch_array($ambil);
    $gaji_pokok       =  number_format(($t[gaji_pokok]), 0, ",", ".");
    echo "<div id='contentwrapper' class='contentwrapper'>
  <div class='contenttitle2'>
  <h3>Edit Data Pegawai</h3>
  </div>
  <form action='$aksi?module=pegawai&act=edit' method='post' enctype='multipart/form-data'  class='stdform stdform2' >
  
  <p>
    <label>Nip</label>
    <span class='field'><input class='input' name='nip' type='text' value='$t[nip]' readonly>
  </p>
  
  <p>
    <label>Nama Pegawai</label>
    <span class='field'><input class='input' name='nama' type='text' value='$t[nama]'>
  </p>
  
  <p>
    <label>Tempat Lahir</label>
    <span class='field'><input class='input' name='tls' type='text' value='$t[tmpt_lahir]'></p>
  </p>
  
  
  <p>
    <label>Tanggal Lahir</label>
    <span class='field'>";
    $tg = explode("-", $t['tgl_lahir']);
    $tl = $tg[0];
    $btl = $tg[1];
    $htl = $tg[2];
    combotgl(1, 31, ttl, $htl);
    combonamabln(1, 12, btl, $btl);
    // combothn(1965, 2000, tl, $tl);
    echo "</p>

  <p>  
    <span class='field'><input name='tl' type='text' placeholder='Tahun' value='" . $tl . "'/>
  </p>
  
  
  <p>
    <label>Jenis Kelamin</label>
    <span class='field'>";
    if ($t[jenis_kelamin] == 'L') {
      echo "<input name='jk' type='radio' value='L'";
      if ($t['jenis_kelamin'] == 'L') {
        echo "checked";
      }
      echo "/>Pria ";
    } else {
      echo "<input name='jk' type='radio' value='P'";
      if ($t['jenis_kelamin'] == 'P') {
        echo "checked";
      }
      echo "/>Wanita ";
    }
    echo "</p>
  
  <p>
    <label>Alamat</label>
    <span class='field'><textarea  class='input' name='almt' >$t[alamat]</textarea>
  </p>
  
  <p>
    <label>Tanggal Masuk</label>
    <span class='field'>";
    $ta = explode("-", $t['tgl_masuk']);
    $ttm = $ta[0];
    $btm = $ta[1];
    $htm = $ta[2];
    $now =  date("Y");
    $saiki = 2000;
    $ht = "ht";
    $bt = "bt";
    $tt = "tt";
    combotgl(1, 31, $ht, $htm);
    combonamabln(1, 12, $bt, $btm);
    // combothn($saiki,$now, $tt,$ttm);

    echo "</p>

    <p>  
    <span class='field'><input name='tt' type='text' placeholder='Tahun' value='" . $ttm . "'/>
  </p>
  
  <p>
    <label>No. Rekening</label>
    <span class='field'><input class='input' name='no_rek' type='text' value='$t[no_rek]'>
  </p>
  
  
  
  <p>
    <label>Jabatan</label>
    <span class='field'><select class='input'  name='jabatan'>  
  ";
    $jab = mysqli_query($conn, "select * from jabatan order by id_jab DESC");
    while ($j = mysqli_fetch_array($jab)) {
      if ($t['id_jab'] == $j['id_jab']) {
        echo "<option value='$j[id_jab]' selected='$t[id_jab]'  >$j[n_jab]</option>";
      } else {
        echo "<option value='$j[id_jab]'>$j[n_jab]</option>";
      }
    }
    echo "</select></p>
  
  <p>
    <label>Foto</label>
    <span class='field'><img src='image_peg/small_$t[foto]' />
  </p>
  
  <p>
    <label>Ganti Foto</label>
    <span class='field'><input name='fupload' type='file' class='stdbtn' />
  </p>

  <p>
    <label>Status Pegawai</label>
  ";

    $chk_k = '';
    $chk_t = '';

    if ($t[sp] == 'Kontrak') {
      $chk_k = 'selected';
    } else {

      $chk_t = 'selected';
    }

    echo "
    <span class='field'><select name='sp'>
  <option value='' selected >Pilih Status</option>
  <option ";
    echo $chk_t;
    echo " value='Tetap' >Tetap</option>
  <option ";
    echo $chk_k;
    echo " value='Kontrak' >Kontrak</option>
  </select>
  </p>

  ";
    if ($t[sp] == 'Kontrak') {
      echo "
      <p>
        <label>Tanggal Selesai</label>
        <span class='field'>";
      $ta = explode("-", $t['tgl_selesai']);
      $tts = $ta[0];
      $bts = $ta[1];
      $hts = $ta[2];
      $now =  date("Y");
      $saiki = 2020;
      $hs = "hs";
      $bs = "bs";
      $ts = "ts";
      combotgl(1, 31, $hs, $hts);
      combonamabln(1, 12, $bs, $bts);

      // combothn(2020,2100, $ts,$tts);

      echo "</p>

      <p>  
    <span class='field'><input name='ts' type='text' placeholder='Tahun' value='" . $tts . "'/>
  </p>

      ";
    }
    echo
      "
  
  <p>
    <label></label>
    <span class='field'><input type=submit value=Simpan>
  <input type=button value=Batal onclick=self.history.back() class='stdbtn' >
  </p>
  
  </form>";
    break;

  case "detail":
    $ambil = mysqli_query($conn, "select * from pegawai where nip='$_GET[id]'");
    $t = mysqli_fetch_array($ambil);
    $gaji_pokok       =  number_format(($t[gaji_pokok]), 0, ",", ".");
    echo "<div id='contentwrapper' class='contentwrapper'>
  <div class='contenttitle2'>
  <h3>Data Pegawai $t[nama]</h3>
  </div>
  <div class='detailpegawai'>
  <div class='foto'>";
    if ($t[foto] == "") {
      echo "<img src='image_peg/no.jpg' width='200'/>";
    } else {
      echo "<img src='image_peg/small_$t[foto]' width='200'/>";
    }
    echo "</div>
  <table class='tabelform tabpad'>
  <tr>
  <td>Nip</td><td>:</td><td>$t[nip]</td>
  </tr>
  <tr>
  <td>Nama Pegawai</td><td>:</td><td>$t[nama]</td>
  </tr>
  <tr>
  <td>Tempat Lahir</td><td>:</td><td>$t[tmpt_lahir]</td>
  </tr>
  <tr>
  <td>Tanggal Lahir</td><td>:</td><td>";
    echo "" . tgl_indo($t['tgl_lahir']) . "";
    echo "</td>
  </tr>
  
  <tr>
  <td>Jenis Kelamin</td><td>:</td><td>";
    if ($t['jenis_kelamin'] == 'L') {
      echo "Pria";
    } else {
      echo "Wanita";
    }
    echo "</td></tr>
  
  <tr>
  <td>Alamat</td><td>:</td><td>$t[alamat]</td>
  </tr>
  
  <tr>
  <td>Tanggal Masuk</td><td>:</td><td>";
    echo "" . tgl_indo($t['tgl_masuk']) . "";
    echo "
  </td>
  </tr>
  
  
  
  
  <tr>
  <td>Jabatan</td><td>:</td><td>";
    $jab = mysqli_query($conn, "select * from jabatan where id_jab='$t[id_jab]'");
    $j = mysqli_fetch_array($jab);
    echo "$j[n_jab]";
    echo "</td>
  </tr>
  
  <tr>
  <td colspan='3'>
  <a href='?module=pegawai&act=edit&id=$t[nip]'  class='btn btn_pencil'> <span>Edit Profil</span> </a>
   <a href='?module=pegawai&act=pwd&id=$t[nip]'  class='btn btn_key'> <span> Ganti Password</span>  </a></td>
  </tr>
  
  </table>
  <div style='clear:both'></div>
  
  </div>";
    break;

  case "slipgaji":
    $tampil = mysqli_query($conn, "select * from gaji where nip='$_GET[id]'");
    echo "<div class='contenttitle2'><h3>-</h3></div>
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
  
  <td>Jam Lembur</td>
  <td>Uang Lembur</td>
  <td>Tgl. Transfer</td>
  <td>Aksi</td>
  </tr>
  </thead>";
    $no = 1;
    while ($dt = mysqli_fetch_array($tampil)) {
      $gaji_pokok       =  number_format(($dt[gaji_pokok]), 0, ",", ".");
      $uang_lembur       =  number_format(($dt[uang_lembur]), 0, ",", ".");
      $total_gaji       =  number_format(($dt[total_gaji]), 0, ",", ".");
      echo "<tr class='gradeX'>
      <td>$no</td>
    <td>$dt[nama]</td>
    
    <td>$dt[jam_lembur] jam</td>
    <td>Rp. $uang_lembur</td>
  <td>$dt[tgl_transfer] - $dt[jam_transfer]</td>
  <td>
  -</td>
  </tr>";
      $no++;
    }
    echo "  
</table>";
    break;


  case "pwd":
    echo "
  <form action='$aksi?module=pegawai&act=pwd' method='post' class='stdform stdform2' >
  <input name='nip' type='hidden' value='$_GET[id]' readonly>
  <div class='contenttitle2'>
  <h3>GANTI PASSWORD</h3>
  </div>
  
  <p>
    <label>Password Lama</label>
    <span class='field'><input class='input' name='pl' type='password'>
  </p>
  
  <p>
    <label>Password Baru</label>
    <span class='field'><input class='input' name='pb' type='password'><span> </span>
  </p>
  
  
  <p>
    <label></label>
    <span class='field'><input type=submit value=Simpan>
  <input type=button value=Batal class='stdbtn' onclick=self.history.back()>
  </p>
  </form>
  ";
    break;


  case "printslipgaji":
    $ambil = mysqli_query($conn, "select * from gaji where nip='$_GET[id]'");
    $t = mysqli_fetch_array($ambil);
    $gaji_pokok       =  number_format(($t[gaji_pokok]), 0, ",", ".");
    $uang_lembur       =  number_format(($t[uang_lembur]), 0, ",", ".");
    $total_gaji       =  number_format(($t[total_gaji]), 0, ",", ".");
    echo "<div class='contenttitle2'><h3>-</h3></div>
  <div class='detailpegawai' >
  <table class='tabelform tabpad'>";
    echo "<tr>
                    <td>Nip</td>
                    <td>:</td>
                    <td>$t[nip]</td>
                    </tr>
                    <tr>
                    <td>Nama Pegawai</td>
                    <td>:</td>
                    <td>$t[nama]</a></td>
                    </tr>
                    <tr>
                    <td>Nomor Rekening</td>
                    <td>:</td>
                    <td>$t[no_rek]</td>
                    </tr>
                    <tr>
                    <td>Jam Lembur</td>
                    <td>:</td>
                    <td>$t[jam_lembur] Jam</td>
                    </tr>
                   
                    <tr>
                    <td>Uang Lembur</td>
                    <td>:</td>
                    <td>Rp. $uang_lembur</td>
                    </tr>
                    
                    <tr>
                    <td>Tanggal Transfer</td>
                    <td>:</td>
                    <td>$t[tgl_transfer]</td>
                    </tr>
                    <tr>
                    <td>Jam Transfer</td>
                    <td>:</td>
                    <td>$t[jam_transfer]</td>
                    </tr>
                 
                   </tbody>
                   </table>
  <div style='clear:both'></div>
   <div class='text-Left'>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diterima Oleh,&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  
                  <br />
                  <br />
                  <br /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$t[nama] 
             
               
                </div>
  </div>";

    break;

  case "transfergaji":
    $ambil = mysqli_query($conn, "select * from pegawai where nip='$_GET[id]'");
    $t = mysqli_fetch_array($ambil);
    $gaji_pokok       =  number_format(($t[gaji_pokok]), 0, ",", ".");
?>
    <div class='contenttitle2'>
      <h3>Transfer Gaji Pegawai</h3>
    </div>

    <form action="insertgaji.php" method="post" autocomplete="off" name="transfer" class='stdform stdform2'>

      <p>
        <label>NIP</label>
        <span class='field'><input class='input' name="nip" type="text" class="form-control" id="nip" value="<?php echo $t['nip']; ?>" readonly="readonly" />
      </p>

      <p>
        <label>Nama Pegawai</label>
        <span class='field'><input class='input' name='nama' type='text' value='<?php echo $t[nama]; ?>'>
      </p>

      <p>
        <label>No. Rekening</label>
        <span class='field'><input class='input' name='no_rek' type='text'>
      </p>


      <p>
        <label>Jam Lembur</label>
        <span class='field'><input class='input' name="jam_lembur" type="text" class="form-control" id="jam_lembur" autofocus="on" onKeyUp="hitung_gaji()" onKeyDown="hitung_gaji()" onChange="hitung_gaji()" required />
      </p>

      <p>
        <label>Gaji Utama</label>
        <span class='field'><input class='input' name="gaji_pokok" type="text" class="form-control" id="gaji_pokok" value="<?php echo $t['gaji_pokok']; ?>" readonly="readonly" />
      </p>

      <p>
        <label>Uang Lembur</label>
        <span class='field'><input class='input' name="uang_lembur" type="text" class="form-control" id="uang_lembur" required />
      </p>

      <p>
        <label>Total Gaji</label>
        <span class='field'><input class='input' name="total_gaji" type="text" class="form-control" id="total_gaji" required />
      </p>

      <p>
        <label>Bulan Transfer</label>
        <span class='field'><select name="bulan_transfer" name="bulan_transfer" id="bulan_transfer" class="input" required>
            <option>- Pilih Bulan -</option>
            <option value="Januari">Januari</option>
            <option value="Februari">Februari</option>
            <option value="Maret">Maret</option>
            <option value="April">April</option>
            <option value="Mei">Mei</option>
            <option value="Juni">Juni</option>
            <option value="Juli">Juli</option>
            <option value="Agustus">Agustus</option>
            <option value="September">September</option>
            <option value="Oktober">Oktober</option>
            <option value="November">November</option>
            <option value="Desember">Desember</option>
          </select></p>

      <p>
        <label>Tgl. Transfer</label>
        <span class='field'><input class='input' name="tgl_transfer" type="text" class="form-control" id="tgl_transfer" value="<?php echo "" . date("d/m/Y") . ""; ?>" readonly="readonly" /></p>

      <p>
        <label>Jam Transfer</label>
        <span class='field'><input class='input' name="jam_transfer" type="text" class="form-control" id="jam_transfer" value="<?php echo "" . date("H:i:s") . "" ?>" readonly="readonly" />
      </p>

      <p>
        <label></label>
        <span class='field'><input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
          <input type=button value=Batal class='stdbtn' onclick=self.history.back()>
      </p>

    </form>
<?php
    break;
}


?>