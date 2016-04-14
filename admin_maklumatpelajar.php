<?php 
ob_start(); 
include('include/header.php');
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
	$sql="select * from ambilan";
	$result=$link->query($sql)or die('Error, insert query failed');
	$num   = $result->num_rows;
	
	$sql2="select * from kursus";
	$result2=$link->query($sql2)or die('Error, insert query failed');
	$num2   = $result2->num_rows;
?>
<script language=javascript src="include/form.js">

   </script>
   <fieldset><legend><strong>Kemaskini Maklumat Pelajar <strong></legend>
<form name=form method=post action="admin_maklumatpelajar2.php">	
  <table width="100%" align=center cellpadding=0 cellspacing=5>	
  <tr>	
<td width=30%%>Ambilan <select name = "app_ambilan" onBlur="checkChar(form.app_ambilan.value,'app_ambilan','form'); return true;">> 
   
<?php 
for($u=0;$u<$num; $u++) { 
$rowambilan = mysqli_fetch_array($result)
?> 
<option value="<?php echo $rowambilan['ambilanDesc']; ?>"><?php echo $rowambilan['ambilanDesc'];; ?></option> 
<?php 
} 
?> 
</select></td>
        <td width="50%"> Pengkhususan<select name = "app_kursus"> 
<?php 
for($u=0;$u<$num2; $u++) { 
$rowkursus = mysqli_fetch_array($result2)
?> 

<option value="<?php echo $rowkursus['kursusDesc']; ?>"><?php echo $rowkursus['kursusDesc'];; ?></option> 
<?php 
} 
?> 
</select></td>
        <td width="20%"> 
<input type=submit class="button" name="btnsubmit" Value="PILIH" ></td>
  </tr> </table>
 </form> </fieldset>
<?php }
include('include/footer.php');?>	