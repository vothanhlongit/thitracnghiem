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
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../main.css" type="text/css">
<title>Tao De Thi</title>
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
 
<script language="javascript" src="../SoanCauHoi/jquery/jquery.js"></script>
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery.tablesorter.js"></script> 

<script type="text/javascript" >
$(document).ready(function() 
    { 
        $("#tb2").tablesorter(); 
    } 
); 
    
</script>

 <script type="text/javascript">
function xacnhan()

{
var tl=confirm("Bạn có muốn xóa Đề thi đã chọn này không ?");
if(tl===true)
 return true;
 else
 return false;

}

</script> 
</head>
<?php
include_once("connect.php");
include_once("function.php");
//nhan bien session

?>
<body>
<div id="main_in_container">
 <script type="text/javascript" src="../SoanCauHoi/jquery/wz_tooltip.js"></script> 
<form action="" method="post" name="frmthemdethi">
<table width="1089" border="0" class="tableform">
  <tr>
    <td width="160">&nbsp;</td>
    <td width="318" align="right"><h2><font color="#0066FF">TẠO ĐỀ THI</font></h2></td>
    <td width="154">&nbsp;</td>
    <td width="439">&nbsp;</td>
  </tr>
  <tr>
    <td><!--<b>Mã đề thi:</b>--></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><b>Tên đề thi:</b></td>
    <td><!--<input type="text" name="txtmade" id="txtmade" readonly="readonly" value="<?php //echo sinhmadethi()   ?>" />-->
      <input type="text" name="txttendethi" id="txttendethi" size="40" class="textb" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><b>Môn thi:</b></td>
    <td><select name='cbomon' id="cbomon" >
      <option value="">---Chọn môn thi---</option>
      <?php
$qrmon=mysql_query("select * from monthi");

while($kqmon=mysql_fetch_array($qrmon))
{
?>
      <option value= "<?php echo $kqmon[0];?>"><?php echo $kqmon[1] ?></option>
      <?php
}
?>
    </select></td>
    <td><b>Thang điểm:</b></td>
    <td><input type="text" name="txtthangdiem" id="txtthangdiem" size="2" class="textb"   /></td>
  </tr>
  <tr>
    <td><b>Ngạch:</b></td>
    <td><select name='cbongach' id="cbongach" >
      <option value="">---Chọn ngạch---</option>
      <?php
$qrngach=mysql_query("select * from ngach");

while($kqngach=mysql_fetch_array($qrngach))
{
?>
      <option value= "<?php echo $kqngach[0];?>"><?php echo $kqngach[1] ?></option>
      <?php
}
?>
    </select></td>
    <td><b>Mật mã mở đề:</b></td>
    <td><input type="password" name="txtmatma" id="txtmatma" size="10" class="textb"  /></td>
  </tr>
  <tr>
    <td>Kỳ thi:</td>
    <td><select name='cbokythi' id="cbokythi" >
      <option value="">---Chọn kỳ thi---</option>
      <?php
$qrkt=mysql_query("select * from kythi");

while($kqkt=mysql_fetch_array($qrkt))
{
?>
      <option value= "<?php echo $kqkt[0];?>"><?php echo $kqkt[1] ?></option>
      <?php
}
?>
    </select></td>
    <td><b>Trạng thái:</b></td>
    <td><select name='cbotrangthai' id="cbotrangthai" >
      <option value="1">Hiển thị</option>
      <option value="0">Ẩn</option>
    </select></td>
  </tr>
  <tr>
    <td><b>Tổng số câu:</b></td>
    <td><input type="text" name="txttongsocau" id="txttongsocau" size="2" class="textb"  />
      <b>Thời gian(phút):
      <input type="text" name="txtthoigian" id="txtthoigian" size="2" class="textb"  />
      </b></td>
    <td><b>Ghi chú:</b></td>
    <td><input type="text" name="txtghichu" id="txtghichu" size="50" class="textb" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input name="btnluu" id="btnluu" type="submit" value="Lưu" class="command_save" />
      <input name="btnhuy" id="btnhuy" type="button" value="Reset" class="command_refresh" onclick="javascript:window.location='themdethi.php'"  /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
