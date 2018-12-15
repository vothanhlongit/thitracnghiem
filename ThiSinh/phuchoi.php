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
<title>Phuc Hoi</title>
<link href="../css/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="../SoanCauHoi/jquery/dialog_ts.css" /> 
 <link rel="stylesheet" href="../SoanCauHoi/jquery/stylesheet-pure-css1.css">
<script type="text/javascript" src="../SoanCauHoi/jquery/dialog.js"></script> 
<script src="../SoanCauHoi/jquery/jquery.js"></script>

<script type="text/javascript" src="../SoanCauHoi/jquery/fullscreen.js"></script> 

<style type="text/css">
/* EXPAND */
:-webkit-full-screen #header-container { display: none; visibility: hidden; }
:-webkit-full-screen #footer-container { display: none; visibility: hidden; }
:-moz-full-screen #header-container { display: none; visibility: hidden; }
:-moz-full-screen #footer-container { display: none; visibility: hidden; }
:fullscreen #header-container { display: none; visibility: hidden; }
:fullscreen #footer-container { display: none; visibility: hidden; }

:-webkit-full-screen header { height: 30px; }
:-webkit-full-screen footer { height: 30px; }
:-moz-full-screen header { height: 30px; }
:-moz-full-screen footer { height: 30px; }
:fullscreen header { height: 30px; }
:fullscreen footer { height: 30px; }

:-webkit-full-screen a.expand { bottom: 5px; }
:-moz-full-screen a.expand { bottom: 5px; }
:fullscreen a.expand { bottom: 5px; }
/* EXPAND */
</style>
<script type="text/javascript">
/*
function max1(){
var el = document.documentElement
    , rfs = // for newer Webkit and Firefox
           el.requestFullScreen
        || el.webkitRequestFullScreen
        || el.mozRequestFullScreen
        || el.msRequestFullScreen
;
if(typeof rfs!="undefined" && rfs){
  rfs.call(el);
} else if(typeof window.ActiveXObject!="undefined"){
  // for Internet Explorer
  var wscript = new ActiveXObject("WScript.Shell");
  if (wscript!=null) {
     wscript.SendKeys("{F11}");
  }
}
}
function toggleFullScreen() {
  if (!document.fullscreenElement &&    // alternative standard method
      !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
    if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
      document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
    }
  } else {
    if (document.cancelFullScreen) {
      document.cancelFullScreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitCancelFullScreen) {
      document.webkitCancelFullScreen();
    }
  }
//alert('ggg')
}

</script>

 
<script type="text/javascript">
$(window).blur(function(){
alert('BẠN KHÔNG ĐƯỢC PHÉP RỜI TRANG LÀM BÀI.');

 //window.focus();
// return false;
})
$(window).focus(function(){
 //alert('co');
});
//window.onclick=max1;
*/
</script>

 
<script type="text/javascript">
document.onkeydown = function (e) {
        if(e.which==91 ||e.which==17 ||e.which==18 ||e.which==27 ||e.which==122 )
               {
				   alert(e.which);
				return false;
				}
		
  }
 
</script>

<script type="text/javascript">
window.onbeforeunload = function() {
    return "Hey!, BẠN MUỐN ĐÓNG TRANG NÀY LẠI KHÔNG?";
};
</script>
<script type="text/javascript"> 
$(document).ready(function() { $('a[name=dialog]').click(function(e) { Dialog.show(e); }); });



function kiemtratg()
{
var tg=document.getElementById('disp').value;
//alert(tg);
if(parseFloat(tg)>0){	
var xn=confirm("BẠN CHƯA HẾT GIỜ THI!,BẠN MUỐN NỘP BÀI KHÔNG?");
if(xn==true)
return true;

}
return false;
}


 </script> 

