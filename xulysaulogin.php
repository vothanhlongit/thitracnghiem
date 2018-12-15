<?php
session_start();
//$_SESSION['a']="";
if(!isset($_SESSION['ten']))
{
//header("location:../index.php");
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/dd.css" type="text/css">
<link rel="stylesheet" href="css/commands.css" type="text/css">
<title>Xu ly sau Login</title>
<script type="text/javascript">
//document.onselectstart=new Function('return false');
//document.oncontextmenu=new Function('return false');

</script>

<style type="text/css">
a{
 /*text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}

a:hover{
color:#FF0000;
font-size:16px;
}

<!--
.style2 {
	font-size: 16px;
	color: #0000FF;
	font-weight: bold;
}
.style3 {
	color: #0000CC;
	font-weight: bold;
	font-size: 16px;
}
.style5 {color: #0000CC; font-weight: bold; font-size: 28px; }
.style6 {
	color: #0000CC;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<div id="mainpage" class="mainpage">
<div id="header">
</div>
<div id="main_in_container">

<?php
  require_once("ThiSinh/connect.php");
   require_once("ThiSinh/function.php"); 
  ?>
 <center>

<?php


//neu la giao vien
  $u=$_POST['txtuser'];
   $p=md5($_POST['txtpass']);
   // $p=$_POST['txtpass'];
//	echo $p;
  $qrtimgv=mysql_query("select * from nguoiquanly where tendangnhap='$u' and matkhau='$p'");
	$kqgv=mysql_num_rows($qrtimgv);
	 $donggv=mysql_fetch_array($qrtimgv);
			 
				
		if($kqgv>0)
			  {
			     if($donggv['vaitro'] == 'giaovien')
                 {
	               $_SESSION['tengv']=$donggv['hoten'];
	               $_SESSION['magv']=$donggv['tendangnhap'];
                 		
?>
<script type="text/javascript">
window.location="SoanDeThiGV/gv.php";
</script>
<?php
                    }else if($donggv['vaitro'] == 'giamthi')
                    {
					$_SESSION['magiamthi']=$donggv['tendangnhap']
?>
<script type="text/javascript">
window.location="GiamThi/danhsachthisinh.php";
</script>
<?php                    
                    }else if($donggv['vaitro'] == 'quantri')
                    {
					 $_SESSION['maquantri']=$donggv['tendangnhap'];	
					 
					?>
<script type="text/javascript">
window.location="admin.php";
</script>
<?php				 
                    }else if($donggv['vaitro'] == 'thisinh')
                    {
                    }else{
                       
                    }
			  } //if dung
?>



<?php

//nhan bien
$u= strtoupper( $_POST['txtuser']);
$p=$_POST['txtpass'];



$qrtim=mysql_query("select * from thisinh where mats='$u' and password='$p'");
$kq=mysql_num_rows($qrtim);
 if($kq<=0){
			  		    
echo "<font size='+2' color='#FF0000'> Đăng nhập sai!</font><br>"; 
echo "<font size='+1' >Tên người dùng, hoặc mật mã không đúng. </font><br>";
echo "<font size='+1' >Vui lòng đăng nhập lại.</font><br>";    
echo "<a href='index.php'><font color'#990000'> Trở lại trang đăng nhập</font></a>";
 exit();
	} //if sai
  
 $_SESSION['user']=strtoupper($_POST['txtuser']);
	
?>
<table width="1111" height="116" border="1" bordercolor="#CCCCCC" >
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
    </tr>
  <tr>
    <td width="448" align="left"><span class="style2"><img src="css/img/user2.png" width="40" height="33" />Xin chào :</span><font color="#FF0000" size="+1">
    <?php echo  get_a_field('mats',$_POST['txtuser'],'thisinh','1');
	
	 ?></font><span class="style2">,  Giới tính :</span><font color="#FF0000" size="+1">
    <?php echo  get_a_field('mats',$_POST['txtuser'],'thisinh','2');
	
	 ?></font></td>
    <td width="216" align="left"><span class="style3">Mã Số: </span> <font color="#FF0000" size="+2">
    <?php  echo $_SESSION['user'] ?>
    </font></td>
    <td width="377" align="left"><span class="style6">Ngày thi: </span>&nbsp;<b><?php
	
	
	echo hienthingay();
	?>
    </b></td>
  </tr>
  <tr>
    <td align="left"><span class="style3">Ngạch dự thi: </span> <font color="red" size="+1">
    <?php  
	$mng=get_a_field('mats',$_POST['txtuser'],'thisinh','8');
echo get_a_field('mangach',$mng,'ngach','1') ?>
    </font></td>
    <td align="left"><span class="style3">Ngày sinh: </span> <font color="red" size="+1">
    <?php  echo get_a_field('mats',$_POST['txtuser'],'thisinh','3') ?>
    </font></td>
    <td align="left"><span class="style3">Lớp: </span> <font color="red" size="+1">
    <?php  
	$madv= get_a_field('mats',$_POST['txtuser'],'thisinh','6');
	echo get_a_field('madonvi',$madv,'donvi','1');
	
	 ?>
    </font></td>
  </tr>
  <?php
  //hien thi tieude
  $qrtitle=mysql_query("select tendethi,ghichu,makythi from monthi,dethi,ngach,cautrucde where monthi.mamon=dethi.mamon and ngach.mangach=dethi.mangach and cautrucde.madethi=dethi.madethi and trangthai=1 group by monthi.mamon,dethi.madethi");
  $kqtitle=mysql_fetch_array($qrtitle);
  ?>
  <tr>
    <td colspan="3"><div align="center" class="style5">KỲ THI: <?php echo   get_a_field('makythi',$kqtitle['makythi'],'kythi','1'); ?>    
    <br />
   <!-- <b><font color="#000033" size="4">(Ghi chú: <?php //echo  $kqtitle['ghichu'] ?>)</font></b>-->
     </div>
     </td>
    </tr>
  <tr>
    <td bgcolor="#999933" class="rowheadtable"><div align="center"><span class="style2">Đề thi </span></div></th>
    <td bgcolor="#999933" class="rowheadtable"><div align="center"><span class="style2"> Xem đáp án</span></div></td>
    <td bgcolor="#999933" class="rowheadtable"><div align="center"><span class="style2">Thời gian (phút) </span></div></td>
  </tr>
  <?php

  $qrdanhsach=mysql_query("select * from monthi,dethi,ngach,cautrucde where monthi.mamon=dethi.mamon and ngach.mangach=dethi.mangach and cautrucde.madethi=dethi.madethi and trangthai=1 group by monthi.mamon,dethi.madethi");
 while($kqdanhsach=mysql_fetch_array($qrdanhsach))
 {
  ?>
  
  <tr>
    <td align="left" class="rowfoot"><a href="ThiSinh/modethi.php?made=<?php echo $kqdanhsach['madethi'] ?>&& mamon=<?php  echo $kqdanhsach['mamon'] ?> "><?php echo  $kqdanhsach['tendethi']; ?></a></td>
    <td align="center" class="rowfoot" >
	<?php

	$mats=$_SESSION['user'];
	$made=$kqdanhsach['madethi'];
	$mabai=laymabaithi($mats,$made);
	
	if($mabai)
	echo "<a href='ThiSinh/thisinhxembaithi.php?mats=".$mats."&&made=".$made."&&mabai=".$mabai."' >XEM...</a>";
	
	?></td>
    <td align="center" class="rowfoot"><font color="#0000FF" size="+1"><?php echo $kqdanhsach['thoigian'] ?></font> <?php echo " (". dem_so_cau_dethi($made)." câu)" ?> </td>
  </tr>
  <?php
  }
  ?>
</table>

<center>
<font color="#003366" size="+1"> Bạn hãy Click chọn một ĐỀ THI mà Bạn cần Thi(theo hướng dẫn của Giám thị). </font>   
<!-- <canvas class="CoolClock:Tor:80"></canvas> --><br />
<input type="button" value="Thoát" class="command_close" name="btnthoat" onclick="javascript:window.location='logout.php'"/>
</center>



	
</center>	

</div>
<div id="footer"> 
</div>
</div>
</body>
</html>
