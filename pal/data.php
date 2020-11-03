<?php
include "config/koneksi.php";
include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";
include "config/fungsi_cek_masa_kerja.php";

if ($_SESSION['leveluser']=='2'){
    if($_GET['module']=="home"){
        echo "<br/><div id='updates' class='subcontent'>
                    <div class='notibar announcement'>
                        <h3>Selamat Datang di Halaman Administrator Payroll HRD</h3>
                    </div><!-- notification announcement -->
                    
                    <div class='three_third dashboard_left'>
                    
                        <ul class='shortcuts'>
                            <li><a href='media.php?module=home' class='settings'><span>Home</span></a></li>
                            <li><a href='media.php?module=pegawai&act=detail&id=$_SESSION[namauser] ' class='settings'><span>Edit Profil</span></a></li>

                            <li><a href='media.php?module=pegawai' class='users'><span>Data Pegawai</span></a></li>
                            



                            
                            <li><a href='logout.php' class='lap-kredit'><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>";
    }
    elseif($_GET['module']=="pegawai"){
    include "modul/pegawai/pegawai.php";
        }
}
    
if ($_SESSION['leveluser']=='1' || $_SESSION['leveluser']=='3' ){
    if($_GET['module']=="home"){
        echo "<br/><div id='updates' class='subcontent'>
                    <div class='notibar announcement'>
                        <h3>Selamat Datang di Halaman Administrator PT. PAL</h3>
                    </div><!-- notification announcement -->
                    
                    <div class='three_third dashboard_left'>
                    
                        <ul class='shortcuts'>
                            <li><a href='media.php?module=home' class='settings'><span>Home</span></a></li>
                            <li><a href='media.php?module=pegawai&act=detail&id=admin' class='settings'><span>Edit Profil</span></a></li>
                            <li><a href='media.php?module=pegawai' class='users'><span>Data Pegawai</span></a></li>
                           

                            ";
                            if ($_SESSION['leveluser']=='1'){
                                echo "
                                
                                ";
                            }
                            echo "
                    
                            <li><a href='laporan_pegawai.php' target='_blank' class='lap-cash'><span>Laporan Pegawai</span></a></li>
                            
                            <li><a href='logout.php' class='lap-kredit'><span>Logout</span></a></li>
                        </ul>
                    </div>
                </div>";


    $tampil=mysqli_query($conn,"select * from pegawai,jabatan where 
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
    <th class='head0'>No</th>
    <th class='head1'>Nip</th>
    <th class='head2'>Nama</th>
    <th class='head3'>Tgl Lahir</th>
    
    <th class='head4'>Tgl Masuk</th>
    <th class='head5'>Selesai Kontrak</th>
    <th class='head6'>Umur Pegawai</th>
    <th class='head7'>Status Pegawai</th>
    <th class='head8'>Aksi</th>
  </tr>
  </thead>";
  $no=1;

    function hitung_umur($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y." tahun ".$m." bulan ".$d." hari";
    }


   function hitung_pensiun($tanggal_lahir){
        $birthDate = new DateTime($tanggal_lahir);
        $today = new DateTime("today");
        if ($birthDate > $today) { 
            exit("0 tahun 0 bulan 0 hari");
        }
        $y = $today->diff($birthDate)->y;
        $m = $today->diff($birthDate)->m;
        $d = $today->diff($birthDate)->d;
        return $y;
    }


   

  while($dt=mysqli_fetch_array($tampil)){

// $date = date("Y-m-d");
// date_add($date, date_interval_create_from_date_string('10 days'));
// $date_add = date_format($date, 'Y-m-d');
$date = date("Y-m-d");
// var_dump($date_add);exit;
    // $date = new DateTime('+1 day');
    // $date->format('Y-m-d');
// $date = "2010-01-21 00:00:00";


   $style_kontrak = 'white';
  if($dt['tgl_selesai'] <= $date ){
    $style_kontrak = 'pink';

  }

  $gaji_pokok       =  number_format(($dt[gaji_pokok]),0,",",".");
  echo "<tr class='gradeX'>
    <td>$no</td>
    <td>$dt[nip]</td>
    <td>$dt[nama]</td>
    
    <td>".tgl_indo($dt['tgl_lahir'])."</td>
    <td>".tgl_indo($dt['tgl_masuk'])."</td>
    "; if ($dt['tgl_selesai']!='0000-00-00'){ echo"
    <td style='background-color:".$style_kontrak.";'>".tgl_indo($dt['tgl_selesai'])."</td>
    "; }else{ 

        echo "<td>-</td>";
    }
    $style_tetap = 'white';
    if(hitung_pensiun($dt['tgl_lahir'])>=54){
        $style_tetap = 'pink';
    }
    echo "
    <td style='background-color:".$style_tetap.";'>".hitung_umur($dt['tgl_lahir'])."</td>
    <td>$dt[sp]</td>
    <td>
    <a href='?module=pegawai&act=detail&id=$dt[nip]' class='btn btn_pencil'><span>Detail</span></a>
    <a href=\"$aksi?module=pegawai&act=hapus&id=$dt[nip]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\" class='btn btn_trash'><span>Hapus</span></a>
   </td>
  </tr>";
  $no++;
  }
echo "  
</table>
    ";
    }
    
    
    else if($_GET['module']=="gaji"){
    include "modul/gaji/gaji.php";
    }

    else if($_GET['module']=="jabatan"){
    include "modul/jabatan/jabatan.php";
    }

    else if($_GET['module']=="pegawai"){
    include "modul/pegawai/pegawai.php";
    }
    else if($_GET['module']=="riwayat"){
    include "modul/riwayat/riwayat.php";
    }

    else if($_GET['module']=="laporangaji"){
    include "modul/gaji/laporan_gaji.php";
    }
    else if($_GET['module']=="lemburpegawai"){
    include "modul/pegawai/lembur_pegawai.php";
    }

 }
?>