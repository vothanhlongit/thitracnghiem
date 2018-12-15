<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dang nhap</title>
<link href="css/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/commands.css" type="text/css">
<style type="text/css">
input { 
  font-family: Verdana, Arial, Helvetica, sans-serif; 
  font-size: 14px; 
  font-style: normal; 
  font-weight: bold; 
  font-variant: normal;    
} 
a{
 /*text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}
a:hover{
color:#FF0000;
font-size:18px;
}
</style>

<script type="text/javascript">
document.onselectstart=new Function('return false');
document.oncontextmenu=new Function('return false');
function thongtin()
{
var nVer = navigator.appVersion;
var nAgt = navigator.userAgent;
var browserName  = navigator.appName;
var fullVersion  = ''+parseFloat(navigator.appVersion); 
var majorVersion = parseInt(navigator.appVersion,10);
var nameOffset,verOffset,ix;

// In Opera, the true version is after "Opera" or after "Version"
if ((verOffset=nAgt.indexOf("Opera"))!=-1) {
 browserName = "Opera";
 fullVersion = nAgt.substring(verOffset+6);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In MSIE, the true version is after "MSIE" in userAgent
else if ((verOffset=nAgt.indexOf("MSIE"))!=-1) {
 browserName = "Microsoft Internet Explorer";
 fullVersion = nAgt.substring(verOffset+5);
}
// In Chrome, the true version is after "Chrome" 
else if ((verOffset=nAgt.indexOf("Chrome"))!=-1) {
 browserName = "Chrome";
 fullVersion = nAgt.substring(verOffset+7);
}
// In Safari, the true version is after "Safari" or after "Version" 
else if ((verOffset=nAgt.indexOf("Safari"))!=-1) {
 browserName = "Safari";
 fullVersion = nAgt.substring(verOffset+7);
 if ((verOffset=nAgt.indexOf("Version"))!=-1) 
   fullVersion = nAgt.substring(verOffset+8);
}
// In Firefox, the true version is after "Firefox" 
else if ((verOffset=nAgt.indexOf("Firefox"))!=-1) {
 browserName = "Firefox";
 fullVersion = nAgt.substring(verOffset+8);
}
// In most other browsers, "name/version" is at the end of userAgent 
else if ( (nameOffset=nAgt.lastIndexOf(' ')+1) < 
          (verOffset=nAgt.lastIndexOf('/')) ) 
{
 browserName = nAgt.substring(nameOffset,verOffset);
 fullVersion = nAgt.substring(verOffset+1);
 if (browserName.toLowerCase()==browserName.toUpperCase()) {
  browserName = navigator.appName;
 }
}
// trim the fullVersion string at semicolon/space if present
if ((ix=fullVersion.indexOf(";"))!=-1)
   fullVersion=fullVersion.substring(0,ix);
if ((ix=fullVersion.indexOf(" "))!=-1)
   fullVersion=fullVersion.substring(0,ix);

majorVersion = parseInt(''+fullVersion,10);
if (isNaN(majorVersion)) {
 fullVersion  = ''+parseFloat(navigator.appVersion); 
 majorVersion = parseInt(navigator.appVersion,10);
}

  if(browserName!="Chrome")
  {
    alert("-BẠN NÊN DUYỆT BẰNG TRÌNH DUYỆT WEB 'CHROME'. \n -Phiên bản >=23. \n -Cám ơn Bạn!. ");
    document.getElementById('login_form').style.visibility='hidden';   

  }

}

</script>
<script type="text/javascript" >
 function kiemtra1()
 {

 if(document.frmdangnhap.txtuser.value=="")
	{
		alert(" Vui lòng nhập Tên Đăng nhập");
	
		 return false;
	}
if(document.frmdangnhap.txtpass.value=="")
	{
		alert(" Vui lòng nhập Mật mã");
	
		 return false;
	}	

	}
 </script>
</head>

<body onload="thongtin()" >
<div id="mainpage" class="mainpage">
<div id="header">
</div>
<div id="main_container">
<center>
        <form action="xulysaulogin.php" method="post" name="frmdangnhap" id="frmdangnhap" onsubmit="return kiemtra1();">
             <div id="login_form">
             <p><input type="text" name="txtuser" style="margin-right: 35px;margin-top: 85px; height: 28px;width: 267px;" placeholder="Tên đăng nhập"/></p>
               <p> <input type="password"  name="txtpass" style="margin-right: 35px;margin-top: 5px; height: 28px;width: 267px;" placeholder="Mật khẩu"/></p>
                <p><input name="btnlogin" type="submit" value="Đăng nhập" class="command_go" style="margin-top: 15px;"/></p>
 <br>
 <a href='Help/index.html' target="_new"><img src="css/img/help.gif" width="20" height="20" />HƯỚNG DẪN</a>
             </div>   
        </form>			
</center>
</div>
<div id="footer"> 
</div>
</div>
</body>
</html>
