<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Tao Cau Truc</title>
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

   
</head>

<body>
<?php
include_once("connect.php");
include_once("function.php");
?>

<?php
//$ma="";
if($_GET['macttemp'])
{
$ma=$_GET['macttemp'];

   // kiem tra dethi da co ts thi;
	   if( kiemtra_xoacautruc($ma)){
		echo "<p><font color=red>KHÔNG THỂ SỬA ĐƯỢC CẤU TRÚC '". $ma ."'<br>CẤU TRÚC NÀY NẰM TRONG ĐỀ THI ĐÃ CÓ THÍ SINH THI!.</font></p><a href='themcautruc.php'> QUAY LẠI</a>";
				
		exit;
	}

//truy van tim sv
$qrsua=mysql_query("select * from cautrucde where macautrucde='$ma'");
$kqsua=mysql_fetch_array($qrsua);
$scbd=$kqsua['socau'];
$diembd=$kqsua['diemcautruc'];
//$mdcu=$kqsua['madethi'];
//$mncu=$kqsua['manhom'];
}

?>
<form action="" method="post" name="frmcautrucde">

<table width="819" border="0" class="tableform">
  <tr>
    <td width="149">&nbsp;</td>
    <td width="511"><h2><font color="#0066FF">CẬP NHẬT CẤU TRÚC ĐỀ THI</font></h2></td>
    </tr>
  <tr>
    <td><b>Mã cấu trúc:</b></td>
    <td><label for="txtmact"></label>
      <input type="text" name="txtmact" id="txtmact" readonly="readonly" value="<?php echo $ma   ?>" /></td>
    </tr>
  <tr>
    <td><b>Tên cấu trúc:</b></td>
    <td>
      <input type="text" name="txttenct" id="txttenct" size="40" class="textb" value="<?php echo $kqsua['tencautruc'] ?>" /></td>
    </tr>
  <tr>
    <td><b>Đề thi:</b></td>
    <td><select name="cbodethi" id="cbodethi">
      <?php
	 $magv= $_SESSION['magv'];
	$qrdethi=mysql_query("select * from dethi where magv='$magv' order by madethi desc");
while($kqdethi=mysql_fetch_array($qrdethi))
	{
	?>
      <option value=<?php echo $kqdethi['madethi'] ?> <?php if($kqsua['madethi'] ==$kqdethi[0]) echo "selected" ?>> <?php echo $kqdethi['mamon']."---".$kqdethi['tendethi'] ?></option>
      <?php
	}
	?>
      </select></td>
  </tr>
  <tr>
    <td><b>Thuộc nhóm câu:</b></td>
    <td>
      
      <select name="cbonhom" id="cbonhom">
        <?php
$qrnhom=mysql_query("select * from nhom  order by mamon asc");

while($kqnhom=mysql_fetch_array($qrnhom))
{
?>
        <option value= "<?php echo $kqnhom[0];?>" <?php if($kqsua['manhom'] ==$kqnhom[0]) echo "selected" ?>><?php echo $kqnhom[1] ?></option>
        <?php
}
?>
        </select>
      
      </td>
  </tr>
  <tr>
    <td><b>Tổng số câu:</b></td>
    <td><input type="text" name="txtsocau" id="txtsocau" size="2" class="textb" value="<?php echo $scbd ?>" /></td>
    </tr>
  <tr>
    <td><b>Tổng điểm:</b></td>
    <td><input type="text" name="txtdiemcautruc" id="txtdiemcautruc" size="2" class="textb" value="<?php echo $diembd ?>"  /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td >&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<input type="submit" value="Cập nhật" class="command_edit" name="btncapnhat"/>
      <input name="btnhuy" id="btnhuy" type="button" value="Quay lại" class="command_back" onclick="javascript:window.location='themcautruc.php'" /></td>
    </tr>
</table>
</form>
<?php
if(isset($_POST['btncapnhat']))
{
	//nhan lai bien
	//$mct=$_POST['txtmact'];
	$tct=$_POST['txttenct'];
	$mdethi=$_POST['cbodethi'];
	$mn=$_POST['cbonhom'];

	$sc=$_POST['txtsocau'];
	//$sc=$sc-$scbd;
	$diemct=$_POST['txtdiemcautruc'];
   // $diemct=$diemct-$diembd;
	/*echo $mct."<br>";
	echo $tct."<br>";
	echo $mdethi."<br>";
	echo $mn."<br>";
	echo $mm."<br>";
	echo $sc."<br>";*/
		//echo $sc."<br>";
			//echo $diemct."<br>";
//kiem tra du lieu rong
	if($sc=='' or $diemct=='' or $tct=='')	{
		echo "<font size=4 color=red>Lỗi:Bạn chưa nhập đủ dữ liệu!.</font>";
	exit;
	}
	//kiem so cau la so
	if(!is_numeric($sc) or $sc<0 or !is_numeric($diemct) or $diemct<0  ){
	echo "<font size=4 color=red>Lỗi:Số câu,hoặc điểm không phải là kiểu số!.</font>";
		exit;
	}
	//kiem tra sum(socau)=tong_so_cau hop le
	if(kiemtra_socau_dethi($mdethi,$sc-$scbd)<=0){
		
	echo "<font size=4 color=red>Lỗi: Tổng các câu  trong cấu trúc <= Tổng số câu trong đề thi!.</font>";
		exit;
		
	}
	//kiem tra sum(diemcautruc)=thang diem hop le
	if(kiemtra_thangdiem_dethi($mdethi,$diemct-$diembd)<=0){
		
	echo "<font size=4 color=red>Lỗi: Tổng các điểm  trong cấu trúc <= Thang điểm trong đề thi!.</font>";
		exit;
		
	}
	
	
	//kiem tra Dethi va nhom ton tai roi trong cau truc
	/*if(nhom_dethi_tontai_sua($mdethi,$mn)>1){
		
	echo "<font size=4 color=red>Lỗi: Đề '". get_a_field('madethi',$mdethi,'dethi','1')."' và Nhóm '".get_a_field('manhom',$mn,'nhom','1')."' đã tồn tại rồi!.</font>";
		exit;
		
	}*/
		
	//cap nhat cau truc	
	$qrupdate=mysql_query("update cautrucde set tencautruc='$tct',madethi='$mdethi',manhom='$mn',socau='$sc',diemcautruc='$diemct' where macautrucde='$ma'");

if($qrupdate)
 {
 
?>
<script>
alert("Đã cập nhật dữ liệu hoàn tất");
window.location='themcautruc.php';
</script>
<?php
 }
}
?>  


</body>
</html>