<script type="text/javascript">
//vo hieu hoa right click
document.onselectstart=new Function('return false');
document.oncontextmenu=new Function('return false');	
 
 //disable f5 116,ctrl 17,alt 18,win 91,112 f12
 document.onkeydown = function (e) {
            if(e.which == 116||e.which == 17 ||e.which == 18||e.which == 123||e.which == 91||e.which ==27){
                   alert("Bạn không được nhấn phím này");
					return false;
            }
    }


 
 
 function getfilename(dt,dtfile)
{
var fullPath=document.getElementById(dt).value;
var filename = fullPath.replace(/^.*[\\\/]/, '')

filename = filename.substring(filename.lastIndexOf('/')+1);

var ext = filename.substring(filename.lastIndexOf('.')+1);

//alert(ext);
if(ext=='doc' || ext=='xls' || ext=='docx' || ext=='xlsx' || ext=='rar' || ext=='jpg'   )

//gan gia tri cho text	
document.getElementById(dtfile).value=filename;
else{
alert("File chọn không hợp lệ!");
document.getElementById(dtfile).value='';
}
}   

</script>
<script language="javascript">
// Created by: Neill Broderick :: http://www.bespoke-software-solutions.co.uk/downloads/downjs.php

var mins
var secs;

function dongho() {
   var x=document.getElementById('disp').value;
    mins=1 * m(x);
	// mins = 1 * m("02"); // change minutes here
     secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
	  
	 // secs =
     redo();
}

function m(obj) {
     for(var i = 0; i < obj.length; i++) {
          if(obj.substring(i, i + 1) == ":")
          break;
     }
     return(obj.substring(0, i));
}

function s(obj) {
     for(var i = 0; i < obj.length; i++) {
          if(obj.substring(i, i + 1) == ":")
          break;
     }
     return(obj.substring(i + 1, obj.length));
}

function dis(mins,secs) {
     var disp;
     if(mins <= 9) {
          disp = " 0";
     } else {
          disp = " ";
     }
     disp += mins + ":";
     if(secs <= 9) {
          disp += "0" + secs;
     } else {
          disp += secs;
     }
     return(disp);
}

function redo() {
     secs--;
     if(secs == -1) {
          secs = 59;
          mins--;
     }
     document.frmdethi.disp.value = dis(mins,secs); // setup additional displays here.
	//document.all.disp1.innerText= dis(mins,secs);
     if((mins == 0) && (secs == 0)) {
          window.alert("Đã hết giờ. Nhấn OK to tiếp tục."); // change timeout message as required
         document.frmdethi.submit(); // redirects to specified page once timer ends and ok button is pressed
     } else {
         dongho = setTimeout("redo()",1000);
     }
}

function init() {
  dongho();
}
window.onload = init;
</script>
<style type="text/css">
.thoigian {
  border:none;
  font-family:verdana;
  font-weight:bold;
  border-right-color:#FFFFFF;
  height:50px;
  background-color:#6666FF;
   font-size: 25pt;
	width:160px;
	text-align:left;
	color:#630;
	  
}
.tieude 
{
font-size:26px;
color: #0066FF	;
font-weight:400;
}
.traloitn
{
font-size:20px;
}
.traloitl {
  border:double;
  font-family:"Times New Roman", Times, serif;
 /* border-right-color:#FFFFFF;*/
  background-color:#CCC;
  font-size: 14pt;
    font-weight:bold;
text-align:left;
color:#630;
	  
}
a{
/* text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}
a:hover{
color:#FF0000;
font-size:18px;
}
.subtable{
  position:relative;	 
left:50px;	
}

.fixedElement {
    background-color:#6666FF;
    color: #F00;
    font-size: 14pt;
    position:fixed;
    top:50px;
    right:2px;
    width:100%;
    z-index: 1;
    text-align:left;
    font-weight:bold;
	
}
.fixedElement_footer {
    background-color:#99CC99;
    color: #F00;
    font-size: 14pt;
    position:fixed;
    top:60%; /* edit */
	height:30px;
    width:100%;
	left:83%;/* edit */
    z-index: 1;
    text-align:left;
    font-weight:bold;
	
}
.tgiansave{
font-size:xx-small;
	
}
</style>

<script type="text/javascript">

