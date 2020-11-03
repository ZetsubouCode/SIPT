<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";
include "../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='pegawai' AND $act=='hapus' ){ 
    mysqli_query($conn,"delete from pegawai where nip='$_GET[id]'");
    header('location:../../media.php?module='.$module);
}

if($module=='pegawai' AND $act=='input' ){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
    if (!empty($lokasi_file)){  
    $tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
    $tm="$_POST[tm]-$_POST[bm]-$_POST[hm]";
    Uploadfoto($nama_file_unik);
    mysqli_query($conn,"insert into pegawai set nip='$_POST[nip]',
                                         nama           ='$_POST[nama]',
                                         tmpt_lahir     ='$_POST[tls]',
                                         tgl_lahir      ='$tll',
                                         jenis_kelamin  ='$_POST[jk]',
                                         alamat         ='$_POST[almt]',
                                         tgl_masuk      ='$tm',
                                         gaji_pokok     ='0',
                                         no_rek         ='$_POST[no_rek]',
                                         id_jab         ='$_POST[jabatan]',
                                         sp             ='$_POST[sp]',
                                         foto           ='$nama_file_unik'
                                         ");
    mysqli_query($conn,"insert into user set userid='$_POST[nip]', 
                                      passid    ='$_POST[psl]', level_user='3'");
    
    header('location:../../media.php?module=home');
    } else {
    $tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
    $tm="$_POST[tm]-$_POST[bm]-$_POST[hm]";
    mysqli_query($conn,"insert into pegawai set nip            ='$_POST[nip]',
                                         nama           ='$_POST[nama]',
                                         tmpt_lahir     ='$_POST[tls]',
                                         tgl_lahir      ='$tll',
                                         jenis_kelamin  ='$_POST[jk]',
                                         alamat         ='$_POST[almt]',
                                         tgl_masuk      ='$tm',
                                         gaji_pokok     ='0',
                                         no_rek         ='$_POST[no_rek]',
                                         sp             ='$_POST[sp]',
                                         id_jab         ='$_POST[jabatan]'
                                         ");
    mysqli_query($conn,"insert into user set userid    ='$_POST[nip]', 
                                      passid    ='$_POST[psl]', level_user='3'");
    header('location:../../media.php?module=home');
    }
}

elseif($module=='pegawai' AND $act=='edit' ){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
    if (!empty($lokasi_file)){  
    $tll="$_POST[tl]-$_POST[btl]-$_POST[ttl]";
    $tm="$_POST[tt]-$_POST[bt]-$_POST[ht]";
    $ts="$_POST[ts]-$_POST[bs]-$_POST[hs]";
    if($_POST[sp]=='Tetap'){
       $ts="0000-00-00";
    }
    Uploadfoto($nama_file_unik);
    mysqli_query($conn,"update pegawai set nama            ='$_POST[nama]',
                                    tmpt_lahir      ='$_POST[tls]',
                                    tgl_lahir       ='$tll',
                                    jenis_kelamin   ='$_POST[jk]',
                                    alamat          ='$_POST[almt]',
                                    tgl_masuk       ='$tm',
                                    tgl_selesai       ='$ts',
                                   
                                    no_rek          ='$_POST[no_rek]',
                                    id_jab          ='$_POST[jabatan]',
                                    sp              ='$_POST[sp]',
                                    foto            ='$nama_file_unik' 
                            where nip               ='$_POST[nip]'");
    
    header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
    } else {
    $tll="$_POST[tl]-$_POST[btl]-$_POST[ttl]";
    $tm="$_POST[tt]-$_POST[bt]-$_POST[ht]";
    $ts="$_POST[ts]-$_POST[bs]-$_POST[hs]";

    if($_POST[sp]=='Tetap'){
       $ts="0000-00-00";
    }
    
    mysqli_query($conn,"update pegawai set nama            ='$_POST[nama]',
                                    tmpt_lahir      ='$_POST[tls]',
                                    tgl_lahir       ='$tll',
                                    jenis_kelamin   ='$_POST[jk]',
                                    alamat          ='$_POST[almt]',
                                    tgl_masuk       ='$tm',
                                    tgl_selesai     ='$ts',
                                   
                                    no_rek          ='$_POST[no_rek]',
                                    sp              ='$_POST[sp]',
                                    id_jab          ='$_POST[jabatan]'
                              where nip             ='$_POST[nip]'");
    header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
    }
}

elseif($module=='pegawai' AND $act=='hapus' ){
    mysqli_query($conn,"delete from pegawai where nip = '$_GET[id]'");
    header('location:../../media.php?module='.$module);
}


elseif($module=='pegawai' AND $act=='pwd' ){
    $cek=mysqli_query($conn,"select * from user where userid='$_POST[nip]' and passid='$_POST[pl]' ");
    if(mysqli_num_rows($cek)==0){
    echo "<script>alert('Gagal ganti password !! pasword lama salah ! ');window.location.href='../../media.php?module=pegawai&act=detail&id=$_POST[nip]';</script>";
    } else {
        mysqli_query($conn,"update user set passid='$_POST[pb]' where userid='$_POST[nip]'");
        echo "<script>alert('Password sukses diubah !!');window.location.href='../../media.php?module=pegawai&act=detail&id=$_POST[nip]';</script>";
    }
    
}




?>