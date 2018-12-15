<?php
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="../SoanCauHoi/jquery/jquery.js"></script>
<!--<script src="../treejquery/jquery.js" type="text/javascript"></script> -->

	<script src="../treejquery/jquery-ui.custom.js" type="text/javascript"></script>
	<script src="../treejquery/jquery.cookie.js" type="text/javascript"></script>

	<link href="../treejquery/src/skin-vista/ui.dynatree.css" rel="stylesheet" type="text/css">
	<script src="../treejquery/src/jquery.dynatree.js" type="text/javascript"></script>
	<script src="../treejquery/sample.js" type="text/javascript"></script>
    
	<title>Dynatree - Example Browser</title>

<style type="text/css">
body {
	background-color: #ffa500;
	color: white;
	font-family: Helvetica, Arial, sans-serif;
	font-size: smaller;
	background-image: url("nav_bg.png");
	background-repeat: repeat-x;
}
a {
	color: white;
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}
div#tree {
	position: absolute;
	height: 95%;
	width: 95%;
	padding: 5px;
	margin-right: 0px;
}
ul.dynatree-container {
	height: 100%;
	width: 100%;
	background-color: transparent;
}
ul.dynatree-container a {
	color: #000080;
	 font-weight: bold;
	border: 1px solid transparent;
	background-color: transparent;
}
ul.dynatree-container a:hover {
	background-color: transparent;
}
ul.dynatree-container a:focus, span.dynatree-focused a:link {
	background-color: gray;
}
</style>

<script type="text/javascript">
	$(function(){
		// --- Initialize sample trees
		$("#tree").dynatree({
			autoFocus: true,
//			persist: true,
			minExpandLevel: 2,
			onFocus: function(node) {
				// Auto-activate focused node after 1 second
				if(node.data.href){
					node.scheduleAction("activate", 1000);
				}
			},
			onBlur: function(node) {
				node.scheduleAction("cancel");
			},
			onActivate: function(node){
				if(node.data.href){
					window.open(node.data.href, node.data.target);
				}
			}
		});
	});
</script>
<script type="text/javascript">



function doipassdethi()
{
	var user='<?php echo $_SESSION['magv'];?>';//alert('hello');
	var pass;
	pass= prompt("Nhập Mật Mã Mới để Bạn Đăng Nhập lần sau",'');
	if(pass!=null)
	{
		if(pass!=''){
		 $(document).ready(function(){      
          $("div#vung_thong_bao").load("updatepass.php",{us:user,p: pass});  });
		
		alert("Mật mã Đăng nhập đã được đổi thành: " + pass);
		}
		else
		alert('LỖI: Mật mã không thể rỗng!');
		//alert('ok');
	}
	
	
	//else
	//alert('cancel');
	
}
</script>
</head>

<body>
<?php
include_once("connect.php");
function get_a_field($keyname,$value,$tablename,$index)
{

$qr=mysql_query("select * from $tablename where $keyname='$value'");
$kq=mysql_fetch_array($qr);
return $kq[$index];
	
}

 
//nhan bien sesion
$_SESSION['u_magv']=$_SESSION['magv'];
$ten= get_a_field('tendangnhap',$_SESSION['u_magv'],'nguoiquanly','2'); 
echo "<img src='../css/img/user.png'> Xin chào: ".$ten ;
echo "<br><img src='../css/img/logout.png'> <a href='../logout.php' target=_parent><font color=red>Thoát</font></a>";
echo "  ,<a href='#' name='dialog_doipass' onclick='doipassdethi()' ><font color=yellow> Đổi Password</font></a>";

?>
<p></p>
<div id="vung_thong_bao"></div>
<div id="tree">
  <ul>
	<li class="folder expnded">CMTEST2
<ul>
                 
  <li class="folder">ĐỀ THI
		  <ul>
        <li><a target="content" href="themdethi.php">Tạo Đề Thi</a>
	  <li><a target="content" href="danhsachdethi_gvxem.php">Các Đề thi</a>	       
</ul>
<li class="folder">CẤU TRÚC ĐỀ
<ul>

 <li><a target="content" href="themcautruc.php">Tạo Cấu Trúc Đề Thi</a>
		    <li><a target="content" href="xemcautrucdethi_xem.php">Tạo Tiết Câu Hỏi_Đề Thi</a>
 <li><a target="content" href="xemcautrucdethi2.php">Xem Cấu Trúc Đề Thi</a>
</ul>
   <li class="folder">CHẤM ĐIỂM
		  <ul>
			<li><a target="content" href="">Xem Bài Thi</a>            
	    </ul>
	  </ul>
</ul>
	</div>
      
 
    
</body>
</html>