function get_radio_value(dt,mc,mbt)
{
//kiem tra ket noi	
 //var url = "http://localhost/cmtest2/thisinh/loaddethi.php";
 var url =window.location.href;
                $.ajax({
                    type: "HEAD",
                    url: url,
                    success: function (data) {
                      // alert("Cập nhật");
						document.getElementById('vung_thong_bao').innerHTML="<font color=blue>Conneted.</font>";
                    },
                    error: function (request, status) {
                       // alert("Không cập nhật");
					   document.getElementById('vung_thong_bao').innerHTML="<font color=red>No Conneted!.</font>";
                    }
                });		
//lay ma cau

var macau=mc;
//alert(macau);
mcValue=macau;
var mabaithi=mbt;
//alert(mabaithi);
mbtValue=mabaithi;

//TO mau chi link o duoi
var dtlink;
dtlink='a_'+macau;
//alert(dtlink);
document.getElementById(dtlink).style.color='#993300';

//lay lua chon ma cau goi y
for (var i=0; i < document.getElementsByName(dt).length; i++)
   {
   if (document.getElementsByName(dt)[i].checked)
      {
      var rad_val = document.getElementsByName(dt)[i].value;   	   
		 matlValue=rad_val;
		
//alert(matlValue);	 
	  $(document).ready(function(){      
          $("div#vung_thong_bao").load("updatetraloi.php",{mc: mcValue,mbt: mbtValue,mtl: matlValue});

       });
	  break;
	  }
   }//for


//hhien thi cau con lai

  $(document).ready(function() {	 

    var gtmb=document.getElementById('faq_search_input').value;
	var faq_search_input = gtmb;
	//var faq_search_input = $(this).val();   		// Lấy giá trị search của người dùng
	var dataString = 'giatrimabai='+ faq_search_input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "demsocauconlai.php",  				// File xử lý
			data: dataString,						// Dữ liệu truyền vào
			beforeSend:  function() {				// add class "loading" cho khung nhập
				$('input#faq_search_input').addClass('loading');
			},
			success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
			{
				$('#vung_socau_conlai').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
									
				if ($('input#faq_search_input').hasClass("loading")) {		// Kiểm tra class "loading"
					$("input#faq_search_input").removeClass("loading");		// Remove class "loading"
				} 
			}
		});
	return false;		// Không chuyển trang
});
 
    

}

function get_value_tuluan(mc,mbt,txttraloi)
{
//kiem tra ket noi	
 //var url = "http://localhost/cmtest2/thisinh/loaddethi.php";
 var url =window.location.href;
                $.ajax({
                    type: "HEAD",
                    url: url,
                    success: function (data) {
                      // alert("Cập nhật");
						document.getElementById('vung_thong_bao').innerHTML="<font color=blue>Conneted.</font></b>";
                    },
                    error: function (request, status) {
                       // alert("Không cập nhật");
					   document.getElementById('vung_thong_bao').innerHTML="<font color=red>No Conneted!.</font></b>";
                    }
                });		
//lay ma cau
var macau=mc;
//alert(macau);
mcValue=macau;
var mabaithi=mbt;
//alert(mabaithi);
mbtValue=mabaithi;

//TO mau chi link o duoi
var dtlink;
dtlink='a_'+macau;
//alert(dtlink);
document.getElementById(dtlink).style.color='#993300';

//lay  ket qua traloi
//alert(txttraloi);	
var traloi=document.getElementById(txttraloi).value;
  tlValue=traloi; 	   
	//alert(tlValue);	 
	  $(document).ready(function(){      
          $("div#vung_thong_bao").load("updatetraloi.php",{mc: mcValue,mbt: mbtValue,mtl: tlValue});

       });  
	   
//hhien thi cau con lai

  $(document).ready(function() {	 

    var gtmb=document.getElementById('faq_search_input').value;
	var faq_search_input = gtmb;
	//var faq_search_input = $(this).val();   		// Lấy giá trị search của người dùng
	var dataString = 'giatrimabai='+ faq_search_input;	// Lấy giá trị làm tham số đầu vào cho file ajax-search.php
	
		$.ajax({
			type: "GET",      						// Phương thức gọi là GET
			url: "demsocauconlai.php",  				// File xử lý
			data: dataString,						// Dữ liệu truyền vào
			beforeSend:  function() {				// add class "loading" cho khung nhập
				$('input#faq_search_input').addClass('loading');
			},
			success: function(server_response)		// Khi xử lý thành công sẽ chạy hàm này
			{
				$('#vung_socau_conlai').html(server_response).show();  	// Hiển thị dữ liệu vào thẻ div #searchresultdata
									
				if ($('input#faq_search_input').hasClass("loading")) {		// Kiểm tra class "loading"
					$("input#faq_search_input").removeClass("loading");		// Remove class "loading"
				} 
			}
		});
	return false;		// Không chuyển trang
});	   
	   
	   
	   
	   
	     
}



