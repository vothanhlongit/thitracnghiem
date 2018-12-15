<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ON- Off</title>
</head>

<body>
<?php
include_once("connect.php");
if(isset($_GET['tt'])&& isset($_GET['md']))
{
	$tt=$_GET['tt'];
	$md=$_GET['md'];
$qr=mysql_query("Update dethi set trangthai='$tt' where madethi='$md' ");	
	
?>
<script type="text/javascript">
window.location='danhsachdethi_gvxem.php';
</script>
<?php	
}

?>
</body>
</html>