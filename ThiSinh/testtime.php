<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
function caltime($t1,$t2)
{

    $diff = abs(strtotime($t2) - strtotime($t1));
 
    $hours = floor($diff/3600);
    $minutes = floor(($diff - $hours*60*60)/ 60);
    $seconds = floor(($diff  - $hours*60*60- $minutes*60));
    //echo "<br />".$hours." hours, ".$minutes." minutes, ".$seconds." seconds";  
	return $minutes;
}

$t1="05:03:58";
$t2="05:09:06";
$sd=caltime($t1,$t2);
echo $sd;

?>
</body>
</html>