</script>
<!-- Auto save 30-->
<script language="javascript">
var count=0;
var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

function timer()
{  
  count=count+1;
  if (count >10)
  {
 //lay mabai thi
  var mbt=document.getElementById('faq_search_input').value;
  mbtValue=mbt; 	   
	//alert(tlValue);	 
	  $(document).ready(function(){      
          $("span#timer_save").load("autoupdate.php",{mbt: mbtValue});

       });    

  
  //reset	
	  count=0;
    return;
  }

 document.getElementById("timer_save").innerHTML=count + " giây"; // watch for spelling
}
</script>





</head>
<?php

 require_once("connect.php");
require_once("function.php");
 

  //doi ra ngay
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $n=date("Y");
 $t=date("m");
 $nn=date("d");
 $ngay=$n."-".$t."-".$nn;	
 $gio=date("h");
 $phut=date("i");
 $giay=date("s");   
 $ght=$gio.":".$phut.":".$giay;	
 
//nhan lai bien session
$mats= $_SESSION['user'];
$made=$_SESSION['made'];
$mamon=$_SESSION['mamon'];
$hten=get_a_field('mats',$mats,'thisinh',1);
$hinhts=get_a_field('mats',$mats,'thisinh',9);
//doi ra ten
$mng=get_a_field('madethi',$made,'dethi','3');
$ghichu=get_a_field('madethi',$made,'dethi','6');
$ngaysinh= get_a_field('mats',$mats,'thisinh',3);
$qq=get_a_field('mats',$mats,'thisinh',4);
$gtinh=get_a_field('mats',$mats,'thisinh',2);
//echo  $mats ."<br>$made<br>$mamon";
$tenmon=get_a_field('mamon',$mamon,'monthi','1');
$tenng=get_a_field('mangach',$mng,'ngach','1');
$tende=get_a_field('madethi',$made,'dethi','1');
$tg=get_a_field('madethi',$made,'dethi','2');


echo "<center><font color=black size=+2>Đề thi: $tende <br>Môn:$tenmon<br>Thời gian: $tg (phút)<br>Ghi chú: $ghichu</font></font></center><hr color=#003366>";


?>
<body>
<?php
//tim lai ma bai thi chua nop
$qr_baithi=mysql_query("select baithithisinh.mabaithi,madethi from baithithisinh,diem_cau,chitiet_baithi where chitiet_baithi.macau=diem_cau.macau and chitiet_baithi.mabaithi=diem_cau.mabaithi and baithithisinh.mabaithi=diem_cau.mabaithi and mats='$mats' and trangthai <='1' and madethi='$made'");
	
$kq_baithi=mysql_fetch_array($qr_baithi);	
$mabaithi=$kq_baithi['mabaithi'];
$made=$kq_baithi['madethi'];
//gan session mabaithi
$_SESSION['mabaithi']=$mabaithi;


$tgbd=get_a_field('mabaithi',$mabaithi,'baithithisinh','4');
$tgcuoi=laythoigian_traloicuoi($mabaithi);

$tgconlai=0;
//tgian su dung
$tgsd=caltime($tgbd,$tgcuoi);
//tgian con lai
if($tg<=$tgsd)
$tgconlai=0;
else
$tgconlai=$tg-$tgsd;

//mang luu cac macau
$stack = array ();



