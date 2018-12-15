
<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Chi tiet Cau truc-Cau hoi</title>
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery.js"></script>
<script type="text/javascript" src="../SoanCauHoi/jquery/jquery-1.7.2.min.js"></script>

  
 <script type="text/javascript">


function openDialog(myObject) {
   // var result = window.showModalDialog("danhsachcauhoi.php", form, "dialogWidth:900px; dialogHeight:601px; center:yes");
	/*	 var aForm;
    aForm = oForm.elements;
    var myObject = new Object();*/
	var tt=navigator.appName
if(tt=='Microsoft Internet Explorer')
window.open("danhsachcauhoi.php",myObject,'fullscreen,scrollbars');
	else
	 window.showModalDialog("danhsachcauhoi.php",myObject, "center:yes;dialogWidth:900px;dialogHeight:600px;status:no;dialogLeft:350px;dialogTop:250px;edge:raised");
	
}


</script>
  
</head>

<body>
 <script type="text/javascript" src="../SoanCauHoi/jquery/wz_tooltip.js"></script> 
 
<script>
    $(function(){
      //sự kiện phím Enter
     /* $(document).keyup(function(e){
        if(e.keyCode=='13'){
           alert('Bạn vừa mới ấn phím Enter')
        }
      })*/
        
        // sự kiện mouse right click
        $(document).bind('contextmenu',function(){
         // alert('Bạn mới click phải chuột,chức năng đã bị vô hiệu hóa')
          document.getElementById('imgtip').onmouseout=UnTip();
		  return false
        })
    })
  </script>
 
<?php
include_once("connect.php");
include_once("function.php");
?>

<h2><font color="#0066FF">XEM CHI TIẾT CẤU TRÚC - CÂU HỎI</font></h2>
<?php
//nhan lai bien 3 
if(isset($_GET['mact']) && isset($_GET['made'])&&isset($_GET['manhom']))
{
$_SESSION['nhom']=$_GET['manhom'];
$_SESSION['mact']=$_GET['mact'];	
$made=$_GET['made'];
$manhom=$_GET['manhom'];
$_SESSION['made']=$_GET['made'];
}

//trang hien tai

