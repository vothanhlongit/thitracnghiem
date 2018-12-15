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
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<link href="../css/dd.css" rel="stylesheet" type="text/css" />
<title>Ket qua thi</title>
<script type="text/javascript">
document.onselectstart=new Function('return false');
document.oncontextmenu=new Function('return false');	
//disable f5 116
 document.onkeydown = function (e) {
            if(e.which == 116){
                    alert("Bạn không được nhấn phím F5");
					return false;
            }
    }
	
</script>
</head>

<body>
<div id="mainpage" class="mainpage">
<div id="header">
</div>
<div id="main_in_container">
<?php
require("connect.php");
require("function.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
//doi ra ngay
 $n=date("Y");
 $t=date("m");
  $nn=date("d"); 
  $gio=date("h");
  $phut=date("i");
  $giay=date("s");
   
 $ght=$gio.":".$phut.":".$giay;	 
 $ngaytraloi=$n."-".$t."-".$nn;
  //nhan lai bien session
$mats= $_SESSION['user'];
$made=$_SESSION['made'];
$mamon=$_SESSION['mamon'];
$socau=$_SESSION['socau_all'];
$mabaithi=$_SESSION['mabaithi'];
//$tongsonhom=$_SESSION['all_sonhom'];

$mangach=get_a_field('madethi',$made,'dethi','3');
$tenngach=get_a_field('mangach',$mangach,'ngach','1');
$hten=get_a_field('mats',$mats,'thisinh',1);
$tenmon=get_a_field('mamon',$mamon,'monthi','1');
$tende=get_a_field('madethi',$made,'dethi','1');
$tscau_de=get_a_field('madethi',$made,'dethi','8');
$thangdiem=get_a_field('madethi',$made,'dethi','9');

// dem, so luong loai cau
$dem_tn=0;
$dem_tl=0;
for($i=1;$i<=$socau;$i++){
	$dt="txtcau".$i;
	$mc=$_POST[$dt];
	//echo $_POST[$dt] ."<br>";
	if(get_a_field('macau',$mc,'cauhoi',3)=='1'){
	$dem_tn++;
	}
	elseif(get_a_field('macau',$mc,'cauhoi',3)=='2'){
	$dem_tl++;	
	}
	else{
	$dem_tn=$dem_tn  + dem_socau_nhieu_tracnghiem($mc);
	}

}//for



//khoi tao duong dan

$desired_dir="../FilesUpload_TS/".$made;
$demfile=0;
$strfile="";
//cac file upload
if(isset($_FILES['files'])){

    $errors= array();
	foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $_FILES['files']['name'][$key];
		$file_size =$_FILES['files']['size'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
		$file_type=$_FILES['files']['type'][$key];	
        if($file_size > 2097152){
			$errors[]='File size must be less than 2 MB';
        }		
       // $query="INSERT into upload_data (`USER_ID`,`FILE_NAME`,`FILE_SIZE`,`FILE_TYPE`) VALUES('$user_id','$file_name','$file_size','$file_type'); ";
       // $desired_dir="../FilesUpload_TS";
        if(empty($errors)==true){
            if(is_dir($desired_dir)==false){
                mkdir("$desired_dir", 0700);// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false){
                move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            $demfile++;
			$strfile=$strfile."; ".$file_name."; ";
			}else{		// rename the file if another one exist
               $new_dir="$desired_dir/".time().$file_name;
                 rename($file_tmp,$new_dir) ;				
            }
		// mysql_query($query);			
        }else{
                print_r($errors);
        }
    }
	if(empty($error)){
		echo "Upload Success!.<br>";
	}

}

$so_cau_dung_tn=0;
$so_cau_dung_ntn=0;
//doc lai cac traloi 
for($j=1;$j<=$socau;$j++){
	$dt1="rad".$j;
	$dtmc="txtcau".$j;
	$dt3="txttraloi".$j;
	$dt4="txtfilename".$j;
	$dtdiemcau="txtdiemcau".$j;
	$mc=$_POST[$dtmc];

	if(isset($_POST[$dt1]) ) //tn
	{
		$diem=$_POST[$dtdiemcau];
		$matl=$_POST[$dt1];
		//echo $mc."--->".$matl."------$diem<br>";
	//$qr=mysql_query("insert into chitiet_baithi (macau,mabaithi,matraloi_tn)values('$mc','$mabaithi','$matl')");
	$qrupdate=mysql_query("update chitiet_baithi set matraloi_tn='$matl' where macau='$mc' and mabaithi='$mabaithi'");
	
	//tinh diem cau
	$d=dapan_cau_tn($matl,$diem);
	//dem so cau dung
	if($d>0)
	$so_cau_dung_tn++;
	//echo $diem;
	//update diem_cau
	$qrupdate=mysql_query("update diem_cau set diemcau='$d' where macau='$mc' and mabaithi='$mabaithi'");
		
	}
	elseif(isset($_POST[$dt3])) //tluan
	{
		$diem=$_POST[$dtdiemcau];
		$tloi=$_POST[$dt3];
		$dd="";
	//$qr=mysql_query("insert into chitiet_baithi (macau,mabaithi,traloi,kemfile)values('$mc','$mabaithi','$tloi','')");
	if(isset($_POST[$dt4])){
	$tenfile= $_POST[$dt4];	
	$dd=$desired_dir."/".$tenfile;
	//echo $mc."--->".$tloi."-----$diem----$tenfile<br>";
	}
	//echo $mc."--->".$tloi."-----$diem<br>";
	
	$qrupdate=mysql_query("update chitiet_baithi set traloi='$tloi',kemfile='$dd' where macau='$mc' and mabaithi='$mabaithi'");
	
	//ko tinh diem tu luan
		
	}
	elseif(!isset($_POST[$dt1]) && !isset($_POST[$dt3]))//ntn
	{
		//toi da 20 cau nho ntn_sub
			
	for($m=1;$m<=20;$m++)
	{
	$dt2="rad".$j."-".$m;	
	$dt4="txtdiemcau".$j."-".$m;;
	
		if(isset($_POST[$dt2]))
		{
		$diem=$_POST[$dt4];
		$strmatraloi= $_POST[$dt2];
		$strma_ntn=substr($strmatraloi,0,strlen($strmatraloi)-2);
		//echo $strma_ntn."--->". $strmatraloi."-----$diem<br>";
      // $qr=mysql_query("insert into chitiet_baithi (macau,mabaithi,matraloi_tn)values('$strma_ntn','$mabaithi','$strmatraloi')");
	  	$qrupdate0=mysql_query("update chitiet_baithi set matraloi_tn='$strmatraloi' where macau='$strma_ntn' and mabaithi='$mabaithi'");
		 //tinh diem cau ntn
	$d=dapan_cau_ntn($strmatraloi,$diem);
	//echo $diem;
	//dem so cau dung ntn
	if($d>0)
	$so_cau_dung_ntn++;
	//update diem_cau
	$qrupdate=mysql_query("update diem_cau set diemcau='$d' where macau='$strma_ntn' and mabaithi='$mabaithi'");
			
		 
		 }	//if	
	 }//for sub
	} //else loai 3 ntn
	else {
		continue;
	
		}	//else 

}//for so cau

//tinh diem tn
 $diem_tn=round(tinhdiem_tn($mabaithi),3);

//xoa cac tra loi temp

$qrxoa=mysql_query("delete from bailam_ts_temp where mabaithi='$mabaithi'");

//cap nhat diem lai o baithithisinh
$qr_cn=mysql_query("update baithithisinh set diembaithi='$diem_tn' where mabaithi='$mabaithi'");

//bat trang thai da nop bai
$qr_ts=mysql_query("update baithithisinh set trangthai='2' where mabaithi='$mabaithi'");
?>
<center>
<table width="598" class="tableketqua">
 <tbody>
  <tr>
    <td colspan="2"><div align="center"><strong><font color="#000099" size="+2">BÁO KẾT QUẢ THI</font></strong></div></td>
    </tr>
  <tr>
    <th align="left"><strong>MÔN THI:</strong> &nbsp;</th>
    <td align="center"><font size="+2"><?php  echo $tenmon;   ?></font></td>
  </tr>
  <tr>
    <th align="left"><strong>NGẠCH:</strong> &nbsp;</th>
    <td align="center"><font size="+2"><?php  echo $tenngach;   ?></font></td>
  </tr>
  <tr>
    <th align="left"><strong>THÍ SINH:</strong>&nbsp;</th>
    <td ><font color="#FF0000" size="+2">(<?php  echo $mats;   ?>)    <?php  echo $hten;   ?></font></td>
  </tr>
  <tr>
    <th align="left"><strong>MÃ BÀI THI:</strong>&nbsp;</th>
    <td ><font color="#FF0000" size="+2"><?php echo $mabaithi ?></font></td>
  </tr>
  <tr>
    <th align="left"><strong>LOẠI ĐỀ:</strong></th>
    <td align="center"><font  size="+2">
	<?php if($socau==$dem_tn)
		echo "Trắc nghiệm";
		elseif($socau==$dem_tl)
			echo "Tự luận";
		else
		echo "Hỗn hợp";
	
	
	   ?> </font></td>
  </tr>
  <tr>
    <th width="245" align="left"><strong>TỔNG SỐ CÂU:</strong></th>
    <td width="341" align="center"><font size="+2"><?php echo $tscau_de ?></font></td>
  </tr>
  <tr>
    <th align="left"><strong>SỐ CÂU <BR />DẠNG TRẮC NGHIỆM:</strong></th>
    <td align="center"><font  size="+2"><?php echo $dem_tn ?></font><font color="#FF0000" size="+2">(<?php  echo "số câu đúng: ".$so_cau_dung_tn;   ?>) </font></td>
  </tr>
  <tr>
    <th align="left"><strong>SỐ CÂU <BR />DẠNG TỰ LUẬN: </strong></th>
    <td align="center"><font  size="+2"><?php echo $dem_tl."($demfile câu trả lời file)<br>"; if($demfile>0)
	echo $strfile;
	
	?> </font></td>
  </tr>
  <tr>
    <th align="left"><strong>SỐ ĐIỂM PHẦN<BR /> TRẮC NGHIỆM</strong></th>
    <td align="center"><font color="#FF0000" size="+2"><?php echo $diem_tn ?>/<?php echo $thangdiem; ?></font></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><input type="button" value="Đóng" class="command_close" onclick="window.close();"/></td>
  </tr>
   <tbody>
</table>
</center>



<?php

//go bo cac Sessesion
/*if (isset($_SESSION['b']))
 unset($_SESSION['b']);
if (isset($_SESSION['ten']))
 unset($_SESSION['ten']);
if (isset($_SESSION['a']))
 unset($_SESSION['a']);*/
 //session_unset();
?>

</div>
<div id="footer"> 
</div>
</div>
</body>
</html>