?>
<form action="ketqua.php" method="post"  name="frmdethi" enctype="multipart/form-data">
<?php
//dem xem de thi bao nhieu nhom
$qrnhom=mysql_query("select nhom.manhom,tennhom,diemcautruc,cautrucde.macautrucde from  cautrucde,nhom,dethi where cautrucde.manhom=nhom.manhom and dethi.madethi=cautrucde.madethi and dethi.madethi='$made' order by right(nhom.manhom,1)");
$sttallcau=1;
$sttnhom=1;
$socau_ct=0;
$socau_con=0;
$socau_ntn=0;
while($kqnhom=mysql_fetch_array($qrnhom))
	  {
		$mn= $kqnhom['manhom'];		
		$tn= $kqnhom['tennhom'];
		$diemct= $kqnhom['diemcautruc'];
		$mact= $kqnhom['macautrucde'];	
		//echo $mn."<br>".$md."<br>";
		$socau_ct=get_a_field('macautrucde',$mact,'cautrucde','4');
//echo "<font color=blue size=+2>$sttnhom.Nhóm: $tn ($diemct điểm),$socau_ct câu</font><br>";	

$qrdethi=mysql_query("select cauhoi.macau,absolute,tieude,mota,maloai,madethi,cauhoi.manhom from cautrucde,chitiet_cauhoi_cautruc,cauhoi where cautrucde.macautrucde=chitiet_cauhoi_cautruc.macautrucde and chitiet_cauhoi_cautruc.macau=cauhoi.macau  and madethi='$made' and cauhoi.manhom='$mn' order by rand()");
$stt=0;	 

 while($kqdethi=mysql_fetch_array($qrdethi))
	  {
	$macau=$kqdethi['macau'];
	$tde=$kqdethi['tieude'];	
	$mta=$kqdethi['mota'];	 
	$ml=$kqdethi['maloai'];	
	$mn=$kqdethi['manhom'];	
	$md=$kqdethi['madethi'];	
	$daovt=$kqdethi['absolute'];	
	//echo $macau."<br>";

if($ml=='1')	//trac nghiem
{
	//dao vi tri cac cau traloi
	if($daovt>0)
		$qrtraloi=mysql_query("Select * from traloi_tn where macau='$macau' and traloi<>'' order by rand()");
	else
	$qrtraloi=mysql_query("Select * from traloi_tn where macau='$macau' and traloi<>'' order by right(matraloi_tn,1)");
?>	
<table width="1087" border="1"  >
  <tr>
    <td width="101"><b><font color="red">Câu: &nbsp;<?php  //echo ++$stt; 
	echo $sttallcau;
	 ?></font></b><br /><?php echo "<a name=".$macau."></a>"; $stack[$sttallcau]= $macau; ?>
     <input type="hidden" name="<?php echo "txtcau".$sttallcau;  ?>" id="<?php echo "txtcau".$sttallcau;  ?>"  value="<?php echo $macau ?>"  />
     <input type="text"  name="<?php echo "txtdiemcau".$sttallcau;  ?>" id="<?php echo "txtdiemcau".$sttallcau; ?>" value="<?php echo round($diemct/$socau_ct,3) ?>" size="6" readonly="readonly"  /></td>
    <td width="902"><font class="tieude" ><?php echo $tde   ?></font><br />
      <?php echo $mta; ?>
    </td>
    </tr>
<?php
$tt="A";
while($kqtl=mysql_fetch_array($qrtraloi))
	{

?>
 
  <tr>
    <td><input type="radio" name="<?php echo "rad".$sttallcau; ?>" id="<?php echo "rad".$sttallcau; ?>" value="<?php echo  $kqtl['matraloi_tn'] ?>" onclick="get_radio_value('<?php echo "rad".$sttallcau; ?>','<?php echo $macau ?>','<?php echo $mabaithi ?>')" <?php if($kqtl['matraloi_tn']==tim_matraloi_tn_trong_temp($macau,$mabaithi,$kqtl['matraloi_tn'])) echo "checked";   ?>  />
    <label for="<?php echo "rad".$sttallcau; ?>"><span><span></span></span><?php echo $tt++ ?></label><br /></td>
    <td><font class="traloitn" ><?php echo $kqtl['traloi']  ?></font></td>
    </tr>
    <?php
      } //while 2
  
	?>
</table>


<?php
 
 
 $sttallcau++;
 
  //update lai thoi gian lan 2
 
//$query_up1="UPDATE bailam_ts_temp SET thoigiantraloi='$ght' WHERE macau='$macau' and mabaithi='$mabaithi'";
 // $result1=mysql_query($query_up1);
  
 }//if tn
 elseif($ml=='2')//tu luan
{
	//echo "<br>";
 
 $qrtraloi=mysql_query("Select * from traloi_tl where macau='$macau' ");

while($kqcautl=mysql_fetch_array($qrtraloi))
{
?>	
<table width="1079" border="1">
  <tr>
    <td width="141"><b><font color="red">Câu:
        <?php // echo ++$stt; 
		echo $sttallcau;
		 ?>
    </font></b><br /><?php //echo $kqcautl['matraloi_tl'] ?><?php echo "<a name=".$macau."></a>"; $stack[$sttallcau]= $macau; ?>
    <input type="hidden" name="<?php echo "txtcau".$sttallcau;  ?>" id="<?php echo "txtcau".$sttallcau;  ?>"  value="<?php echo $macau ?>"  />
    <input type="text" name="<?php echo "txtdiemcau".$sttallcau;  ?>" id="<?php echo "txtdiemcau".$sttallcau;  ?>"  value="<?php echo round($diemct/$socau_ct,3) ?>" size="6" readonly="readonly"  />  
    
    </td>
    <td width="868"><font class="tieude"><?php echo $tde   ?></font><br />
      <?php echo $mta ?></td>
    </tr>
  <tr>
    <td valign="middle"><font color="#009933" size="+2">Trả lời:</font><br />
   
    
    </td>
    <td>&nbsp; <textarea  name="<?php echo "txttraloi".$sttallcau;  ?>" id="<?php echo "txttraloi".$sttallcau;  ?>" cols="100" rows="5" class="traloitl"><?php echo tim_traloi_tl_trong_temp($macau,$mabaithi) ?></textarea><br />
      <?php 
	if($kqcautl['kemfile']>0) {
		
	?>
       File name: <input type="text" name="<?php echo "txtfilename".$sttallcau ?>" id="<?php echo "txtfilename".$sttallcau ?>" readonly="readonly" />
   (<font color='#339999' size=+1>Trả lời có kèm file.</font>)
  <input type="file" name="files[]" id ="files[]" onchange="getfilename('<?php  echo "files[]" ?>','<?php echo "txtfilename".$sttallcau ?>')" size="1" />
  <?php
	
	}// co file
	?> 
    
    <br />
      
      <input type="button" value=" Lưu " name="<?php echo "btn".$sttallcau ?>" id="<?php echo "btn".$sttallcau ?>" onclick="get_value_tuluan('<?php echo $macau ?>','<?php echo $mabaithi ?>','<?php echo "txttraloi".$sttallcau;  ?>')"/></td>
    </tr>
</table>	
<?php	

}//while  tl

//echo $diemcau_tl;
$sttallcau++;

//cap nhat lai thoi gian lan 2
//$query_up2="UPDATE bailam_ts_temp SET thoigiantraloi='$ght' WHERE macau='$macau' and mabaithi='$mabaithi'";
 //$result2=mysql_query($query_up2);
 
 
}// if tluan

elseif($ml=='3')//nhieu trac nghiem
{
	$socau_ntn++;
	
	//echo "<br><br>";
	//echo "<b><font color='red'> Câu: ".++$stt."</font></b><br>";
	echo "<b><font color='red'> Câu: ".$sttallcau."</font></b><br>";	
	echo "<b>Mã Câu:</b> ".$macau."<br>";
	
	echo "<input type='hidden' name='txtcau".$sttallcau."' id='txtcau".$sttallcau."' value='$macau' />";
echo "<b>Tiêu đề:</b> ".$tde."<br>";
	echo "<b>Mô tả:</b><br><div> ".$mta."</div><br>";
	$stt2="1";	
    $qrtraloi_mt=mysql_query("Select * from traloi_ntn where macau='$macau' order by round(mid(matraloi_ntn,instr(matraloi_ntn,'NTN-')+4,5),0) asc ");
	 $socau_sub=dem_socau_nhieu_tracnghiem($macau);
    while($kqcau_mt=mysql_fetch_array($qrtraloi_mt)){	
	
	 $macau_mt=$kqcau_mt['matraloi_ntn'];

	 $daovt1=$kqcau_mt['absolute'];	
	 if($daovt1>0) //dao vi tri cac cau con
	 $qrtraloi_mt_sub=mysql_query("Select * from traloi_ntn_sub where matraloi_ntn='$macau_mt' order by rand() ");
	 else
	  $qrtraloi_mt_sub=mysql_query("Select * from traloi_ntn_sub where matraloi_ntn='$macau_mt' order by right(matraloi_ntn_sub,1) asc ");
?>
<table width="1027" border="1" class="subtable">
  <tr>
    <td width="99"><font color="#009999"><b>Câu:
        <?php // echo $stt.'.'.++$stt2; 
		echo $sttallcau.".".$stt2;
		$socau_con++;
		$sttall_sub=$sttallcau.".".$stt2;
		 ?>
    </b></font><br /><?php 
	//echo $macau_mt 
	 $stack[$sttall_sub]= $macau_mt ; 
	echo "<a name=".$macau_mt ."></a>";
	?>
    <input type="text" name="<?php echo "txtdiemcau".$sttallcau."-".$stt2;  ?>" id="<?php echo "txtdiemcau".$sttallcau."-".$stt2;  ?>"  value="<?php echo round($diemct/($socau_ct*$socau_sub),3) ?>" size="6" readonly="readonly" />
    </td>
    <td width="912"><font class="tieude"><?php echo $kqcau_mt['noidung']   ?></font><br /></td>
    </tr>
  <?php
     $stt3="A";
   while($kqcau_mt_sub=mysql_fetch_array($qrtraloi_mt_sub)){
	   
	   $ma_sub=$kqcau_mt_sub['matraloi_ntn_sub'];
  ?>
  <tr>
    <td><input type="radio"  name="<?php echo "rad".$sttallcau."-".$stt2; ?>"  id="<?php echo "rad".$sttallcau."-".$stt2; ?>" value="<?php echo $kqcau_mt_sub['matraloi_ntn_sub'] ?>" onclick="get_radio_value('<?php echo "rad".$sttallcau."-".$stt2; ?>','<?php echo $macau_mt ?>','<?php echo $mabaithi ?>')" <?php if($ma_sub ==tim_matraloi_tn_trong_temp($macau_mt,$mabaithi,$kqcau_mt_sub['matraloi_ntn_sub'])) echo "checked";   ?> /><label for="<?php echo "rad".$sttallcau."-".$stt2; ?>"><span><span></span></span>
      <?php echo $stt3 ?></label><br /><?php  //echo $ma_sub  ?>
      
      </td>
    <td><font class="traloitn" ><?php echo $kqcau_mt_sub['traloi']  ?> </font></td>
    </tr>
  <?php
    $stt3++;
   } //while 2
 
  ?>
</table>
<?php
$stt2++;
		


} // while 1


$sttallcau++;
//update thoi gian lan 2
//$query_up3="UPDATE bailam_ts_temp SET thoigiantraloi='$ght' WHERE macau='$macau_mt' and mabaithi='$mabaithi'";
//$result3=mysql_query($query_up3);

}//if n trac nghiem

 }	//while de thi	
 
 //lay so cau tn
 $_SESSION['socau_all']=$sttallcau-1;
 
$sttnhom++;
} //while nhom	
	
