<?php
session_start();
//$_SESSION['a']="";
if(!isset($_SESSION['magiamthi']))
{
header("location:../index.php");
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<link href="../css/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<title>Theo doi Thi Sinh</title>
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery-1.3.2.min.js"></script>

<link type="text/css" rel="stylesheet" href="../SoanCauHoi/jquery/dialog_doipass.css" /> 
<link rel="stylesheet" href="../css/main.css" type="text/css">
<script type="text/javascript" src="../SoanCauHoi/jquery/dialog.js"></script> 
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery.tablesorter.js"></script> 

<script type="text/javascript" >
$(document).ready(function() 
    { 
        $("#tb2").tablesorter(); 
    } 
); 
    
</script>
<script type="text/javascript"> 
$(document).ready(function() { $('input[name=btndoipass]').click(function(e) { Dialog.show(e); }); });
 </script> 
 <script type="text/javascript">

   function refreshFrame() {
    // alert('bbb');
	 window.location.reload();
		
      }

function xacnhan()

{
var tl=confirm("Bạn có muốn xóa các Bài Thi đã chọn này không ?");
if(tl===true)
 return true;
 else
 return false;

}
function xacnhanxemdapan()

{
var tl=confirm("Bạn có muốn cho phép các Thí Sinh Xem Đáp Án sau khi Login?");
if(tl===true)
 return true;
 else
 return false;

}

function kiemtrarong()

{
var p1=document.getElementById('txtpassold').value;
var p2=document.getElementById('txtpassnew').value;
if(p1=='' || p2=='') 
 {
alert ('Lỗi: Chưa nhập đủ dữ liệu!.') 
 return false;

}
 return true;
}
 
 </script>
 
 
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

#hienthi{
position:absolute;	
font-weight:bold;	

margin-left:900px;
}
</style>

</head>

<body>
<?php
include_once("connect.php");
include_once("function.php");
include_once("../css/Navigation/ps_pagination.php");
// Turn off all error reporting
error_reporting(0);
?>
<div id="mainpage" class="mainpage">
<div id="header"></div>
<div id="main_in_container">
 <script type="text/javascript" src="../SoanCauHoi/jquery/wz_tooltip.js"></script> 
 <div id="hienthi">
 <?php
 //nhan bien sesion
$_SESSION['u_magt']=$_SESSION['magiamthi'];
$ten= get_a_field('tendangnhap',$_SESSION['u_magt'],'nguoiquanly','2'); 
 echo "<table ><tr><td align=left><img src='../css/img/user.png'> Xin chào:<font color=blue> ".$ten."</font>" ;
echo "</td></tr><tr><td align=left><img src='../css/img/logout.png'> <a href='../logout.php'><font color=red>Thoát</font></a></td></tr></table>";
 ?>
 </div>
 



<h2><font color="#0066FF">THEO DÕI BÀI THI - THÍ SINH </font></h2>
 
 

<form action="" method="post" name="frmthisinh">
<b>Chọn đề thi:  </b>
<select name="cbodethi" id="cbodethi"  onchange="document.frmthisinh.submit();" >
    <option value="%">---Chọn đề thi---</option>
  <?php
$qrdethi=mysql_query("select * from dethi where trangthai=1");
if(isset($_POST['cbodethi']))
	$md=$_POST['cbodethi'];
	elseif(isset($_GET['made']))
	$md=$_GET['made'];
	else
	$md="";
	$_SESSION['made']=$md;
	
while($kqdethi=mysql_fetch_array($qrdethi))
{
?>
      <option value= <?php echo $kqdethi[0];?> <?php if($kqdethi[0]==$_SESSION['made']) echo "selected"; ?>><?php echo $kqdethi[4]."---". $kqdethi[1] ?></option>
      <?php
}
?>
      </select>&nbsp; &nbsp;
      <input type="button" name="btnrefresh" value="Refresh" class="command_refresh" onclick="refreshFrame();" />
  
  
      
 <?php
 if(isset($_POST['cbodethi']))
{

$md=$_POST['cbodethi'];

 //$_SESSION['monthi']= $mm;
}
elseif(isset($_GET['made']))
{

$md=$_GET['made'];
}
else //chua post or get
{

 $md='%';

}
$strfilter="made=".$md;

//hien thi monthi va ky thi
$qrview=mysql_query("select mamon,tendethi from baithithisinh,thisinh,dethi where thisinh.mats=baithithisinh.mats and dethi.madethi=baithithisinh.madethi and dethi.trangthai=1 and baithithisinh.trangthai<=2  and dethi.madethi like '$md'");
$kqview=mysql_fetch_array($qrview);
//echo $kqview["mamon"];
echo "<br>";
 echo "<b>Môn thi: </b>".get_a_field('mamon',$kqview["mamon"],'monthi','1');
//echo $kqview["tenkythi"];
 echo "<br><b>Đề thi:</b> ".$kqview['tendethi'];
?>     
      
 <?php
 //cho phep xem dap an
