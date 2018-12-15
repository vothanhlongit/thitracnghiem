<?php
include_once("connect.php");



//xu ly chuoi hop le
function fixtext($str) {
    $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8'); 
    $str = str_replace("\r\n", ', ', $str);
    $str = str_replace("'", "&acute;", $str);
	//$str = str_replace('"', "&quot;", $str);
	$str = str_replace('“', "&ldquo;", $str); 
	$str = str_replace('”', "&rdquo;", $str);  
	$str = str_replace('‘', "&lsquo;", $str);  
	$str = str_replace('’', "&rsquo;", $str); 
	//$str = str_replace('<', "&lt;", $str); 
	//$str = str_replace('>', "&gt;", $str);	
	$str = str_replace('″', "&Prime;", $str);
	$str = str_replace('′', "&prime;", $str);	
	//$str = str_replace('/', "&frasl;", $str);		
	//$str = str_replace('/', " / ", $str);
   // $str = bbcode::notags($str);
 //   $str = strtr($str, array(
   // '&' => ' ',
 //   '!' => ' ',
 //   '@' => ' ',
   // '#' => ' ',
   // '$' => ' ',
 //   '^' => ' ',
   // ';' => ' ',
  //  '{' => ' ',
 //   '}' => ' ',
  //  '(' => ' ',
   // ')' => ' ',
   // ':' => ' ',
  //  '~' => ' ',
   // '`' => ' ',
   // '%' => ' ',
  //  '*' => ' ',
  //  '<' => ' ',
  //  '>' => ' ',
   // '_' => ' ',
  //  '.' => ' ',
  //  '?' => ' ',
  //  '…' => ' ',
   // '"' => ' ',
 //   '[' => ' ',
 //   ']' => ' '
   // ));
  $str = preg_replace("/, {2,20}/", ', ', $str); 
  $str = preg_replace("/[,]{2,20}/", ',', $str); 
 $str = preg_replace("/[ ]{2,20}/", ' ', $str); 
$str = trim($str);
return $str; 
}



function get_a_field($keyname,$value,$tablename,$index)
{

$qr=mysql_query("select * from $tablename where $keyname='$value'");
$kq=mysql_fetch_array($qr);
return $kq[$index];
	
}
//doi ra ngay
date_default_timezone_set('Asia/Ho_Chi_Minh');
 $n=date("Y");
 $t=date("m");
 $nn=date("d");
 
  $gio=date("h");
  $phut=date("i");
  $giay=date("s");
   
 $ght=$gio.":".$phut.":".$giay;	 
 $ngaytraloi=$n."-".$t."-".$nn;
  


if(isset($_POST['mc']) && isset($_POST['mbt'])&&  isset($_POST['mtl']))
{
$macau = $_POST['mc'];
$mabaithi = $_POST['mbt'];
$matl = fixtext($_POST['mtl']);
$maloai=get_a_field("macau",$macau,"cauhoi",'3');
//echo $macau."<br>".$mabaithi."<br>".$matl;   
	//cau trac gnhiem
	if($maloai=='1'){
	$query="UPDATE bailam_ts_temp SET matraloi_tn='$matl',thoigiantraloi='$ght' WHERE macau='$macau' and mabaithi='$mabaithi'";
    $result=mysql_query($query);
	} //if tn
	
	elseif($maloai=='2'){
		$query="UPDATE bailam_ts_temp SET traloi='$matl',thoigiantraloi='$ght' WHERE macau='$macau' and mabaithi='$mabaithi'";
    $result=mysql_query($query);
	}
	else // ntn dc dua vai tn luon(macau=matraloi_ntn)
	{
	
	$query="UPDATE bailam_ts_temp SET matraloi_tn='$matl',thoigiantraloi='$ght' WHERE macau='$macau' and mabaithi='$mabaithi'";
    $result=mysql_query($query);
	
	}

}// if post
?>