?>
<hr color="#FF0000" />
<!--<center>
<input type="submit" value="NỘP BÀI" class="command_finish" onclick=" return kiemtratg(); "   />
</center> -->


<div class="fixedElement" name="hienthi" style="width: 220px; height: 320px; color: #333; background-color:#99CC99;
">
<?php
if($hinhts!='')
 $h= '<img src=../HINH_THISINH/'.$hinhts.' width=100 height=150 />'; 
 else 
 $h='<img src=../css/img/noimage.png width=100 height=100 />'; 
 echo $h;
?>
<br />
<input type="text"  readonly="true" name="disp" id="disp" class="thoigian" value="<?php  echo $tgconlai  ?>" /><br />
<a href="#" name="dialog">Thông tin của Bạn</a> 
<br />
<?php echo "<b>SBD:</b> <font color='#CC0033' size=+1>".  strtoupper( $mats)."</font><br>";  echo "<b>Họ tên:</b> <font color='#CC0033' size=+1>$hten</font><br>"; ?>
 
  <div id="vung_socau_tong" style="font-size:14px;background-color:#99CC99" name="vung_socau_tong">
Tổng số câu:<font color='red'> <?php if($socau_ntn>0) echo --$sttallcau + $socau_con-$socau_ntn; else echo --$sttallcau; ?> </font>
 </div>
 <div id="vung_socau_conlai" style="font-size:14px;background-color:#99CC99" name="vung_socau_conlai">
 ...  
 </div> 
