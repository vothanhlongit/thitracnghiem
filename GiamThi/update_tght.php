<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update now</title>
</head>

<body>
<?php
include_once("connect.php");
//doi ra ngay
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $n=date("Y");
 $t=date("m");
 $nn=date("d");
 
  $gio=date("h");
  $phut=date("i");
  $giay=date("s");
   
 $ght=$gio.":".$phut.":".$giay;	 
 $ngaytraloi=$n."-".$t."-".$nn;
 
  if(isset($_GET['mbt'])){
	 $mabaithi=$_GET['mbt'];
	  
	$query1="UPDATE bailam_ts_temp SET thoigiantraloi='$ght' WHERE  mabaithi='$mabaithi'";
    $result1=mysql_query($query1);			
	
  }

?>
<script type="text/javascript">
window.location='danhsachthisinh.php';

</script>

</body>
</html>