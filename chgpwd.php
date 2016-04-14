<?php
include('include/header.php');
	
if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}
else {
	if(empty($_GET['msg']))
	{
		$msg="";
	}
	if(($_GET['msg'])==1)
	{	
		$msg="Kata Laluan Lama Anda Tidak Sah! Sila Masukkan Semula.";
	}
	
	if(($_GET['msg'])==2)
	{
		$msg="Kata Laluan Anda Berjaya Ditukar!";
	}
?>
<script language="javascript">
	function validate(frm)
	{
		if(document.frm.oldpwd.value=="")
		{
			alert("Sila Masukkan Kata Laluan Lama Anda!");
			document.frm.oldpwd.focus();
			return false;
		}
		if(document.frm.newpwd.value=="")
		{
			alert("Sila Masukkan Kata Laluan Baru Anda!");
			document.frm.newpwd.focus();
			return false;
		}
		if(document.frm.connewpwd.value=="")
		{
			alert("Sila Masukkan Semula Kata Laluan Baru Anda!");
			document.frm.connewpwd.focus();
			return false;
		}
		if(document.frm.newpwd.value!=document.frm.connewpwd.value)
		{
			alert("Kata Laluan Tidak Sama, Sila Masukkan Semula Kata Laluan Baru Anda!");
			document.frm.connewpwd.focus();
			return false;
		}
		return true;
	}
</script>
<fieldset><legend><strong>Tukar Kata Laluan</strong></legend>
	<form method=post action="chgpwd2.php" name=frm onsubmit="return validate(this)">
	<table class=contentfont width=100% align=center>
	        
            <tr valign=top>
	          <td colspan=3 height="29"><font color=red> <strong>
                <?php echo $msg ?>
               </strong> </font></td>
	</tr>
	<tr valign=center colspan=3>
	          <td align=right width="37%">Kata Laluan Lama:</td>
			  <td width="1%"></td>
              <td width="62%"> 
                <input type=password name=oldpwd size=30></td>
	</tr>
	<tr valign=center colspan=3>
	          <td align=right width="37%">Kata Laluan Baru:</td>
			  <td width="1%"></td>
              <td width="62%"> 
                <input type=password name=newpwd size=30></td>
	</tr>
	<tr valign=center colspan=3>
	          <td align=right width="37%">Pengesahan Kata Laluan Baru:</td>
			  <td width="1%"></td>
              <td width="62%"> 
                <input type=password name=connewpwd size=30></td>
	</tr>
	<tr colspan=3>
	<td colspan=3 align=center><br>
<br>
<input type=submit value="Simpan" class=button><br><br>
	</td>
	</tr>
	<input type=hidden name=submit value=1>
	</table>
	</form>
</fieldset>
<?php 
}
include('include/footer.php');?>