<?php
session_start();
if(!isset($_SESSION['maquantri']))
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
<title>Them Giao Vien</title>
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
var tl=confirm("Bạn có muốn xóa Giáo viên đã chọn này không ?");
if(tl===true)
 return true;
 else
 return false;

}

</script>

   
</head>

<body>
<?php
include_once("connect.php");
include_once("function.php");
?>
<form action="" method="post" name="frmgv">

<table width="532" border="0" class="tableform">
  <tr>
    <td width="128"><p>&nbsp;</p>
     </td>
    <td width="390"><h2><font color="#0066FF">THÊM NGƯỜI QUẢN LÝ</font></h2></td>
    </tr>
  <tr>
    <td><b>Tên đăng nhập:</b></td>
    <td>
      <input type="text" name="txtmagv" id="txtmagv" size="10" class="textb"  /></td>
    </tr>
  <tr>
    <td><b>Họ Tên:</b></td>
    <td>
      <input type="text" name="txttengv" id="txttengv" size="40" class="textb" /></td>
  </tr>
  <tr>
    <td><b>Mật mã:</b></td>
    <td><input type="password" name="txtpass" id="txtpass" size="10" class="textb"  /></td>
  </tr>
  <tr>
    <td>Vai trò:</td>
    <td><select name="cbovaitro">
    <option value="giaovien">Giáo viên</option>
     <option value="giamthi">Giám thị</option>
      <option value="quantri">Quản trị</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="btnluu" id="btnluu" type="submit" value="Lưu" class="command_save" />
      <input name="btnhuy" id="btnhuy" type="button" class="command_refresh" value="Reset" onclick="javascript:window.location='nguoiquanly.php'" /></td>
  </tr>
</table>
</form>
<?php
if(isset($_POST['btnluu']))
{
	//nhan lai bien
	$mgv=$_POST['txtmagv'];
	$tgv=$_POST['txttengv'];
$pass=md5($_POST['txtpass']);
//$pass=$_POST['txtpass'];
$vaitro=$_POST['cbovaitro'];

//echo $mn."<br>".$tn."<br>".$mm;
//kiem tra du lieu rong
	if($mgv=='' or $tgv=='' or $pass=='' )	{
		echo "<font size=4 color=red>Lỗi:Bạn chưa nhập đủ dữ liệu!.</font>";
	exit;
	}

		
	//luu giao vien	
	$qrgv=mysql_query("insert into nguoiquanly values('$mgv','$pass','$tgv','$vaitro')");
	if($qrgv){

?>
<script type="text/javascript">

window.location='nguoiquanly.php';
</script>
<?php
	}//if lam dc
	
	else
	{
		
	?>
<script type="text/javascript">

alert("KHÔNG THỂ LƯU ĐƯỢC(trùng khóa!.)");
</script> 
        
        <?php
	}//else
}//if
?>
<hr color="#0033CC" />
<h3>DANH SÁCH CÁC NGƯỜI QUẢN LÝ</h3>


    <?php

//xoa du lieu
if(isset($_POST['btnxoa']))
{
$mm=$_POST['case'];
if(is_array($mm))
  {
  
   while(list($khoa,$gt)=each($mm))
     {
          $ma=$gt;
		  
		     if( kiemtra_xoanguoiquanly($ma)){
		echo "<p><font color=red>KHÔNG THỂ XÓA ĐƯỢC GIÁO VIÊN '". $ma ."'<br>GIÁO VIÊN NÀY ĐÃ CÓ RA ĐỀ THI!.</font></p><a href='nguoiquanly.php'> QUAY LẠI</a>";			
		exit;
	}

		 //xoa dethi-gv
		$qrloc_dt=mysql_query("select madethi from dethi where magv='$ma'");
		while($kqloc_dt=mysql_fetch_array($qrloc_dt)){
			$made=$kqloc_dt['madethi'];
			xoa_cautruc_dethi($made);
			$qrloc_bt=mysql_query("select mabaithi from baithithisinh where madethi='$made'");
		while($kqloc_bt=mysql_fetch_array($qrloc_bt)){
			$mabai=$kqloc_bt['mabaithi'];
			//xoa diem_cau
			$qrxoadiem_cau=mysql_query("delete from diem_cau where mabaithi='$mabai'");	
			//xoa chitiet_baithi
			$qrxoachitiet_baithi=mysql_query("delete from chitiet_baithi where mabaithi='$mabai'");	
						
			}// while bai thi
			//xoa bai thi
			$qrxoabaithi=mysql_query("delete from baithithisinh where madethi='$made'");	
			}	//while dethi	
				 
		
	    //xoa table dethi
		 $xoadethi=mysql_query("delete  from dethi where magv='$ma'");
	   //xoa table gvien
	    $xoagv=mysql_query("delete  from nguoiquanly where tendangnhap='$ma'");
	  
	  }//while 1
  
  } //if post
  
 ?>
<script type="text/javascript">

window.location='nguoiquanly.php';
</script>
<?php
}


//PHAN TRANG	
$somautin_moitrang=10;
//tong so mau tin
$qrtong=mysql_query("select * from nguoiquanly");
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
   $link="nguoiquanly.php";

$qr=mysql_query("select * from nguoiquanly order by tendangnhap  limit $vt,$somautin_moitrang");
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
</font> Người quản lý

<br />


<p></p>
<form action="" method="post" name="frmgv1"><input type="submit" value="Xóa" name="btnxoa" class="command_del" onclick=" return xacnhan(); "/>
<table width="922" height="53" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
      <th width="126">      
      <th width="154"><div align="center"><strong>Tên đăng nhập</strong></div></td>
    <th width="203"><div align="center"><strong>Họ Tên</strong></div></td>
    <th width="278"><div align="center"><strong>Mật mã</strong></div></th>
    <th width="127"><div align="center"><strong>Vai trò</strong></div></th>
    </thead>
   <?php
	  while($kq=mysql_fetch_array($qr))
	  {
	  ?>
  <tr>
    <td><input type="checkbox" name="case[]" id="case[]" class="case" value="<?php echo $kq['tendangnhap']  ?>"/>
      &nbsp;&nbsp;&nbsp;<a href="suanguoiquanly_admin.php?magvtemp=<?php echo $kq['tendangnhap']   ?>">Sửa...</a></td>
    <td><?php  echo $kq['tendangnhap']  ?></td>
    <td><?php  echo $kq['hoten']  ?></td>
    <td><?php  echo $kq['matkhau']  ?></td>
    <td><?php  echo $kq['vaitro']  ?></td>
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