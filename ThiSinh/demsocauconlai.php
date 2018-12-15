<?php
 require_once("connect.php");

if(isset($_GET['giatrimabai'])){	
$mb=$_GET['giatrimabai'];
$qr=mysql_query("select count(*)as dem from bailam_ts_temp where  mabaithi='$mb' and matraloi_tn <>'no'");	
$kqdem=mysql_fetch_array($qr);
//dem tuluan
$qr1=mysql_query("select count(*)as dem1 from bailam_ts_temp where  mabaithi='$mb' and traloi <> 'no'");	
$kqdem1=mysql_fetch_array($qr1);

$tong=$kqdem['dem']+$kqdem1['dem1'];
//echo "Bạn đã trả lời được: <font color='red'>". $kqdem['dem']."</font>";
echo "Bạn đã trả lời được: <font color='red'>". $tong."</font>";

}
?>