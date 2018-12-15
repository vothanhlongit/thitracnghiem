<?php


//include_once "connect.php";
function sinhmats()
{

$qrdem=mysql_query("select * from thisinh");
$tong=mysql_num_rows($qrdem);
// echo $tong;
 if($tong<=0)
    {
	$key1= "TS-1";
     return $key1;
	}
	else
	{
	$vt=$tong-1;
	//$tong++;
	$qr=mysql_query("select * from thisinh order by round(mid(mats,instr(mats,'-')+1,5),0) asc limit $vt,$tong");
	$kq=mysql_fetch_array($qr);
	
	 $so= substr($kq['mats'],strpos($kq['mats'],"-")+1,strlen($kq['mats']));
	  // tang len 1 dv
      // $so=$so+1;
	 $key1= "TS-".++$so;
	 
	return $key1;
	 }
}//function 

//doi ma ra ten

function get_a_field($keyname,$value,$tablename,$index)
{

$qr=mysql_query("select * from $tablename where $keyname='$value'");
$kq=mysql_fetch_array($qr);
return $kq[$index];
	
}


//chon dap an cau tra ve diem
function dapan_cau_tn($matl,$diem)
{

$da=get_a_field("matraloi_tn",$matl,"traloi_tn",2);
return($da>0?$diem:0);
}

function dapan_cau_ntn($matl,$diem)

{
$da=get_a_field("matraloi_ntn_sub",$matl,"traloi_ntn_sub",2);
return($da>0?$diem:0);	
}
	


//dem socau hoi cua 1 cau truc

function count_socau_chitiet_cautruc($mact)
{

 $qr_tong1=mysql_query("select count(macau)as dem from chitiet_cauhoi_cautruc where macautrucde='$mact' group by macautrucde");
 $kqtong1=mysql_fetch_array( $qr_tong1);
 $tong1= $kqtong1['dem'];
 return $tong1;
	
}



function caltime($t1,$t2)
{

    $diff = abs(strtotime($t2) - strtotime($t1));
 
    $hours = floor($diff/3600);
    $minutes = floor(($diff - $hours*60*60)/ 60);
    $seconds = floor(($diff  - $hours*60*60- $minutes*60));
    //echo "<br />".$hours." hours, ".$minutes." minutes, ".$seconds." seconds";  
	return $minutes;
}



function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))  //check ip from share internet   
 	{      $ip=$_SERVER['HTTP_CLIENT_IP'];    }    
 	 elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))       //to check ip is pass from proxy    
	 {      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];    }    
 	else    
	 {      $ip=$_SERVER['REMOTE_ADDR'];    }    
	 return $ip;

}

