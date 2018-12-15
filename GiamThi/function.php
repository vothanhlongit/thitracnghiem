<?php


//doi ma ra ten

function get_a_field($keyname,$value,$tablename,$index)
{

$qr=mysql_query("select * from $tablename where $keyname='$value'");
$kq=mysql_fetch_array($qr);
return $kq[$index];
	
}

function chua_nopbai_het($md)
{
$qr=mysql_query("select count(mabaithi)as tong from baithithisinh where madethi='$md' and trangthai <=1 " );
$kq=mysql_fetch_array($qr);	
return $kq['tong'];
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

function thoigian_capnhat_saucung($mb)
{
$qr=mysql_query("select thoigiantraloi from bailam_ts_temp where mabaithi='$mb' order by thoigiantraloi desc limit 0,1 " );
$kq=mysql_fetch_array($qr);	
return $kq['thoigiantraloi'];
}


?>


