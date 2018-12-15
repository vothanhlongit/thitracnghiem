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
<title>Xem cau truc de thi</title>
<script language="javascript" src="../SoanCauHoi/jquery/jquery.js"></script>

<style type="text/css">
a{
 /*text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}
</style>

</head>

<body >
 <script type="text/javascript" src="../SoanCauHoi/jquery/wz_tooltip.js"></script> 
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
var tl=confirm("Bạn có muốn xóa cấu trúc đã chọn này không ?");
if(tl===true)
 return true;
 else
 return false;

}

</script>
<?php
include_once("connect.php");
include_once("function.php");
?>

<h2><font color="#0066FF">XEM CẤU TRÚC CỦA ĐỀ THI</font></h2>
<form action="" method="post" name="frmdanhsach">

<table width="1031" height="78" border="0">
  <tr>
    <td height="36"><b>Chọn đề thi:</b></td>
    <td><select name='cbodethi' id="cbodethi" onchange="document.frmdanhsach.submit();" >
      <option value= "">---Chọn đề thi---</option>
      <?php
	  	  //nhan bien sesion
$magv=$_SESSION['u_magv'];


$qrdethi=mysql_query("select * from dethi where  magv='$magv' order by madethi");

while($kqdethi=mysql_fetch_array($qrdethi))
{
?>
      <option value= "<?php echo $kqdethi[0];?>"><?php echo $kqdethi[4]."-".$kqdethi[3]."-->".$kqdethi[1] ?></option>
      <?php
}
?>
      <script language="JavaScript" type="text/javascript">
for(var i=0;i<document.frmdanhsach.cbodethi.length;i++)

if(document.frmdanhsach.cbodethi[i].value=='<?php echo $_POST['cbodethi']  ?>')
 document.frmdanhsach.cbodethi.selectedIndex=i;

      </script>
    </select> &nbsp;</td>
  </tr>
  <tr>
    <td width="112" height="36">&nbsp;</td>
    <td width="909"><input type="submit" name="btnxem" id="btnxem" value="Xem" class="command_action"  />&nbsp;</td>
  </tr>

</table>



 <hr color="#0000FF" />

 <?php


 
if(isset($_POST['cbodethi'])||isset($_POST['btnxem']))
{

$made=$_POST['cbodethi'];
}
elseif(isset($_GET['made']))
{
$made=$_GET['made'];
}
else //chua post or get
{

  $made="%";


}
//hien thi ten ky thi
$qrview=mysql_query("select * from dethi where   madethi='$made' order by madethi ");
$kqview=mysql_fetch_array($qrview);
echo "<b>Đề thi:</b>".$kqview[1]."<br>";


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
		echo "<p><font color=red>KHÔNG THỂ SỬA ĐƯỢC CẤU TRÚC '". $ma ."'<br>CẤU TRÚC NÀY NẰM TRONG ĐỀ THI ĐÃ CÓ THÍ SINH THI!.</font></p><a href='xemcautrucdethi2.php'> QUAY LẠI</a>";
				
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



$qr=mysql_query("select * from cautrucde,dethi where   dethi.madethi = '$made' and dethi.madethi=cautrucde.madethi order by round(mid(macautrucde,instr(macautrucde,'-')+1,5),0)  desc ");
?>
<p><input type="submit" value="Xóa" class="command_del" name="btnxoa"  onclick=" return xacnhan(); " /></p>
<table width="1312" height="53" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
      <th width="105">&nbsp;</th>
      <th width="131"><div align="center"><strong>Mã cấu trúc</strong></div></th>
    <th width="195"><div align="center"><strong>Tên cấu trúc</strong></div></th>
    <th width="317"><div align="center"><strong>Tên nhóm</strong></div></th>
    <th width="107"><div align="center"><strong>Tổng số câu</strong></div></th>
    <th width="115"><div align="center"><strong>Tổng điểm</strong></div></th>
    <th width="156"><div align="center"><strong>Câu hỏi</strong></div></th>
    <th width="134"><div align="center"><strong>Chi tiết</strong></div></th>
  </thead>
   <?php
   $stt=0;
   $tongsc=0;
   $tongsd=0;
	  while($kq=mysql_fetch_array($qr))
	  {
		 $stt++;  
		 $tongsc=$tongsc+$kq['socau'] ;
		 $tongsd=$tongsd+$kq['diemcautruc'];
	  ?>
  <tr>
    <td><input type="checkbox" name="case[]" id="case[]" class="case" value="<?php echo $kq['macautrucde']  ?>"/>
      &nbsp;&nbsp;&nbsp;<a href="suacautruc2.php?macttemp=<?php echo $kq['macautrucde']   ?>">Sửa...</a></td>
    <td><?php  echo $kq['macautrucde']  ?></td>
    <td><?php  echo $kq['tencautruc']  ?></td>
    <td><?php  echo get_a_field('manhom',$kq['manhom'],'nhom','1')  ?></td>
    <td align="center"> <?php  echo $kq['socau']  ?> &nbsp;<?php
	
$sctong=$kq['socau'];
$scco=count_socau_chitiet_cautruc($kq['macautrucde'])
; 
$sc= $sctong-$scco;
if($sc != 0) echo"<font color=red>Thiếu $sc câu</font>"; ?></td>
    <td align="center"><?php  echo $kq['diemcautruc']  ?></td>
    <td><a href='caungaunhien.php?mact=<?php  echo $kq['macautrucde'].'&&manhom='.$kq['manhom'].'&&socau='.$kq['socau'].'&&made='.$kq['madethi'] ?>'>Tạo câu ngẫu nhiên...</a></td>
    <td><a href='xemchitiet_cautruc_cauhoi.php?mact=<?php  echo $kq['macautrucde'].'&&made='.$made.'&&manhom='.$kq['manhom'] ?>'>Chi tiết câu hỏi...</a></td>
  </tr>
   <?php
	  }//while
	  ?>
       <tr>
         <td><input type="checkbox"  name="selectall" id="selectall"/>
Select all</td>
    <td><strong>TỔNG: <?php echo $stt ?></strong></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><strong><?php echo $tongsc ?><?php 
	  $kt=socau_dethi_hoanchinh($made);
	  if( $kt< $tongsc ) 
	 {
	  
	   ?>
            <div style="font-size:12px;color:#F00" onmouseover="Tip('<?php echo "Tổng số câu hỏi của Đề thi = Tổng số các câu trong Cấu trúc của đề. <br><font color=red>(Đề thi là: $tongsc mà Tổng số câu trong cấu trúc có: ".$kt."</font>"   ?>)',SHADOW, false ,TITLE,'Thông tin',PADDING, 10)" onmouseout="UnTip()">chưa hoàn chỉnh</div>
    <?php
	}	
	 ?>        
      </strong> </td>
    <td align="center"><strong><?php echo round( $tongsd,1) ?>
   <?php 
	 $kt2= get_a_field('madethi',$made,'dethi','9');
	  if($kt2 > round($tongsd,1) ) 
	{
	 ?> 
    <div style="font-size:12px;color:#F00" onmouseover="Tip('<?php echo "Thang điểm của Đề thi = Tổng điểm các Cấu trúc của đề. <br><font color=red>(Đề thi là: $kt2  mà Tổng trong cấu trúc có:". round($tongsd,1)." </font>"   ?>)',SHADOW, false ,TITLE,'Thông tin',PADDING, 10)" onmouseout="UnTip()">chưa hoàn chỉnh</div>
     <?php
	}
	
	 ?>
    </strong></td>
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

</body>
</html>