function get_client_ip() {
     $ipaddress = '';
     if ($_SERVER['HTTP_CLIENT_IP'])
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
     else if($_SERVER['HTTP_X_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
     else if($_SERVER['HTTP_X_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
     else if($_SERVER['HTTP_FORWARDED_FOR'])
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
     else if($_SERVER['HTTP_FORWARDED'])
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
     else if($_SERVER['REMOTE_ADDR'])
         $ipaddress = $_SERVER['REMOTE_ADDR'];
     else
         $ipaddress = 'UNKNOWN';

     return $ipaddress; 
}



function sinhmabaithi($mats,$made)
{
return $mats.$made;

}
function dem_socau_nhieu_tracnghiem($macau)
{
//dem o table n tracnghiem

$qrntn=mysql_query("select matraloi_ntn from  traloi_ntn where macau='$macau'");
$tong_ntn=mysql_num_rows($qrntn);
return $tong_ntn;

	
}

function dem_sonhom_dethi($made)
{
$qr_nhom=mysql_query("select count(macautrucde)as sonhom from cautrucde where madethi='$made' group by madethi");
$tong=mysql_fetch_array($qr_nhom);	
return $tong['sonhom'];

}

function tinhdiem_tn($mabai)
{
$qr=mysql_query("select sum(diemcau)as sodiem from diem_cau,chitiet_baithi where chitiet_baithi.macau=diem_cau.macau and chitiet_baithi.mabaithi=diem_cau.mabaithi and diem_cau.mabaithi='$mabai' group by diem_cau.mabaithi");	
$tongdiem=mysql_fetch_array($qr);
return $tongdiem['sodiem'];	

}

function tim_matraloi_tn_trong_temp($macau,$mabaithi,$matraloi)
{
$qr=mysql_query("select matraloi_tn from bailam_ts_temp where macau='$macau' and mabaithi='$mabaithi' and matraloi_tn='$matraloi' ");	
$kq=mysql_fetch_array($qr);
return $kq['matraloi_tn'];		
	
}
function tim_matraloi_tn_roi_trong_temp($macau,$mabaithi)
{
$qr=mysql_query("select matraloi_tn from bailam_ts_temp where macau='$macau' and mabaithi='$mabaithi'");	
$kq=mysql_fetch_array($qr);
return $kq['matraloi_tn'];		
	
}

function tim_traloi_tl_trong_temp($macau,$mabaithi)
{
$qr=mysql_query("select traloi from bailam_ts_temp where macau='$macau' and mabaithi='$mabaithi' and traloi <>'no' ");	
$kq=mysql_fetch_array($qr);
return $kq['traloi'];		
	
}
function tim_traloi_tl_roi_trong_temp($macau,$mabaithi)
{
$qr=mysql_query("select traloi from bailam_ts_temp where macau='$macau' and mabaithi='$mabaithi'");	
$kq=mysql_fetch_array($qr);
return $kq['traloi'];		
	
}

function laythoigian_traloicuoi($mabai)
{
//sap xep giam de lay tgMax cau traloi sau cung
$qrmax=mysql_query("select mabaithi,thoigiantraloi  from bailam_ts_temp where  mabaithi='$mabai' and thoigiantraloi <>'' order by thoigiantraloi desc limit 0,1");	
$kqmax=mysql_fetch_array($qrmax);
return $kqmax['thoigiantraloi'];	
}

function tim_matraloi_tn_trong_chitiet_baithi($macau,$mabaithi,$matraloi)
{
$qr=mysql_query("select matraloi_tn from chitiet_baithi,diem_cau where diem_cau.mabaithi=chitiet_baithi.mabaithi and diem_cau.macau=chitiet_baithi.macau and diem_cau.mabaithi='$mabaithi' and diem_cau.macau='$macau'  and matraloi_tn='$matraloi' ");	
$kq=mysql_fetch_array($qr);
return $kq['matraloi_tn'];		
	
}

function tim_traloi_tl_trong_chitiet_baithi($macau,$mabaithi)
{
$qr=mysql_query("select traloi from chitiet_baithi,diem_cau where diem_cau.mabaithi=chitiet_baithi.mabaithi and diem_cau.macau=chitiet_baithi.macau and diem_cau.mabaithi='$mabaithi' and diem_cau.macau='$macau'  and traloi <>'no' ");	
$kq=mysql_fetch_array($qr);
return $kq['traloi'];		
	
}

function getpath($macau,$mabaithi){
	
$qr=mysql_query("select kemfile from chitiet_baithi,diem_cau where diem_cau.mabaithi=chitiet_baithi.mabaithi and diem_cau.macau=chitiet_baithi.macau and diem_cau.mabaithi='$mabaithi' and diem_cau.macau='$macau'");	
$kq=mysql_fetch_array($qr);
return $kq['kemfile'];	
	
}


function cau_tl_chamroi($macau,$mabai)
{

$qr=mysql_query("select diemcau from diem_cau where mabaithi='$mabai' and macau='$macau' ");
$kq=mysql_fetch_array($qr);
if(is_null($kq['diemcau']))
return 0; //chua cham 
return 1; //cham roi
;	
	
}

function diemcau_tl_chamroi($macau,$mabai)
{

$qr=mysql_query("select diemcau from diem_cau where mabaithi='$mabai' and macau='$macau' ");
$kq=mysql_fetch_array($qr);
return $kq['diemcau'];
	
	
}

function laymabaithi($mats,$made){
	
$qr=mysql_query("select mabaithi from baithithisinh where madethi='$made' and mats='$mats' and xemdapan='1' ");
$kq=mysql_fetch_array($qr);
return $kq['mabaithi'];	
	
}

function hienthingay()
{
	
 $str_search = array ( 
"Mon", 
"Tue", 
"Wed", 
"Thu", 
"Fri", 
"Sat", 
"Sun", 
"am", 
"pm", 
":" 
); 
	
	$str_replace = array ( 
"Thứ hai", 
"Thứ ba", 
"Thứ tư", 
"Thứ năm", 
"Thứ sáu", 
"Thứ bảy", 
"Chủ nhật", 
" ph&#250;t, s&#225;ng", 
" ph&#250;t, chi&#7873;u", 
" gi&#7901; " 
);
$timenow = gmdate("D, d-m-Y", time() + 7*3600); 
$timenow = str_replace( $str_search, $str_replace, $timenow); 
return $timenow;
}
function demsocau_thisinh_datraloi($mabai)
{
$qr=mysql_query("select count(*)as dem from bailam_ts_temp where  mabaithi='$mabai' and matraloi_tn <>'no' or traloi <> ''");	
$kqdem=mysql_fetch_array($qr);
return $kqdem['dem'];
}

function kiemtra_xoathisinh($mts){


 $qr1=mysql_query("select mabaithi from baithithisinh where mats='$mts'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}

function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}
function dem_so_cau_dethi($made){
$qr=mysql_query("select count(macau)as dem from chitiet_cauhoi_cautruc,cautrucde where chitiet_cauhoi_cautruc.macautrucde=cautrucde.macautrucde and madethi='$made' ");	
$kqdem=mysql_fetch_array($qr);
return $kqdem['dem'];	
}

?>


