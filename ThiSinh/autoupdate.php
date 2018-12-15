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
  if(isset($_POST['mbt'])){
	 $mabaithi=$_POST['mbt'];
	//cau trac gnhiem
  
	$query1="UPDATE bailam_ts_temp SET thoigiantraloi='$ght' WHERE  mabaithi='$mabaithi'";
    $result1=mysql_query($query1);			
	//tu luan	
	

  }

?>