<?php
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XEM BAI THI</title>

 <link rel="stylesheet" href="../SoanCauHoi/jquery/stylesheet-pure-css.css">
<link href="../css/commands.css" rel="stylesheet" type="text/css" />


<style type="text/css">

.traloitl {
  border:double;
  font-family:"Times New Roman", Times, serif;
 /* border-right-color:#FFFFFF;*/
  background-color:#CCC;
  font-size: 14pt;
    font-weight:bold;
text-align:left;
color:#630;
	  
}

a{
/* text-decoration:none;*/
 font-size:16px;	
 color:#00F;
size:14px;
}
.subtable{
  position:relative;	 
left:50px;	
}


</style>


</head>
<?php
include_once("../SoanCauhoi/cuteeditor_files/include_CuteEditor.php") ; 
 require_once("connect.php");
 require_once("function.php");
 

//nhan lai bien
$mats= $_GET['mats'];
$made=$_GET['made'];
$mabai=$_GET['mabai'];

$hten=get_a_field('mats',$mats,'thisinh',1);
//doi ra ten
$mng=get_a_field('madethi',$made,'dethi','3');
$ghichu=get_a_field('madethi',$made,'dethi','6');
$ngaysinh= get_a_field('mats',$mats,'thisinh',3);
$qq=get_a_field('mats',$mats,'thisinh',4);
$gtinh=get_a_field('mats',$mats,'thisinh',2);
//echo  $mats ."<br>$made<br>$mamon";
$mamon=get_a_field('madethi',$made,'dethi','4');
$tenmon=get_a_field('mamon',$mamon,'monthi','1');
$tenng=get_a_field('mangach',$mng,'ngach','1');
$tende=get_a_field('madethi',$made,'dethi','1');
$tg=get_a_field('madethi',$made,'dethi','2');


echo "<center><h2>BÀI THI THÍ SINH</h2><font color=red size=+2>( $mats ) $hten</font><br><font color=black size=+2> $tende <br>Môn:$tenmon<br>Ngạch: $tenng<br>Thời gian: $tg (phút)<br>Ghi chú: $ghichu</font></font></center><hr color=#003366>";


?>
<body>
<?php
//tim lai ma bai thi chua nop
$qr_baithi=mysql_query("select baithithisinh.mabaithi,madethi from baithithisinh,diem_cau,chitiet_baithi where chitiet_baithi.macau=diem_cau.macau and chitiet_baithi.mabaithi=diem_cau.mabaithi and baithithisinh.mabaithi=diem_cau.mabaithi and mats='$mats' and trangthai='2' and madethi='$made'");
	
$kq_baithi=mysql_fetch_array($qr_baithi);	
$mabaithi=$kq_baithi['mabaithi'];
$made=$kq_baithi['madethi'];


?>
<form action="ketqua.php" method="post"  name="frmdethi" enctype="multipart/form-data">
<?php
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
		//echo $mn."<br>".$md."<br>";
		$socau_ct=get_a_field('macautrucde',$mact,'cautrucde','4');
echo "<font color=black size=+2>$sttnhom.Nhóm: $tn ($diemct điểm),$socau_ct câu</font><br>";	

