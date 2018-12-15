<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
 include_once("connect.php");
 $mm=$_GET['id_mon'];
 $qrnhom=mysql_query("select * from nhom where mamon='$mm'");

?>
<select name="cbonhom" id="cbonhom" >
  <option value="">---Chọn nhóm---</option>
  <?php
	 while($kqnhom=mysql_fetch_array($qrnhom))
       {		 
	 ?>
  <option value="<?php echo $kqnhom[0];?>"><?php echo $kqnhom[1];?></option>
  <?php
	   }
	  ?>
</select> 

<br />


</body>
</html>