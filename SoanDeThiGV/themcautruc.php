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
<link rel="stylesheet" href="../main.css" type="text/css">
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

    
<script language="javascript" src="../SoanCauHoi/jquery/jquery.js"></script>
<script language="javascript">
 $(document).ready(function() {
  $('#cbomon').change(function() {
   giatri = this.value;
    //  alert( giatri);
   $('#scbonhom').load('ajax_nhom.php?id_mon=' + giatri);
  });
 });
  
</script> 
<script type="text/javascript">
function xacnhan()

{
var tl=confirm("Bạn có muốn xóa cấu trúc đã chọn này không ?");
if(tl===true)
 return true;
 else
 return false;

}

</script>
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery.tablesorter.js"></script> 

<script type="text/javascript" >
$(document).ready(function() 
    { 
        $("#tb2").tablesorter(); 
    } 
); 
    
</script>
   
</head>

<body>
<div id="main_in_container">
<?php
include_once("connect.php");
include_once("function.php");
?>
<form action="" method="post" name="frmcautrucde">

<table width="955" border="0" class="tableform">
  <tr>
    <td width="148">&nbsp;</td>
    <td width="793"><h2><font color="#0066FF">TẠO CẤU TRÚC ĐỀ THI</font></h2></td>
    </tr>
  <tr>
   <td><b>Mã cấu trúc:</b></td>
    <td><label for="txtmact"></label>
      <input type="text" name="txtmact" id="txtmact" readonly="readonly" value="<?php echo sinhmacautruc()   ?>" /></td> 
    </tr>
  <tr>
    <td><b>Tên cấu trúc:</b></td>
    <td>
      <input type="text" name="txttenct" id="txttenct" size="40" class="textb" /></td>
    </tr>
  <tr>
    <td><b>Đề thi:</b></td>
    <td><select name="cbodethi" id="cbodethi">
      <?php
	  //nhan bien sesion
$magv=$_SESSION['u_magv'];
	$qrdethi=mysql_query("select * from dethi where magv='$magv' order by madethi desc");
while($kqdethi=mysql_fetch_array($qrdethi))
	{
	?>
      <option value=<?php echo $kqdethi['madethi'] ?>> <?php echo $kqdethi['mamon']."---".$kqdethi['tendethi'] ?></option>
      <?php
	}
	?>
    </select></td>
    </tr>
  <tr>
    <td><b>Chọn môn:</b></td>
    <td><select name='cbomon' id="cbomon" >
      <option value="">---Chọn môn---</option>
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
    </tr>
  <tr>
    <td><b>Thuộc nhóm câu:</b></td>
    <td>
      <span id="scbonhom">
        <select name="cbonhom" id="cbonhom">
          <option value="">---Chọn nhóm---</option>
        </select>
        </span>
    </td>
    </tr>
  <tr>
    <td><b>Tổng số câu:</b></td>
    <td><input type="text" name="txtsocau" id="txtsocau" size="2" class="textb"  /></td>
    </tr>
  <tr>
    <td><b>Tổng điểm:</b></td>
    <td><input type="text" name="txtdiemcautruc" id="txtdiemcautruc" size="2" class="textb"  /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input name="btnluu" id="btnluu" type="submit" value="Lưu" class="command_save" />
      <input name="btnhuy" id="btnhuy" type="button" value="Reset" class="command_refresh" onclick="javascript:window.location='themcautruc.php'" />
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    </tr>
</table>
</form>
<?php
if(isset($_POST['btnluu']))
{
	//nhan lai bien
	$mct=$_POST['txtmact'];
	$tct=$_POST['txttenct'];
	$mdethi=$_POST['cbodethi'];
	$mn=$_POST['cbonhom'];
	$mm=$_POST['cbomon'];
	$sc=$_POST['txtsocau'];
	$diemct=$_POST['txtdiemcautruc'];
	/*echo $mct."<br>";
	echo $tct."<br>";
	echo $mdethi."<br>";
	echo $mn."<br>";
	echo $mm."<br>";
	echo $sc."<br>";*/
//kiem tra du lieu rong
	if($mm=='' or $mn=='' or $sc=='' or $diemct=='' or $tct=='')	{
		echo "<font size=4 color=red>Lỗi:Bạn chưa nhập đủ dữ liệu!.</font>";
	exit;
	}
	//kiem so cau la so
	if(!is_numeric($sc) or $sc<1 or !is_numeric($diemct) or $diemct<1  ){
	echo "<font size=4 color=red>Lỗi:Số câu,hoặc điểm không phải là kiểu số!.</font>";
		exit;
	}
	//kiem tra sum(socau)=tong_so_cau hop le
	if(kiemtra_socau_dethi($mdethi,$sc)<=0){
		
	echo "<font size=4 color=red>Lỗi: Tổng các câu  trong cấu trúc <= Tổng số câu trong đề thi!.</font>";
		exit;
		
	}
	//kiem tra sum(diemcautruc)=thang diem hop le
	if(kiemtra_thangdiem_dethi($mdethi,$diemct)<=0){
		
	echo "<font size=4 color=red>Lỗi: Tổng các điểm  trong cấu trúc <= Thang điểm trong đề thi!.</font>";
		exit;
		
	}
	
	
	//kiem tra Dethi va nhom ton tai roi trong cau truc
	if(nhom_dethi_tontai($mdethi,$mn)>=1){
		
	echo "<font size=4 color=red>Lỗi: Đề '". get_a_field('madethi',$mdethi,'dethi','1')."' và Nhóm '".get_a_field('manhom',$mn,'nhom','1')."' đã được tạo rồi!.</font>";
		exit;
		
	}
		
	//luu cau truc	
	$qrcautruc=mysql_query("insert into cautrucde values('$mct','$tct','$mdethi','$mn','$sc','$diemct')");
//echo "insert into cautrucde values('$mct','$tct','$mdethi','$mn','$sc')";
?>
<script type="text/javascript">

window.location='themcautruc.php';
</script>
<?php
}
?>
<hr color="#0033CC" />
<h3>DANH SÁCH TẤT CẢ CÁC CẤU TRÚC ĐỀ THI</h3>


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
	   if( kiemtra_xoacautruc($ma)){
		echo "<p><font color=red>KHÔNG THỂ SỬA ĐƯỢC CẤU TRÚC '". $ma ."'<br>CẤU TRÚC NÀY NẰM TRONG ĐỀ THI ĐÃ CÓ THÍ SINH THI!.</font></p><a href='themcautruc.php'> QUAY LẠI</a>";
				
		exit;
	}
	   //xoa table cautrucde
	    $xoact=mysql_query("delete  from cautrucde where macautrucde='$ma'");
		//xoa table chitiet
		 $xoachitiet=mysql_query("delete  from chitiet_cauhoi_cautruc where macautrucde='$ma'");
	  
	  }
  
  }
  
 ?>