$qrdethi=mysql_query("select cauhoi.macau,absolute,tieude,mota,maloai,madethi,cauhoi.manhom from cautrucde,chitiet_cauhoi_cautruc,cauhoi where cautrucde.macautrucde=chitiet_cauhoi_cautruc.macautrucde and chitiet_cauhoi_cautruc.macau=cauhoi.macau  and madethi='$made' and cauhoi.manhom='$mn' order by rand()");
$stt=0;	 

 while($kqdethi=mysql_fetch_array($qrdethi))
	  {
	$macau=$kqdethi['macau'];
	$tde=$kqdethi['tieude'];	
	$mta=$kqdethi['mota'];	 
	$ml=$kqdethi['maloai'];	
	$mn=$kqdethi['manhom'];	
	$md=$kqdethi['madethi'];	
	$daovt=$kqdethi['absolute'];	
	//echo $macau."<br>";

if($ml=='1')	//trac nghiem
{
	
	$qrtraloi=mysql_query("Select * from traloi_tn where macau='$macau' order by right(matraloi_tn,1)");
?>	
<table width="1019" border="1">
  <tr>
    <td width="101"><b><font color="blue">Câu: &nbsp;<?php  //echo ++$stt; 
	echo $sttallcau;
	 ?></font></b><br /><?php echo $macau ?>
     <input type="hidden" name="<?php echo "txtcau".$sttallcau;  ?>" id="<?php echo "txtcau".$sttallcau;  ?>"  value="<?php echo $macau ?>"  />
     <input type="text"  name="<?php echo "txtdiemcau".$sttallcau;  ?>" id="<?php echo "txtdiemcau".$sttallcau; ?>" value="<?php echo round($diemct/$socau_ct,3) ?>" size="2" readonly="readonly" class="diemcham"  /></td>
    <td width="902"><b><font color="#0066FF"><?php echo $tde   ?></font></b><br />
      <?php echo $mta; ?>
    </td>
    </tr>
<?php
$tt="A";
while($kqtl=mysql_fetch_array($qrtraloi))
	{

?>
 
  <tr>
    <td><input type="radio"   <?php if($kqtl['matraloi_tn']==tim_matraloi_tn_trong_chitiet_baithi($macau,$mabaithi,$kqtl['matraloi_tn'])) echo "checked";   ?> disabled="disabled"  />
    <label for="<?php echo "rad".$sttallcau; ?>"><span><span></span></span>
     <?php echo $tt++ ?> </label><br /> <?php if($kqtl['dapan']==1) echo "<b><font color='red'>Đáp án</font></b>"; ?></td>
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
    <td width="141"><b><font color="blue">Câu:
        <?php // echo ++$stt; 
		echo $sttallcau;
		 ?>
    </font></b><br /><?php echo $kqcautl['matraloi_tl'] ?>
    <input type="hidden" name="<?php echo "txtcau".$sttallcau;  ?>" id="<?php echo "txtcau".$sttallcau;  ?>"  value="<?php echo $macau ?>"  />
    <input type="text" name="<?php echo "txtdiemcau".$sttallcau;  ?>" id="<?php echo "txtdiemcau".$sttallcau;  ?>"  value="<?php echo round($diemct/$socau_ct,3) ?>" size="2" readonly="readonly" class="diemcham"  />  
    
    </td>
    <td width="868"><b><font color="#0066FF"><?php echo $tde   ?></font></b><br />
      <?php echo $mta ?></td>
    </tr>
  <tr>
    <td valign="middle"><font color="#009933" size="+2">Trả lời:</font><br />
   
    
    </td>
    <td><?php
              $editor=new CuteEditor();
              $editor->ID="txttraloi".$sttallcau;
              $editor->Text=tim_traloi_tl_trong_chitiet_baithi($macau,$mabaithi);
              $editor->EditorBodyStyle="font:normal 14px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->ThemeType="Office2007";
              $editor->Height=150;
			  $editor->AutoConfigure="None";
           	  $editor->ReadOnly = true;
			  $editor->Draw();
              $editor=null;  
			?>
    
      <?php 
	if($kqcautl['kemfile']>0) {
		
	?>
      <b> Trả lời có: </b><a href="<?php echo getpath($macau,$mabaithi) ?>" target="_new" >FILE...</a>
  <?php
	
	}// co file
	echo "<br>";
	?> 
    
    </td>
    </tr>
 <tr>
 <td><font color="red" size="+2">Đáp án:</font></td>
  <td><?php
              $editor=new CuteEditor();
              $editor->ID="txtdapan".$sttallcau;
              $editor->Text=$kqcautl['traloi'];
              $editor->EditorBodyStyle="font:normal 14px arial;";
              $editor->EditorWysiwygModeCss="php.css";
              $editor->ThemeType="Office2007";
              $editor->Height=150;
			  $editor->AutoConfigure="None";
           	  $editor->ReadOnly = true;
			  $editor->Draw();
              $editor=null;  
			           
              
              //use $_POST["Editor1"]to retrieve the data
          ?></td>
 </tr>   
    
</table>	
<?php	

}//while  tl

//echo $diemcau_tl;
$sttallcau++; 
 
}// if tluan

elseif($ml=='3')//nhieu trac nghiem
{
	//echo "<br><br>";
	//echo "<b><font color='red'> Câu: ".++$stt."</font></b><br>";
	echo "<b><font color='blue'> Câu: ".$sttallcau."</font></b><br>";
	echo "<b>Mã Câu:</b> ".$macau."<br>";
	echo "<input type='hidden' name='txtcau".$sttallcau."' id='txtcau".$sttallcau."' value='$macau' />";
echo "<b>Tiêu đề:</b> ".$tde."<br>";
	echo "<b>Mô tả:</b><br><div> ".$mta."</div><br>";
	$stt2="1";	
    $qrtraloi_mt=mysql_query("Select * from traloi_ntn where macau='$macau' order by round(mid(matraloi_ntn,instr(matraloi_ntn,'NTN-')+4,5),0) asc ");
	 $socau_sub=dem_socau_nhieu_tracnghiem($macau);
    while($kqcau_mt=mysql_fetch_array($qrtraloi_mt)){	
	
	 $macau_mt=$kqcau_mt['matraloi_ntn'];

	
	  $qrtraloi_mt_sub=mysql_query("Select * from traloi_ntn_sub where matraloi_ntn='$macau_mt' order by right(matraloi_ntn_sub,1) asc ");
?>
<table width="1027" border="1" class="subtable">
  <tr>
    <td width="99"><font color="#009999">Câu:
        <?php // echo $stt.'.'.++$stt2; 
		echo $sttallcau.".".$stt2;
		 ?>
    </font><br /><?php echo $macau_mt ?>
    <input type="text" name="<?php echo "txtdiemcau".$sttallcau."-".$stt2;  ?>" id="<?php echo "txtdiemcau".$sttallcau."-".$stt2;  ?>"  value="<?php echo round($diemct/($socau_ct*$socau_sub),3) ?>" size="2" readonly="readonly" class="diemcham" />
    </td>
    <td width="912"><b><font color="#0066FF"><?php echo $kqcau_mt['noidung']   ?></font></b><br /></td>
    </tr>
  <?php
     $stt3="A";
   while($kqcau_mt_sub=mysql_fetch_array($qrtraloi_mt_sub)){
	   
	   $ma_sub=$kqcau_mt_sub['matraloi_ntn_sub'];
  ?>
  <tr>
    <td><input type="radio"  <?php if($ma_sub==tim_matraloi_tn_trong_chitiet_baithi($macau_mt,$mabaithi,$ma_sub)) echo "checked";   ?> disabled="disabled" /><label for="<?php echo "rad".$sttallcau."-".$stt2; ?>"><span><span></span></span>
      <?php echo $stt3 ?></label><br /><?php  echo $ma_sub  ?><br />
      <?php if($kqcau_mt_sub['dapan']==1) echo "<b><font color='red'>Đáp án đúng</font></b>"; ?>
      
      </td>
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
 
 //lay so cau tn
 $_SESSION['socau_all']=$sttallcau-1;
 
$sttnhom++;
} //while nhom	
	
?>
<hr color="#333333" />
<center><input type="button" value="IN" class="command_print" onclick="javascript:window.print();"/>&nbsp; &nbsp;
<input type="button" value="Đóng" class="command_close" onclick="javascript:window.close()"  />
</center>


  
  </form>  
 
</body>
</html>