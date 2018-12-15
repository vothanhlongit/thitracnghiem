<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Sua De Thi</title>
<style type="text/css">
.textb{
	
	color:#000000;
	height:15pt;
	font-size:16px;
	background-color:#FFFFCC;
	border-color:#9966CC;
	
	}
	</style>
</head>
<?php
include_once("connect.php");
include_once("function.php");
?>
<body>
<?php
//nhan lai bien
//kiem tra cau dda cho thi
$mdx=$_GET['mdsua'];

	if( kiemtra_xoadethi($mdx)){
		echo "<p><font color=red>KHÔNG THỂ SỬA ĐƯỢC ĐỀ THI '". $mdx ."'<br>ĐỀ THI NÀY ĐÃ CÓ THÍ SINH THI!.</font></p><a href='themdethi.php'> QUAY LẠI</a>";
				
		exit;
	}

if(isset($_GET['mdsua'])){
	$md=$_GET['mdsua'];
	//echo  $md;
$qrloc=mysql_query("select * from dethi where madethi='$md'");	
$kqloc=mysql_fetch_array($qrloc);
?>
<form action="" method="post" name="frmsuadethi">
<table width="662" border="0" class="tableform">
  <tr>
    <td width="136">&nbsp;</td>
    <td width="512"><h2><font color="#0066FF">CẬP NHẬT ĐỀ THI</font></h2></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><b>Tên đề thi:</b></td>
    <td><input type="text" name="txttenkythi" id="txttenkythi" size="40" class="textb" value="<?php echo $kqloc['tendethi']?>" /></td>
  </tr>
  <tr>
    <td><b>Môn thi:</b></td>
    <td><select name='cbomon' id="cbomon" >
     
      <?php
$qrmon=mysql_query("select * from monthi");

while($kqmon=mysql_fetch_array($qrmon))
{
?>
      <option value= "<?php echo $kqmon[0];?>" <?php if($kqloc['mamon']==$kqmon[0]) echo "selected" ?>><?php echo $kqmon[1] ?></option>
      <?php
}
?>
    </select></td>
  </tr>
  <tr>
    <td><b>Ngạch:</b></td>
    <td><select name='cbongach' id="cbongach" >
      <?php
$qrngach=mysql_query("select * from ngach");

while($kqngach=mysql_fetch_array($qrngach))
{
?>
      <option value= "<?php echo $kqngach[0];?>" <?php if($kqloc['mangach']==$kqngach[0]) echo "selected" ?>><?php echo $kqngach[1] ?></option>
      <?php
}
?>
    </select></td>
  </tr>
  <tr>
    <td>Kỳ thi:</td>
    <td><select name='cbokythi' id="cbokythi" >
      <?php
$qrkt=mysql_query("select * from kythi");

while($kqkt=mysql_fetch_array($qrkt))
{
?>
      <option value= "<?php echo $kqkt[0];?>" <?php if($kqloc['makythi']==$kqkt[0]) echo "selected" ?>><?php echo $kqkt[1] ?></option>
      <?php
}
?>
    </select></td>
  </tr>
  <tr>
    <td><b>Thời gian(phút):</b></td>
    <td><input type="text" name="txtthoigian" id="txtthoigian" size="2" class="textb" value="<?php echo $kqloc['thoigian']?>"  /></td>
  </tr>
  <tr>
    <td><b>Mật mã cũ:</b></td>
    <td><input type="text" name="txtmatma" id="txtmatma" size="10" class="textb" value="<?php  echo decryptIt( $kqloc['matmamode'])?>" readonly="readonly" /></td>
  </tr>
  <tr>
    <td><b>Mật mã mới:</b></td>
    <td><input type="text" name="txtmatma2" id="txtmatma2" size="10" class="textb" value="<?php echo decryptIt($kqloc['matmamode'])?>"  /></td>
  </tr>
  <tr>
    <td><b>Tổng số câu:</b></td>
    <td><input type="text" name="txttongsocau" id="txttongsocau" size="2" class="textb" value="<?php echo $kqloc['tongsocau']?>"  /></td>
  </tr>
  <tr>
    <td><b>Thang điểm:</b></td>
    <td><input type="text" name="txtthangdiem" id="txtthangdiem" size="2" class="textb" value="<?php echo $kqloc['thangdiem']?>"   /></td>
  </tr>
  <tr>
    <td><b>Trạng thái:</b></td>
    <td><select name='cbotrangthai' id="cbotrangthai" >
      <option value="1" <?php if($kqloc['trangthai']==1) echo "selected" ?>>Hiển thị</option>
      <option value="0" <?php if($kqloc['trangthai']==0) echo "selected" ?>>Ẩn</option>
    </select></td>
  </tr>
  <tr>
    <td><b>Ghi chú:</b></td>
    <td><input type="text" name="txtghichu" id="txtghichu" size="50" class="textb" value="<?php echo $kqloc['ghichu']?>" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btncapnhat" id="btncapnhat" type="submit" value="Cập nhật" class="command_edit" />
      <input type="button" name="btnhuy" id="btnhuy" value="Quay lại" class="command_back" onclick="javascript:window.location='themdethi.php'"/></td>
  </tr>
</table>
</form>
<?php
}

if(isset($_POST['btncapnhat']))
{
	
	$tenkt=$_POST['txttenkythi'];
	$mm=$_POST['cbomon'];
	$mng=$_POST['cbongach'];
	$tgian=$_POST['txtthoigian'];
	$pass=$_POST['txtmatma'];
	$tongsc1=$_POST['txttongsocau'];
	$trthai=$_POST['cbotrangthai'];
	$mkt=$_POST['cbokythi'];
	$ghichu=$_POST['txtghichu'];
	//$pass2=md5($_POST['txtmatma2']);
	$pass2=encryptIt($_POST['txtmatma2']);
	$tdiem=$_POST['txtthangdiem'];
	/*echo $md."<br>";
	echo $tenkt."<br>";
    echo $mm."<br>";
	echo $mng."<br>";
	echo $tgian."<br>";
	echo $pass."<br>";
	echo $pass2."<br>";
	echo $tongsc1."<br>";
	echo $trthai."<br>";
	echo $ghichu."<br>";
	echo $tdiem."<br>";*/
//kiem tra du lieu rong
	if($tenkt=='' or $tgian=='' or $pass2=='' or $tongsc1=='' )	{
		echo "<font size=4 color=red>Lỗi:Bạn chưa Nhập đủ thông tin!.</font>";
	exit;
	}
	//kiem thoi gian la so >
	if(!is_numeric($tgian) or $tgian < 1 ){
	echo "<font size=4 color=red>Lỗi:Thời gian phải là kiểu số và > 0!.</font>";
	exit;
	}
		//kiem so cau la so >
	if(!is_numeric($tongsc1) or $tongsc1 < 1 ){
	echo "<font size=4 color=red>Lỗi: Tống số câu phải là kiểu số và > 0!.</font>";
		exit;
	}
	
		//kiem thang diem la so >
	if(!is_numeric($tdiem) or $tdiem < 1 ){
	echo "<font size=4 color=red>Lỗi: Thang điểm là số >0!.</font>";
		exit;
	}

	//luu dethi	
	$qrdethi=mysql_query("update dethi set tendethi='$tenkt',thoigian='$tgian',mangach='$mng',mamon='$mm',matmamode='$pass2',ghichu='$ghichu',trangthai='$trthai',tongsocau ='$tongsc1', thangdiem ='$tdiem' ,makythi ='$mkt' where madethi='$md'");


?>
<script type="text/javascript">

window.location='themdethi.php';
</script>
<?php
}
?>




</body>
</html>