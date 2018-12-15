<?php
include_once("connect.php");

if(isset($_POST['p'])&& isset($_POST['us']))
{
	
	$u=$_POST['us'];
	$p=md5($_POST['p']);
	//echo $u;
	//echo $p;
	
	$query="UPDATE nguoiquanly SET matkhau='$p' WHERE  tendangnhap='$u'";
  $result=mysql_query($query);
	


}// if post
?>