<script type="text/javascript">

window.location='themcautruc.php';
</script>
<?php
}


//PHAN TRANG	
$somautin_moitrang=10;
//tong so mau tin
$qrtong=mysql_query("select * from cautrucde,dethi where cautrucde.madethi=dethi.madethi and magv='$magv'");
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
   $link="themcautruc.php";

$qr=mysql_query("select * from cautrucde,dethi where cautrucde.madethi=dethi.madethi and magv='$magv' order by round(mid(macautrucde,instr(macautrucde,'-')+1,5),0)  desc limit $vt,$somautin_moitrang");
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
<?php  echo $tong; ?>
</font> Cấu trúc 

<br />
<p></p>
<form action="" method="post" name="frmcautrucde1"><input type="submit" value="Xóa" class="command_del" name="btnxoa"  onclick=" return xacnhan(); " />
<table width="1340" height="53" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
      <th width="96">&nbsp;</th>
      <th width="96"><div align="center"><strong>Mã cấu trúc</strong></div></th>
    <th width="211"><div align="center"><strong>Tên cấu trúc</strong></div></th>
    <th width="274"><div align="center"><strong>Tên đề thi</strong></div></th>
    <th width="409"><div align="center"><strong>Tên nhóm</strong></div></th>
    <th width="113"><div align="center"><strong>Tổng số câu</strong></div></th>
    <th width="79"><strong>Tổng  điểm</strong></th>
    </thead>
   <?php
	  while($kq=mysql_fetch_array($qr))
	  {
	  ?>
  <tr>
    <td><input type="checkbox" name="case[]" id="case[]" class="case" value="<?php echo $kq['macautrucde']  ?>"/>
      &nbsp;&nbsp;&nbsp;<a href="suacautruc.php?macttemp=<?php echo $kq['macautrucde']   ?>">Sửa...</a></td>
    <td><?php  echo $kq['macautrucde']  ?></td>
    <td><?php  echo $kq['tencautruc']  ?></td>
    <td><?php  echo get_a_field('madethi',$kq['madethi'],'dethi','1')  ?></td>
    <td><?php  echo get_a_field('manhom',$kq['manhom'],'nhom','1')  ?></td>
    <td align="center"><?php  echo $kq['socau']  ?>&nbsp;
      <?php
	
$sctong=$kq['socau'];
$scco=count_socau_chitiet_cautruc($kq['macautrucde'])
; 
$sc= $sctong-$scco;
$ma=$kq['madethi'];

if($sc != 0) //echo"<a href='xemcautrucdethi.php?madt=$ma'><font color=red>Thiếu $sc câu</font></a>"; 
echo"<font color=red size=-1>Thiếu $sc câu</font>";
?></td>
    <td align="center"><?php  echo $kq['diemcautruc']  ?></td>
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
    <td align="center">&nbsp;</td>
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