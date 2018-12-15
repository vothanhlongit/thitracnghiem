<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
//include_once("../CMTEST2/SoanCauHoi/connect.php");


	//Include the PS_Pagination class
	include('ps_pagination.php');
 
	//Connect to mysql db
	$conn = mysql_connect('localhost','root','');
	if(!$conn) die("Failed to connect to database!");
	$status = mysql_select_db('cmtest2', $conn);
	if(!$status) die("Failed to select database!");
	$sql = 'SELECT * FROM cauhoi';
 
	/*
	 * Create a PS_Pagination object
	 * 
	 * $conn = MySQL connection object
	 * $sql = SQl Query to paginate
	 * 10 = Number of rows per page
	 * 5 = Number of links
	 * "param1=valu1&param2=value2" = You can append your own parameters to paginations links
	 */
 
	//Create a PS_Pagination object
	$pager = new PS_Pagination($conn, $sql, 8, 4,"p=011");
 
	//The paginate() function returns a mysql result set for the current page
	$rs = $pager->paginate();
?>
	<h1 style="text-align:center">Page Navigation in PHP</h1>
	<table width="400" border="1" align="center">
		<tr>
			<td width="100" bgcolor="#CCCCCC"><p>Country ID</p></td>
			<td width="300" bgcolor="#CCCCCC">Country</td>
		</tr>
<?php
	//Loop through the result set just as you would loop
	//through a normal mysql result set
	while($row = mysql_fetch_array($rs)) {
?>
		<tr>
			<td><?php echo $row['macau'] ?></td>
			<td><?php echo $row['tieude'] ?></td>
		</tr>
<?php	
	}
?>
	</table>
<?php
	//Display the navigation
	//echo $pager->renderFullNav();
	echo '<div style="text-align:center">'.$pager->renderFullNav().'</div>';
?>

</body>
</html>