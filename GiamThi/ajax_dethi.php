<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
 include_once("connect.php");
 $mm=$_GET['id_mamon'];
 
 $qrdethi=mysql_query("select * from dethi where mamon='$mm'");

?>
<select name="cbodethi" id="cbodethi" >
  <option value="">---Chọn đề thi---</option>
  <?php
	 while($kqdethi=mysql_fetch_array($qrdethi))
       {		 
	 ?>
  <option value="<?php echo $kqdethi[0];?>"><?php echo  $mm."--".$kqdethi[1];?></option>
  <?php
	   }
	  ?>
</select> 

<br />


</body>
</html>