<?php
session_start();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update Cho Xem Dap An</title>
</head>

<body>
<?php
include_once("connect.php");
include_once("function.php");
// error_reporting(0);

 if(isset($_GET['md'])){
	   $md= $_GET['md'];
		$test=chua_nopbai_het($md);
 }
//bat tthai
if($_GET['v']==1 && $test==0  ){
	 $mabaithi=$_GET['mbt'];
	  $tt=$_GET['v'];
	$query1="UPDATE baithithisinh SET xemdapan='$tt' WHERE  mabaithi='$mabaithi'";
    $result1=mysql_query($query1);			
	
  
?>
<script type="text/javascript">
window.location='danhsachthisinh.php';

</script>
<?php
}//tat trang thai
elseif($_GET['v']==1 && $test>0){
	
?>
<script type="text/javascript">
alert("CHỨC NĂNG KHÔNG THỰC HIỆN ĐƯỢC"+ '\n' +"CÒN THÍ SINH CHƯA NỘP BÀI!.")
window.location='danhsachthisinh.php';

</script>
<?php
}
else {
//tat
	 $mabaithi=$_GET['mbt'];
	$query1="UPDATE baithithisinh SET xemdapan='0' WHERE  mabaithi='$mabaithi'";
    $result1=mysql_query($query1);	
?>
<script type="text/javascript">

window.location='danhsachthisinh.php';

</script>
<?php
}
?>
</body>
</html>