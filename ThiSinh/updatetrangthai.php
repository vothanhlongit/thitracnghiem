<?php
include_once("connect.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $gio=date("h");
  $phut=date("i");
  $giay=date("s");   
 $ght=$gio.":".$phut.":".$giay;

if(isset($_POST['status'])&& isset($_POST['mabai']) )
{
$mabai = $_POST['mabai'];
$tt = $_POST['status'];
echo $mabai;
//da nop bai
$query2="Select trangthai  from baithithisinh WHERE  mabaithi='$mabai' and trangthai=2";
$result2=mysql_query($query2);
$kq2=mysql_fetch_array($result2);
if($kq2['trangthai']=='2')
{
	echo '-đã nộp';
	exit();
}
//chua nop
	$query="UPDATE baithithisinh SET trangthai='$tt' WHERE  mabaithi='$mabai'";
	//echo $query;
    $result=mysql_query($query);
//update tgian if ko chon ma dong laij
$query3="UPDATE bailam_ts_temp SET thoigiantraloi='$ght' WHERE  mabaithi='$mabai'";
	//echo $query;
    $result3=mysql_query($query3);	


}// if post
?>