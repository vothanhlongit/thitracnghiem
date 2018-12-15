<?php
$cn=mysql_connect('127.0.0.1','root','');
if(!$cn){
echo "Khong the ket noi voi may 127.0.0.1";
exit;
}
$db=mysql_select_db("cmtest2_my");
if(!$db){
echo "Khong the ket noi CSDl";
exit;
}

$dbc = @mysqli_connect('127.0.0.1','root', '','cmtest2_my');
//@mysqli_query($dbc,'set character set "utf8"'); 

// Kiểm tra kết nối
if (!$dbc) {
    trigger_error('Không thể kết nối đến MySQL: ' . mysqli_connect_error());
}


?>