<?php 
include('include/header.php');

if(!isset($_SESSION['USERID'])){
header("Location:index.php");
exit;
}
if(isset($_SESSION['ACCTYPE'])&& ($_SESSION['ACCTYPE']!="admin" && $_SESSION['ACCTYPE']!="pegdata")){	
echo "<font color='red' size='+1'>Anda TIDAK dibenarkan untuk melihat kandungan dalam halaman ini !!</font>";
}
else{
?>
<script language=javascript src="include/form.js">

   </script>
   
<fieldset>
<legend><strong>Daftar Pensyarah</strong><em> (Medan yang bertanda <font color="#FF0000">* </font> mesti diisi)</em></legend>
 
<form name=form method=post action="daftarpensyarah2.php">	
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
      <td colspan=2 bgcolor=#dddddd ><b>MAKLUMAT PENSYARAH</b></td>
  </tr> 
  <tr> 
        <td width="35%">Nama <font color="#FF0000">* </font></td>
        <td width="75%"> 
          <input type=text name="app_name" maxlength="100" size=65 onBlur="checkChar(form.app_name.value,'app_name','form'); return true;">
    </td>
  </tr>
  <tr>
   	    <td width="35%">Jawatan</td>
        <td width="75%">
<input type=text name="app_position" size=65 maxlength="100"></td>
  </tr>
  <tr>
   	    <td width="35%">Jabatan</td>
        <td width="75%">
<input type=text name="app_department" size=65 maxlength="100"></td>
  </tr><tr>
	    <td width="35%">Nombor Telefon</td>
        <td width="75%"> 
          <input type=text size=40 name="app_mphone" maxlength=15> &nbsp;&nbsp;<em>Contoh: 0123456789</em> </td>
</tr>
<tr>
	    <td width="35%">Emel<br>
	      </td>
      <td width="75%" valign=top>
<input type=text size=40 name="app_email" maxlength=50> &nbsp;&nbsp;<em>Contoh: pensyarah@ipgkrajang.edu.my </em></td>
</tr>
  <tr>      
<td colspan=2 align=left><br>
<input type=submit class="button" name="btnsubmit" Value="Daftar" onClick="return validate(this)"></td>
</tr> 
 </table>
</form> </fieldset>
<?php }include('include/footer.php');?>	