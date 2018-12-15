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
<title>Thi Sinh</title>
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery-1.3.2.min.js"></script>

<link type="text/css" rel="stylesheet" href="../SoanCauHoi/jquery/dialog.css" /> 
<link rel="stylesheet" href="../main.css" type="text/css">

<script type="text/javascript" src="../SoanCauHoi/jquery/dialog.js"></script> 

<script type="text/javascript"> 
$(document).ready(function() { $('a[name=dialog]').click(function(e) { Dialog.show(e); }); });
 </script> 
 
 <script type="text/javascript" src="../SoanCauHoi/jquery/jquery.tablesorter.js"></script> 

<script type="text/javascript" >
$(document).ready(function() 
    { 
        $("#tb2").tablesorter(); 
    } 
); 
    
</script>
 
 <script type="text/javascript">
function hienthi()
{
if(document.frmthisinh.chkchon.checked==true){
//alert("co")
document.frmthisinh.txtan.outerHTML="<input type='file' name='file1'/>";
document.frmthisinh.txtan2.outerHTML="<input type='submit' name='btnupload' id='btnupload' value=' Import ' class='command_import' onclick='checkvalue()'/>";

}
else
{
document.frmthisinh.file1.outerHTML="<input type='hidden' name='txtan'/>";
document.frmthisinh.btnupload.outerHTML="<input type='hidden' name='txtan2' id='txtan2'/>";
}
}
 
 
var _validFileExtensions = [".xls"];

function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Xin lỗi, " + sFileName + " Không đúng, phần mở rộng cho phép là: " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }

    return true;
} 
 
 function checkvalue() {
            var form = document.frmthisinh;
    
            // do field validation
            if (form.file1.value == ""){
                alert( "Bạn chưa chọn file!" );
          return false;
        }

 }
function xacnhan()

