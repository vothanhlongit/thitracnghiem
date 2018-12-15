<?php
session_start();

if(!isset($_SESSION['user']))
{
header("location:../index.php");
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/main.css" type="text/css">
<link href="../css/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Mo De Thi</title>

<script src="../SoanCauHoi/jquery/jquery.js"></script>

<script type="text/javascript">
document.onselectstart=new Function('return false');
document.oncontextmenu=new Function('return false');
</script>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size:24px;
	}
	.txt {
  border:none; 
  height:40px;
  background-color:#CCC;
   font-size: 25pt;
	width:150px;
	text-align:left;
	color:#630;
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
require_once("connect.php");
require_once("function.php");
 
$made=$_GET['made'];
$mamon=$_GET['mamon'];
$mats= $_SESSION['user'];
$mb=$mats.$made;
//echo $mamon."<br>";
//echo $made."<br>";



if(isset($_POST['txtpass'])){
   
  //$pass=md5($_POST['txtpass']);
   $pass=encryptIt($_POST['txtpass']);
  
//echo $pass."<br>";
//kiem tra mat ma
	$kiemtra=mysql_query("select * from dethi where madethi='$made' and matmamode='$pass'");
    $dem=mysql_num_rows($kiemtra);
	//echo $dem;
	if($dem<=0)
	  {
?>
	<script type="text/javascript">
	alert("Mật mã sai");
	</script>
	 <?php
	   }
	   else //pass dung
	   {
//gan cho 2 bien session if pass=true
$_SESSION['made']=$made;
$_SESSION['mamon']=$mamon;
//kiem tra mo 2 de ma chua hoan thanh

$qrcheck=mysql_query("select mabaithi,mats,madethi from baithithisinh where mats='$mats' and trangthai <=1  ");
 $kq=mysql_fetch_array($qrcheck);
 $mdt=$kq['madethi'];
 if($mdt)//co
 //xet tiep 2 made khac nhau
    if($mdt!=$made){
	$hten=get_a_field('mats',$mats,'thisinh',1);
       echo "<center><h2><font color=#0066FF>THÍ SINH <font color=red>".$mats."-".$hten."</font> ĐÃ CHƯA HOÀN THÀNH 1 ĐỀ THI!. <br>BẠN KHÔNG THỂ MỞ ĐỀ THI TIẾP THEO ĐƯỢC!.</font></h2>";
echo "<img src='../css/img/stop.jpg'><p></p>";
echo "<input type=button name=btndong value=' ĐÓNG ' onclick=window.location='../index.php' class='command_close' /></center>";
	   
	   exit;   	   
	     
	}
	
//lay ip may dang nhap
$ip=getRealIpAddr();

//kiem tra xem nguoi khac mode hay ko
$qrcheck_lamdum=mysql_query("select ip from baithithisinh where mats='$mats' and madethi='$mdt' and trangthai <= 1 ");
 $kq_lamdum=mysql_fetch_array($qrcheck_lamdum);

if($kq_lamdum['ip']!=$ip && $kq_lamdum['ip']!='' ){
echo "<center><h2> <font color=red>BẠN KHÔNG ĐƯỢC PHÉP LÀM BÀI THI DÙM NGƯỜI KHÁC!.</font></h2>";
echo "<img src='../css/img/stop.jpg'><p></p>";
echo "<input type=button name=btndong value=' ĐÓNG ' onclick=window.location='../index.php' class='command_close' /></center>";

exit;
}

	
	
	
	 ?>
	    <script type="text/javascript">
		//alert("Mật mã đúng");
		var tr;
		tr=confirm("Bắt đầu thi");
		if(tr==true)
		{
	
		var params = [
    'height='+screen.height,
    'width='+screen.width,
	status=0,
	toolbar=0,
	scrollbars=1,
	'resizable=yes',
    'fullscreen=yes' // only works in IE, but here for completeness
].join(',');

var win = window.open('loaddethi.php', 'popup_window', params); 
//popup.moveTo(0,0);
     //var win = 	window.open("loaddethi.php",'page1','fullscreen,scrollbars');
		//var win = window.open('loaddethi.php', 'google','width=1000,height=800,status=0,toolbar=0'); 
		
var timer = setInterval(function() { 
    if(win.closed) {
        clearInterval(timer);
        alert('BẠN ĐÃ ĐÓNG TRANG LÀM BÀI!');
		// alert('hi');
		  $(document).ready(function(){      
          $("div#vung_thong_bao_dong").load("updatetrangthai.php",{mabai: '<?php echo $mb; ?>',status: '-1'});

       }); 
   
    } //if
}, 100);
		
	
		}
		</script>
		<?php
		}// else
		?>
	
	<?php
	} //if 1
	
	?>


<center>
<h2 style="color:#03C">ĐỀ THI:<?php echo get_a_field("madethi",$made,"dethi",1)?></h2>
<h2 style="color:#03C" >MÔN THI:<?php echo get_a_field("mamon",$mamon,"monthi",1)?></h2>
<h2 style="color:#03C" >THỜI GIAN:<?php echo get_a_field("madethi",$made,"dethi",2)?> phút</h2>
<form  action="" method="post" name="frmmode">
<table width="417" height="176" border="0" bgcolor="#99CC99">
  <tr>
    <td height="70" colspan="3"><div align="center" class="style1">Bạn hãy nhập mật mã để mở đề thi</div></td>
    </tr>
  <tr>
    <td width="91" height="40"><strong>Mật mã:</strong></td>
    <td width="200"><input type="password" name="txtpass" class="txt"/></td>
    <td width="112"><div id='vung_thong_bao_dong'>
...
</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="button" value="Mở đề" class="command_unlock" name="btnmode" onclick="frmmode.submit();"/></td>
    <td><input type="button" value="Thoát" class="command_close" name="btnthoat" onclick="javascript:window.location='../index.php'"/></td>
  </tr>
</table>
</form>
</center>

</div>
<div id="footer"> 
</div>
</div>
</body>
</html>
