<?php 
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}

if(isset($_SESSION['ACCTYPE'])&& $_SESSION['ACCTYPE']!="admin"){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}

else {
?>
<script language=javascript src="include/form.js">
</script>
<fieldset>
<legend><strong>Daftar Pengguna Lain</strong><em> (Semua medan perlu diisi)</em></legend> 
<form name=form method=post action="admin_daftarpengguna2.php" onSubmit="return validate(this)">	
  <table width="100%" align=center cellpadding=0 cellspacing=5> 
     <tr> 
        <td width="35%">Nama Penuh</td>
        <td width="75%"> 
          <input type=text name="app_name" maxlength="70" size=60 onBlur="checkChar(form.app_name.value,'app_name','form'); return true;">
    </td>
   </tr><tr>	
	    <td width=35%>ID Pengguna</td>
        <td width="75%"> 
        <input type=text name="app_loginname" size=35 maxlength="50" onBlur="checkChar(form.app_loginname.value,'app_loginname','form'); return true;"></td>
  </tr>
  <tr>	
	    <td width="35%" >Kata Laluan</td>
    <td width="75%"  > 
          <input type=password name="app_pwd" size=35 maxlength="50" onBlur="checkChar(form.app_pwd.value,'app_pwd','form'); return true;"> <em>&nbsp; (sekurang-kurangnya 4 aksara)</em></td>
  </tr>
  <tr>	
	    <td width="35%">Pengesahan Kata Laluan</td>
        <td width="75%"> 
          <input type=password name="app_conpwd" size=35 maxlength="50"></td>
  </tr>	
<tr> 
        <td width="35%">Jenis Pengguna</td>
        <td width="75%"><input type=radio name=app_type value=admin checked>Admin
          <input type=radio name=app_type value=pegdata > Pegawai Data
        </td>	
  </tr>
  <tr>      
<td colspan=2 align=left><br>
<input type=submit class="button" name="btnsubmit" Value="Daftar" ></td>
</tr> 
 </table>
</form>
</fieldset>
<?php } 
include('include/footer.php');?>