//nhan bien sesion
$magv=$_SESSION['u_magv'];
if(isset($_POST['btnluu']))
{
	//nhan lai bien
	//$made=$_POST['txtmade'];

	$tenkt=$_POST['txttendethi'];
	$mm=$_POST['cbomon'];
	$mng=$_POST['cbongach'];
	$tgian=$_POST['txtthoigian'];
	//$pass=md5($_POST['txtmatma']);
	$pass=encryptIt($_POST['txtmatma']);
	$tongsc=$_POST['txttongsocau'];
	$trthai=$_POST['cbotrangthai'];
	$ghichu=$_POST['txtghichu'];
	$tdiem=$_POST['txtthangdiem'];
	$mkt=$_POST['cbokythi'];
	$made=sinhmadethi($mm,$mng);
	echo $made."<br>";
/*	echo $tenkt."<br>";
    echo $mm."<br>";
	echo $mng."<br>";
	echo $tgian."<br>";
	echo $pass."<br>";
	echo $tongsc."<br>";
	echo $trthai."<br>";
	echo $ghichu."<br>";
	echo $tdiem."<br>";*/
//kiem tra du lieu rong
	if($tenkt=='' or $tgian=='' or $pass=='' or $tongsc=='' or $tdiem=='' or $mm=='' or $mng=='' or $mkt=='')	{
		echo "<font size=4 color=red>Lỗi:Bạn chưa Nhập đủ thông tin!.</font>";
	exit;
	}
	//kiem thoi gian la so >
	if(!is_numeric($tgian) or $tgian < 1 ){
	echo "<font size=4 color=red>Lỗi:Thời gian phải là kiểu số và > 0!.</font>";
		exit;
	}
		//kiem so cau la so >
	if(!is_numeric($tongsc) or $tongsc < 1 ){
	echo "<font size=4 color=red>Lỗi: Tống số câu phải là kiểu số và > 0!.</font>";
		exit;
	}

		//kiem thang diem la so >
	if(!is_numeric($tdiem) or $tdiem < 1 ){
	echo "<font size=4 color=red>Lỗi: Thang điểm là số >0!.</font>";
		exit;
	}

		//kiem thang diem la so >
	////if( $tdiem != '10' or $tdiem !='100' ){
	//echo "<font size=4 color=red>Lỗi: Thang điểm chỉ là 10 hoặc 100!.</font>";
	//	exit;
	//}
		
	//luu dethi	
	$qrdethi=mysql_query("insert into dethi values('$made','$tenkt','$tgian','$mng','$mm','$pass','$ghichu','$trthai','$tongsc','$tdiem','$magv','$mkt')");

?>
<script type="text/javascript">

//window.location='themdethi.php';
</script>
<?php
}
?>
<hr color="#0033CC" />
<h3>DANH SÁCH CÁC ĐỀ THI</h3>


    <?php

//xoa du lieu
if(isset($_POST['btnxoa']))
{
$mct=$_POST['case'];
if(is_array($mct))
  {
  
   while(list($khoa,$gt)=each($mct))
     {
          $ma=$gt;
	   // kiem tra dethi da co ts thi;
	   if( kiemtra_xoadethi($ma)){
		echo "<p><font color=red>KHÔNG THỂ XÓA ĐƯỢC ĐỀ THI '". $ma ."'<br>ĐỀ THI NÀY ĐÃ CÓ THÍ SINH THI!.</font></p><a href='themdethi.php'> QUAY LẠI</a>";
				
		exit;
	}
	   
		 //loc cac cautruc co made
		  $qrlocct=mysql_query("select *  from cautrucde where madethi='$ma'");
		 while($kqloc=mysql_fetch_array($qrlocct))
		 {
			$mact= $kqloc['macautrucde'];
			//xoa table chitiet
		 $xoachitiet=mysql_query("delete  from chitiet_cauhoi_cautruc where macautrucde='$mact'");
		 }
		 //xoa table cautrucdethi
	    $xoact=mysql_query("delete  from cautrucde where madethi='$ma'");
		
	//loc cac baithithisinh co madethi
	$qrloc_bthi=mysql_query("select mabaithi from baithithisinh where madethi='$ma'");
while($kqloc_bthi=mysql_fetch_array($qrloc_bthi)){
	$mabai=$kqloc_bthi['mabaithi'];
	//xoa diem_cau
$qrxoadiem_cau=mysql_query("delete from diem_cau where mabaithi='$mabai'");	
//xoa chitiet_baithi
$qrxoachitiet_baithi=mysql_query("delete from chitiet_baithi where mabaithi='$mabai'");	
	}		

//xoa baithi
$qrxoabaithi=mysql_query("delete from baithithisinh where madethi='$ma'");		
  //xoa table dethi
 $xoadethi=mysql_query("delete  from dethi where madethi='$ma'");
	//xoa folder
$dir="../FilesUpload_TS/".$ma."/";
remove_directory($dir);
	
	  }//while
  
  }
?>
<script type="text/javascript">

window.location='themdethi.php';
</script>
<?php
}


//PHAN TRANG	
$somautin_moitrang=5;
//tong so mau tin
$qrtong=mysql_query("select * from dethi where magv='$magv'");
$tong=mysql_num_rows($qrtong);
//so trang can co la

$sotrang=$tong/$somautin_moitrang;

//khoi tao vitri
if(empty($_GET['vt']))
  {$vt=0;
  
	}
 else
 {
 $vt=$_GET['vt'];

  }

  
 //khoi tao kien ket
 if(empty($link))
   $link="themdethi.php";

