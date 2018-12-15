<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Sinh Cau Ngau Nhien</title>
<style type="text/css">
a{
/* text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}
</style>
</head>
<?php
include_once("connect.php");
include_once("function.php");
?>

<body>
<h2><font color="#0066FF">SINH CÂU HỎI NGẪU NHIÊN</font></h2>
<?php
//khoi tao
$mact="";	
$manhom="";
$socau="";
$made="";

//$maloai=1;
//nhan lai bien 2 
if(isset($_GET['mact'])&&isset($_GET['manhom'])&&isset($_GET['made']))
{

$mact=$_GET['mact'];	
$manhom=$_GET['manhom'];
$socau=$_GET['socau'];
$made=$_GET['made'];

   // kiem tra dethi da co ts thi;
	   if( kiemtra_xoacautruc($mact)){
		echo "<p><font color=red>KHÔNG THỂ SỬA ĐƯỢC CẤU TRÚC '". $mact ."'<br>CẤU TRÚC NÀY NẰM TRONG ĐỀ THI ĐÃ CÓ THÍ SINH THI!.</font></p><a href='xemcautrucdethi2.php'> QUAY LẠI</a>";
				
		exit;
	}


//echo $mact."<br>$manhom<br>$socau";
echo "-Kỳ thi: <font color=blue size=+2>$made; ".get_a_field('madethi',$made,'dethi','1')."</font><br>";
echo "-Phần:<font color=blue size=+2> ".get_a_field('macautrucde',$mact,'cautrucde','1')."</font><br>";
echo "-Nhóm câu:<font color=blue> ".get_a_field('manhom',$manhom,'nhom','1')."</font><br>";
echo "-Số câu:<font color=blue> $socau</font><br>";
}
//kiem tra chua co cau hoi
//tong so mau tin
$qrtong=mysql_query("select * from cauhoi where    manhom='$manhom'");
$tong=mysql_num_rows($qrtong);
if($tong==0)
{
	$err=1;
echo "<br><font color=red size=+1>KHO CÂU HỎI CHƯA CÓ LOẠI CÂU HỎI NÀY!.BẠN HÃY<a href='../SoanCauHoi/chonloaicauhoi.php'> SOẠN CÂU HỎI.</a></font><input type='button' value='Trở lại' name='btndong'  id='btndong' onclick=javascript:window.location='themcautruc.php' size='20'  />";
exit;	
}

?>



<form action="" method="post" name="frmngaunhien">
<table width="859" border="0">
  <tr>
    <td width="104"><strong>Loại câu hỏi:</strong></td>
    <td width="745"><select name="cboloai" id="cboloai" >
      <?php 	$qrloai=mysql_query("select * from loai order by maloai asc");
	
	while($kqloai=mysql_fetch_array($qrloai)){ ?>
      <option value= "<?php echo $kqloai[0];?>" ><?php echo $kqloai[1] ?></option>
      <?php } ?>
    </select> &nbsp; &nbsp;<input name="btnngaunhien" type="submit" class="command_action" value="Tạo(ngẫu nhiên)" />&nbsp; &nbsp;
    <input name="btnthemct" id="btnthemct" type="button" value="Trở lại" class="command_back" onclick="javascript:window.location='xemcautrucdethi_xem.php'" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
<?php
if(isset($_POST['btnngaunhien'])&& $manhom  )
{
	$maloai=$_POST['cboloai'];
//echo $mact."<br>$manhom<br>$socau<br>$maloai";	
//xoa cac cau trong chitiet_cautruc da tao truoc
 $xoachitiet=mysql_query("delete  from chitiet_cauhoi_cautruc where macautrucde='$mact'");
//insert random
	 insert_random_cauhoi($mact,$manhom,$socau,$maloai);
?>
<script type="text/javascript">
alert("Đã tạo xong câu hỏi ngẫu nhiên");
window.location='xemcautrucdethi_xem.php';
</script>
<?php	
} //if post
?>
</body>
</html>