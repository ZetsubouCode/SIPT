<?php
function getUmur($tgl_lahir){
$curr=date('Y-M-D');
$umur=($curr-$tgl_lahir);
return $umur;
}
function getSisaKontrak($tgl_selesai){
    $OldDate = new DateTime($tgl_selesai);
    $now = new DateTime(Date('Y-m-d'));
    $res=$OldDate->diff($now);
$strRes= $res->m." Bulan ".$res->d." Hari";
return array($res->m,$res->d,$strRes);
}
?>