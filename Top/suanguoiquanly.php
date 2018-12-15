<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cap Nhat Giao Vien</title>
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.textb{
	
	color:#000000;
	height:15pt;
	font-size:16px;
	background-color:#FFFFCC;
	border-color:#9966CC;
	
	}
	

a{
 /*text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}
</style>

</head><?php
include_once("connect.php");
include_once("function.php");
?>
<?php
//$ma="";
if($_GET['magvtemp'])
{
$ma=$_GET['magvtemp'];
	   if( kiemtra_xoanguoiquanly($ma)){
		echo "<p><font color=red>KHÔNG THỂ XÓA ĐƯỢC GIÁO VIÊN '". $ma ."'<br>GIÁO VIÊN NÀY ĐÃ CÓ RA ĐỀ THI!.</font></p><a href='nguoiquanly.php'> QUAY LẠI</a>";
				
		exit;
	}

//truy van tim gv
$qrsua=mysql_query("select * from nguoiquanly where tendangnhap='$ma'");
$kqsua=mysql_fetch_array($qrsua);
}
?>


<body>
<form action="" method="post" name="frmgv">
	   <table width="597" height="89" border="0" class="tableform" >

        <tr>
          <td align="left">&nbsp;</td>
          <td width="455"><h2><font color="#0066FF">CẬP NHẬT NGƯỜI QUẢN LÝ</font></h2></td>
         </tr>
        <tr>
          <td width="128" align="left"><strong>Tên đăng nhập: </strong></td>
          <td align="left"><input type="text" name="txtmagv" id="txtmagv" maxlength="20" size="15" readonly="readonly" value="<?php echo $ma ?>"/></td>
          </tr>
        <tr>
          <td align="left"><strong>Họ tên: </strong></td>
          <td align="left"><input type="text" name="txttengv" id="txttengv"  size="30" class="textb" value="<?php echo $kqsua['hoten'] ?>" /></td>
          </tr>
        <tr>
          <td><strong>Mật mã: </strong></td>
          <td><input type="password" name="txtpass" id="txtpass"  size="30" class="textb" value="<?php echo "123" ?>" /></td>
         </tr>
        <tr>
          <td>Vai trò:</td>
          <td><select name="cbovaitro">
            <option value="giaovien" <?php if($kqsua['vaitro'] =='giaovien') echo "selected" ?>>Giáo viên</option>
            <option value="giamthi"  <?php if($kqsua['vaitro'] =='giamthi') echo "selected" ?>>Giám thị</option>
            <option value="quantri"  <?php if($kqsua['vaitro'] =='quantri') echo "selected" ?>>Quản trị</option>
          </select></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input type="submit" value="Cập nhật" name="btncapnhat" class="command_edit"/>
          </font></a>
          <input name="btnhuy" id="btnhuy" type="button" value="Quay lại" class="command_back" onclick="javascript:window.location='nguoiquanly.php'" /></td>
        </tr>
      </table>
</form> 
<?php
//nhan vao nut cap naht
if(isset($_POST['btncapnhat']))
{

//nhan lai bien
//	$mgv=$_POST['txtmagv'];	
	$ten=$_POST['txttengv'];
	$pass=md5($_POST['txtpass']);
    $vtro=$_POST['cbovaitro'];

//kiem tra du lieu rong
	if($ten=='' || $pass=='' ){
		echo "<font size=4 color=red>Lỗi:Bạn chưa nhập đủ dữ liệu!.</font>";
	exit;
	}		
$qrupdate=mysql_query("update nguoiquanly set hoten='$ten', matkhau='$pass', vaitro='$vtro'  where tendangnhap='$ma'");


if($qrupdate)
 {
 

?>
<script>
alert("Đã cập nhật dữ liệu hoàn tất");
window.location='nguoiquanly.php';
</script>
<?php
 }
}
?>  
</body>
</html>