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
<?php
include_once("connect.php");
include_once("function.php");
?>

<h2><font color="#0066FF">XEM CHI TIẾT CÂU HỎI CỦA ĐỀ THI</font></h2>
<form action="" method="post" name="frmdanhsach">

<table width="1031" height="78" border="0">
  <tr>
    <td height="36"><b>Chọn đề thi:</b></td>
    <td><select name='cbodethi' id="cbodethi" >
      <?php
	  	  //nhan bien sesion
$magv=$_SESSION['u_magv'];
//nhan bien de thi
$madt=$_GET['madt'];

$qrdethi=mysql_query("select dethi.madethi,tenkythi,mamon,magv from dethi,cautrucde where dethi.madethi=cautrucde.madethi and magv='$magv' and dethi.madethi='$madt' group by dethi.madethi");

while($kqdethi=mysql_fetch_array($qrdethi))
{
?>
      <option value= "<?php echo $kqdethi[0];?>"><?php echo $kqdethi[2]."-->".$kqdethi[1] ?></option>
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
    <td width="112" height="36"><b>Chọn môn:</b></td>
    <td width="909"><select name='cbomon' id="cbomon" onchange="document.frmdanhsach.submit();">
        <?php
$qrmon=mysql_query("select * from monthi");

while($kqmon=mysql_fetch_array($qrmon))
{
?>
        <option value= "<?php echo $kqmon[0];?>"><?php echo $kqmon[1] ?></option>
        <?php
}
?>
  <script language="javascript">
for(var i=0;i<document.frmdanhsach.cbomon.length;i++)

if(document.frmdanhsach.cbomon[i].value=='<?php echo $_POST['cbomon']  ?>')
 document.frmdanhsach.cbomon.selectedIndex=i;

      </script>    
     
      </select>
      <input type="submit" name="btnxem" id="btnxem" value="Xem" class="command_action"  />&nbsp;</td>
  </tr>

</table>



 <hr color="#0000FF" />

 <?php


 
if(isset($_POST['cbomon'])||isset($_POST['btnxem']))
{
$mm=$_POST['cbomon'];
$made=$_POST['cbodethi'];
}
elseif(isset($_GET['mm']))
{
//$loai=1;
 $mm=$_GET['mm'];
$made=$_GET['made'];
}
else //chua post or get
{
//get first record
 $mm= "";
  $made="";
// $mm= $_GET['y_mamon'];
//  $made=$_GET['x_made'];
//echo $mm;

}
//hien thi ten ky thi
$qrview=mysql_query("select tenkythi,mamon from cautrucde,dethi where   mamon='$mm' and dethi.madethi='$made' and dethi.madethi=cautrucde.madethi order by round(mid(macautrucde,instr(macautrucde,'-')+1,5),0)  desc ");
$kqview=mysql_fetch_array($qrview);
echo "<b>Đề thi:</b>".$kqview[0]."<br>";
echo "<b>Môn thi:</b>".get_a_field('mamon', $kqview[1],'monthi','1')."<br>";


//PHAN TRANG	
$somautin_moitrang=10;
//tong so mau tin
$qrtong=mysql_query("select * from dethi,cautrucde where   mamon='$mm' and dethi.madethi=cautrucde.madethi");
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
   $link="xemcautrucdethi.php";
   ?>
Trang &nbsp;<?php
	 //phan trang
  for($i=0;$i<$sotrang;$i++)
	    {

	  if ($i==$vt/$somautin_moitrang){
       echo "<a href = '$link?vt=".$i*$somautin_moitrang."&mm=".$mm."&made=".$made."'><font color='red' > <strong> $i</strong></font></a>";
       echo"  ";
     }
 else{
   echo "<a href = '$link?vt=".$i*$somautin_moitrang."&mm=".$mm."&made=".$made."'>$i</a>";
   echo"  ";
       }	  
	  
	}
?>
của tổng số:
<?php
echo "<font size=5 color=blue>".$tong."</font>";


$qr=mysql_query("select * from cautrucde,dethi where   mamon='$mm' and dethi.madethi='$made' and dethi.madethi=cautrucde.madethi order by round(mid(macautrucde,instr(macautrucde,'-')+1,5),0)  desc limit $vt,$somautin_moitrang");
?>
<p></p>
<table width="1551" height="53" border="1"  id="tb2" class="tablelist">
  <thead>
    <th width="100"><div align="center"><strong>Mã cấu trúc</strong></div></th>
    <th width="219"><div align="center"><strong>Tên cấu trúc</strong></div></th>
    <th width="414"><div align="center"><strong>Tên nhóm</strong></div></th>
    <th width="93"><div align="center"><strong>Tổng số câu</strong></div></th>
    <th width="89"><div align="center"><strong>Tổng điểm</strong></div></th>
    <th width="165"><div align="center"><strong>Câu hỏi</strong></div></th>
    <th width="135"><div align="center"><strong>Chi tiết</strong></div></th>
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


</body>
</html>