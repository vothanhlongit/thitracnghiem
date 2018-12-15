<?php
session_start();
if(isset($_SESSION['magv'])) 
unset($_SESSION['magv']);
if(isset($_SESSION['magiamthi'])) 
unset($_SESSION['magiamthi']);
if(isset($_SESSION['maquantri'])) 
unset($_SESSION['maquantri']);
if(isset($_SESSION['user'])) 
unset($_SESSION['user']);
header("location: index.php");

?>
<html>
<?php
?>

</html>