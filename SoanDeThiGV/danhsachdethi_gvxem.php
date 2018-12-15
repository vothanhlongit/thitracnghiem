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
include_once("../css/Navigation/ps_pagination.php");
$mgv=$_SESSION['magv'];
?>

<body>
 <script type="text/javascript" src="../SoanCauHoi/jquery/wz_tooltip.js"></script> 


<h2><font color="#0066FF">DANH SÁCH CÁC ĐỀ THI CỦA TÔI</font></h2>
<hr color="#0033CC" />
<?php
error_reporting(0);
//xoa du lieu
if(isset($_POST['btnxoa']))
{
$mct=$_POST['case'];
if(is_array($mct))
  {
  
   while(list($khoa,$gt)=each($mct))
     {
          $ma=$gt;
	   // echo $gt;
	   
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
}
?>
<?php
$sql="select * from dethi where magv='$mgv'";
//Create a PS_Pagination object
	$pager = new PS_Pagination($cn, $sql, 10, 4);
 
	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();
	
		//Display the navigation
	//echo $pager->renderFullNav();
	echo '<div style="text-align:center">Pages  '.$pager->renderFullNav().'</div>';
?>

</br>
<form action="" method="post" name="frmdethi">
<div class="srolltable1">
<table width="1470" height="88" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
    <th width="94"><div align="center"><strong>Mã đề</strong></div></th>
    <th width="243"><div align="center"><strong>Tên đề thi</strong></div></th>
    <th width="207"><div align="center"><strong>Kỳ thi</strong></div></th>
    <th width="190"><div align="center"><strong>Tên môn</strong></div></th>
    <th width="73"><div align="center"><strong>Password</strong></div></th>
    <th width="114"><div align="center"><strong>Ngạch</strong></div></th>
    <th width="80"><div align="center"><strong>Thời gian</strong></div></th>
    <th width="92"><div align="center"><strong>Tổng số câu</strong></div></th>
    <th width="114"><div align="center"><strong>Trạng thái</strong></div></th>
    <th width="99"><div align="center"><strong>Thang điểm</strong></div></th>
    <th width="94"><div align="center"><strong>Print</strong></div></th>
    </thead>
      <?php
	  while($kq=mysql_fetch_array($rs))
	  {
	  ?>
    <tr>
    <td><?php  echo $kq['madethi']  ?></td>
    <td><a href='xemdethi_edit.php?made=<?php  echo $kq['madethi'].'&&mm='.$kq['mamon'].'&&mang='.$kq['mangach'] ?>'><?php  echo $kq['tendethi']  ?></a></td>
    <td><?php  echo get_a_field('makythi',$kq['makythi'],'kythi','1')  ?></td>
    <td><?php  echo get_a_field('mamon',$kq['mamon'],'monthi','1')  ?></td>
    <td><?php echo  decryptIt($kq['matmamode']);  ?></td>
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
    <td align="center"><?php  
	if($kq['trangthai']==1) {
	echo "Hiển thị, ";
	echo "<a href='onoff_gv.php?tt=0&md=".$kq['madethi']."'><font color='red'>Tắt</font></a>";
	}
	 else{
	 echo "Ẩn, "; 
	 echo "<a href='onoff_gv.php?tt=1&md=".$kq['madethi']."'><font color='red'>Mở</font></a>";
	 }?></td>
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
    <td align="center"> <a href='xemdethi_print.php?made=<?php  echo $kq['madethi'].'&&mm='.$kq['mamon'].'&&mang='.$kq['mangach'] ?>' target="_new"> Print...</a> </td>
    </tr>
   <?php
	  }
	  ?>
  </table>
  </div>
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