$qr=mysql_query("select * from dethi where magv='$magv' order by round(mid(madethi,instr(madethi,'-')+1,5),0)  desc limit $vt,$somautin_moitrang");
$stt=0;
?>
    Trang: &nbsp;
    <?php
	 //phan trang
	   for($i=0;$i<$sotrang;$i++)
	    {

	  if ($i==$vt/$somautin_moitrang){
       echo "<a href = '$link?vt=".$i*$somautin_moitrang."'><font color='red' > <strong> $i</strong></font></a>";
       echo"  ";
     }
 else{
   echo "<a href = '$link?vt=".$i*$somautin_moitrang."'><font color='blue' >$i</font></a>";
   echo"  ";
       }	  
	  
	}
	   ?>
của tổng số <font color="#000099" size="+1">
<?php  echo $tong; ?>&nbsp;
</font> Đề 

<br /><br />
<form action="" method="post" name="frmdethi"><input type="submit" value=" Xóa " name="btnxoa" class="command_del" onclick=" return xacnhan(); " />
<table width="1567" height="88" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
      <th width="88">&nbsp;</th>
      <th width="88"><div align="center"><strong>Mã đề</strong></div></th>
    <th width="281"><div align="center"><strong>Tên đề thi</strong></div></th>
    <th width="260"><div align="center"><strong>Kỳ thi</strong></div></th>
    <th width="202"><div align="center"><strong>Tên môn</strong></div></th>
    <th width="94"><div align="center"><strong>Password</strong></div></th>
    <th width="109"><div align="center"><strong>Ngạch</strong></div></th>
    <th width="100"><div align="center"><strong>Thời gian</strong></div></th>
    <th width="96"><div align="center"><strong>Tổng số câu</strong></div></th>
    <th width="86"><div align="center"><strong>Trạng thái</strong></div></th>
    <th width="93"><div align="center"><strong>Thang điểm</strong></div></th>
    </thead>
   <?php
	  while($kq=mysql_fetch_array($qr))
	  {
	  ?>
  <tr>
    <td><input type="checkbox" name="case[]" id="case[]" class="case" value="<?php echo $kq['madethi']  ?>"/>
&nbsp; <a href='suadethi.php?mdsua=<?php  echo $kq['madethi']?>'> Sửa...</a></td>
    <td><?php  echo $kq['madethi']  ?></td>
    <td><!--<a href='xemdethi.php?made=<?php // echo $kq['madethi'].'&&mm='.$kq['mamon'].'&&mang='.$kq['mangach'] ?>'> --><?php  echo $kq['tendethi']  ?></a></td>
    <td><?php  echo get_a_field('makythi',$kq['makythi'],'kythi','1')  ?></td>
    <td><?php  echo get_a_field('mamon',$kq['mamon'],'monthi','1')  ?></td>
    <td><?php  echo decryptIt($kq['matmamode'])  ?></td>
    <td><?php  echo get_a_field('mangach',$kq['mangach'],'ngach','1')  ?></td>
    <td align="center"><?php  echo $kq['thoigian']  ?></td>
    <td align="center" ><?php  echo $kq['tongsocau']  ?>
      <?php 
	  $kt=socau_dethi_hoanchinh($kq['madethi']);
	  if( $kt< $kq['tongsocau'] ) 
	 {
	  
	   ?>
        <div style="font-size:-1;color:#F00" onmouseover="Tip('<?php echo "Tổng số câu hỏi của Đề thi = Tổng số các câu trong Cấu trúc của đề. <br><font color=red>(Đề thi là: ".$kq['tongsocau']." mà Tổng số câu trong cấu trúc có: ".$kt."</font>"   ?>)',SHADOW, false ,TITLE,'Thông tin',PADDING, 10)" onmouseout="UnTip()">chưa xong</div>
    <?php
	}
	
	 ?>   
       </td>
    <td align="center"><?php  if($kq['trangthai']==1) echo "Hiển thị"; else
	 echo "Ẩn";  ?></td>
    <td align="center"><?php  echo $kq['thangdiem']  ?>
      <?php 
	 $kt2= round(thangdiem_dethi_hoanchinh($kq['madethi']),1);
	  if($kt2 < $kq['thangdiem'] ) 
	{
	 ?>
      <div style="font-size:-1;color:#F00" onmouseover="Tip('<?php echo "Thang điểm của Đề thi = Tổng điểm các Cấu trúc của đề. <br><font color=red>(Đề thi là: ".$kq['thangdiem']." mà Tổng trong cấu trúc có: ".$kt2."</font>"   ?>)',SHADOW, false ,TITLE,'Thông tin',PADDING, 10)" onmouseout="UnTip()">chưa xong</div>
      <?php
	}
	
	 ?>
    </td>
    </tr>
   <?php
	  }
	  ?>
  <tr>
    <td><input type="checkbox"  name="selectall" id="selectall"/>
Select all</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
<SCRIPT language="javascript">
$(function(){

$("tr").click(function(){
    $(this).addClass("selected").siblings().removeClass("selected");
	});

});

</SCRIPT>

</div>
</body>
</html>