if(isset($_GET['mact']))
{
$mact=$_GET['mact'];
//echo $mact;	

   // kiem tra dethi da co ts thi;
	   if( kiemtra_xoacautruc($mact)){
		echo "<p><font color=red>KHÔNG THỂ SỬA ĐƯỢC CẤU TRÚC '". $mact ."'<br>CẤU TRÚC NÀY NẰM TRONG ĐỀ THI ĐÃ CÓ THÍ SINH THI!.</font></p><a href='xemcautrucdethi2.php'> QUAY LẠI</a>";
				
		exit;
	}

echo "-Đề thi: <font color=blue size=+2>".$_SESSION['made']."; ".get_a_field('madethi',$_SESSION['made'],'dethi','1')."</font><br>";
echo "-Phần:<font color=blue size=+2> ".get_a_field('macautrucde',$mact,'cautrucde','1')."</font><br>";
echo "-Nhóm câu:<font color=blue> ".get_a_field('manhom',$_SESSION['nhom'],'nhom','1')."</font><br>";
 ?>
 

 <input type="button"   id="btnhuy" onclick="javascript:window.location='xemcautrucdethi_xem.php'" value="Quay lại" class="command_back" />&nbsp; &nbsp; &nbsp;

 <input type="button"   id="btnthemcau" onclick="openDialog('frmcautruc')" value="Thêm câu hỏi vào" class="command_add" />&nbsp; &nbsp; &nbsp;
 
 <input type="button"   id="btnrefresh" onclick="javascript:document.frmcautruc.submit();" value="Refresh" class="command_refresh" />
<hr color="red" />
    <?php

//xoa du lieu
if(isset($_POST['btnxoa']))
{
$mct=$_POST['case'];
$_SESSION['mact']=$mact;
if(is_array($mct))
  {
  
   while(list($khoa,$gt)=each($mct))
     {
          $ma=$gt;
	   echo $ma."<br>";
	   echo $made;
	  	//xoa table chitiet
		 $xoachitiet=mysql_query("delete  chitiet_cauhoi_cautruc.*  from chitiet_cauhoi_cautruc,cautrucde where  chitiet_cauhoi_cautruc.macautrucde=cautrucde.macautrucde and macau='$ma' and cautrucde.madethi='$made'");
	  
	  }
  
  }
?>
<script type="text/javascript">

window.location.href;
</script>
<?php
}

//PHAN TRANG	
$somautin_moitrang=10;
//tong so mau tin
$qrtong=mysql_query("select * from cauhoi,chitiet_cauhoi_cautruc,cautrucde where   cautrucde.macautrucde='$mact' and chitiet_cauhoi_cautruc.macau=cauhoi.macau and chitiet_cauhoi_cautruc.macautrucde=cautrucde.macautrucde");
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
   $link="xemchitiet_cautruc_cauhoi.php";
   ?>
Trang &nbsp;<?php
	 //phan trang
  for($i=0;$i<$sotrang;$i++)
	    {

	  if ($i==$vt/$somautin_moitrang){
       echo "<a href = '$link?vt=".$i*$somautin_moitrang."&mact=".$mact."'><font color='red' > <strong> $i</strong></font></a>";
       echo"  ";
     }
 else{
   echo "<a href = '$link?vt=".$i*$somautin_moitrang."&mact=".$mact."'>$i</a>";
   echo"  ";
       }	  
	  
	}
?>
của tổng số :
<?php
echo "<font size=5 color=blue>".$tong."</font>";


$qr=mysql_query("select * from cauhoi,chitiet_cauhoi_cautruc,cautrucde where   cautrucde.macautrucde='$mact' and chitiet_cauhoi_cautruc.macau=cauhoi.macau and chitiet_cauhoi_cautruc.macautrucde=cautrucde.macautrucde order by round(mid(cautrucde.macautrucde,instr(cautrucde.macautrucde,'-')+1,5),0)  desc limit $vt,$somautin_moitrang");
?>
<form action="" method="post" name="frmcautruc">
<br />

<table width="1101" border="1" id="tb2" class="tablelist">
  <thead>
    <th width="143"><strong>Mã câu</strong></th>
    <th width="721"><strong>Tiêu đề</strong></th>
    <th width="123"><strong>Loại câu</strong></th>
    <th width="86"><input type="submit" value=" Xóa " name="btnxoa" class="command_del"/></th>
  </thead>
  <?php
	  while($kq=mysql_fetch_array($qr))
	  {
	  ?>
  <tr>
    <td><?php  echo $kq['macau']  ?></td>
    <td valign="top"><?php  echo $kq['tieude']  ?><img src="../SoanCauHoi/jquery/images/tooltip.gif" width="28" height="23" align="right" onmouseover="Tip('<?php  echo removeNewline(doc_1_cauhoi($kq['macau'],$kq['tieude'],$kq['mota'],$kq['maloai']));?>', SHADOW, false , TITLE, 'Chi tiết câu hỏi(Right Click để ẩn)',PADDING, 10)" onmouseout="<?php if($kq['maloai']==3) echo""; else echo "UnTip()"   ?>" id="imgtip" name="imgtip" ></td>
    <td><?php  echo get_a_field('maloai',$kq['maloai'],'loai','1')  ?></td>
    <td><input type="checkbox" name="case[]" id="case[]" class="case" value="<?php echo $kq['macau']  ?>"/></td>
  </tr>
  <?php
  
	  }
	  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="checkbox"  name="selectall" id="selectall"/>
Select all</td>
  </tr>
</table>

</form>

<?php	
}//if get
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

</body>
</html>