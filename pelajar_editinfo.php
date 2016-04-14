<?php
	include('include/header.php');	
	if(!isset($_SESSION['USERID'])){
	header("Location:index.php");
	exit;
	}

	if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="pelajar"){	
	echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
	}
else {
	require_once('include/mysql_connect.php');
	$id=$_SESSION['USERID'];
	$sql="select * from pelajar, user where user.username='$id' AND user.username=pelajar.username";
	
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
	?>

<fieldset><legend><b>Kemaskini Maklumat Peribadi Pelajar</b></legend>

<script language=javascript src="include/form.js">
</script>

<form name=form method=post action="pelajar_editinfo2.php" onSubmit="return validate(this)">
	<table width="100%" align=center cellpadding=2 cellspacing=5>
  <tr> 
        <td width="30%"> Nama </td>
        <td width="70%"> 
          <input type=text name="app_name" maxlength="100" size=65 onBlur="checkChar(form.app_name.value,'app_name','form'); return true;" value="<?php echo $row['name'] ?>">
    </td>
  </tr>
  <tr> <tr>
	    <td width="30%">Nombor Telefon </td>
        <td width="70%"> 
        <input type=text size=40 name="app_mphone" maxlength=20 onBlur="checkChar(form.app_mphone.value,'app_mphone','form'); return true;" value="<?php echo $row['contact']?>">&nbsp;&nbsp;<em>Contoh: 0123456789</em></td>
</tr>
<tr>
	    <td width="30%">Emel </td>
        <td width="70%">
<input type=text size=40 name="app_email" maxlength=50 onBlur="checkChar(form.app_email.value,'app_email','form'); return true;" value="<?php echo $row['email'] ?>">&nbsp;&nbsp;<em>Contoh: abc@def.com  </em></td>
</tr> 
<tr> <td colspan=2 align=center>
<br /> <br /><input type=button value="BATAL" onclick="javascript:history.go(-1)" class=button>&nbsp;&nbsp;&nbsp;<input type=submit class="button" name="btnsubmit" Value="SIMPAN">  </td>
</tr> 
</table>
</form></fieldset>
<?php }
include('include/footer.php');?>