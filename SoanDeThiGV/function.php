<?php
function laysomacautructruoc()
{

$qr=mysql_query("select macautrucde from cautrucde  order by round(mid(macautrucde,instr(macautrucde,'-')+1,5),0) desc limit 0,1");
$kq=mysql_fetch_array($qr);
 $str=$kq['macautrucde'];
return substr($str,strpos($str,'-',0)+1,5);

}

//include_once "connect.php";
function sinhmacautruc()
{

$qrdem=mysql_query("select * from cautrucde");
$tong=mysql_num_rows($qrdem);
// echo $tong;
 if($tong<=0)
    {
	$key1= "CT-1";
     return $key1;
	}
	else
	{
	$vt=$tong-1;
	//$tong++;
	 $dem= laysomacautructruoc();
	 $key1= "CT-".++$dem;
	 
	return $key1;
	 }
}//function 
function laysomadethitruoc($mm,$mng)
{

$qr=mysql_query("select madethi from dethi where mangach='$mng' and mamon='$mm' order by round(mid(madethi,instr(madethi,'-')+1,5),0) desc limit 0,1");
$kq=mysql_fetch_array($qr);
 $str=$kq['madethi'];
return substr($str,strpos($str,'-',0)+1,5);

}

function sinhmadethi($mm,$mng)
{

$qrdem=mysql_query("select * from dethi where mangach='$mng' and mamon='$mm'");
$tong=mysql_num_rows($qrdem);
// echo $tong;
 if($tong<=0)
    {
	$key1= $mng.$mm."-1";
     return $key1;
	}
	else
	{
    $dem=laysomadethitruoc($mm,$mng);
	 $key1= $mng.$mm."-".++$dem;
	 
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

function kiemtra_socau_dethi($md,$new)
{

$qr0=mysql_query("select tongsocau from dethi where madethi='$md' " );
$kq0=mysql_fetch_array($qr0);
$tong=$kq0['tongsocau'];

$qr=mysql_query("select sum(socau)as tsc from cautrucde where madethi='$md' group by madethi" );
$kq=mysql_fetch_array($qr);
$t=$kq['tsc'];

$t2=$t+$new;
 if($tong>=$t2)
 return 1;
 
  return 0;
	
}

function kiemtra_thangdiem_dethi($md,$new)
{

$qr0=mysql_query("select thangdiem from dethi where madethi='$md' " );
$kq0=mysql_fetch_array($qr0);
$tong=$kq0['thangdiem'];

$qr=mysql_query("select sum(diemcautruc)as tdiem from cautrucde where madethi='$md' group by madethi" );
$kq=mysql_fetch_array($qr);
$t=$kq['tdiem'];

$t2=$t+$new;
 if($tong>=$t2)
 return 1;
 
  return 0;
	
}

function nhom_dethi_tontai($md,$mn)
{

$qr0=mysql_query("select macautrucde from cautrucde where madethi='$md' and manhom='$mn'" );
$kq0=mysql_fetch_array($qr0);
$rong=$kq0['macautrucde'];

 if(!$rong)
 return 0;
 
  return 1;
	
}
function nhom_dethi_tontai_sua($md1,$mn1)
{

$qr1=mysql_query("select macautrucde from cautrucde where madethi='$md1' and manhom='$mn1'" );
$tong1=mysql_num_rows($qr1);

 if($tong1<=1)
 return 0;
 
  return 2;
	
}
function kiemtrasocau($mact)
{
$qr=mysql_query("select count(macau)as dem from  chitiet_cauhoi_cautruc where macautrucde='$mact' group by macautrucde " );
$kq=mysql_fetch_array($qr);
$tong=$kq['dem'];	
 
 return $tong;

}

function removeNewline($str)
{
$str = str_replace('\n','',$str);
$str = str_replace('\r','', $str);
return $str;
} 
function doc_1_cauhoi($macau,$tde,$mta,$maloai)
{
	$mta=  stripslashes($mta);
	$mta=str_replace('"','',$mta);
	$mta=str_replace('/Uploads','../Uploads',$mta);
	//bo ca tag xuong hang
	$mta = str_replace('<br>','',$mta);
	//Remove các ký tự xuống dòng để nó hợp lại thành 1 dòng duy nhất (text base)
	$arr_mota = explode( "\n", $mta );
	$new_mta = implode(' ',$arr_mota);

	$arr_mota1 = explode( "\r", $new_mta );
	$mta = implode(' ',$arr_mota1);
//loai trac nghiem
if($maloai==1)
{
	$strhtml="";
$qr=mysql_query("Select * from traloi_tn where macau='$macau'  order by right(matraloi_tn,1) ");
	$tt="A";
	$strhtml=$strhtml."<table width=700 border=1><tr><td width=30>Đáp án</td> <td width=400><b><font color=blue>$tde</font></b><br>$mta</td></tr>";
	while($kq=mysql_fetch_array($qr))
	{
	if($kq['dapan']==1) 
	$strhtml=$strhtml. "<tr><td>".$tt++."<input type=radio disabled=disabled checked/></td><td>".$kq['traloi']."</td></tr>";
	else
	$strhtml=$strhtml. "<tr><td>".$tt++."<input type=radio disabled=disabled /></td><td>".$kq['traloi']."</td></tr>";
	
	}//while
$strhtml=$strhtml. "</table>";	

return removeNewline($strhtml);

} //if trac nghiem

elseif($maloai==2)//loai tu luan
{
	$strhtml="";
$qr=mysql_query("Select * from traloi_tl where macau='$macau'");
$kq=mysql_fetch_array($qr);
$strhtml=$strhtml."<table width=700 border=1><tr><td width=50>Câu hỏi:</td> <td width=400><b><font color=#0066FF>$tde</b></font><br>$mta</td></tr><tr><td>Đáp án</td><td>".$kq['traloi']."</td></tr></table>";
	return  removeNewline($strhtml);
}//tu luan
elseif($maloai==3)//nhieu tn
{
$stt=1;
$strhtml="";
	//$strhtml=$strhtml.$tde."<br>";
	echo 	"<b><font color=blue>$tde</font></b><br>";
	echo 	$mta."<br>";
 $qrtraloi_mt=mysql_query("Select * from traloi_ntn where macau='$macau' ");


    while($kqcau_mt=mysql_fetch_array($qrtraloi_mt)){	
		$strhtml=$strhtml."<table width=700 border=1><tr><td width=30>Câu:". $stt++."</td> <td width=400><b><font color=blue>".$kqcau_mt['noidung']."</font></b></td></tr>";
		$tt2="A";
		//truy van cac cau con
		 $macau_mt=$kqcau_mt['matraloi_ntn'];
	 $qrtraloi_mt_sub=mysql_query("Select * from traloi_ntn_sub where matraloi_ntn='$macau_mt' order by right(matraloi_ntn_sub,1) asc ");
	while($kq=mysql_fetch_array($qrtraloi_mt_sub))
	{
	if($kq['dapan']==1) 
	$strhtml=$strhtml. "<tr><td>".$tt2++."<input type=radio disabled=disabled checked/></td><td>".$kq['traloi']."</td></tr>";
	else
	$strhtml=$strhtml. "<tr><td>".$tt2++."<input type=radio disabled=disabled /></td><td>".$kq['traloi']."</td></tr>";
	
	}//while 2
$strhtml=$strhtml. "</table>";	

} //while 1

return  removeNewline($strhtml);	
}//nhieu tn
}//function

//insert cau hoi ngau nhien
function insert_random_cauhoi($mact,$manhom,$socau,$maloai)
{

 //kiem tra kho cau hoi thieu  Socau=$socau

 $qr_tong=mysql_query("select macau from cauhoi where maloai=$maloai and manhom='$manhom' order by rand() limit 0,$socau");
 $tong=mysql_num_rows($qr_tong);
 if($tong<$socau)
 {
	
	echo "<font color=red size=+2>Lỗi:Không thể thực hiện được vì SỐ LƯỢNG TRONG KHO CÂU HỎI < SỐ CÂU HỎI YÊU CẦU!.BẠN HÃY<a href='../SoanCauHoi/chonloaicauhoi.php'> SOẠN CÂU HỎI.</a></font>";
	 exit;
 }
 
 $qr_rand=mysql_query("select macau from cauhoi where maloai=$maloai and manhom='$manhom' order by rand() limit 0,$socau");
while( $kq_rand=mysql_fetch_array($qr_rand))
{
	$mc=$kq_rand['macau'];
//insert vao chitiet_cautruc
echo $mc."<br>";
$qrinsert=mysql_query("insert into chitiet_cauhoi_cautruc values('$mact','$mc')");
	
}

}//function
//dem socau trong chitiet
function count_socau_chitiet_cautruc($mact)
{

 $qr_tong1=mysql_query("select count(macau)as dem from chitiet_cauhoi_cautruc where macautrucde='$mact' group by macautrucde");
 $kqtong1=mysql_fetch_array( $qr_tong1);
 $tong1= $kqtong1['dem'];
 return $tong1;
	
}
//kiem tra dehoan chinh

function socau_dethi_hoanchinh($made)
{
$qr=mysql_query("SELECT COUNT( cautrucde.macautrucde ) AS socau FROM cautrucde, chitiet_cauhoi_cautruc WHERE chitiet_cauhoi_cautruc.macautrucde = cautrucde.macautrucde AND madethi ='$made'");
 $kq=mysql_fetch_array( $qr);	
 return  $kq['socau'];
	
}

function thangdiem_dethi_hoanchinh($made)
{
$qr=mysql_query("SELECT sum(diemcautruc) AS tongdiemct FROM cautrucde WHERE madethi ='$made' group by madethi ");
 $kq=mysql_fetch_array( $qr);	
 return  $kq['tongdiemct'];
	
}



//xoa 1 cau hoi
function xoa_1_cauhoi($mc,$maloai)
{
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
}//function

function dem_socau_nhieu_tracnghiem($macau)
{
//dem o table n tracnghiem

$qrntn=mysql_query("select matraloi_ntn from  traloi_ntn where macau='$macau'");
$tong_ntn=mysql_num_rows($qrntn);
return $tong_ntn;

	
}

function remove_directory($dir) {
if ($handle = opendir("$dir")) {
while (false !== ($item = readdir($handle))) {
if ($item != "." && $item != "..") {
if (is_dir("$dir/$item")) {
remove_directory("$dir/$item");
} else {
unlink("$dir/$item");
echo " removing $dir/$item<br>\n";
}
}
}
closedir($handle);
rmdir($dir);
echo "Đã xóa thư mục: $dir<br>\n";
}
}


function remove_allFile($dir) {
if ($handle = opendir("$dir")) {
while (false !== ($item = readdir($handle))) {
if ($item != "." && $item != "..") {
if (is_dir("$dir/$item")) {
remove_directory("$dir/$item");
} else {
unlink("$dir/$item");
echo " removing $dir/$item<br>\n";
}
}
}
closedir($handle);

}
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

function kiemtra_xoadethi($made){

$qr=mysql_query("select mabaithi from baithithisinh where madethi='$made'" );
$socau=mysql_num_rows($qr);
 return $socau;
 
}

function kiemtra_xoacautruc($mact){

$qr=mysql_query("select madethi from cautrucde   where macautrucde='$mact'" );
$kq=mysql_fetch_array($qr);
$md=$kq['madethi'];

 $qr1=mysql_query("select mabaithi from baithithisinh where madethi='$md'" );
$socau=mysql_num_rows($qr1);
 return $socau;
 
}

?>


