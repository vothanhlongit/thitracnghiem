<?php
function laysomanhomtruoc($mamon)
{

$qr=mysql_query("select manhom from nhom where mamon='$mamon' order by round(mid(manhom,instr(manhom,'-')+1,5),0) desc limit 0,1");
$kq=mysql_fetch_array($qr);
 $str=$kq['manhom'];
return substr($str,strpos($str,'-',0)+1,5);

}

//include_once "connect.php";
function sinhmanhom($mamon)
{

$qrdem=mysql_query("select * from nhom where mamon='$mamon'");
$tong=mysql_num_rows($qrdem);
// echo $tong;
 if($tong<=0)
    {
	$key1= "N".$mamon."-1";
     return $key1;
	}
	else
	{
    $dem= laysomanhomtruoc($mamon);
	 $key1=  "N".$mamon."-".++$dem;
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
//xoa 1 cau hoi
function xoa_1_cauhoi_nhom($mn)
{
	
$qrnhom=mysql_query("select macau,maloai  from cauhoi where manhom='$mn'");	
while($kqnhom=mysql_fetch_array($qrnhom))	
{
$maloai=$kqnhom['maloai'];
$mc=$kqnhom['macau'];
//loai trac nghiem
if($maloai==1){
$qrxoatraloi_tn=mysql_query("delete from traloi_tn where macau='$mc'");
//xoa cauhoi
$qrxoacauhoi=mysql_query("delete from cauhoi where macau='$mc'");		
	
}
//tu luan
elseif($maloai==2){
$qrxoatraloi_tl=mysql_query("delete from traloi_tl where macau='$mc'");
//xoa cauhoi
$qrxoacauhoi=mysql_query("delete from cauhoi where macau='$mc'");		
	
}
else //nhieu trac nghiem
{
  //loc tim traloi_ntn
  $qrtraloi_ntn=mysql_query("select * from traloi_ntn where macau='$mc'");
   
  while($kqtraloi_ntn=mysql_fetch_array($qrtraloi_ntn)){  
  $mc3=$kqtraloi_ntn['matraloi_ntn']; 
  
  $qrxoatraloi_ntn_sub=mysql_query("delete from traloi_ntn_sub where matraloi_ntn='$mc3'");
  }
//xoa traloi_ntn
$qrxoatraloi_ntn=mysql_query("delete from traloi_ntn where macau='$mc'");

$qrxoacauhoi=mysql_query("delete from cauhoi where macau='$mc'");	
  	
} //else ntn
} //while 1
}//function
//xoa 1 cautruc
function xoa_chitiet_cautruc($mn)
{
$qr=mysql_query("select macautrucde  from cautrucde where manhom='$mn'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['macautrucde']; 
$xoa=mysql_query("delete from chitiet_cauhoi_cautruc where macautrucde='$ma'");	
}
}
//xoa 1 cautruc de
function xoa_cautruc_dethi($md)
{
$qr=mysql_query("select macautrucde  from cautrucde where madethi='$md'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['macautrucde']; 
$xoa=mysql_query("delete from chitiet_cauhoi_cautruc where macautrucde='$ma'");	
}
$xoactde=mysql_query("delete from cautrucde where madethi='$md'");
}

//xoa 1 baithi
function xoa_1_baithi($mb)
{
 
$xoa=mysql_query("delete from chitiet_baithi where mabaithi='$mb'");	
$xoa1=mysql_query("delete from diem_cau where mabaithi='$mb'");	
$xoa2=mysql_query("delete from baithi where mabaithi='$mb'");
}

//xoa 1 thisinh
function xoa_1_thisinh($mts)
{
$qr=mysql_query("select mabaithi  from baithithisinh where mats='$mts'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['mabaithi']; 
	xoa_1_baithi($ma);
}
$xoa2=mysql_query("delete from thisinh where mats='$mts'");
}

//xoa 1 donvi
function xoa_1_donvi($mdv)
{
$qr=mysql_query("select mats  from thisinh where madonvi='$mdv'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['mats']; 
	xoa_1_thisinh($ma);
}
$xoa2=mysql_query("delete from donvi where madonvi='$mdv'");
}


//xoa 1 kythi
function xoa_1_kythi($mkt)
{
$qr=mysql_query("select mats  from kythi where makythi='$mkt'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['mats']; 
	xoa_1_thisinh($ma);
}
$xoa2=mysql_query("delete from kythi where makythi='$mkt'");
}




//xoa 1 dethi
function xoa_1_dethi($md)
{
//nhanh 1	
$qr=mysql_query("select macautrucde  from cautrucde where madethi='$md'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['macautruc']; 	
$xoa=mysql_query("delete from chitiet_cauhoi_cautruc where macautrucde='$ma'");	
$xoa1=mysql_query("delete from cautrucde where macautrucde='$ma'");
}
$xoa2=mysql_query("delete from dethi where madethi='$md'");

//nhanh 2
$qr1=mysql_query("select mabaithi  from baithithisinh where madethi='$md'");
while($kq1=mysql_fetch_array($qr1)){
	$ma=$kq['mabaithi']; 
	xoa_1_baithi($ma);
}
}

//xoa 1 ngach
function xoa_1_ngach($mng)
{
$qr=mysql_query("select madethi  from dethi where mangach='$mng'");
while($kq=mysql_fetch_array($qr)){
	$ma=$kq['madethi']; 
	xoa_1_dethi($ma);
}
$xoa2=mysql_query("delete from ngach where mangach='$mng'");
}

function kiemtra_xoanhom($mn){


 $qr1=mysql_query("select macautrucde from cautrucde where manhom='$mn'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}
function kiemtra_xoanguoiquanly($ma){


 $qr1=mysql_query("select madethi from dethi where magv='$ma'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}

function kiemtra_xoamon($mm){


 $qr1=mysql_query("select madethi from dethi where mamon='$mm'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}

function kiemtra_xoangach($mng){


 $qr1=mysql_query("select madethi from dethi where mangach='$mng'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}
function kiemtra_xoadonvi($mdv){


 $qr1=mysql_query("select mats from thisinh where madonvi='$mdv'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}

function kiemtra_xoakythi($mkt){


 $qr1=mysql_query("select mats from thisinh where makythi='$mkt'" );
$so=mysql_num_rows($qr1);
 return $so;
 
}

?>


