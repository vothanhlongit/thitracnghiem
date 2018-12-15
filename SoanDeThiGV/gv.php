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
<title>Explorer Giao Vien</title>
<link href="../css/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
 
  </head>
</head>

<frameset rows="18%,85%,5%"  >
<frame name ="header" src="../header.php" scrolling="no" noresize="noresize" >
<frameset cols="15%,85%"  >
<frame name ="header" src="linklistgv.php" >
<frame name ="content" src="../GiamKhaoGV/danhsachbaithi.php" id="f2" >
</frameset>

<frame name ="footer" src="../footer.php"scrolling="no" noresize="noresize"   >
</frameset>
<noframes>
TRÌNH DUYỆT KHÔNG HỖ TRỢ THẺ FRAME!.
</noframes>
<noframes>
TRÌNH DUYỆT KHÔNG HỖ TRỢ THẺ FRAME!.
</noframes>

<body>
</body>
</html>