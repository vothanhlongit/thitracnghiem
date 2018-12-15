<?php
session_start();
if(!isset($_SESSION['magv']))
{

header("location:../index.php");

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Chon Danh sach cau hoi</title>
<style type="text/css">
a{
 text-decoration:none;
 font-size:16px;	
 color:#00F;
size:14px;
}
</style>

<script type="text/javascript" src="../SoanCauHoi/jquery/jquery-1.3.2.min.js"></script>

<script type="text/javascript">

function closeopen()
{
	window.close();
}
	
function removeNewline(str){
str = str.replace("\r", "");
str = str.replace("\n", "");
return str;
	}
</script>
</head>

<body>
<?php
include_once("connect.php");
include_once("function.php");
?>

<form action="" method="post" name="frmdanhsach" >
<table width="1031" height="40" border="0">
  <tr>
    <td width="98" height="36"><b>Chọn loại:</b></td>
   
    <td width="923"><select name="cboloai" id="cboloai" onchange="document.frmdanhsach.submit();">
	<option value="0">--Chọn loại--</option>
	<?php 	$qrloai=mysql_query("select * from loai");
	if(isset($_POST['cboloai']))
	$ml1=$_POST['cboloai'];
	else
	$ml1=1;
	while($kqloai=mysql_fetch_array($qrloai)){ ?><option value= "<?php echo $kqloai[0];?>" <?php if($kqloai[0]==$ml1) echo "selected"; ?>><?php echo $kqloai[1] ?></option><?php } ?>
	 </select>
      <input type="submit" name="btnxem" id="btnxem" value="Xem" class="command_action"  /></td>
  </tr>

</table>
  

 <hr color="#0000FF" />
 
 <?php
 $mact=$_SESSION['mact'];
  if(isset($_SESSION['nhom'])&& isset($_SESSION['made'] ))
  {
	$mn=$_SESSION['nhom']; 	
    $ml="1";
	$mact=$_SESSION['mact'];
  }
  
  
// echo $_SESSION['nhom'];
if(isset($_POST['cboloai'])||isset($_POST['btnxem']))
{
$ml=$_POST['cboloai'];

}
elseif(isset($_GET['loai']))
{

 $ml=$_GET['loai'];
//$mn=$_SESSION['nhom'];
}
else //chua post or get
{

 $ml="1";
//$mn="";
}


//PHAN TRANG	
$somautin_moitrang=10;
//tong so mau tin
$qrtong=mysql_query("select * from cauhoi where   maloai='$ml' and manhom='$mn'");
$tong=mysql_num_rows($qrtong);
//so trang can co la
//echo $tong;
$sotrang=$tong/$somautin_moitrang;

//khoi tao vitri
if(empty($_GET['vt']))
  {$vt=0;
 // $vt1=0;
	}
 else
 {
 $vt=$_GET['vt'];

  }
  
 //khoi tao kien ket
 if(empty($link))
   $link="danhsachcauhoi.php";
   ?>
Trang &nbsp;<?php
	 //phan trang
  for($i=0;$i<$sotrang;$i++)
	    {

	  if ($i==$vt/$somautin_moitrang){
       echo "<a href = '$link?vt=".$i*$somautin_moitrang."&loai=".$ml."&mn=".$mn."'><font color='red' > <strong> $i</strong></font></a>";
       echo"  ";
     }
 else{
   echo "<a href = '$link?vt=".$i*$somautin_moitrang."&loai=".$ml."&mn=".$mn."'>$i</a>";
   echo"  ";
       }	  
	  
	}
?>
của tổng số câu:
<?php
echo "<font size=5 color=blue>".$tong."</font>";
//chua co cau hoi of loai
if($tong==0)
{
echo "<br><font color=red size=+1>KHO CÂU HỎI CHƯA CÓ LOẠI CÂU HỎI NÀY!.BẠN HÃY<a href='../SoanCauHoi/chonloaicauhoi.php'> SOẠN CÂU HỎI.</a></font><input type='button' value=' Đóng ' name='btndong'  id='btndong' onclick='closeopen()' size='20'  />";
exit;	
}

?>
<?php

$stt=0;


//echo $mm."<br>";
//echo $loai."<br>";


if($ml=='1')	//trac nghiem
{
	echo "<br>";
$qrcau=mysql_query("select * from cauhoi where  maloai='1' and manhom='$mn' order by round(mid(macau,instr(macau,'-')+1,5),0) asc limit $vt,$somautin_moitrang");
	 
$stt=0;	
while($kqcau=mysql_fetch_array($qrcau))
{
	$macau=$kqcau['macau'];

$qrtraloi=mysql_query("Select * from traloi_tn where macau='$macau' order by right(matraloi_tn,1) ");
	
	
?>



<table width="1019" border="1">
  <tr>
    <td width="36"><input type="checkbox" value="<?php echo $kqcau['macau']?>" name="case[]" id="case[]" class="case"/></td>
    <td width="184"><font color="#CC0000">Câu: &nbsp;<?php  echo ++$stt;  ?></font><br /><?php echo $kqcau['macau'] ?>
    </td>
    <td width="777"><b><font color="#0066FF"><?php echo $kqcau['tieude']   ?></font></b><br />
      <?php echo $kqcau['mota']; ?>
    </td>
    </tr>
<?php
$tt="A";
while($kqtl=mysql_fetch_array($qrtraloi))
	{

?>
 
  <tr>
    <td >&nbsp;</td>
    <td><input type="radio" <?php if($kqtl['dapan']==1) echo "checked";  ?>  disabled="disabled"  />
      <label for="rad"><?php echo $tt++ ?></label></td>
    <td><?php echo $kqtl['traloi']  ?></td>
    </tr>
    <?php
      } //while 2
	?>
</table>
<?php
 }//while 1
}//if
elseif($ml=='2')//tu luan
{
	echo "<br>";
$qrcau=mysql_query("select * from cauhoi where  maloai='2' and manhom='$mn' order by round(mid(macau,instr(macau,'-')+1,5),0) asc limit $vt,$somautin_moitrang");
	 
$stt=0;	
while($kqcau=mysql_fetch_array($qrcau))
{
	$macau=$kqcau['macau'];

$qrtraloi=mysql_query("Select * from traloi_tl where macau='$macau' ");

while($kqcautl=mysql_fetch_array($qrtraloi))
{
?>
<table width="1025" border="1">
  <tr>
    <td width="39"><input type="checkbox" value="<?php  echo $macau ?>" name="case[]" id="case[]" class="case"/></td>
    <td width="186"><font color="#CC0000">Câu:
        <?php  echo ++$stt;  ?>
    </font><br /><?php echo $kqcautl['matraloi_tl'] ?></td>
    <td width="778"><b><font color="#0066FF"><?php echo $kqcau['tieude']   ?></font></b><br />
      <?php echo $kqcau['mota']; ?></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><font color="#FF0000">Trả lời:</font></td>
    <td><?php echo $kqcautl['traloi']; ?></td>
    </tr>
</table>


<?php
}//while 1
}//while 2
}//if tu luan
elseif($ml=='3')//nhieu trac nghiem
{
	echo "<br><br>";
$qrcau=mysql_query("select * from cauhoi where maloai='3' and manhom='$mn' order by round(mid(macau,instr(macau,'-')+1,5),0) asc limit $vt,$somautin_moitrang");
	 
$stt=0;	

while($kqcau=mysql_fetch_array($qrcau))
{
	$macau=$kqcau['macau'];
	echo "<b><font color='red'> Câu: ".++$stt."</font></b><br>";
	echo "<b>Mã Câu:</b> ".$macau;
	?>
 <input type="checkbox" value="<?php    echo $macau ?>" name="case[]" id="case[]" class="case"/>   
	
<br />
	<?php
	echo "<b>Tiêu đề:</b> ".$kqcau['tieude']."<br>";
	echo "<b>Mô tả:</b><br><div> ".$kqcau['mota']."</div><br>";
	$stt2=0;	
    $qrtraloi_mt=mysql_query("Select * from traloi_ntn where macau='$macau' ");

    while($kqcau_mt=mysql_fetch_array($qrtraloi_mt)){	
	
	 $macau_mt=$kqcau_mt['matraloi_ntn'];
	 $qrtraloi_mt_sub=mysql_query("Select * from traloi_ntn_sub where matraloi_ntn='$macau_mt' order by right(matraloi_ntn_sub,1) asc ");
	 
	
?>

<table width="1027" border="1">
  <tr>
    <td width="99"><font color="#009999">Câu:
        <?php  echo $stt.'.'.++$stt2;  ?>
    </font><br /><?php echo $macau_mt ?></td>
    <td width="912"><b><font color="#0066FF"><?php echo $kqcau_mt['noidung']   ?></font></b><br /></td>
    </tr>
  <?php
     $tt2="A";
   while($kqcau_mt_sub=mysql_fetch_array($qrtraloi_mt_sub)){
  ?>
  <tr>
    <td><input type="radio" <?php if($kqcau_mt_sub['dapan']==1) echo "checked";  ?>  disabled="disabled"  />
      <?php echo $tt2++ ?></td>
    <td><?php echo $kqcau_mt_sub['traloi']  ?></td>
    </tr>
  <?php
   }
  ?>
</table>
<br />

<?php
	  
	} // while 2
} //while 1
}//if n trac nghiem
?>
<hr color="#0000FF" />
<table width="551" border="0">
  <tr>
    <td width="131"><input type="checkbox"  name="selectall" id="selectall"/>
Select all</td>
    <td width="263"><input type="submit" value="Thêm vào Đề thi" class="command_save" name="btnthem"  id="btnthem"  /></td>
    <td width="143"><input type="button" value="Đóng" class="command_close" name="btndong"  id="btndong" onclick="closeopen()"   /></td>
    </tr>
</table>

</form>
<SCRIPT language="javascript">
$(function(){

// add multiple select / deselect functionality
$("#selectall").click(function () {
$('.case').attr('checked', this.checked);
});

// if all checkbox are selected, check the selectall checkbox
// and viceversa
$(".case").click(function(){

if($(".case").length == $(".case:checked").length) {
$("#selectall").attr("checked", "checked");
} else {
$("#selectall").removeAttr("checked");
}

});
});


</SCRIPT>

<?php
if(isset($_POST['btnthem']))
{
	

//khong chon cau nao
if(!isset($_POST['case']))
  {
	echo "<font color=red size=+1>Lỗi: BẠN CHƯA CHỌN CÂU HỎI!.</font>";  
	exit;
  }

$mcau=$_POST['case'];
$socau=get_a_field('macautrucde',$mact,'cautrucde','4');
echo $socau;
if(is_array($mcau))
  {
  
   while(list($khoa,$gt)=each($mcau))
     {
          $ma=$gt;
		  echo $ma."\t;";
		  //chon hoai cauhoi-macatruc
$qrtrung=mysql_query("select * from chitiet_cauhoi_cautruc where macautrucde='$mact' and macau='$ma'");

$dem=mysql_num_rows($qrtrung);
//echo $dem;
if($dem > 0){
echo "<br><font color=red size=+1>Lỗi:CÓ $dem CÂU HỎI CHỌN ĐÃ BỊ TRÙNG LẤP</font><br>";
continue;
}	
elseif($dem <= 0)		  
	{
	//kiem tra sum(chiteit_cautruc_cauhoi.macau)=cautruc.cocau)
	
	if($socau == kiemtrasocau($mact)){
	echo "<br><font color=red size=+1>Lỗi:TỔNG SỐ CÂU TRONG CHI TIẾT-CẤU TRÚC <= SỐ CÂU TRONG CẤU TRÚC </font><br>";
	exit;
	}
	else
	$qrinsert=mysql_query("insert into chitiet_cauhoi_cautruc values('$mact','$ma')");
	}//else if
	  } //while
  
  } //if aray
?>
<script type="text/javascript">

window.opener.location.reload();
//window.location.href=window.opener.location;
window.location.href;
</script>

<?php
} //btn them

?>



</body>
</html>