if(isset($_POST['btnchophep']))
{
//kiem tra all ts da nop bai
$test=chua_nopbai_het($md);
if($test==0){
	//cap nhat field chophepxem
	$qrchophep=mysql_query("Update baithithisinh Set xemdapan='1' where madethi='$md'");
	echo "<br><br><font color=red size=+1>ĐỀ THI: ".get_a_field('madethi',$md,'dethi','1')."<br>ĐÃ CHO PHÉP CÁC THÍ SINH XEM LẠI BÀI THI SAU KHI LOGIN LẦN 2.</font>";
}
else
echo "<br><br><font color=#FF0000 size=+1>LỖI: ĐỀ THI: ".get_a_field('madethi',$md,'dethi','1')."<br>CHỨC NĂNG CHƯA CHO PHÉP!.<BR>CÒN $test THÍ SINH CHƯA NỘP BÀI.</font>";	
	
}

 ?>     

 <?php
 //ko cho phep xem dap an
if(isset($_POST['btnkochophep']))
{

	//cap nhat field chophepxem
	$qrkochophep=mysql_query("Update baithithisinh Set xemdapan='0' where madethi='$md'");
	echo "<br><br><font color=#060 size=+1>ĐỀ THI: ".get_a_field('madethi',$md,'dethi','1')."<br>ĐÃ KHÔNG CHO PHÉP CÁC THÍ SINH XEM LẠI BÀI THI SAU KHI LOGIN LẦN 2.</font>";
	
	
}

 ?>           
      
<br />
     <hr color="#0000FF" />
<?php



 $sql="select * from baithithisinh,thisinh,dethi where thisinh.mats=baithithisinh.mats and dethi.madethi=baithithisinh.madethi and dethi.trangthai=1 and baithithisinh.trangthai <=2  and dethi.madethi like '$md' order by mabaithi  asc ";



//Create a PS_Pagination object
	$pager = new PS_Pagination($cn, $sql, 20, 4,$strfilter);
 
	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();
?>



<?php
//tong so mau tin
$qrtong=mysql_query("select * from baithithisinh,thisinh,dethi where thisinh.mats=baithithisinh.mats and dethi.madethi=baithithisinh.madethi and dethi.trangthai=1 and baithithisinh.trangthai <=2 and dethi.madethi like '$md'");
$tong=mysql_num_rows($qrtong);
if($tong>0){
?>
<?php
	//Display the navigation
	//echo $pager->renderFullNav();
	echo '<div style="text-align:center">Pages  '.$pager->renderFullNav().'</div>';
?>
   <br />

<center>
<input type="button" value="Đổi password Đề thi" name="btndoipass" id="btndoipass" style="color:#C30"  class="command_doipass" />&nbsp; &nbsp;
<input type="submit" value="Cho phép TS xem Đáp Án" name="btnchophep" id="btnchophep" class="command_unlock" style="color:#F00" onclick=" return xacnhanxemdapan(); " />&nbsp; &nbsp;
<input type="submit" value="Không cho TS xem Đáp Án" class="command_lock" name="btnkochophep" id="btnkochophep" style="color:#060"/>
</center>
<?php
}
?>
<br />
<center>
<table width="1206" height="53" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
    <th width="56"><strong>STT</strong></th>
    <th width="136"><strong>Mã thí sinh</strong></th>
    <th width="176"><strong>Họ tên</strong></td>
    <th width="151"><strong>Mã bài thi Thí sinh</strong></td>
    <th width="166"><strong>Giờ mở đề</strong></th>
    <th width="181">Giờ cập nhật sau cùng</th>
    <th width="107"><strong>Trạng thái</strong></th>
    <th width="77"><strong>Điểm</strong></th>
    <th width="98"><strong>Xem đáp án</strong></th>
    
    
    </thead>
   <?php
   $stt=0;
	  while($kq=mysql_fetch_array($rs))
	  {
		  $dv=get_a_field('madonvi',$kq['madonvi'],'donvi','1');
		   $ng=get_a_field('mangach',$kq['mangach'],'ngach','1');
	  ?>
  <tr>
    <td align="center"><?php  echo ++$stt  ?></td>
    <td>
	<?php
if($kq['hinh']!='')
 $h= '<img src=../HINH_THISINH/'.$kq['hinh'].' width=100 height=100 />'."<br>";
 else 
 $h='<img src=../css/img/noimage.png width=100 height=100 />'; 
?>    
    <div onmouseover="Tip('<?php echo $h;  ?>',SHADOW, false ,TITLE,'Photo',PADDING, 10)" onmouseout="UnTip()"><font color='#333366' size="+1"><b><?php  echo $kq['mats'] ?></b></font> </div></td>
    <td><?php  echo $kq['hoten']  ?></td>
    <td><div onmouseover="Tip('<?php echo "Số máy: ".$kq['ip']."<br>"."SBD: ".$kq['mats']."<br>"."Họ tên: ".$kq['hoten']."<br>"."Password: ".$kq['password']."<br>"."Ngày sinh: ".$kq['ngaysinh']."<br>"."Giới tính: ".$kq['gioitinh']."<br>"."Ngạch: ".$ng."<br>"."Đơn vị: ".$dv."<br>" ?>',SHADOW, false ,TITLE,'Thông tin',PADDING, 10)" onmouseout="UnTip()"><font color='#333366' size="+1"><b><?php  echo $kq['mabaithi']  ?></b></font> </div></td>
    <td><?php  echo $kq['giobd']  ?> 
(<?php  echo $kq['ngaythi']  ?>)</td>
    <td><?php 
	$mb=$kq['mabaithi'];
	$tg=thoigian_capnhat_saucung($mb);
	if($tg)
	 echo $tg."  <a href= 'update_tght.php?mbt=$mb'>,Lấy giờ hiện tại</a>";
	 
	   ?></td>
    <td><?php 
	$ttbai=$kq[6];
	if($ttbai==2) //da nop bai
	echo "<font  color=#993300>đã nộp bài</font>";
	elseif($ttbai==1) //=1
	echo "<font color=blue>đang làm bài</font>";
	else
	echo "<font color='red'>đã đóng</font>"
	?></td>
    <td align="center"><?php 
	$thangd=$kq['thangdiem'];
	$diem= get_a_field("mabaithi",$kq['mabaithi'],"baithithisinh",5);
	$d=$thangd/$diem;
		//<=2.1 la dau
	if($d<=2.1 && $ttbai==2)
	echo "<font color=blue><b>".round($diem,3)."</b></font>";
	elseif($d>2 && $ttbai==2)
	echo "<font color=red><b>".round($diem,3)."</b></font>";
	else
	echo "";
	   ?></td>
    <td align="center"><?php 
	$mdt=$kq['madethi'];
	$xda=$kq['xemdapan'];
	if($ttbai==2 && $xda >=1 ) //da nop bai
	echo "<a href='update_xemdapan.php?mbt=$mb&&v=0&&md=$mdt'><font  color=blue>được phép</font></a>";
	elseif($ttbai==2 && $xda <1) //=1
	echo "<a href='update_xemdapan.php?mbt=$mb&&v=1&&md=$mdt'><font color=red>không được</font></a>";
	else
	echo "";
	?> </td>
    </tr>
   <?php
	  }
	  ?>
  </table>
