<?php 
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/commands.css" rel="stylesheet" type="text/css" />
<title>Xem De Thi</title>
<style type="text/css">
.subtable{
  position:relative;	 
left:50px;	
}

</style>
</head>

<body>
<?php
include_once("connect.php");
include_once("function.php");


//nhan  lai bien
$made=$_GET['made'];
$mm=get_a_field('mamon',$_GET['mm'],'monthi','1');
$mang=get_a_field('mangach',$_GET['mang'],'ngach','1');



$tende=get_a_field('madethi',$made,'dethi','1');
$tg=get_a_field('madethi',$made,'dethi','2');
echo "<font color=#003366 size=+2>- Đề thi: $tende <br>- Môn:$mm<br>- Ngạch: $mang<br>- Thời gian: $tg  (phút)</font><hr color=red>";

//echo $made."<br>";
//dem xem de thi bao nhieu nhom
$qrnhom=mysql_query("select nhom.manhom,tennhom,diemcautruc,cautrucde.macautrucde from  cautrucde,nhom,dethi where cautrucde.manhom=nhom.manhom and dethi.madethi=cautrucde.madethi and dethi.madethi='$made' order by right(nhom.manhom,1)");
$sttallcau=1;
$sttnhom=1;
$socau_ct=0;
while($kqnhom=mysql_fetch_array($qrnhom))
	  {
		$mn= $kqnhom['manhom'];		
		$tn= $kqnhom['tennhom'];
		$diemct= $kqnhom['diemcautruc'];
		$mact= $kqnhom['macautrucde'];	
		$socau_ct=get_a_field('macautrucde',$mact,'cautrucde','4');
		//echo $mn."<br>".$md."<br>";
		
echo "<font color=blue size=+2>Nhóm: $tn ( $diemct điểm),$socau_ct câu</font><br>";	

$qrdethi=mysql_query("select cauhoi.macau,tieude,mota,maloai,madethi,cauhoi.manhom,absolute from cautrucde,chitiet_cauhoi_cautruc,cauhoi where cautrucde.macautrucde=chitiet_cauhoi_cautruc.macautrucde and chitiet_cauhoi_cautruc.macau=cauhoi.macau  and madethi='$made' and cauhoi.manhom='$mn' order by rand()");
$stt=0;	

 while($kqdethi=mysql_fetch_array($qrdethi))
	  {
	$macau=$kqdethi['macau'];
	$tde=$kqdethi['tieude'];	
	$mta=$kqdethi['mota'];	 
	$ml=$kqdethi['maloai'];	
	$mn=$kqdethi['manhom'];	
	$md=$kqdethi['madethi'];	
	//echo $macau."<br>";
	
if($ml=='1')	//trac nghiem
{
	//echo "<br>";	
	
	$qrtraloi=mysql_query("Select * from traloi_tn where macau='$macau' and traloi<>'' order by right(matraloi_tn,1) ");
	
?>	
<table width="1019" border="1">
  <tr>
    <td width="145"><b><font color="red">Câu: &nbsp;<?php // echo ++$stt; 
		echo $sttallcau;
	 ?></font></b><br /><?php echo $macau ?>
      <?php if($kqdethi['absolute']>0) echo "<br><font size=-1 color='#6600CC'>(Đảo vị trí)</font>" ?>
<input type="text"  name="<?php echo "txtdiemcau".$sttallcau;  ?>" id="<?php echo "txtdiemcau".$sttallcau; ?>" value="<?php echo round($diemct/$socau_ct,3)." điểm" ?>" size="5"  />
    </td>
    <td width="858"><b><font color="#0066FF"><?php echo $tde   ?></font></b><br />
      <?php echo $mta; ?>
    </td>
    </tr>
<?php
$tt="A";
while($kqtl=mysql_fetch_array($qrtraloi))
	{

?>
 
  <tr>
    <td><input type="radio" <?php if($kqtl['dapan']==1) echo "checked";  ?>  disabled="disabled"  />
      <label for="rad"><?php echo $tt++ ?></label></td>
    <td><?php echo $kqtl['traloi']  ?></td>
    </tr>
    <?php
      } //while 2
	?>
</table>
<?php
 $sttallcau++;
 }//if tn
 elseif($ml=='2')//tu luan
{
	//echo "<br>";
 
 $qrtraloi=mysql_query("Select * from traloi_tl where macau='$macau' ");

while($kqcautl=mysql_fetch_array($qrtraloi))
{
?>	
<table width="1025" border="1">
  <tr>
    <td width="141"><b><font color="red">Câu:
        <?php  echo $sttallcau;  ?>
    </font></b><br /><?php 
	echo $kqcautl['matraloi_tl'] ?>
    <br /><input type="text" name="<?php echo "txtdiemcau".$sttallcau;  ?>" id="<?php echo "txtdiemcau".$sttallcau;  ?>"  value="<?php echo round($diemct/$socau_ct,3)." điểm" ?>"  size="5" />
    </td>
    <td width="868"><b><font color="#0066FF"><?php echo $tde   ?></font></b><br />
      <?php echo $mta ?></td>
    </tr>
  <tr>
    <td><font color="#009966"><b>Đáp án:</b></font></br><?php if( $kqcautl['kemfile']>0) echo "(<font color='red' size=-1>Trả lời bằng file </font>)" ?></td>
    <td><?php echo $kqcautl['traloi']; ?></td>
    </tr>
</table>	
<?php	
}//while  tl
 $sttallcau++;
}// if tluan
elseif($ml=='3')//nhieu trac nghiem
{
	//echo "<br><br>";
	echo "<b><font color='red'> Câu: ".$sttallcau."</font></b><br>";
	echo "<b>Mã Câu:</b> ".$macau."<br>";
echo "<b>Tiêu đề:</b> ".$tde."<br>";
	echo "<b>Mô tả:</b><br><div> ".$mta."</div><br>";
	$stt2=1;	
    $qrtraloi_mt=mysql_query("Select * from traloi_ntn where macau='$macau' order by round(mid(matraloi_ntn,instr(matraloi_ntn,'NTN-')+4,5),0) asc ");
 $socau_sub=dem_socau_nhieu_tracnghiem($macau);
    while($kqcau_mt=mysql_fetch_array($qrtraloi_mt)){	
	
	 $macau_mt=$kqcau_mt['matraloi_ntn'];
	 $qrtraloi_mt_sub=mysql_query("Select * from traloi_ntn_sub where matraloi_ntn='$macau_mt' order by right(matraloi_ntn_sub,1) asc ");
?>
<table width="1027" border="1" class="subtable">
  <tr>
    <td width="159"><font color="#009999">Câu:
        <?php  //echo $stt.'.'.++$stt2;
		echo $sttallcau.".".$stt2;
		  ?>
    </font><br /><?php  echo $macau_mt ?>
    <?php if($kqcau_mt['absolute']>0) echo "<br><font size=-1 color='#6600CC'>(Đảo vị trí)</font>" ?>
    <br /><input type="text" name="<?php echo "txtdiemcau".$sttallcau."-".$stt2;  ?>" id="<?php echo "txtdiemcau".$sttallcau."-".$stt2;  ?>"  value="<?php echo round($diemct/($socau_ct*$socau_sub),3)." điểm" ?>" size="6" />
    </td>
    <td width="852"><b><font color="#0066FF"><?php echo $kqcau_mt['noidung']   ?></font></b><br /></td>
    </tr>
  <?php
     $stt3="A";
   while($kqcau_mt_sub=mysql_fetch_array($qrtraloi_mt_sub)){
  ?>
  <tr>
    <td><input type="radio" <?php if($kqcau_mt_sub['dapan']==1) echo "checked";  ?>  disabled="disabled"  />
      <?php echo $stt3 ?><br /><?php  echo $kqcau_mt_sub['matraloi_ntn_sub']  ?></td>
    <td><?php echo $kqcau_mt_sub['traloi']  ?></td>
    </tr>
  <?php
      $stt3++;
   } //while 2
  ?>
</table>
<?php
$stt2++;
} // while 1
$sttallcau++;
}//if n trac nghiem


 }	//while de thi	
} //while nhom	

?>
<hr color="#FF0000" />
<center>
<input type="button" value="IN" class="command_print"  onclick="javascript:window.print();"/> <input type="button" value="Quay lại" class="command_back"  onclick="javascript:window.location='themdethi.php';"/>
</center>
</body>
</html>