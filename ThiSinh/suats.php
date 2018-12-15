<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />

<title>Cap Nhat Thi Sinh</title>
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
//include_once("function.php");
?>
<?php
//$ma="";
if($_GET['matstemp'])
{
$ma=$_GET['matstemp'];

//truy van tim sv
$qrsua=mysql_query("select * from thisinh where mats='$ma'");
$kqsua=mysql_fetch_array($qrsua);
}
?>


<body>
<form action="" method="post" name="frmthisinh" >
  <table width="881" height="89" border="0" class="tableform" >
  <tr>
    <td align="left">&nbsp;</td>
    <td width="148">&nbsp;</td>
    <td width="535"><h2><font color="#0066FF">CẬP NHẬT THÍ SINH</font></h2></td>
  </tr>
  <tr>
    <td width="180" rowspan="6" align="left"><?php if($kqsua['hinh']!='')
 $h= '<img src=../HINH_THISINH/'.$kqsua['hinh'].' width=100 height=150  />'; 
 else 
 $h='<img src=../css/img/noimage.png />'; 
 echo $h;
 
  ?>
 
 </td>
    <td align="left"><strong>Mã thí sinh: </strong></td>
    <td align="left"><input type="text" name="txtmats" id="txtmats" maxlength="20" size="15" readonly="readonly" value="<?php echo $ma ?>"/></td>
    </tr>
  <tr>
    <td align="left"><strong>Họ và Tên : </strong></td>
    <td align="left"><input type="text" name="txthotents" id="txthotents"  size="30" class="textb" value="<?php echo $kqsua['hoten'] ?>" /></td>
    </tr>
  <tr>
    <td align="left"><strong>Giới tính: </strong></td>
    <td align="left"><select name="cbogioitinh"  id="cbogioitinh">
      <option value="Nam"<?php if($kqsua['gioitinh'] =='Nam') echo "selected" ?> >Nam</option>
      <option value="Nữ" <?php if($kqsua['gioitinh'] =='Nữ') echo "selected" ?> >Nữ</option>
      </select>
      , Tên File hình: 
      <input type="text" name="txthinh" id="txthinh"  size="20" class="textb" value="<?php echo $kqsua['hinh'] ?>"   /></td>
    </tr>
  <tr>
    <td align="left"><strong>Ngày sinh: </strong></td>
    <td align="left"><input type="text" name="txtngaysinh" id="txtngaysinh"  maxlength="10" size="10" class="textb" value="<?php echo $kqsua['ngaysinh'] ?>"  />
      (dd/mm/yyyy)</td>
    </tr>
  <tr>
    <td align="left"><strong>Quê quán: </strong></td>
    <td align="left"><input type="text" name="txtquequan" id="txtquequan"  size="50"class="textb" value="<?php echo $kqsua['quequan'] ?>"   /></td>
    </tr>
  <tr>
    <td><strong>Password</strong>:</td>
    <td><input type="password" name="txtpass" id="txtpass" maxlength="15" size="10" class="textb" value="<?php echo $kqsua['password'] ?>" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Thuộc lớp:</strong></td>
    <td><select name='cbodonvi' id="cbodonvi" >
      <?php
$qrdv=mysql_query("select * from donvi");

while($kqdv=mysql_fetch_array($qrdv))
{
?>
      <option value= "<?php echo $kqdv[0];?>" <?php if($kqsua['madonvi'] ==$kqdv[0]) echo "selected" ?>><?php echo $kqdv[1] ?></option>
        <?php
}
?>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Kỳ thi :</td>
    <td><select name='cbokythi' id="cbokythi" >
      <?php
$qrkthi=mysql_query("select * from kythi");

while($kqkthi=mysql_fetch_array($qrkthi))
{
?>
      <option value= "<?php echo $kqkthi[0];?>" <?php if($kqsua['madonvi'] ==$kqkthi[0]) echo "selected" ?>><?php echo $kqkthi[1] ?></option>
      <?php
}
?>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><strong>Ngạch dự thi:</strong></td>
    <td><select name='cbongach' id="cbongach" >
      <?php
$qrngach=mysql_query("select * from ngach");

while($kqngach=mysql_fetch_array($qrngach))
{
?>
      <option value= "<?php echo $kqngach[0];?>" <?php if($kqsua['mangach'] ==$kqngach[0]) echo "selected" ?>><?php echo $kqngach[1] ?></option>
      <?php
}
?>
    </select></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" value="Cập nhật" name="btncapnhat" class="command_edit"/>
      <input name="btnhuy" id="btnhuy" type="button" value="Quay lại" class="command_back" onclick="javascript:window.location='thisinh.php'" /></td>
    </tr>
  </table>
</form> 
<?php
//nhan vao nut cap naht
if(isset($_POST['btncapnhat']))
{

//nhan lai bien
	//$mts=$_POST['txtmats'];
	$ht=$_POST['txthotents'];
	$gt=$_POST['cbogioitinh'];
	$ngay=$_POST['txtngaysinh'];
	$qq=$_POST['txtquequan'];
	$pass=$_POST['txtpass'];
	$hinh=$_POST['txthinh'];
	$mdv=$_POST['cbodonvi'];
	$kthi=$_POST['cbokythi'];
	$mngach=$_POST['cbongach'];
//echo $mn."<br>".$tn."<br>".$mm;
//kiem tra du lieu rong
	if($ht=='' or $ngay==''or $pass=='' or $kthi=='' ){
		echo "<font size=4 color=red>Lỗi:Bạn chưa nhập đủ dữ liệu!.</font>";
	exit;
	}		
$qrupdate=mysql_query("update thisinh set hoten='$ht',password='$pass',ngaysinh='$ngay',gioitinh='$gt',quequan='$qq',madonvi= '$mdv',makythi='$kthi',mangach = '$mngach',hinh='$hinh' where mats='$ma'");


if($qrupdate)
 {
 

?>
<script>
alert("Đã cập nhật dữ liệu hoàn tất");
window.location='thisinh.php';
</script>
<?php
 }
}
?>  
</body>
</html>