</center>
<div id="boxes"> 
 <div id="dialog" class="window"> <b><font color="blue">Đổi password Đề Thi</font></b>
 <div style="float:right;"><a href="#"class="close"/>Close</a> </div> <hr />
 <div>
 <table width="495" border="0">
  <tr>
    <td width="145"> <b>Chọn Đề thi:</b>&nbsp;</td>
    <td width="273"><select name="cbodethidoi" id="cbodethidoi"   >
    <option value="">---Chọn đề thi---</option>
  <?php
$qrdethidoi=mysql_query("select * from dethi where trangthai=1");
$pass="";
while($kqdethidoi=mysql_fetch_array($qrdethidoi))
{
?>
      <option value= <?php echo $kqdethidoi[0];?> <?php if($kqdethidoi[0]==$md) echo "selected"; ?>><?php echo $kqdethidoi[4]."---". $kqdethidoi[1] ?></option>
      <?php
	  $pass=$kqdethidoi[5];
}
?>
      </select></td>
  </tr>
  <tr>
    <td><b>Password cũ:</b></td>
    <td><input type="password" name="txtpassold" id="txtpassold"  /></td>
  </tr>
  <tr>
    <td><b>Password mới:</b></td>
    <td><input type="password" name="txtpassnew" id="txtpassnew"   /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="btnchapnhan" id="btnchapnhan" value=" OK " style="color:#C30; font-size:16px; background-color:#090"  onclick="return kiemtrarong();" /></td>
  </tr>
</table> 


   </div>
 </div>
  <div id="mask"></div>
  </div>   

</form>
<?php
 //doi pass
if(isset($_POST['btnchapnhan']))
{
$mdd=$_POST['cbodethidoi'];
//mhan lai bien
//$p1=md5($_POST['txtpassold']);
//$p2=md5($_POST['txtpassnew']);
$p1=encryptIt($_POST['txtpassold']);
$p2=encryptIt($_POST['txtpassnew']);


//so sanh 2 pass giong nhau
$qrss=mysql_query("select matmamode from dethi where madethi='$mdd'");
$kqss=mysql_fetch_array($qrss);
if($kqss[0]==$p1){
//cap nhat pass
$qrpass=mysql_query("Update dethi Set matmamode='$p2' where madethi='$mdd'");
	
?>
<script type="text/javascript">

alert('Đã đổi password thành công!.==>: <?php echo $_POST['txtpassnew']   ?>');
</script>
  <?php
} //if ss
else{ //ko doi dc
?>
<script type="text/javascript">

alert('KHÔNG đổi password được!.');
</script>

<?php
}
}//if poss
  ?>



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
<div id="footer"> 
</div>
</div>
</body>
</html>