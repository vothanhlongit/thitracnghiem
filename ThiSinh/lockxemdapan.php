<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lock xem dap an khi nhan print screen</title>
</head>

<body>
<?php
include_once("connect.php");
 
  if(isset($_POST['mbt'])){
	 $mabaithi=$_POST['mbt'];

	$query1="UPDATE baithithisinh SET xemdapan='0' WHERE  mabaithi='$mabaithi'";
    $result1=mysql_query($query1);			
	
  }

?>
<script type="text/javascript">
window.location='../logout.php';
</script>
</body>
</html>