<input type="hidden" id="faq_search_input" name="faq_search_input"  value="<?php  echo $mabaithi;  ?>" />
 <span id="timer_save" class="tgiansave"></span>

<div id="vung_thong_bao" style="font-size:14px" name="vung_thong_bao">...</div>
<center>
<input type="submit" value="NỘP BÀI" class="command_finish" onclick=" return kiemtratg(); "   />
</center>
</div>  
 
  
   <div id="boxes"> 
 <div id="dialog" class="window"> <b><font color="blue"size=+2>Thông tin của bạn</font></b>
 <div style="float:right;"><a href="#thongtin"class="close"/>Close</a></div> <hr />
 <div>

<?php  
$ip=getRealIpAddr();
 echo "<b>IP:</b>".$ip."<br>";
echo "<b>SBD:</b> <font color='#CC0033' size=+2>".$mats."</font><br>";  echo "<b>Họ Tên:</b> <font color='#CC0033' size=+2>$hten</font><br>";
 echo "<b>Ngày sinh:</b> <font color='#333333'>$ngaysinh</font><br>";
 echo "<b>Giới tính:</b> <font color='#333333'>$gtinh</font><br>";
  echo "<b>Quê quán:</b> <font color='#333333'>$qq</font><br>";
 ?> 

</div>
 </div>
  <div id="mask"></div>
   </div>  
  
  </form>  
 <div class="fixedElement_footer" name="hienthi_cau" style="height:205px;width: 220px;" >
   <?php

