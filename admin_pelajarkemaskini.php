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
	$sql="select * from ambilan order by ambilanDesc";
	$result=$link->query($sql)or die('Error, insert query failed');
	$num   = $result->num_rows;
	
	$sql2="select * from kursus order by kursusDesc";
	$result2=$link->query($sql2)or die('Error, insert query failed');
	$num2   = $result2->num_rows;
	
	$sql3="select * from sekolah order by sekolahDesc";
	$result3=$link->query($sql3)or die('Error, insert query failed');
	$num3   = $result3->num_rows;
	
	$sql4="select * from pensyarah order by name";
	$result4=$link->query($sql4)or die('Error, insert query failed');
	$num4   = $result4->num_rows;
	
	$id=$_REQUEST['id'];
	$sql5="select * from pelajar where pelajar.icno='$id'";
	$result5 = $link->query($sql5);
	$row = mysqli_fetch_array($result5);
	
	$sql6="select * from elektif order by elektifDesc";
	$result6=$link->query($sql6)or die('Error, insert query failed');
	$num6   = $result6->num_rows;
	
	$sql7="select * from pensyarah order by name";
	$result7=$link->query($sql4)or die('Error, insert query failed');
	$num7 = $result7->num_rows;
?>
<script language=javascript src="include/form.js">
</script>
<fieldset>
<legend><strong>Kemaskini Pelajar Praktikum</strong></legend> 
<form name=form method=post action="admin_pelajarkemaskini2.php">	
  <table width="100%" align=center cellpadding=0 cellspacing=5>
    <tr> 
        <td width="35%">ID Pengguna</td>
        <td width="75%"> <?php echo $row['username'] ?>
          <input type=hidden name="app_idpengguna" value="<?php echo $row['username'] ?>">
    </td>
  </tr>
  <tr> 
        <td width="35%">Nama</td>
        <td width="75%"> 
          <input type=text name="app_name" maxlength="100" size=65 onBlur="checkChar(form.app_name.value,'app_name','form'); return true;" value="<?php echo $row['name'] ?>">
    </td>
  </tr>
  <tr>
   	    <td width="35%">Nombor Kad Pengenalan</td>
        <td width="75%">
          <input type=text name="app_noic" maxlength="100" size=65 onBlur="checkChar(form.app_noic.value,'app_noic','form'); return true; "value="<?php echo $row['icno'] ?>">
</td>
  </tr>
  <tr>
   	  <td width="35%">Ambilan</td>
      <td width="75%">
<select name = "app_ambilan"> 
   <option value="<?php echo $row['intake'] ?>" selected="selected"><?php echo $row['intake'] ?></option>
<?php 

for($u=0;$u<$num; $u++) { 
$rowambilan = mysqli_fetch_array($result)
?> 
<option value="<?php echo $rowambilan['ambilanDesc']; ?>"><?php echo $rowambilan['ambilanDesc']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
    <tr>
   	    <td width="35%">Pengkhususan</td>
      <td width="75%">
   
<select name = "app_major"> 
   <option value="<?php echo $row['major'] ?>" selected="selected"><?php echo $row['major'] ?></option>
<?php 

for($u=0;$u<$num2; $u++) { 
$rowmajor = mysqli_fetch_array($result2)
?> 
<option value="<?php echo $rowmajor['kursusDesc']; ?>"><?php echo $rowmajor['kursusDesc']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
    <tr>
   	    <td width="35%">Elektif</td>
      <td width="75%">
   
<select name = "app_elektif"> 
   <option value="<?php echo $row['elektif'] ?>" selected="selected"><?php echo $row['elektif'] ?></option>
<?php 

for($u=0;$u<$num6; $u++) { 
$rowelektif = mysqli_fetch_array($result6)
?> 
<option value="<?php echo $rowelektif['elektifDesc']; ?>"><?php echo $rowelektif['elektifDesc']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
  <tr>
   	 <td width="35%">Sekolah Praktikum</td>
     <td width="75%">
    <select name = "app_sekolah"> 
   <option value="<?php echo $row['sekolah'] ?>" selected="selected"><?php echo $row['sekolah'] ?></option>
<?php 

for($u=0;$u<$num3; $u++) { 
$rowsekolah = mysqli_fetch_array($result3)
?> 
<option value="<?php echo $rowsekolah['sekolahDesc']; ?>"><?php echo $rowsekolah['sekolahDesc'];; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
   <tr>
   	  <td width="35%">Pensyarah (Pengkhususan)</td>
      <td width="75%">
<select name = "app_pensyarah"> 
   <option value="<?php echo $row['pensyarah'] ?>" selected="selected"><?php echo $row['pensyarah']; ?></option>
<?php 
for($u=0;$u<$num4; $u++) { 
$rowpensyarah = mysqli_fetch_array($result4)
?> 
<option value="<?php echo $rowpensyarah['name']; ?>"><?php echo $rowpensyarah['name']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
   <tr>
   	  <td width="35%">Pensyarah (Elektif)</td>
      <td width="75%">
<select name = "app_pensyarah2"> 
   <option value="<?php echo $row['pensyarah2'] ?>" selected="selected"><?php echo $row['pensyarah2']; ?></option>
<?php 
for($u=0;$u<$num7; $u++) { 
$rowpensyarah2 = mysqli_fetch_array($result7)
?> 
<option value="<?php echo $rowpensyarah2['name']; ?>"><?php echo $rowpensyarah2['name']; ?></option> 
<?php 
} 
?> 
</select></td>
  </tr>
    <tr>
	   <td width="35%">Guru Pembimbing</td>
       <td width="75%"> 
     <input type=text size=40 name="app_guru" maxlength=60 value="<?php echo $row['gurubimbing'] ?>"> &nbsp;&nbsp;</td>
</tr>
  <tr>
	  <td width="35%">Tempoh Praktikum</td>
      <td width="75%"> 
     <input type=text size=40 name="app_tempoh" maxlength=40 value="<?php echo $row['tempoh'] ?>"></td>
</tr>
 <tr>
	 <td width="35%">Nombor Telefon</td>
     <td width="75%"> 
     <input type=text size=40 name="app_mphone" maxlength=15 value="<?php echo $row['contact'] ?>"> &nbsp;&nbsp;<em>Contoh: 0123456789</em> </td>
</tr>
<tr>
	 <td width="35%">Emel<br></td>
     <td width="75%" valign=top>
<input type=text size=40 name="app_email" maxlength=50 value="<?php echo $row['email'] ?>"> &nbsp;&nbsp;<em>Contoh: abc@def.com </em></td>
</tr>
<tr>      
<td colspan=2 align=left><br>
<input type=submit class="button" name="btnsubmit" Value="KEMASKINI" onClick="return validate(this)">
<input type=submit class="button" name="btnsubmit" Value="BATAL" onclick="javascript:history.go(-1)">
</td>
</tr> 
</table>
</form> </fieldset>
<?php }
include('include/footer.php');?>