{
var tl=confirm("Bạn có muốn xóa các Thí sinh đã chọn này không ?");
if(tl===true)
 return true;
 else
 return false;

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
</style>

</head>

<body >
 <script type="text/javascript" src="../SoanCauHoi/jquery/wz_tooltip.js"></script> 
<?php
include_once("connect.php");
include_once("function.php");
include_once("../css/Navigation/ps_pagination.php");

?>

<form action="" method="post" enctype="multipart/form-data" name="frmthisinh" onSubmit="return Validate(this);">
	   <table width="1113" height="89" border="0" class="tableform" >

        <tr>
          <td align="left">
          </td>
          <td colspan="2" align="center"><h2><font color="#0066FF">THÊM THÍ SINH MỚI</font> </h2></td>
          <td width="445">&nbsp;</td>
         </tr>
        <tr>
          <td width="116" align="left"><strong>Mã thí sinh: </strong></td>
          <td width="408" align="left"><input type="text" name="txtmats" id="txtmats" maxlength="20" size="15" class="textb" /></td>
          <td width="122" align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          </tr>
        <tr>
          <td align="left"><strong>Họ và Tên : </strong></td>
          <td align="left"><input type="text" name="txthotents" id="txthotents"  size="30" class="textb" /></td>
          <td align="left"><strong>Thuộc lớp:</strong></td>
          <td align="left"><select name='cbodonvi' id="cbodonvi" >
            <option value= "">---Chọn đơn vị---</option>
            <?php
$qrdv=mysql_query("select * from donvi");

while($kqdv=mysql_fetch_array($qrdv))
{
?>
            <option value= "<?php echo $kqdv[0];?>"><?php echo $kqdv[1] ?></option>
            <?php
}
?>
          </select></td>
         </tr>
        <tr>
          <td align="left"><strong>Password:</strong></td>
          <td align="left"><input type="password" name="txtpass" id="txtpass" maxlength="15" size="10" class="textb"  /></td>
          <td align="left">Kỳ thi :</td>
          <td align="left"><select name='cbokythi' id="cbokythi" >
            <option value= "">---Chọn kỳ thi---</option>
            <?php
$qrkthi=mysql_query("select * from kythi");

while($kqkthi=mysql_fetch_array($qrkthi))
{
?>
            <option value= "<?php echo $kqkthi[0];?>" ><?php echo $kqkthi[1] ?></option>
            <?php
}
?>
          </select></td>
         </tr>
        <tr>
          <td align="left"><strong>Giới tính: </strong></td>
          <td align="left"><select name="cbogioitinh"  id="cbogioitinh">
            <option value="Nam" >Nam</option>
            <option value="Nữ" >Nữ</option>
          </select></td>
          <td align="left"><strong>Ngạch dự thi:</strong></td>
          <td align="left"><select name='cbongach' id="cbongach" >
            <option value= "">---Chọn ngạch---</option>
            <?php
$qrngach=mysql_query("select * from ngach");

while($kqngach=mysql_fetch_array($qrngach))
{
?>
            <option value= "<?php echo $kqngach[0];?>" ><?php echo $kqngach[1] ?></option>
            <?php
}
?>
          </select></td>
          </tr>
        <tr>
          <td align="left"><strong>Ngày sinh: </strong></td>
          <td align="left"><input type="text" name="txtngaysinh" id="txtngaysinh"  maxlength="10" size="10" class="textb"  />
(dd/mm/yyyy)</td>
          <td align="left">Tên File hình:</td>
          <td align="left"><input type="text" name="txthinh" id="txthinh"  size="20" class="textb"   />
(Ví dụ:TS001.PNG)</td>
         </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><strong>Quê quán: </strong></td>
          <td><input type="text" name="txtquequan" id="txtquequan"  size="50"class="textb"   /></td>
        </tr>
        <tr>
          <td><!--<input type="checkbox" name="chkchon"  id="chkchon" onclick="hienthi();"/>
          <a href="#" name="dialog">Có file Excel(*.xls) </a>--></td>
          <td><input type="hidden" name="txtan"/></td>
          <td>&nbsp;</td>
          <td><input type="hidden" name="txtan2" id="txtan2" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>
            <input type="submit" value=" Lưu " name="btnluu" class="command_save"/>
          &nbsp; &nbsp;
          <input name="btnhuy" id="btnhuy" type="button" value=" Reset " class="command_refresh" onclick="javascript:window.location='thisinh.php'" /></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
</form>   
<?php
if(isset($_POST['btnluu']))
{
	//nhan lai bien
    $mts=$_POST['txtmats'];
	$ht=$_POST['txthotents'];
	$gt=$_POST['cbogioitinh'];
	$ngay=$_POST['txtngaysinh'];
	$qq=$_POST['txtquequan'];
	$pass=$_POST['txtpass'];
	$mdv=$_POST['cbodonvi'];
	$kthi=$_POST['cbokythi'];
	$mngach=$_POST['cbongach'];
	$hinh=$_POST['txthinh'];
	//$mts=sinhmats($mdv) ;	
//echo $mn."<br>".$tn."<br>".$mm;
//kiem tra du lieu rong
	if($ht=='' or $ngay==''or $pass=='' or $mdv=='' or $mts=='' or $kthi=='' or $mngach=='' ){
		echo "<font size=4 color=red>Lỗi:Bạn chưa nhập đủ dữ liệu!.</font>";
	exit;
	}		
	//luu thi sinh	
	$qrts=mysql_query("insert into thisinh values('$mts','$ht','$gt','$ngay','$qq','$pass','$mdv','$kthi','$mngach','$hinh')");
	

?>
<script type="text/javascript">

window.location='thisinh.php';
</script>
<?php
}
?>

<hr color="#0033CC" width="1100"/>
<h3>DANH SÁCH CÁC THÍ SINH</h3>


    <?php

//xoa du lieu
if(isset($_POST['btnxoa']))
{
$mts=$_POST['case'];
if(is_array($mts))
  {
  
   while(list($khoa,$gt)=each($mts))
     {
          $ma=$gt;
	   // echo $gt;
	     if( kiemtra_xoathisinh($ma)){
		echo "<p><font color=red>KHÔNG THỂ XÓA ĐƯỢC THÍ SINH '". $ma ."'<br>THÍ SINH NÀY ĐÃ DỰ THI!.</font></p><a href='thisinh.php'> QUAY LẠI</a>";
				
		exit;
	}
	   
	   //xoa baithi
$qrloc_bthi=mysql_query("select mabaithi from baithithisinh where mats='$ma'");
while($kqloc_bthi=mysql_fetch_array($qrloc_bthi)){
	$mabai=$kqloc_bthi['mabaithi'];
	//xoa baithi
$qrxoabaithi=mysql_query("delete from baithithisinh where mabaithi='$mabai'");
//xoa diem_cau
$qrxoadiem_cau=mysql_query("delete from diem_cau where mabaithi='$mabai'");	
//xoa chitiet_baithi
$qrxoachitiet_baithi=mysql_query("delete from chitiet_baithi where mabaithi='$mabai'");	
	}		
	     
	   //xoa table thi sinh
	  $xoats=mysql_query("delete  from thisinh where mats='$ma'");
		

	  } //while
  
  }
  
 ?>
<script type="text/javascript">

window.location='thisinh.php';
</script>
<?php
}
?>

<?php
$qrtong=mysql_query("select * from thisinh");
$kqtong=mysql_num_rows($qrtong);


$sql="select * from thisinh";
//Create a PS_Pagination object
	$pager = new PS_Pagination($cn, $sql, 10, 4);
 
	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();
	
		//Display the navigation
	//echo $pager->renderFullNav();
	echo '<div style="text-align:center">Pages  '.$pager->renderFullNav().'</div>';
?>

 


<form action="" method="post" name="frmthisinh1">
<input type="submit" value="Xóa" name="btnxoa" class="command_del" onclick=" return xacnhan(); "/>
<div class="srolltable1">
<table width="1723" height="53" border="1"  id="tb2" class="tablelist">
  <thead>
    <tr>
    <th width="95">&nbsp;</th>
    <th width="111"><strong>Mã thí sinh</strong></th>
    <th width="200"><strong>Họ tên</strong></th>
    <th width="74"><strong>Giới tính</strong></th>
    <th width="95"><strong>Ngày sinh</strong></th>
    <th width="107"><strong>Password</strong></th>
    <th width="352"><strong>Thuộc lớp</strong></th>
    <th width="252"><strong>Thi Ngạch</strong></th>
    <th width="379"><strong>Kỳ thi</strong></th>
    </thead>
   <?php
	  while($kq=mysql_fetch_array($rs))
	  {
	  ?>
  <tr>
    <td><input type="checkbox" name="case[]" id="case[]" class="case" value="<?php echo $kq['mats']  ?>"/>
      &nbsp;&nbsp;&nbsp;<a href="suats.php?matstemp=<?php echo $kq['mats']   ?>">Sửa...</a></td>
    <td>
<?php
if($kq['hinh']!='')
 $h= '<img src=../HINH_THISINH/'.$kq['hinh'].' width=100 height=100 />'."<br>"."File:HINH_THISINH/".$kq['hinh']; 
 else 
 $h='<img src=../css/img/noimage.png width=100 height=100 />'; 
?>    
    <div onmouseover="Tip('<?php echo $h;  ?>',SHADOW, false ,TITLE,'Photo',PADDING, 10)" onmouseout="UnTip()"><font color='#333366' size="+1"><b><?php  echo $kq['mats'] ?></b></font> </div></td>
    <td><?php  echo $kq['hoten']  ?></td>
    <td><?php  echo $kq['gioitinh']  ?></td>
    <td><?php  echo $kq['ngaysinh']  ?></td>
    <td><?php  echo $kq['password']  ?></td>
    <td><?php  echo get_a_field('madonvi',$kq['madonvi'],'donvi','1')  ?></td>
    <td><?php  echo get_a_field('mangach',$kq['mangach'],'ngach',1)  ?></td>
    <td><?php  echo get_a_field('makythi',$kq['makythi'],'kythi',1)  ?></td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
 
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

<div id="boxes"> 
 <div id="dialog" class="window"> <b><font color="blue">Hướng dẫn Import các Thí sinh</font></b>
 <div style="float:right;"><a href="#"class="close"/>Close</a> </div> <hr />
 <div>
 <b>Nếu bạn có file Excel danh sách các Thí sinh thì:</b><br>
 <b> 1.Click chọn Đơn Vị</b><br />
 <b> 2.Click Check vào "Có File Excel(*.xls)"</b><br />
 <b> 3.Chọn file Excel(*.xls)</b><br />
 <b>4.Nhấn Import, <font color="#FF0000"> Lưu ý: file phải theo định dạng sau:</font></b><br />
   <img src="Excel/hdts.png" width="760" height="180" />
  <b> <font color="#FF0000">Bạn hãy bỏ dòng tiêu đề trước khi Import!.</font></b>
   </div>
 </div>
  <div id="mask"></div>
   </div>
</body>
</html>