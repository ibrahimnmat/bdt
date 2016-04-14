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
	$id=$_REQUEST['id'];
	 
?>
<script language="javascript">
	function validate(frm)
	{

		if(document.frm.newpwd.value=="")
		{
			alert("Sila Masukkan Kata Laluan Baru Pengguna!");
			document.frm.newpwd.focus();
			return false;
		}
		if(document.frm.connewpwd.value=="")
		{
			alert("Sila Masukkan Semula Kata Laluan Baru Pengguna!");
			document.frm.connewpwd.focus();
			return false;
		}
		if(document.frm.newpwd.value!=document.frm.connewpwd.value)
		{
			alert("Sila Pastikan Kata Laluan Baru dan Pengesahan Kata Laluan Baru Adalah Sama!");
			document.frm.connewpwd.focus();
			return false;
		}
		return true;
	}
</script>
<fieldset><legend><strong>Set Semula Kata Laluan</strong></legend>
	<form method=post action="admin_resetpwd2.php?id=<?php echo $id;?>" name=frm onsubmit="return validate(this)">
	<table class=contentfont width=100% align=center>
	        
            <tr valign=top>
	          <td colspan=3 height="29"><font color=red> <strong>
<?php echo $msg ?>
               </strong> </font></td>
	</tr>
	<tr valign=center colspan=3>
    <br>
<?php echo "<strong><font color=blue> Set Semula Kata Laluan Bagi ID Pengguna </font><i>$id </strong></i>" ?>
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
	</table>
	</form>
</fieldset>
<?php 
}
include('include/footer.php');?>