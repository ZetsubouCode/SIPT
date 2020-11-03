<?php
session_start();
error_reporting(0);
include "timeout.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>.:: SISTEM INFORMASI PEGAWAI ::.</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript" src="js/custom/tables.js"></script>
    <script type="text/javascript" src="js/custom/gallery.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.colorbox-min.js"></script>


    <script type="text/javascript">
        function hitung_gaji() {
            var jam_lembur = document.transfer.jam_lembur.value;
            var uang_lembur = document.transfer.uang_lembur.value;
            var gaji_pokok = document.transfer.gaji_pokok.value;
            var total_gaji = document.transfer.total_gaji.value;
            uang_lembur = (gaji_pokok / 173) * jam_lembur;
            document.transfer.uang_lembur.value = Math.floor(uang_lembur);

            total_gaji = (gaji_pokok - uang_lembur) + (2 * uang_lembur);
            document.transfer.total_gaji.value = Math.floor(total_gaji);
        }
    </script>

    <script type="text/javascript">
        // 1 detik = 1000
        window.setTimeout("waktu()", 1000);

        function waktu() {
            var tanggal = new Date();
            setTimeout("waktu()", 1000);
            document.getElementById("output").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
        }
    </script>
    <script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;

        var popupWindow = null;

        function centeredPopup(url, winName, w, h, scroll) {
            LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
            TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
            settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
            popupWindow = window.open(url, winName, settings)
        }
    </script>

    <!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
<![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
<![endif]-->
    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

</head>

<body class="withvernav">

    <div class="bodywrapper">
        <div class="topheader">
            <div class="left">
                <h1 class="logo">ADMINISTRATOR<span> PT. PAL</span></h1>
                <span class="slogan">Aplikasi Sistem Informasi Pegawai</span>


                <br clear="all" />

            </div>
            <!--left-->

        </div>
        <!--topheader-->

        <div class="vernav2 iconmenu">
            <ul>
                <?php if ($_SESSION['leveluser'] == '1' || $_SESSION['leveluser'] == '2' || $_SESSION['leveluser'] == '3') {
                ?>
                    <li><a class="border link linkback" href="<?php echo "media.php?module=home"; ?>">Home</a></li>
                    <?php if ($_SESSION['leveluser'] == '2' || $_SESSION['leveluser'] == '3') {
                    ?>
                        <li><a href="<?php echo "media.php?module=pegawai&act=detail&id=$_SESSION[namauser]"; ?>" class="li">Profil Pegawai</a></li>

                        <!-- <li><a href="<?php echo "media.php?module=pegawai&act=slipgaji&id=$_SESSION[namauser]"; ?>" class="li">Data Slip Gaji</a></li> -->
                    <?php } ?>
                <?php } ?>

                <!-- <li><a class="border link linkback" href="media.php?module=home">Home</a></li> -->

                <?php

                if ($_SESSION['leveluser'] == '1') {
                ?>
                    <li><a class="border link linkback" href="?module=pegawai">Data Pegawai</a></li>
                    <!-- <li><a href="?module=gaji" class="li">Data Gaji Pegawai</a></li> -->
                    <!-- <li><a href="?module=lemburpegawai" class="li">Lembur Pegawai</a></li> -->

                    <!-- <li><a href="?module=jabatan" class="li">Data Jabatan</a></li> -->
                <?php } ?>
                <?php


                if ($_SESSION['leveluser'] == '1' || $_SESSION['leveluser'] == '3') {
                ?>
                    <li><a href="#anekaweb1" class="anekaweb1">Laporan</a>
                        <span class="arrow"></span>
                        <ul id="anekaweb1">
                            <li><a href="laporan_pegawai.php" class="li" target="_blank">Data Pegawai</a></li>
                            <!-- <li><a href="?module=laporangaji" class="li">Data Gaji Pegawai</a></li> -->
                        </ul>
                    </li>
                    <li><a href="?module=riwayat" class="anekaweb1">Riwayat</a></li>
                <?php } ?>

                <li><a href="logout.php">Logout</a></li>
                <li class="clear"></li>
            </ul>
            <a class="togglemenu"></a>
            <br /><br />
        </div>
        <!--leftmenu-->

        <div class="centercontent">
            <div id="contentwrapper" class="contentwrapper">
                <?php include "data.php"; ?>

            </div>
        </div><!-- centercontent -->


    </div>
    <!--bodywrapper-->
</body>

</html>