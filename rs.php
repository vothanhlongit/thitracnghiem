<?php
session_start();
if(!isset($_SESSION['maquantri']))
{

header("location:index.php");

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset data</title>
<script type="text/javascript"> 




function kiemtra()
{

var xn=confirm(" CHẮC CHẮN BẠN MUỐN XÓA DỮ LIỆU KHÔNG?");
if(xn==true)
return true;


return false;
}

 </script> 
</head>

<body>


<form action="" method="post" name="frmrs">
<center>
<table width="688" border="0"  bgcolor="#9999CC">
  <tr>
    <td width="162">&nbsp;</td>
    <td width="516"><strong>1. TẤT CẢ DỮ LIỆU BÀI THI THÍ SINH</strong></td>
  </tr>
  <tr>
    <td><h3 style="color:#F00">XÓA DỮ LIỆU:</h3></td>
    <td><strong> 2. TẤT CẢ DỮ LIỆU ĐIỂM CÁC CÂU HỎI CỦA THÍ SINH</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong> 3. TẤT CẢDỮ LIỆU CHI TIẾT BÀI THI.</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnxoa" id="btnxoa" value=" XÓA " style="color:#F00; font-size:18px" onclick="return kiemtra();"   />
      <input type="button" name="btnthoat" id="btnthoat" value="Thoát" style="color:blue; font-size:18px" onclick="javascript: window.location='logout.php'" /></td>
  </tr>
</table>
</center>

</form>
<?php
include_once("Top/connect.php");
if(isset($_POST['btnxoa']))
{

//delete all baithithissinh
mysql_query("delete from baithithisinh");
//delete all diem_cau
mysql_query("delete from diem_cau");
//delete all chitiet_baithi
mysql_query("delete from chitiet_baithi");

echo "<h1 align=center>DỮ LIỆU ĐÃ XÓA....</h1>";
}

?>

</body>
</html>