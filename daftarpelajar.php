<?php 
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}
if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}
else {
	$sql="select * from ambilan order by ambilanDesc";
	$result=$link->query($sql)or die('Error, insert query failed');
	$num   = $result->num_rows;
	
	$sql2="select * from kursus order by kursusDesc";
	$result2=$link->query($sql2)or die('Error, insert query failed');
	$num2   = $result2->num_rows;
	
	$sql3="select * from elektif order by elektifDesc";
	$result3=$link->query($sql3)or die('Error, insert query failed');
	$num3   = $result3->num_rows;
?>
<script language=javascript src="include/form.js">
</script>
   

<fieldset>
<legend><strong>Daftar Pelajar </strong><em>(Medan yang bertanda <font color="#FF0000">* </font> mesti diisi)</em></legend> 
<form name=form method=post action="daftarpelajar2.php">	
  <table width="100%" align=center cellpadding=0 cellspacing=5>
  
   <tr> 
    <td colspan=2 bgcolor=#dddddd><b>MAKLUMAT LOG MASUK</b></td>
  </tr>
  <tr>	
	    <td width=35%>ID Pengguna <font color="#FF0000">* </font></td>
        <td width="75%"> 
          <input type=text name="app_loginname" size=35 maxlength="50" onBlur="checkChar(form.app_loginname.value,'app_loginname','form'); return true;"></td>
  </tr>
  <tr>	
	    <td width="35%" >Kata Laluan <font color="#FF0000">* </font></td>
        <td width="75%"  > 
          <input type=password name="app_pwd" size=35 maxlength="50" onBlur="checkChar(form.app_pwd.value,'app_pwd','form'); return true;"> <em> &nbsp;(sekurang-kurangnya 4 aksara)</em> </td>
  </tr>
  <tr>	
	    <td width="35%">Pengesahan Kata Laluan <font color="#FF0000">* </font></td>
        <td width="75%"> 
          <input type=password name="app_conpwd" size=35 maxlength="50"></td>
  </tr>	
  <tr> 
      <td colspan=2 bgcolor=#dddddd ><b>MAKLUMAT PELAJAR</b></td>
  </tr> 
  <tr> 
        <td width="35%">Nama <font color="#FF0000">* </font></td>
        <td width="75%"> 
<input type=text name="app_name" maxlength="100" size=65 onBlur="checkChar(form.app_name.value,'app_name','form'); return true;">
    </td>
  </tr>
  <tr>
   	    <td width="35%">Nombor Kad Pengenalan <font color="#FF0000">* </font></td>
        <td width="75%">
  <input type=text name="app_noic" maxlength="100" size=65 onBlur="checkChar(form.app_noic.value,'app_noic','form'); return true;">
</td>
  </tr>
  <tr>
   	  <td width="35%">Ambilan <font color="#FF0000">* </font></td>
      <td width="75%"> 
<select name = "app_ambilan" onBlur="checkChar(form.app_ambilan.value,'app_ambilan','form'); return true;">> 
   <option value="0" selected="selected"></option>
<?php 

for($u=0;$u<$num; $u++) { 
$rowambilan = mysqli_fetch_array($result)
?> 
<option value="<?php echo $rowambilan['ambilanDesc']; ?>"><?php echo $rowambilan['ambilanDesc'];; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
    <tr>  <td width="35%">Pengkhususan <font color="#FF0000">* </font></td>
      <td width="75%">
    
<select name = "app_kursus"> 
   <option value="0" selected="selected"></option>
<?php 

for($u=0;$u<$num2; $u++) { 
$rowkursus = mysqli_fetch_array($result2)
?> 

<option value="<?php echo $rowkursus['kursusDesc']; ?>"><?php echo $rowkursus['kursusDesc']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
   <tr>
   	    <td width="35%">Elektif</td>
        <td width="75%">
    
<select> 
   <option value="0" selected="selected"></option>
<?php 

for($u=0;$u<$num3; $u++) { 
$rowelektif = mysqli_fetch_array($result3)
?> 

<option value="<?php echo $rowelektif['elektifDesc']; ?>"><?php echo $rowelektif['elektifDesc']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
  <tr>
	    <td width="35%">Nombor Telefon</td>
        <td width="75%"> 
          <input type=text size=40 name="app_mphone" maxlength=15> &nbsp;&nbsp;<em>Contoh: 0123456789</em> </td>
</tr>
<tr>
	    <td width="35%">Emel<br>
	      </td>
      <td width="75%" valign=top>
<input type=text size=40 name="app_email" maxlength=50> &nbsp;&nbsp;<em>Contoh: abc@def.com </em></td>
</tr>
  <tr>      
<td colspan=2 align=left><br>
<input type=submit class="button" name="btnsubmit" Value="Daftar" onClick="return validate(this)"></td>
</tr> 
 </table>
</form> </fieldset>
<?php }include('include/footer.php');?>	