while(list($k,$v)=each($stack)){
	//echo $v;
	if(tim_matraloi_tn_roi_trong_temp($v,$mabaithi)!='no' && tim_traloi_tl_roi_trong_temp($v,$mabaithi)!='no')
echo "<a href=#".$v." id=a_".$v." name=a_".$v."><font color='#993300'>$k.</font></a>, ";

else
echo "<a href=#".$v." id=a_".$v." name=a_".$v.">$k</a>, ";
}
?>
</div>
<script>
$(window).scroll(function(e){
  $el = $('.fixedElement_footer');
  if ($(this).scrollTop() > 200 && $el.css('position') != 'fixed'){
    $('.fixedElement_footer').css({'position': 'fixed', 'top': '50%'});
  }
});
</script>
<?php
//update lai trang thai
$queryu="UPDATE baithithisinh SET trangthai='1',ip='$ip' WHERE  mabaithi='$mabaithi'";
	//echo $query;
    $result=mysql_query($queryu);



?>
  
    

<p align="center"><b>...HẾT...</b></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<script>
$(window).scroll(function(e){
  $el = $('.fixedElement');
  if ($(this).scrollTop() > 200 && $el.css('position') != 'fixed'){
    $('.fixedElement').css({'position': 'fixed', 'top': '85%'});
  }
});
</script>

</body>
</html>